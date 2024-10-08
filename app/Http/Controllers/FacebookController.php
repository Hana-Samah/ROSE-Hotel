<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;

use App\Models\User;

Use Illuminate\Support\Facades\Auth;

use Exception;


class FacebookController extends Controller
{
    public function facebookpage(){
        return socialite::driver('facebook')->redirect();
    }

    public function facebookredirect(){
        try {
            $user = socialite::driver('facebook')->user();
            $finduser = User::where('facebook_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect()->intended('home');
                } else {
                    $newUser = User::updateOrCreate([
                        'email' => $user->email,
                        'name' => $user->name,
                        'facebook_id' => $user->id,
                        'password' => encrypt('123456Hana')
                        ]);
                        Auth::login($newUser);
                        return redirect()->intended('home');
                        }
                        } catch (Exception $e) {
                            dd($e->getMessage());
                            }

    }
}
