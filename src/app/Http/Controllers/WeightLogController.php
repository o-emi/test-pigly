<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use App\Models\User;
use App\Http\Requests\RegisterStep1Request;
use App\Http\Requests\RegisterStep2Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class WeightLogController extends Controller
{
    public function index(Request $request)
    {
      $query = WeightLog::query();
        if ($request->filled('from')) $query->where('date', '>=', $request->from);
        if ($request->filled('to')) $query->where('date', '<=', $request->to);

        $weights = $query->orderBy('date', 'desc')->paginate(8);

        $weightTarget = WeightTarget::first();
        $latestWeightLog = WeightLog::latest('date')->first();

        $latestWeight = $latestWeightLog?->weight;
        $diffWeight = ($latestWeight && $weightTarget)? round($latestWeight - $weightTarget->weight, 1) : null;

        return view('index', compact('weights', 'weightTarget', 'latestWeight', 'diffWeight'));
    }

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
      dd($request->all());
        $step1Data = $request->session()->get('register.step1');

        $user = User::create([
            'name' => $step1Data['name'],
            'email' => $step1Data['email'],
            'password' => Hash::make($step1Data['password']),
        ]);

        $user->weightTargets()->create(['target_weight' => $request->target_weight]);
        $user->weightLogs()->create([
        'weight' => $request->now_weight,
        'date' => now()
        ]);

        $request->session()->forget('register.step1');

        return redirect('/');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ], [
        'email.required' => 'メールアドレスを入力してください',
        'email.email' => 'メールアドレスは「ユーザ名＠ドメイン」形式で入力してください',
        'password.required' => 'パスワードを入力してください',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect('/');
    }

    return back()->withErrors([
        'email' => 'メールアドレスかパスワードが違います',
    ])->onlyInput('email');
}


}
