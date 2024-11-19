<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use App\Models\Sounds_list;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sounds extends Model
{
    use HasFactory, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
		'cnt',
		'is_yekbun',
		'is_yahala',
		'is_facebook',
		'is_tiktok',
		'is_insta',
		'is_twitter',
        //'parent_id',
        //'image',
        //'target',
        'status'
    ];


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function soundsLists()
    {
        return $this->hasMany(Sounds_list::class, 'category');
    }

    
   

    
}
