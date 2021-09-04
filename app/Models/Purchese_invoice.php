<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchese_invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'date','challan_no','admin_id','user_id','note',
    ];
}
