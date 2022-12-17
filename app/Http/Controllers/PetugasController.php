<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function login(Request $request)
    {
        if ($request->method() == "GET") {
            return view("auth.login");
        }

        $email = $request->input('email');
        $password = $request->input('password');

        $petugas = Petugas::query()->where("email", $email)->first();

        if ($petugas == null) {
            return redirect()
            ->back()
            ->withErrors(["msg" => "Email tidak ditemukan"]);
        }

        if (!Hash::check($password, $petugas->password)) {
            return redirect()->back()->withErrors(["msg" => "Password salah!"]);
        }

        if (!session()->isStarted()) {
            session()->start();
        }
        session()->put("logged", true);
        session()->put("idPetugas", $petugas->id);
        return redirect()->route("kriteria-dilarang.list");
    }

    public function logout(Request $request)
    {
        session()->flush();
        return redirect()->route("login");
    }
}
