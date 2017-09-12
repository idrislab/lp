<?php

namespace LandingPages;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
        return $this
            ->belongsToMany('LandingPages\User')
            ->withTimestamps();
    }
}
