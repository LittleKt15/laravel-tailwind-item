<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'status'];

    public function items()
    {
        return $this->hasMany('App\Models\Item', 'category_id');
    }
}
