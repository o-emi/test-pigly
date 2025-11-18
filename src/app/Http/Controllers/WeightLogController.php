<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterStep1Request;
use App\Http\Requests\RegisterStep2Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class WeightLogController extends Controller
{
    public function showStep1()
    {
        return view('auth.register.step1');
    }

    public function postStep1(RegisterStep1Request $request)
    {
        $request->session()->put('register.step1', $request->validated());
        return redirect('/register/step2');
    }

    public function showStep2(Request $request)
    {
        if (!$request->session()->has('register.step1')) {
            return redirect('/register/step1');
        }
        return view('auth.register.step2');
    }

    public function postStep2(RegisterStep2Request $request)
    {
        $step1Data = $request->session()->get('register.step1');

        $user = User::create([
            'name' => $step1Data['name'],
            'email' => $step1Data['email'],
            'password' => Hash::make($step1Data['password']),
        ]);

        $user->weightTargets()->create($request->validated());

        $request->session()->forget('register.step1');

        return redirect('/login');
    }
}
