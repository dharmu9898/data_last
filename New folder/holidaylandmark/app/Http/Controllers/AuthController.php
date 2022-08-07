<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\User;
use Log;

class AuthController extends Controller
{
    public  $loginAfterSignUp = true;

    public  function  register(Request  $request) {
        $user = new  User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        if ($this->loginAfterSignUp) {
            return  $this->login($request);
        }

        return  response()->json([
            'status' => true,
            'data' => $user
        ], 200);
    }

    public  function  login(Request  $request) {
        $input = $request->only('email', 'password');        
        $jwt_token = null;
        if (!$jwt_token = JWTAuth::attempt($input)) {            
            return  response()->json([
                'status' => false,
                'message' => 'invalid_credentials',
            ], 401);
        }         
        $user = Auth::user();
        return  response()->json([
            'status' => true,
            'token' => $jwt_token,
            'user' => $user
        ]);
    }

    public  function  logout(Request  $request) {
        $this->validate($request, [
            'token' => 'required'
        ]);

        try {
            JWTAuth::invalidate($request->token);
            return  response()->json([
                'status' => true,
                'message' => 'Successful logout.'
            ]);
        } catch (JWTException  $exception) {
            return  response()->json([
                'status' => false,
                'message' => 'User could not be logged out.'
            ], 500);
        }
    }

    public  function  getAuthUser(Request  $request) {
        $this->validate($request, [
            'token' => 'required'
        ]);

        $user = JWTAuth::authenticate($request->token);
        return  response()->json(['user' => $user]);
    }

    protected function jsonResponse($data, $code = 200)
        {
            return response()->json($data, $code,
                ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
        }


}
