<?php

namespace App\Models;

use App\Models\penghuni;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tagihan_penghuni extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'tagihan_penghuni';
    protected $primaryKey = 'id_tagihan_penghuni';
    protected $fillable = ['id_tagihan_penghuni', 'id_penghuni', 'id_user', 'status_pembayaran_tagihan'];
    public $inrementing = false;


    public function penghuni()
    {
        return $this->belongsTo(penghuni::class, 'id_penghuni', 'id_penghuni');
    }
}
