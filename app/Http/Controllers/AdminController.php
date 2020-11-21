<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{

    public function index()
    {
        Carbon::setLocale('nl');
        $tijd = Carbon::today();
        $posts = Post::count();
        $users = User::count();
        $replies = Reply::count();

        return view('admin.dashboard');

    }

    public function store(Request $request)
    {
        //
        $attributes = $request->validate([
            'name' => 'required|string|max:255',
            'contact'=>'required', 
            'email' => 'required|string|email|max:255|unique:users',
            'phonefield' => 'phone', 'phonefield_country' => 'required_with:phonefield', 'phonefield' => 'phone:custom_country_field', 'custom_country_field' => 'required_with:phonefield',
            'password' => 'required|string|min:8|confirmed',
            'birthdate' => 'date_format:Y-m-d|before:today',
            'avatar' => 'image',
        ]);

        if ($request->avatar) {
            $attributes['avatar'] = $request->avatar->store('admin_avatars');
        }

        $admin = Admin::create([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'password' => bcrypt($attributes['password']),
            'avatar' => $attributes['avatar'] ?? NULL
        ]);
        $admin->attachRole('admin');
        $admin->syncPermissions($attributes['permissions']);

        session()->flash('success', 'Admin Added Successfully');
        return redirect()->route('dashboard.admins.index');
    }

    public function update(Request $request, Admin $admin)
    {
        //
        if (!auth()->guard('admin')->user()->hasRole('super_admin') && $admin->hasRole('super_admin')) {
            abort('403');
        }

        $attributes = $request->validate([
            'name' => 'required|string|max:255',
            'contact'=>'required', 
            'email' => 'required|string|email|max:255|unique:users',
            'phonefield' => 'phone', 'phonefield_country' => 'required_with:phonefield', 'phonefield' => 'phone:custom_country_field', 'custom_country_field' => 'required_with:phonefield',
            'password' => 'required|string|min:8|confirmed',
            'birthdate' => 'date_format:Y-m-d|before:today',
            'avatar' => 'image',
        ]);

        if ($request->avatar) {
            $adminAvatar = $admin->getAttributes()['avatar'];
            if (isset($adminAvatar) && $adminAvatar) {
                Storage::delete($adminAvatar);
            }

            $attributes['avatar'] = $request->avatar->store('admin_avatars');
        }
        if ($request->password) {
            $attributes['password'] = bcrypt($attributes['password']);
        } else {
            unset($attributes['password']);
        }

        $admin->update($attributes);
        $admin->syncPermissions($attributes['permissions']);

        session()->flash('success', 'Admin Updated Successfully');
        return redirect()->route('dashboard.admins.index');
    }

}
