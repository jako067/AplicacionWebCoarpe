<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\SignupRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function signupForm(): View
    {
        return view('auth.signup');
    }

   public function signup(SignupRequest $request):RedirectResponse
   {
    $user =new User();
    $user->username = $request->input('username');
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->phone=$request->input('phone');
    $user->DNI=$request->input('DNI');
    $user->password = Hash::make($request->input('password'));
    $user->save();

    Auth::login($user);
    return redirect()->route('users.account');
   }

   public function loginForm(){
    if(Auth::viaRemember()){
        return "Bienvenido de nuevo, ".Auth::user()->name."!";
    }elseif (Auth::check()){
        return redirect()->route('users.account');
    }else{
        return view('auth.login');
    }
   }
   public function login(Request $request): View|RedirectResponse
   {
    $credentials = $request->only('username', 'password');
    $rememberLogin=($request->has('remember')) ? true : false;

    if (Auth::guard('web')->attempt($credentials, $rememberLogin)) {
        $request->session()->regenerate();
        return redirect()->route('users.account');
    } else {
        $error ="Error al acceder a la aplicación, por favor revise sus credenciales.";
        return view('auth.login', compact('error'));
    }
   }
   public function logout(Request $request): RedirectResponse
   {
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('index');
   }

}
