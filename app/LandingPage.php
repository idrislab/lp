<?php

namespace LandingPages;

use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{

    /**
     * Get client that owns landing page
     */
    public static function list()
    {
        return self::all();
    }

    /**
     * Get client that owns landing page
     */
    public function client()
    {
        return $this->belongsTo('LandingPages\User', 'user_id', 'id');
    }

    /**
     * Get landing page subscribers
     */
    public function subscribers()
    {
        return $this->hasMany('LandingPages\Subscriber');
    }
}
