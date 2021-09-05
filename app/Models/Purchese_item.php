<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchese_item extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id','purchese_invoice_id','quantity','price','total',
    ];
    public function invoice(){
        
        return $this->belongsTo(Purchese_invoice::class);
    }
    public function product(){

        return $this->belongsTo(Product::class);
    }
}

