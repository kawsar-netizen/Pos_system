<?php

namespace App\Models;

use App\Models\SaleItem;
use App\Models\Purchese_item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id','title','descrition','cost_price','price','unit','has_stock'
    ];

    public function category(){
        return $this->belongsTo(Category::class);

    }

    public function items(){
        return $this->hasMany(SaleItem::class);
    }

    public function purchaseItems(){
        return $this->hasMany(Purchese_item::class);
    }
    public function saleItems(){
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
