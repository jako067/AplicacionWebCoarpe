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

   public function signup(SignupRequest $signupRequest):RedirectResponse
   {
    $user =new User();
    $user->username = $signupRequest->input('username');
    $user->name = $signupRequest->input('name');
    $user->email = $signupRequest->input('email');
    $user->phone=$signupRequest->input('phone');
    $user->DNI=$signupRequest->input('DNI');
    $user->password = Hash::make($signupRequest->input('password'));
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

   //comprobar los campos en el registro con el login :
    public function checkUserData(Request $request)
    {
        $field = $request->input('field'); // 'username' o 'email'
        $value = $request->input('value'); // Lo que ha escrito el usuario

        // Seguridad estricta: solo permitimos comprobar estos dos campos por seguridad
        if (!in_array($field, ['username', 'email'])) {
            return response()->json(['error' => 'Campo no válido'], 400);
        }

        // Buscamos si existe en la BD
        $exists = \App\Models\User::where($field, $value)->exists();

        // Devolvemos true o false
        return response()->json(['exists' => $exists]);
    }

}
