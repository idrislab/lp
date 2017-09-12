<?php

namespace LandingPages\Http\Controllers;

use LandingPages\Http\Requests\LandingPageFormRequest;
use LandingPages\LandingPage;
use LandingPages\Notifications\Subscribed;
use LandingPages\Notifications\Subscription;
use LandingPages\Subscriber;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Fields to be ignored from request
     *
     * @var array
     */
    protected $ignoreFields = [
        '_token',
        'field_description',
        'g-recaptcha-response',
        'redirect_success',
    ];

    /**
     * Store a newly created resource in storage.
     *
     * @param LandingPageFormRequest|Request $request
     * @param LandingPage $landingPage
     * @return \Illuminate\Http\Response
     */
    public function store(LandingPageFormRequest $request, LandingPage $landingPage)
    {
        $input = collect($request->all())->reject(function ($value, $field) {
            return in_array($field, $this->ignoreFields);
        });

        $form = [];

        foreach ($input as $field => $value) {
            if (isset($request->input('field_description')[$field])) {
                $description = $request->input('field_description')[$field];
            } else {
                $description = $field;
            }

            $form[$field] = [
                'description' => $description,
                'value' => $value,
            ];
        }

        $subscriber = Subscriber::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'landing_page_id' => $landingPage->id,
            'form' => json_encode($form),
        ]);

        $pathName = $landingPage->client->id . DIRECTORY_SEPARATOR . $landingPage->id;
        request()->session()->flash('pathName', $pathName);

        $landingPage->client->notify(new Subscription($subscriber, $landingPage));
        $subscriber->notify(new Subscribed($landingPage, $subscriber));

        if($request->has('redirect_success')) {
            return redirect($request->input('redirect_success'))->withInput();
        }

        return $this->renderView($landingPage, $subscriber);
    }

    /**
     * Display the specified resource.
     *
     * @param  \LandingPages\LandingPage $landingPage
     * @return \Illuminate\Http\Response
     */
    public function show(LandingPage $landingPage)
    {
        return $this->renderView($landingPage);
    }

    /**
     * @param LandingPage $landingPage
     * @param Subscriber|null $subscriber
     * @return mixed
     */
    private function renderView(LandingPage $landingPage, Subscriber $subscriber = null)
    {
        $viewName = 'pages.' . $landingPage->client->id . '.' . $landingPage->id . '.page';
        $pathName = $landingPage->client->id . DIRECTORY_SEPARATOR . $landingPage->id;
        request()->session()->flash('pathName', $pathName);

        return view($viewName, ['landingPage' => $landingPage, 'subscriber' => $subscriber]);
    }
}
