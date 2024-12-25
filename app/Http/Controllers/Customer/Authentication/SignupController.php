<?php

namespace App\Http\Controllers\Customer\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\Authentication\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class SignupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function signup()
    {
        $user = Auth::user();
        return view("customer.authentication.signup", compact('user'));
    }

    /*************  ✨ Codeium Command ⭐  *************/
    /******  d4d2a3f8-f759-4c58-8a4e-1f3cf4f3c35d  *******/
    public function register(SignupRequest $request)
    {
        $user_id        = Auth::user()->id;
        $user           = User::find($user_id);
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $notify[]       = ['success', 'Onboarding completed successfully!'];

        Log::debug('A new user signed up. {user}', ['user' => $user]);

        return redirect()->route('index')->withNotify($notify);
    }
}
