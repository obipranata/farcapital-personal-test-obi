<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Petugas extends Model
{
    use HasFactory;
    public $guarded = ["id"];
    protected $table = "petugas";

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Petugas $petugas) {
            $petugas->password = Hash::make($petugas->password);
        });

        static::updating(function (Petugas $petugas) {
            if ($petugas->isDirty(["password"])) {
                $petugas->password = Hash::make($petugas->password);
            }
        });
    }
}
