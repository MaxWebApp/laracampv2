<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LogoutController extends Controller
{
    public function web_logout(Request $request)
    {
        // 設置回默認的 web session
        // config(['session.cookie' => env('SESSION_COOKIE', Str::slug(env('APP_NAME', 'laravel'), '_').'_session')]);
        // config(['session.path' => '/']);

        // 只登出 web guard
        auth('web')->logout();

        // 重新生成 CSRF token，但不完全使 session 失效
        // $request->session()->regenerateToken();

        return redirect('/');
    }


    public function admin_logout(Request $request)
    {
        // 設置回默認的 web session
        // config(['session.cookie' => env('SESSION_COOKIE', Str::slug(env('APP_NAME', 'laravel'), '_').'_session')]);
        // config(['session.path' => '/']);

        // 只登出 admin guard
        auth('admin')->logout();

        // 不完全刪除 session，只重新生成 CSRF token
        // $request->session()->regenerateToken();

        return redirect('/admin');
        // return redirect()->route('filament.admin.auth.login');
    }

}
