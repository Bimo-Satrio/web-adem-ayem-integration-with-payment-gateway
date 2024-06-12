<?php

namespace App\Models;

use App\Models\Payment;
use App\Models\Lama_huni;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kontrakan extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'kontrakan';
    protected $primaryKey = 'id_kontrakan';
    protected $fillable = ['id_kontrakan', 'kontrakan', 'deskripsi', 'lokasi', 'harga', 'status_huni', 'status_ketersediaan', 'longitude', 'latitude'];
    public $incrementing = false;



    public function foto_kontrakan()
    {
        return $this->hasMany(FotoKontrakan::class, 'id_kontrakan', 'id_kontrakan');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
