<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;

    protected $table = 'practices';

    public function practices() {
        return $this->hasMany('App\Models\Practice', 'project_id');
    }
}
