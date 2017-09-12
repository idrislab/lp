<?php

namespace LandingPages\Http\Controllers\Manager;

use LandingPages\Http\Controllers\Controller;
use LandingPages\Http\Requests\ClientRequest;
use LandingPages\Role;
use LandingPages\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.manager.clients.index', ['clients' => User::clients()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manager.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ClientRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $roleClient = Role::where('name', 'client')->first();

        $client = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $client->roles()->attach($roleClient);

        return redirect()->route('manager.clients');
    }

    /**
     * Display the specified resource.
     *
     * @param  \LandingPages\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \LandingPages\User $client
     * @return \Illuminate\Http\Response
     */
    public function edit(User $client)
    {
        return view('admin.manager.clients.edit', [ 'client' => $client ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ClientRequest|Request $request
     * @param User $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, User $client)
    {
        $client->name = $request->name;
        $client->email = $request->email;
        $client->password = bcrypt($request->password);
        $client->updated_at = Carbon::now();
        $client->save();

        return redirect()->route('manager.clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $client)
    {
        $name = $client->name;
        $client->delete();

        return response()->json( [ 'success' => 'O cliente '. $name .' foi apagado.' ] );
    }
}
