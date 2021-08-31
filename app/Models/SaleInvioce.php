<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleInvioce extends Model
{
    use HasFactory;
    protected $fillable = [
        'date','note','challan_no','user_id','admin_id',
    ];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function items(){
        return $this->hasMany(SaleItem::class);
    }
}
