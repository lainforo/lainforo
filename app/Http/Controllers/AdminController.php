<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Ban;

class AdminController extends Controller
{
    public function adminAuth(Request $request)
    {
        if ($request->password == env('LF_PASSWORD')) {
            $response = new Response(redirect(route('mastermind')));
            $response->withCookie(cookie('adminlogin', $request->password, 1440));

            return $response;
        } else {
            return view('main.error', ['error' => 'Invalid admin password.']);
        }
    }

    public function userBan($ip)
    {
        $ban = new Ban;

        $ban->ip = $ip;
        $ban->reason = "Still working on `reason`";

        $ban->save();

        return "Successfully banned " . $ip;
    }

    public function userBanLift($ip)
    {
        Ban::where('ip', $ip)->delete();

        return redirect()->back();
    }
}
