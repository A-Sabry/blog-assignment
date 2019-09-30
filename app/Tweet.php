<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text', 'user_id'
    ];

    /**
     * Get tweets owner.
     */
    public function user() {
        return $this->belongsTo('App\User');
    }
}
