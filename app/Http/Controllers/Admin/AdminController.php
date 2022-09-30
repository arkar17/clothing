<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.home', compact('users'));
    }

    public function profile() {
        return view('admin.profile.profile');
    }

    public function editProfile() {
        $user = auth()->user();
        return view('admin.profile.edit', compact('user'));
    }

    public function updateProfile(UpdateProfileRequest $request, $id) {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        $image_name = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = uniqid(). '-' . $file->getClientOriginalName();
            $file->move(public_path() . '/images/', $image_name);
        }

        $user->image = $image_name;
        $user->password = $request->password ?? $user->password ;

        $user->update();

        return redirect()->route('admin-profile')->with('success', 'Admin Profile is updated successfully!');
    }

}
