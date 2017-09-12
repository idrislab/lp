<?php

namespace LandingPages\Http\Controllers\Manager;

use LandingPages\Http\Controllers\Controller;
use LandingPages\Http\Requests\LandingPageRequest;
use LandingPages\LandingPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LandingPageController extends Controller
{
    /**
     * Fonts MimeTypes
     * @var array
     */
    protected $fonts = [
        'application/vnd.ms-fontobject',
        'application/octet-stream',
        'application/vnd.ms-opentype',
        'application/x-font-ttf',
        'application/font-woff2',
        'application/font-sfnt',
        'application/x-font-truetype',
        'image/svg+xml'
    ];

    /**
     * Generate slug for given string
     *
     * @param Request $request
     * @return array
     */
    public function slugify(Request $request)
    {
        return ['slug' => str_slug($request->input('slug'))];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.manager.landingpages.index', ['landingPages' => LandingPage::list()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manager.landingpages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LandingPageRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LandingPageRequest $request)
    {
        $landingPage = new LandingPage();
        $landingPage->user_id = $request->client;
        $landingPage->name = $request->name;
        $landingPage->email = $request->email;
        $landingPage->domain = $request->domain;
        $landingPage->slug = $request->has('slug') ? str_slug($request->name) : 'index';
        $landingPage->save();

        $path = $landingPage->client->id . DIRECTORY_SEPARATOR . $landingPage->id . DIRECTORY_SEPARATOR;
        $imgPath = $path . 'img' . DIRECTORY_SEPARATOR;
        $fontsPath = $path . 'fonts' . DIRECTORY_SEPARATOR;
        $htmlFile = $path . 'page.blade.php';
        $emailFile = $path . 'email.blade.php';
        $cssFile = $path . 'css' . DIRECTORY_SEPARATOR . 'style.css';
        $jsFile = $path . 'js' . DIRECTORY_SEPARATOR . 'script.js';

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                if (in_array($file->getMimeType(), $this->fonts)) {
                    $file->storeAs($fontsPath, $file->getClientOriginalName(), 'assets');
                } elseif (substr($file->getMimeType(), 0, 5) == 'image') {
                    $file->storeAs($imgPath, $file->getClientOriginalName(), 'assets');
                }
            }
        }

        Storage::disk('assets')->put($cssFile, $request->input('css-editor'));
        Storage::disk('assets')->put($jsFile, $request->input('javascript-editor'));
        Storage::disk('pages')->put($htmlFile, $request->input('html-editor'));
        Storage::disk('pages')->put($emailFile, $request->input('email-editor'));

        return response()->json(['success' => 'Landing Page criada com sucesso']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \LandingPages\LandingPage $landingPage
     * @return \Illuminate\Http\Response
     */
    public function show(LandingPage $landingPage)
    {
        $viewName = 'pages.' . $landingPage->client->id . '.' . $landingPage->id . '.page';
        $pathName = $landingPage->client->id . DIRECTORY_SEPARATOR . $landingPage->id;

        return view($viewName, ['title' => $landingPage->title, 'pathName' => $pathName]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \LandingPages\LandingPage $landingPage
     * @return \Illuminate\Http\Response
     */
    public function edit(LandingPage $landingPage)
    {
        return view('admin.manager.landingpages.edit', ['landingPage' => $landingPage]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LandingPageRequest|Request $request
     * @param  \LandingPages\LandingPage $landingPage
     * @return \Illuminate\Http\Response
     */
    public function update(LandingPageRequest $request, LandingPage $landingPage)
    {
        $landingPage->name = $request->name;
        $landingPage->email = $request->email;
        $landingPage->domain = $request->domain;
        $landingPage->slug = $request->has('slug') ? str_slug($request->name) : 'index';

        $path = $landingPage->client->id . DIRECTORY_SEPARATOR . $landingPage->id . DIRECTORY_SEPARATOR;
        $imgPath = $path . 'img' . DIRECTORY_SEPARATOR;
        $fontsPath = $path . 'fonts' . DIRECTORY_SEPARATOR;
        $htmlFile = $path . 'page.blade.php';
        $emailFile = $path . 'email.blade.php';
        $cssFile = $path . 'css' . DIRECTORY_SEPARATOR . 'style.css';
        $jsFile = $path . 'js' . DIRECTORY_SEPARATOR . 'script.js';

        if ($request->has('removedFiles')) {
            foreach ($request->removedFiles as $removedFile) {
                if (Storage::disk('assets')->exists($imgPath . $removedFile)) {
                    Storage::disk('assets')->delete($imgPath . $removedFile);
                } elseif (Storage::disk('assets')->exists($fontsPath . $removedFile)) {
                    Storage::disk('assets')->delete($fontsPath . $removedFile);
                }
            }
        }

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                if (in_array($file->getMimeType(), $this->fonts)) {
                    $file->storeAs($fontsPath, $file->getClientOriginalName(), 'assets');
                } elseif
                (substr($file->getMimeType(), 0, 5) == 'image') {
                    $file->storeAs($imgPath, $file->getClientOriginalName(), 'assets');
                }
            }
        }

        Storage::disk('assets')->put($cssFile, $request->input('css-editor'));
        Storage::disk('assets')->put($jsFile, $request->input('javascript-editor'));
        Storage::disk('pages')->put($htmlFile, $request->input('html-editor'));
        Storage::disk('pages')->put($emailFile, $request->input('email-editor'));

        $landingPage->save();

        return response()->json(['success' => 'Alterações efetuadas com sucesso']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \LandingPages\LandingPage $landingPage
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(
        LandingPage $landingPage
    ) {
        $path = $landingPage->client->id . DIRECTORY_SEPARATOR . $landingPage->id . DIRECTORY_SEPARATOR;

        Storage::disk('pages')->deleteDirectory($path);
        Storage::disk('assets')->deleteDirectory($path);

        $name = $landingPage->name;

        $landingPage->delete();

        return response()->json(['success' => 'A Landing Page ' . $name . ' foi apagada.']);
    }
}
