<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'product_name', 'quantity', 'user_id', 'stock', 'photo', 'description', 'price'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function spec()
    {
        return $this->hasOne('App\Models\spec');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
