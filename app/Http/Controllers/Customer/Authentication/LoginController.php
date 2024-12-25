<?php

namespace App\Http\Controllers\Customer\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\Authentication\SubmitOTPRequest;
use App\Http\Requests\Customer\Authentication\VerifyNumberRequest;
use App\Http\Requests\Customer\Authentication\LoginViaPasswordRequest;
use App\Models\User;
use App\Models\UserOtp;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function index()
    {
        return view('customer.authentication.login');
    }

    public function login(LoginViaPasswordRequest $request)
    {
        return $request->all();
    }

    public function verifyNumber(VerifyNumberRequest $request)
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


        $notify[]               = ['success', 'OTP has been sent sucessfully!'];
        Log::debug('The OTP for Phone Number: {phone} is {otp}.', ['otp' => $otp, 'phone' => $request->phone]);
        return redirect()->route('login.verify-otp', [
            "phone"             => $request->phone,
            "iso2"              => $request->iso2,
            "dialcode"          => $request->dialcode
        ])->withNotify($notify);
    }

    public function verifyOTP(Request $request)
    {
        $login_data = (object) [
            'phone'     => $request->phone,
            'iso2'      => $request->iso2,
            'dialcode'  => $request->dialcode
        ];

        return view('customer.authentication.verify-otp', compact('login_data'));
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

    public function submitOTP(SubmitOTPRequest $request)
    {
        $otp = (int)($request->otp_digit_1 . $request->otp_digit_2 . $request->otp_digit_3 . $request->otp_digit_4);

        $otp_exists                             = UserOtp::where("phone", $request->phone)->where("dialcode", $request->dialcode)->where("iso2", $request->iso2)->where("otp", $otp)->exists();

        if ($otp_exists) {
            try {
                $system_genereated_otp          = UserOtp::where("phone", $request->phone)->where("dialcode", $request->dialcode)->where("iso2", $request->iso2)->where("otp", $otp)->first();
                if ($system_genereated_otp->otp_expires_at < now()) {
                    $notify[]                   = ['errors', 'OTP has been expired. Please resend the OTP!'];

                    Log::debug('The OTP for Phone Number: {phone} which has been expired is {otp}.', ['otp' => $otp, 'phone' => $request->phone]);

                    return redirect()->back()->withNotify($notify);
                } else {
                    $system_genereated_otp->is_verified = true;
                    $system_genereated_otp->save();

                    $user_exists = User::where("phone", $request->phone)->where("dialcode", $request->dialcode)->where("iso2", $request->iso2)->exists();

                    if ($user_exists) {
                        $user    = User::where("phone", $request->phone)->where("dialcode", $request->dialcode)->where("iso2", $request->iso2)->first();
                        Auth::login($user);
                        $request->session()->regenerate();

                        $this->clearLoginAttempts($request);

                        if ($response = $this->authenticated($request, $this->guard()->user())) {
                            return $response;
                        }

                        $notify[]                   = ['success', 'Phone Number verified successfully!'];

                        Log::debug('The OTP for Phone Number: {phone} which has been verified is {otp}.', ['otp' => $otp, 'phone' => $request->phone]);

                        return $request->wantsJson()
                            ? new JsonResponse([], 204)
                            : redirect()->intended($this->redirectPath())->withNotify($notify);
                    } else {
                        $user = User::create([
                            "phone"             => $request->phone,
                            "iso2"              => $request->iso2,
                            "dialcode"          => $request->dialcode
                        ]);

                        Auth::login($user);


                        $request->session()->regenerate();

                        $this->clearLoginAttempts($request);

                        $notify[]                   = ['success', 'Phone Number verified successfully!'];

                        Log::debug('The OTP for Phone Number: {phone} which has been verified is {otp}.', ['otp' => $otp, 'phone' => $request->phone]);

                        return redirect()->route("signup")->withNotify($notify);


                    }
                }
            } catch (\Exception $e) {
                $notify[]                   = ['errors', $e->getMessage()];

                Log::debug('The OTP for Phone Number: {phone} which has been marked "Something went wrong! Please resend the OTP.!" is {otp}.', ['otp' => $otp, 'phone' => $request->phone]);

                return redirect()->back()->withNotify($notify);
            }
        } else {
            $notify[]                   = ['errors', 'You have entered incorrect OTP!'];

            Log::debug('The OTP for Phone Number: {phone} which has been rejected is {otp}.', ['otp' => $otp, 'phone' => $request->phone]);

            return redirect()->back()->withNotify($notify);
        }
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }


}
