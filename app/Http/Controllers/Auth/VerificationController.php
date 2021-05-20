<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify(Request $request){

        try {
            $user = User::find($request->route('id'));
            if (!$user->hasVerifiedEmail())
                $user->markEmailAsVerified();
        } catch (\Exception $e) {
            return redirect('/');
        }

        return redirect('/');
    }

    public function resend(Request $request){
        if ($request->user()->hasVerifiedEmail()) {
            return redirect('/');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('resent', true);
    }
}
