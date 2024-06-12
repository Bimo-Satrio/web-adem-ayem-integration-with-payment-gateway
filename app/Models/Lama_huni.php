<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lama_huni extends Model
{
    use HasFactory, HasUuids;


    protected $primaryKey = 'id_lama_huni';
    protected $table = 'lama_huni';
    public $fillable = ['id_lama_huni', 'lama_huni', 'bulan'];
    public $incrementing = false;
}
