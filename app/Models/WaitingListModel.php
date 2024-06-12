<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaitingListModel extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id_waiting_list';
    protected $table = 'waiting_list';

    protected $fillable = [
        'id_waiting_list',
        'id_user',
        'id_kontrakan',
        'tanggal_pengajuan',
        'status_waiting_list'
    ];

    public $incementing = false;


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function kontrakan()
    {
        return $this->belongsTo(Kontrakan::class, 'id_kontrakan', 'id_kontrakan');
    }
}
