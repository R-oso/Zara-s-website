<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class Project extends Model
{
    use HasFactory;

    /**
     * @var mixed
     */
    protected $image;

    public function like() {
        $this->likes()->updateOrCreate(
            [
                'user_id'=> 1
            ],
            [
                'liked' => true
            ]
        );
    }

    public function dislike() {
        $this->likes()->updateOrCreate(
            [
                'user_id'=> auth()->id()
            ],
            [
                'liked' => false
            ]
        );
    }

    public function isLikedBy(User $user) {
        return (bool)
        $user->likes->where('project_id', $this->id)->where('liked', true)->count();
    }

    public function likes() {
        return $this->hasMany('App\Models\Like', 'project_id');
    }
}
