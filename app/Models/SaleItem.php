<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id','sale_invioce_id','quantiry','price','total',
    ];
    public function invoice(){
        
        return $this->belongsTo(SaleInvioce::class);
    }
    public function product(){

        return $this->belongsTo(Product::class);
    }
}
