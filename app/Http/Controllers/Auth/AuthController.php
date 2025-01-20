<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index(): View
    {
        return view('admin.loginadmin');
    }

    public function indexUser(): View
    {
        return view('users.auth.loginuser');
    }

    public function postLogin(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->type == 'admin') {
                DB::table('admin_access_logs')->insert([
                    'user_id' => auth()->id(),
                    'ip_address' => $request->userip,
                    'accessed_at' => now(),
                ]);

                return redirect()->route('admin.home');
            } else {
                abort(403);
            }
        } else {
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
    }

    public function postLoginUser(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'nik' => 'required|exists:dataremajas,NIK', 
            'password' => 'required',
        ]);

        if (Auth::attempt(['nik' => $request->nik, 'password' => $request->password])) {
            if (auth()->user()->type == 'user') {
                return response()->json(['status' => 'success']);
            } else {
                abort(403);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'NIK dan Password Salah.']);
        }
    }

    public function validateAdminIP(Request $request)
    {
        $ip = $request->query('ip');

        $isAllowed = DB::table('admin_access_logs')->where('ip_address', $ip)->exists();

        return response()->json(['isAllowed' => $isAllowed]);
    }

    function indexPassword() 
    {
        return view('users.auth.gantipassword');
    }

    function changePassword(Request $request)
    {
        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->oldPassword, $user->password)) {
            return response()->json(['success' => false, 'message' => 'Password lama tidak cocok.'], 400);
        }

        $user->password = Hash::make($request->newPassword);
        $user->save();

        return response()->json(['success' => true, 'message' => 'Password berhasil diubah.']);
    }
    
    public function logout()
    {
        if (Auth::check() && Auth::user()->type === 'user') {
            Auth::logout();
            return redirect('/');
        } else {
            Auth::logout();
            return redirect('/logout/page');
        }
        
    }
}
