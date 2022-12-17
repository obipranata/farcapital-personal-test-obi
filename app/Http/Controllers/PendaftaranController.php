<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pendaftaran;
use App\Models\Pendonor;
use App\Models\Kriteria_dilarang;
use Illuminate\Support\Facades\Hash;
use DB;

class PendaftaranController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria_dilarang::query()->orderBy('id')->get();
        return view('pendaftaran', compact('kriteria'));
    }

    public function list()
    {
        $pendaftaran = Pendaftaran::query()->get();
        $pendonor = Pendonor::query()->get();
        return view('pendaftaran-list', compact('pendaftaran', 'pendonor'));
    }

    public function detail($id)
    {
        $pendonor = Pendonor::query()->where('id', $id)->first();
        $pendaftaran = Pendaftaran::query()->where('id_pendonor', $id)->first();
        return view('form-kesehatan', compact('pendonor', 'pendaftaran'));
    }

    public function create(Request $request)
    {
        $id = $request->input('id');

        if (isset($id)) {
            $status = 1;
            $pesan = "Anda tidak diperbolehkan mendonor!";
        } else {
            $status = 2;
            $pesan = "Anda dapat melakukan tes kesehatan untuk proses selanjutnya!";
        }

        $data_pendonor = [
            'nama' => $request->input("nama"),
            'jenis_kelamin' => $request->input("jenis_kelamin"),
            'tanggal_lahir' => $request->input("tanggal_lahir"),
            'alamat' => $request->input("alamat"),
        ];

        $id_pendonor = DB::table('pendonor')->insertGetId($data_pendonor);

        $data_pendaftaran = [
            'id_pendonor' => $id_pendonor,
            'status' => $status
        ];

        Pendaftaran::query()->create($data_pendaftaran);

        return redirect('/pendaftaran')->with(['success' => $pesan]);
    }

    public function update(Request $request, $id)
    {
        $kriteria = $request->input('kriteria');

        if (!isset($kriteria)) {
            $status = 3;
        } else {
            $status = 4;
        }

        $data = ['status' => $status];

        Pendaftaran::where('id_pendonor', $id)->update($data);
        return redirect()->back()->with(['success' => 'Data berhasil di update!']);
    }
}
