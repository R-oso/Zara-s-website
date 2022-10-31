<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $incrementing = true;
    public $table = "favorites";

    public function user() {
       return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function project() {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }
}
