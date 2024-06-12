<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fotokontrakan extends Model
{
    use HasFactory;
    protected $table = 'foto_kontrakan';
    protected $primaryKey = 'id_foto_kontrakan';
    protected $fillable = ['id_foto_kontrakan', 'id_konterakan', 'foto_kontrakan'];
    public $incementing = false;
    public $timestamps = false;
}
