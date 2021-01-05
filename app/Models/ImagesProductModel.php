<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagesProductModel extends Model
{
    use HasFactory;

    protected $table = 'product_images';
    public $timestamps = true;
    public $primaryKey='id_image';
    protected $guarded = [];

}
