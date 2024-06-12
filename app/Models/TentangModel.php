<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TentangModel extends Model
{
    use HasFactory;
    protected $primaryKey = "tentang_konrakan";
    protected $table = "tentang_kontrakan";
    protected $fillable = ["id_tentang_konrakan", "judul_tentang_kontrakan", "deskripsi_tentang_kontrakan"];
    public $incrementing = false;
}
