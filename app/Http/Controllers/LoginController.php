<?php

namespace App\Http\Controllers;

use App\Exceptions\ClientValidationException;
use App\Models\User;
use App\Response\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->get("email");

        $user = User::where("email", $email)->first();

        if (empty($user)) {
            return Result::ERROR(Result::ERR_NOT_FOUND, "Email");
        }

        if (!Hash::check($request->password, $user->password)) {
            return Result::ERROR(Result::ERR_ANY, "Email or password wrong");
        }

        return Result::SUCCESS($user);
    }
}
