<?php

namespace App\Models;

use App\Models\PengajuanSewa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Identitas extends Model
{

    use HasFactory;
    protected $table = 'identitas';
    protected $primaryKey = 'id_identitas';
    protected $fillable = ['id_identitas', 'id_pengajuan_sewa', 'foto_ktp', 'foto_dengan_ktp', 'foto_kk'];
    public $incrementing = false;
    public $timestamps = false;



    public function pengajuan_sewa()
    {
        return $this->belongsTo(PengajuanSewa::class, 'id_pengajuan_sewa', 'id_pengajuan_sewa');
    }
}
