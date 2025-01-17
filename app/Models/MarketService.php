<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class MarketService extends Model
{
    use HasFactory;
        
    protected $fillable = [
        'mail_contact',
        'message'
    ];
}
