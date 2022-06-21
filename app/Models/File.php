<?php

namespace App\Models;

use App\Traits\HelperTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class File extends Model
{
    use HasFactory, SoftDeletes , HelperTrait;

    protected $fillable = ['name' , 'fileable_id' , 'fileable_type'];

    protected $appends = ['created_time', 'updated_time' , 'delete_time'];
    protected $hidden = ['created_at', 'updated_at', 'delete_at'];

    /****************************************************/
    /******************* RELATIONSHIPS ******************/
    /****************************************************/

    public function fileable(){
        return $this->morphTo();
    }

    /****************************************************/
    /******************* END RELATIONSHIPS **************/
    /****************************************************/
}
