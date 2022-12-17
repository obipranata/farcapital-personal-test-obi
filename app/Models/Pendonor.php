<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pendaftaran;

class Pendonor extends Model
{
    use HasFactory;
    public $guarded = ["id"];
    protected $table = "pendonor";

    public function pendonor()
    {
        return $this->hasMany(Pendonor::class, 'id');
    }
}
