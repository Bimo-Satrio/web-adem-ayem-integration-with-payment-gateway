<?php

namespace App\Models;


use App\Models\PengajuanSewa;
use Illuminate\Database\Eloquent\Model;
use function PHPUnit\Framework\returnValueMap;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class penghuni extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'penghuni';
    protected $primaryKey = 'id_penghuni';
    public $incrementing = false;
    protected $fillable = [
        'id_penghuni', 'id_pengajuan_sewa', 'jatuh_tempo_tagihan', 'tagihan_lama_huni', 'status_tagihan'
    ];


    public function pengajuansewa()
    {
        return $this->belongsTo(PengajuanSewa::class, 'id_pengajuan_sewa', 'id_pengajuan_sewa');
    }
}
