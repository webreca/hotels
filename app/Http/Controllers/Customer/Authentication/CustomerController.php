<?php

namespace App\Http\Controllers\Customer\Authentication;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserOtp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    public function profile(Request $request)
    {

        $user_id        = Auth::user()->id;

        $user           = User::find($user_id);
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->save();

        $notify[]       = ['success', 'Profile updated successfully!'];

        return redirect()->back()->withNotify($notify);
    }

    public function password(Request $request)
    {
        $this->validate($request, [
            'current_password'      => 'required',
            'new_password'          => 'required|min:8|confirmed',

        ]);

        $user_id        = Auth::user()->id;

        $user           = User::find($user_id);
        $user->password = Hash::make($request->new_password);
        $user->save();

        $notify[]       = ['success', 'Password updated successfully!'];

        return redirect()->back()->withNotify($notify);
    }

    public function forgotPassword(Request $request)
    {
        $user_id                            = Auth::user()->id;
        $user                               = User::find($user_id);
        $otp                                = (int)($request->otp);
        $otp_exists                         = UserOtp::where("phone", $user->phone)->where("dialcode", $user->dialcode)->where("iso2", $user->iso2)->where("otp", $otp)->exists();
        if ($otp_exists) {
            $system_genereated_otp          = UserOtp::where("phone", $user->phone)->where("dialcode", $user->dialcode)->where("iso2", $user->iso2)->where("otp", $otp)->first();
            if ($system_genereated_otp->otp_expires_at < now()) {
                $notify[]                   = ['errors', 'OTP has been expired. Please resend the OTP!'];

                Log::debug('The OTP for Phone Number: {phone} which has been expired is {otp}.', ['otp' => $otp, 'phone' => $user->phone]);

                return redirect()->route('home')->withNotify($notify);
            } else {
                $system_genereated_otp->is_verified = true;
                $system_genereated_otp->save();
            }
            $user->password = Hash::make($request->new_password);
            $user->save();

            $notify[]       = ['success', 'Password updated successfully!'];

            return redirect()->back()->withNotify($notify);
        } else {
            $notify[]       = ['error', 'Please enter correct OTP!'];

            return redirect()->route('home', ['tab' => 'verify-otp'])->withNotify($notify);
        }
    }

    public function resendOTP(Request $request)
    {
        $otp                    = rand(1000, 9999);
        UserOtp::updateOrCreate([
            "phone"             => $request->phone,
            "dialcode"          => $request->dialcode,
            "iso2"              => $request->iso2
        ], [
            "otp"               => $otp,
            "otp_expires_at"    => now()->addSeconds(60),
            "is_verified"       => false
        ]);

        # Include Send OTP API here


        Log::debug('The OTP for Phone Number: {phone} is {otp}.', ['otp' => $otp, 'phone' => $request->phone]);
        return response()->json(['OTP has been resent successfully.'], 200);
    }
}
