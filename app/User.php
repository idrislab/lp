<?php

namespace LandingPages;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the client landing pages
     */
    public function landingPages()
    {
        return $this->hasMany('LandingPages\LandingPage');
    }

    /**
     * Get user roles
     */
    public function roles()
    {
        return $this
            ->belongsToMany('LandingPages\Role')
            ->withTimestamps();
    }

    /**
     * Get all clients
     */
    public static function clients()
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', 'client');
        })->with('landingpages')->get();
    }

    /**
     * Get all managers
     */
    public static function managers()
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', 'manager');
        })->get();
    }

    /**
     * Authorize certain roles
     *
     * @param $roles
     * @return bool
     */
    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'Não tem permissão.');
    }

    /**
     * Check if user has any of given roles
     *
     * @param array $roles
     * @return bool
     */
    public function hasAnyRole(array $roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Check if user has role
     *
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function isManager()
    {
        return $this->hasRole('manager');
    }

    /**
     * @return bool
     */
    public function isClient()
    {
        return $this->hasRole('client');
    }
}
