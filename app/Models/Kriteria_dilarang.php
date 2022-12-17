<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria_dilarang extends Model
{
    use HasFactory;
    public $guarded = ["id"];
    protected $table = "kriteria_dilarang";
}
