<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

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

    public function like()
    {
        $this->likes()->updateOrCreate(
            [
                'user_id' => 1
            ],
            [
                'liked' => true
            ]
        );
    }

    public function dislike()
    {
        $this->likes()->updateOrCreate(
            [
                'user_id' => auth()->id()
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

    public function likes()
    {
        return $this->hasMany('App\Models\Like', 'project_id');
    }

}

