<?php

use App\Http\Controllers\Customer\Authentication\CustomerController;
use App\Http\Controllers\Customer\Authentication\LoginController;
use App\Http\Controllers\Customer\Authentication\SignupController;
use App\Http\Controllers\Customer\WizardController;
use App\Http\Controllers\Guest\IndexController;
use App\Http\Controllers\Customer\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('home', [HomeController::class, 'index'])->name('home');

# Login Form [Show Login Form]
Route::get("login", [LoginController::class, 'index'])->name('login');

# Login Form [Verify Number]
Route::post("login/verify-number", [LoginController::class, 'verifyNumber'])->name('login.verify-number');

# Login Form [Verify OTP Form]
Route::get("login/verify-otp", [LoginController::class, 'verifyOTP'])->name('login.verify-otp');

# Login Form [Resend OTP]
Route::post("login/resend-otp", [LoginController::class, 'resendOTP'])->name('login.resend-otp');

# Login Form [Submit OTP]
Route::post("login/submit-otp", [LoginController::class, 'submitOTP'])->name('login.submit-otp');

# Login Form [Verify Password]
Route::post("login", [LoginController::class, 'login'])->name('login.submit');

# Logout [Customer]
Route::post("logout", [LoginController::class, 'logout'])->name('logout');

# Onboarding Form [Customer]
Route::get("signup", [SignupController::class, 'signup'])->name('signup');

# Onboarding Save [Customer]
Route::post("signup", [SignupController::class, 'register'])->name('signup.submit');

# Profile Update [Customer]
Route::post("profile", [CustomerController::class, 'profile'])->name('profile');

# Password Update [Customer]
Route::post("password", [CustomerController::class, 'password'])->name('password');

# Forgot Password Update [Customer]
Route::post("forgot-password", [CustomerController::class, 'forgotPassword'])->name('forgot-password');

#  Forgot Password Form [Resend OTP]
Route::post("forgot-password/resend-otp", [CustomerController::class, 'resendOTP'])->name('forgot-password.resend-otp');

# Wizard Renew [Customer]
Route::get("wizard/renew", [WizardController::class, 'renew'])->name('wizard.renew');
