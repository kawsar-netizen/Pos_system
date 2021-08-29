<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = ['group_id','name', 'phone', 'email', 'address'];

    public function group()
    {
    	return $this->belongsTo(Group::class);
    }

    Public function sales(){
        return $this->hasMany(SaleInvioce::class);
    }

    public function purchases(){
        return $this->hasMany(Purchese_invoice::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public function receipts(){
        return $this->hasMany(Receipt::class);
    }
}
