<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class WizardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function renew(){
        $plans = Plan::where('active', "Yes")->get();
        return view('customer.wizard.renew', compact('plans'));
    }
}
