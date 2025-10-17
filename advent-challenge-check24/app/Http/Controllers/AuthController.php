<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function join(Request $request) {
        $data = $request->validate([
           'username' => ['required', 'string', 'min:2', 'max:40', 'alpha_dash', 'unique:users,username'],
           'event_code' => ['required', 'string'],
        ],
            [
                'username.unique' => 'Username ist bereits vergeben.',
                'username.alpha_dash' => 'Nur Buchstaben, Zahlen, Bindestrich und Untersrich sind erlaubt.',
            ]
        );

        $expected = (string)DB::table('settings')->where('key', 'event_code')->value('value');
        if (trim($data['event_code']) !== trim($expected)) {
            return back()
                ->withErrors(['event_code' => 'Falscher Event-Code.'])
                ->withInput();
        }

        $username = Str::lower(trim($data['username']));
        if (User::whereRaw('LOWER(username) = ?', [$username])->exists()) {
            return back()
                ->withErrors(['username' => 'Username ist bereits vergeben.'])
                ->withInput();
        }
        $user = User::firstOrCreate(['username' => $data['username']]);

        $request->session()->put('user_id', $user->id);
        $request->session()->put('username', $user->username);

        return redirect()->route('lobby');
    }

    public function logout(Request $request) {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('join');
    }
}
