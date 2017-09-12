<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'web'])->group(function () {

    Route::prefix('client')->name('client.')->middleware('role:client')->group(function () {
        $this->get('/', 'Client\DashboardController@index')->name('dashboard');

        $this->get('landing-pages', 'Client\LandingPageController@index')->name('landingPages');
        $this->get('landing-pages/{landingPage}/subscribers',
            'Client\LandingPageController@subscribers')->name('subscribers');
    });

    Route::prefix('admin')->name('manager.')->middleware('role:manager')->group(function () {
        $this->get('/', 'Manager\DashboardController@index')->name('dashboard');

        /**
         * Clients
         */
        $this->get('clients', 'Manager\ClientController@index')->name('clients');

        $this->get('clients/create', 'Manager\ClientController@create')->name('clients.create');
        $this->post('clients/store', 'Manager\ClientController@store')->name('clients.store');

        $this->get('clients/{client}', 'Manager\ClientController@edit')->name('clients.edit');
        $this->post('clients/{client}', 'Manager\ClientController@update')->name('clients.update');

        $this->delete('clients/{client}', 'Manager\ClientController@destroy')->name('clients.destroy');

        /**
         * Landing Pages
         */
        $this->get('landing-pages', 'Manager\LandingPageController@index')->name('landingPages');

        $this->get('landing-pages/create', 'Manager\LandingPageController@create')->name('landingPages.create');
        $this->post('landing-pages/store', 'Manager\LandingPageController@store')->name('landingPages.store');

        $this->get('landing-pages/{landingPage}', 'Manager\LandingPageController@edit')->name('landingPages.edit');
        $this->post('landing-pages/{landingPage}',
            'Manager\LandingPageController@update')->name('landingPages.update');

        $this->delete('landing-pages/{landingPage}',
            'Manager\LandingPageController@destroy')->name('landingPages.destroy');

        $this->get('/slugify', 'Manager\LandingPageController@slugify')->name('slugify');
    });

    $this->post('/logout', 'Auth\LoginController@logout')->name('logout');
    $this->post('notifications/markAsRead', 'NotificationsController@markAsRead')->name('notifications.marksRead');
});

$this->get('/login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('/login', 'Auth\LoginController@login');
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

Route::match(['get', 'post'], '{slug?}', function ($slug = 'index') {
    $domain = request()->server->get('HTTP_HOST');

    $domain = \LandingPages\LandingPage::where('domain', $domain);

    if (!$domain->exists()) {
        abort(404);
    }

    $landingPage = $domain->where('slug', $slug);

    if (!$landingPage->exists()) {
        abort(404);
    }

    $controller = app(\LandingPages\Http\Controllers\LandingPageController::class);

    if (request()->isMethod('post')) {
        return $controller->callAction('store', [app(\LandingPages\Http\Requests\LandingPageFormRequest::class), $landingPage->first()]);
    }

    return $controller->callAction('show', [$landingPage->first()]);
})->where('slug', '[a-z0-9-]+');
