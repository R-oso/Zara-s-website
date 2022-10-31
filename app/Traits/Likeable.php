<?php

namespace App\Traits;

use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

trait Likeable
{

    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select project_id, sum(liked) likes, sum(!liked) dislikes from likes group by project_id',
            'likes',
            'likes.project_id',
            'project_id'
        );

    }

    public function Likes() {

        return $this->hasMany(Like::class, 'project_id');
    }

    public function like($user = null)
    {
        $this->likes()->updateOrCreate(
            [
                'user_id' => $user ? $user->id : auth()->id(),
            ],
            [
                'liked' => true
            ]
        );
    }

    public function dislike($user = null)
    {
        $this->likes()->updateOrCreate(
            [
                'user_id' => $user ? $user->id : auth()->id(),
            ],
            [
                'liked' => false
            ]
        );
    }

    public function isLikedBy(User $user): bool
    {
        return (bool)$user->likes
            ->where('project_id', $this->id)
            ->where('liked', true)
            ->count();
    }

    public function isDislikedBy(User $user): bool
    {
        return (bool)
        $user->likes
            ->where('project_id', $this->id)
            ->where('liked', false)
            ->count();
    }

//    public function likes()
//    {
//        return $this->hasMany('App\Models\Like', 'project_id');
//    }

}

