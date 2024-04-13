<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $validate = $request->validated();

        $user = User::create($validate);
        $user->assignRole($validate['role']);

        return redirect()->route('users.index')->with('status', 'Se ha creado el registro correctamente!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(UpdateUserRequest $request, User $user)
    {
        $request->validated();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->area = $request->area;

        if (isset($request->password)){
            $user->password = $request->password;
        }

        $user->update();
        if ($user->hasRole('Admin') && $user->role == 'Docente') {
            $user->removeRole('Admin');
            $user->assignRole('Docente');
        } elseif ($user->hasRole('Docente') && $user->role == 'Admin') {
            $user->removeRole('Docente');
            $user->assignRole('Admin');
        }
        return redirect()->route('users.index')->with('status', 'Se ha actualizado el registro correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('eliminar', 'ok');
    }
}
