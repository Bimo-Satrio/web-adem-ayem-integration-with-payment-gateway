<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SyaratKetentuanModel extends Model
{
    use HasFactory, HasUuids;
    protected $primaryKey = "id_syarat_ketentuan";
    protected $table = "syarat_ketentuan";
    protected $fillable = ["id_syaratketentuan", "judul_syarat_ketentuan", "deskripsi_syarat_ketentuan"];
    public $incrementing = false;
}
