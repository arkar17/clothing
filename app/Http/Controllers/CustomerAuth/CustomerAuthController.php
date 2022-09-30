<?php

namespace App\Http\Controllers\CustomerAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerAuthController extends Controller
{
    public function register(CustomerRegisterRequest $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->division = $request->division;
        $user->password = Hash::make($request->password);
        $user->save();
    }

    public function login(CustomerLoginRequest $request) {
        $phone = $request->input('phone');
        $password = $request->input('password');

        $user = User::where('phone', $phone)->first();
        if($user) {
           $checkedPassword = Hash::check($password, $user->password);
           if($checkedPassword) {
               Auth::login($user);
            //    return redirect()->route('admin-home')->with('success', 'Welcome Back Sir!');
           }else{
            //    return redirect()->back()->with('error', 'Incorrect password!');
           }
        }else {
            // return redirect()->back()->with('error', 'Incorrect Phone number!');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('customer-home');
    }
}
