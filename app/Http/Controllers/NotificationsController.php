<?php

namespace LandingPages\Http\Controllers;

class NotificationsController extends Controller
{
    public function markAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
    }
}
