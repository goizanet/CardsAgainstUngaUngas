<?php

namespace App\Http\Controllers\Controllers\Web\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use SendsPasswordResetEmails;

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
}
