<?php

namespace LandingPages\Http\Controllers\Client;

use LandingPages\Http\Controllers\Controller;
use LandingPages\Http\Requests\LandingPageRequest;
use LandingPages\LandingPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.client.landingpages.index', [ 'landingPages' => auth()->user()->landingPages ]);
    }

    /**
     * @param LandingPage $landingPage
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function subscribers(LandingPage $landingPage)
    {
        return view('admin.client.landingpages.subscribers', [ 'subscribers' => $landingPage->subscribers()->orderBy('created_at', 'desc')->get(), 'landingPage' => $landingPage ]);
    }
}
