<?php

namespace App\Models;

use App\Traits\HelperTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory, SoftDeletes , HelperTrait;

    protected $fillable = ['title', 'description'];
    protected $appends = ['created_time', 'updated_time' , 'delete_time'];
    protected $hidden = ['created_at', 'updated_at', 'delete_at'];


    /****************************************************/
    /******************* RELATIONSHIPS ******************/
    /****************************************************/

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function files(){
        return $this->morphMany(File::class, 'fileable');
    }

    /****************************************************/
    /******************* END RELATIONSHIPS **************/
    /****************************************************/
}
