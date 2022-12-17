<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria_dilarang;

class KriteriaDilarangController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria_dilarang::query()->orderBy('id')->get();
        return view("kriteria.list", compact('kriteria'));
    }

    public function detail($id)
    {
        $kriteria = Kriteria_dilarang::query()->where("id", $id)->first();
        return view("kriteria.detail", compact('kriteria'));
    }

    public function store()
    {
        $kriteria = Kriteria_dilarang::query()->get();
        return view("kriteria.store", compact('kriteria'));
    }

    public function update(Request $request, $id)
    {
        $data['nama'] = $request->nama;
        Kriteria_dilarang::where('id', $id)->update($data);
        return redirect()->back()->with(['success' => 'Data berhasil di update!']);
        ;
    }

    public function create(Request $request)
    {
        $payload = [
            'nama_kriteria' => $request->input("nama_kriteria")
        ];
        Kriteria_dilarang::query()->create($payload);
        return redirect('/kriteria-dilarang/list')->with(['success' => 'Data berhasil di tambahkan!']);
    }

    public function destroy($id)
    {
        $kriteria = Kriteria_dilarang::query()->where("id", $id)->delete();
        return redirect()->back()->with(['success' => 'Data berhasil di hapus!']);
        ;
    }
}
