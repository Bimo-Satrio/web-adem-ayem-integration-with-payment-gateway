<?php

namespace App\Models;


use App\Models\Identitas;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PengajuanSewa extends Model
{
    use HasFactory, HasUuids;
    protected $primaryKey = 'id_pengajuan_sewa';
    protected $table = 'pengajuan_sewa';
    public $incrementing = false;
    protected $fillable = [
        'id_pengajuan_sewa',
        'id_user',
        'nama_lengkap_user',
        'email_user',
        'no_telefon_user',
        'unit_kontrakan',
        'lokasi_unit_kontrakan',
        'harga_unit_kontrakan_total',
        'lama_huni_unit_kontrakan',
        'status_pengajuan_sewa',
        'status_identitas',
        'status_huni_unit_kontrakan',
        'tanggal_huni'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function identitas()
    {
        return $this->belongsTo(Identitas::class);
    }
}
