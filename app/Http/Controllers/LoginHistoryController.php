<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoginHistory;
use Illuminate\Support\Facades\Auth;

class LoginHistoryController extends Controller
{
    public function index()
    {
        $loginHistory = LoginHistory::with('user')
            ->orderBy('login_at', 'desc')
            ->get();

        return view('admin.log.login_history', compact('loginHistory'));
    }
}
