<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    use HasFactory;

    protected $fillable =['modal', 'display', 'processor', 'graphic', 'storage', 'camera', 'battery', 'os', 'product_id'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
