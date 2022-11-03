<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'front_title',
        'front_sub_title',
        'small_img',
        'title',
        'sub_title',
        'big_img',
        'description',
        'client',
        'category',
    ];
}
