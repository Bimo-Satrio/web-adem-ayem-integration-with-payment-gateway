<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQModel extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'faq';
    protected $fillable = ['id_faq', 'judul_faq', 'deskripsi_faq'];
    protected $primaryKey = 'id_faq';
    public $incrementing = false;
}
