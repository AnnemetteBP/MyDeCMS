<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('manage.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @throws
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
        ]);
        $password = Hash::make(str_random(8));
        if($request->has('password') && !empty($request->input('password')))
        {
            $password = Hash::make($request->input('password'));
        }
        /** @var User $user */
        $user = new User([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $password,
        ]);
        if($user->save())
        {
            return redirect()->route('users.show', $user->id);
        }
        $request->session()->flash('error', 'Sorry but a problem occured while trying to create the user.');
        return view('manage.users.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('manage.users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('manage.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @throws
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);
        /** @var User $user */
        $user = User::findOrFail($id);
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);
        if($request->has('password_options') && !empty($request->input('password_options')))
        {
            if($request->input('password_options') !== 'keep')
            {
                if($request->input('password_options') === 'manual' && $request->has('password') && !empty($request->input('password')))
                {
                    $user->update([
                        'password' => Hash::make($request->input('password')),
                    ]);
                }
                else if ($request->input('password_options') === 'auto')
                {
                    $user->update([
                        'password' => Hash::make(str_random(8)),
                    ]);
                }
            }
        }
        if($user->save())
        {
            return redirect()->route('users.show', $id);
        }
        $request->session()->flash('error', 'Sorry but a problem occured while trying to updating the user.');
        return view('manage.users.update', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return route('users.index');
    }
}
