<?php

namespace LandingPages;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Subscriber extends Model
{
    use Notifiable;

    const UPDATED_AT = null;

    protected $fillable = [
        'name',
        'email',
        'landing_page_id',
        'form',
    ];

    /**
     * Get subscribed landing page
     */
    public function landingPage()
    {
        return $this->belongsTo('LandingPages\LandingPage');
    }
}
