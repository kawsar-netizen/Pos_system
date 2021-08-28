<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id','title','descrition','cost_price','price','unit',
    ];

    public function category(){
        return $this->belongsTo(Category::class);

    }

}
