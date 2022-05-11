<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $user = Auth::user();
        if($user->role_id != 1){
            return redirect(route('/'));
        }

    }

    public function ads()
    {
        $ads = Ad::all();
        return view('admin.ads', $ads);
    }
}
