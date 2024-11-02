<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::with('pretplate')->get());
    }

    public function show($id)
    {
        $user = User::with('pretplate')->findOrFail($id);
        return new UserResource($user);
    }

    
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'username' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'sometimes|string|min:8|confirmed',
            'role' => 'sometimes|required|string|in:administrator,pretplatnik,gledalac',
        ]);

        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->update($request->all());
        return new UserResource($user);
    }

   

    public function getPretplate($id)
    {
        $user = User::findOrFail($id);
        return $user->pretplate()->with('pretplata')->get();
    }
}
