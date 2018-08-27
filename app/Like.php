<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
      protected $table = 'likeable';


      public function likeable(  ) {
      	return $this->morphTo();
      }


      // get user of a like (normal relationship)
      // this means the local 'user_id' field is the key (id) to the foreign table 'User'
      public function user()
      {
      	return $this->belongsTo('App\User', 'user_id');
      }

}
