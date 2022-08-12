<?php

namespace App\Models;

use App\Traits\HelperTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class File extends Model
{
    use HasFactory, SoftDeletes, HelperTrait;

    protected $fillable = ['name', 'fileable_id', 'fileable_type'];

    protected $appends = ['file_path'];
    // protected $hidden = ['name' , 'created_at', 'updated_at', 'delete_at'];

    /****************************************************/
    /******************* RELATIONSHIPS ******************/
    /****************************************************/

    public function fileable()
    {
        return $this->morphTo();
    }

    /****************************************************/
    /******************* END RELATIONSHIPS **************/
    /****************************************************/


    protected function filePath(): Attribute
    {
        return Attribute::make(
            get: function () {
                $file = '/files/' . $this->id . '/' . $this->name;

                if (str_contains($this->fileable_type, 'Project'))
                    return config('app.url') . '/storage/projects/' . $this->fileable_id . $file;

                elseif (str_contains($this->fileable_type, 'Task'))
                    return config('app.url') . '/storage/tasks/' . $this->fileable_id . $file;

                elseif (str_contains($this->fileable_type, 'Employee'))
                    return config('app.url') . '/storage/employee/' . $this->fileable_id . $file;

                else return null;
            },
        );
    }
}
