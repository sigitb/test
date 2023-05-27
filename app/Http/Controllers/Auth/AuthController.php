<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Libs\Alert;
use App\Libs\Res;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view("auth.login");
    }

    public function attempt(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email:rfc,dns',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            Alert::validation($validator->errors()->first());
            return redirect()->back();
        }

        $credential = $request->only('email', 'password');
        $attempt = Auth::attempt($credential);
        if ($attempt) {
            Alert::success("Login successfully");
            return redirect()->route('admin.product.import');
        }

        Alert::error("Wrong Email or Password");
        return redirect()->back();

    }
    public function logout()
    {
        Auth::logout();
        Alert::success("Logout successfully");
        return redirect()->route('auth.login');
    }
}
