<?php

namespace App\Models;

use App\Traits\Likeable;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class Project extends Model
{
    use HasFactory;
    use Likeable;

    /**
     * @var mixed
     */
    protected $image;


    public function practice() {

        return $this->belongsTo('App\Practice', 'practice_id');
    }
}
