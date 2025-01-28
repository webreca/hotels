<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        return view('guest.dashboard.index', compact('user'));
    }

    public function profile(Request $request){

        $user_id        = Auth::user()->id;

        $user           = User::find($user_id);
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->save();

        $notify[]       = ['success', 'Profile updated successfully!'];

        return redirect()->back()->withNotify($notify);
    }
}
