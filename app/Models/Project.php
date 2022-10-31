<?php

namespace App\Models;

use App\Traits\Likeable;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\This;

class Project extends Model
{
    use HasFactory;
    // Important! all code about likes
     use Likeable;

    /**
     * @var mixed
     */
//    protected $image;

//    public function scopeWithFavorites(Builder $query)
//    {
//        $query->leftJoinSub(
//            'select project_id, sum(liked) likes, from favorites group by project_id',
//            'favorites',
//            'favorites.project_id',
//            'projects_id'
//        );
//    }

    public function isFavoritedBy(User $user): bool
    {
        return (bool)$user->favorites()
            ->where('project_id', $this->id)
            ->where('liked', true)
            ->count();
    }

    public function practice() {
        return $this->belongsTo('App\Models\Practice', 'practice_id');
    }

    public function favorites() {
        return $this->hasMany('App\Models\Favorite', 'project_id');
    }

}
