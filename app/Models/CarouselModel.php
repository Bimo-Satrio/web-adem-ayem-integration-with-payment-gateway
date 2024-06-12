<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarouselModel extends Model
{
    use HasFactory;
    protected $table = 'carousel';
    protected $primaryKey = 'id_carousel';
    protected $fillable = ['foto_carousel'];
    public $timestamps = false;
}
