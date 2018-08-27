<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
  // define the table name
    protected $table = 'statuses';


    // which fields can be updated?
    protected $fillable = [
    	'body', 'parent_id'
    ];


    // define the relationship with the user table
    // by joining this table's 'user_id' field with the user-table's 'id' field
    public function user()
    {
      return $this->belongsTo('App\User', 'user_id');
    }


    // create a scope that limits the results to 'status updates'
    // (A scope allows us to use the Query Builder to filter out anything we do not want in the result)
    public function scopeNotReply( $query ) {
    	return $query->whereNull('parent_id');
    }


    // create a relationship between statuses (parent_id = NULL) and replies, using the parent_id as foreign key
    public function replies()
    {
        return $this->hasMany('App\Status', 'parent_id');
    }


    public function likes()
    {
        return $this->morphMany('App\Like', 'likeable');
    }


}
