<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = ['product_id' , 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
