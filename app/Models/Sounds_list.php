<?php

namespace App\Models;

use App\Models\Sounds;
use Spatie\Activitylog\LogOptions;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sounds_list extends Model
{
    use HasFactory, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category',
		'cnt',
		//'is_yekbun',
		//'is_yahala',
		//'is_facebook',
		///'is_tiktok',
		//'is_insta',
		//'is_twitter',
        //'parent_id',
        'file',
        //'target',
        'status'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function sound()
    {
        return $this->belongsTo(Sounds::class, 'category');
    }

    
}
