<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        $profile = DB::table('users')
            ->select(
                'email', 
                'username', 
                'users.name', 
                DB::raw('roles.name as role'))
            ->from('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->where('model_has_roles.model_type', 'App\\User')
            ->where('users.id', $user->id)
            ->get()
            ->first();

        return view('profile.user', compact('profile'));
    }

    public function edit()
    {
        $user = Auth::user();

        $profile = DB::table('users')
            ->select(
                'email',
                'username',
                'users.name',
                DB::raw('roles.name as role')
            )
            ->from('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->where('model_has_roles.model_type', 'App\\User')
            ->where('users.id', $user->id)
            ->get()
            ->first();

        return view('profile.edit', compact('user', 'profile'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('profile.show');
    }

    public function password()
    {
        return view('profile.password');
    }

    public function savepass(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'new_password_confirm' => 'required|same:new_password'
        ]);

        $user = Auth::user();

        if(Hash::check($request->input('old_password'), $user->password))
        {
            $user->password = bcrypt($request->input('new_password'));
            $user->save();
        }else{
            session()->flash('error', 'Password lama Anda salah');
        }

        return redirect()->route('password.edit');
    }

}
