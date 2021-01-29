<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Web\User\SendsPasswordResetEmails;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;

class UserController extends Controller
{

    // Comentamos esto que no nos hace falta
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    // Añadimos las respuestas JSON, ya que el Frontend solo recibe JSON
    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        switch ($response) {
            case Password::INVALID_USER:
                return response()->error($response, 422);
                break;

            case Password::INVALID_PASSWORD:
                return response()->error($response, 422);
                break;

            case Password::INVALID_TOKEN:
                return response()->error($response, 422);
                break;
            default:
                return response()->success($response, 200);
        }
    }

    public function reset(Request $request)
    {
        $this->validate($request, $this->rules(), $this->validationErrorMessages());

        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
            $this->resetPassword($user, $password);
        }
        );

        return $response == \Password::PASSWORD_RESET
            ? response()->success($response, 200)
            : response()->error($response, 422);
    }

    protected function resetPassword($user, $password)
    {
        $user->forceFill([
            'password' => $password,
            'remember_token' => str_random(60),
        ])->save();

        // GENERAR TOKEN PARA SATELLIZER AQUI ??
        // $this->guard()->login($user);
    }

    public function getForgotPassword() {
        return view('auth.passwords.email');
    }

    public function validateResetPassword(Request $request){
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function getResetPassword($token){
        return view('auth.passwords.reset', ['token' => $token]);
    }

    public function resetPasswordEmail(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();

                $user->setRememberToken(Str::random(64));

                event(new PasswordReset($user));
            }
        );

        return $status == Password::PASSWORD_RESET
            ? Redirect::to('http://localhost:8080/login')
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function redirectToGame() {
       return Redirect::to('http://localhost:8080/login');
    }
}
