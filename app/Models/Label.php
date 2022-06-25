<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'color',  'labelable_id', 'labelable_type'];




    /****************************************************/
    /******************* RELATIONSHIPS ******************/
    /****************************************************/

    public function labelable()
    {
        return $this->morphTo();
    }

    /****************************************************/
    /******************* END RELATIONSHIPS **************/
    /****************************************************/
}
