<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;

use App\Models\User;

Use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function googlepage(){
        return socialite::driver('google')->redirect();
    }

    public function googlecallback(){
        try{
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();
            if($finduser){
                Auth::login($finduser);
                return redirect()->intended('home');
            }
            else{
                $newuser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('123456Hana'),
                    ]);
                    Auth::login($newuser);
                    return redirect()->intended('home');
            }
        }

        catch (Exception $e) {
            dd($e->getMessage());
            }

    }
}
