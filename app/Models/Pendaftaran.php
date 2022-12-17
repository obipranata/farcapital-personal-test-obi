<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pendonor;

class Pendaftaran extends Model
{
    use HasFactory;
    public $guarded = ["id"];
    protected $table = "pendaftaran";

    public function pendonor()
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendonor');
    }
}
