<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



        public function statuses()
        {
            return $this->hasMany('App\Status', 'user_id');
        }

        public function likes()
        {
          return $this->hasMany('App\Like', 'user_id');
        }

        public function hasLikedStatus(Status $status)
        {
            return (bool) $status->likes
                ->where('likeable_id', $status->id)
                ->where('likeable_type', get_class($status))
                ->where('user_id', $this->id)
                ->count();
        }



}
