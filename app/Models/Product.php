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

    public function items(){
        return $this->hasMany(SaleItem::class);
    }

    public static function arrayForSelect(){
        $arr = [];
        $prodcuts = Product::all();
        foreach($prodcuts as $prodcut){
            $arr[$prodcut->id] = $prodcut->title;
        }
        return $arr;
    }

}
