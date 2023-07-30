<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['item_name', 'category_id', 'price', 'description', 'item_condition', 'item_type', 'status', 'image', 'owner_name', 'phone', 'address', 'latitude', 'longitude'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function itemImages()
    {
        return $this->hasMany('App\Models\ItemImage', 'item_id');
    }
}
