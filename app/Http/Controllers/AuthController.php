<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function role()
    {
        $data['list'] = Role::all();
        return $data;
    }

    public function registerHandler(Request $req)
    {
        date_default_timezone_set('Asia/Jakarta');

        $check = User::where('email', $req->email)->first();
        if ($check) {
            return response()->json([
                'success' => false,
                'message' => "Email telah digunakan!"
            ]);
        }

        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'id_role' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return response()->json([
            "status" => true,
            "message" => "Registrasi sukses!",
        ]);
    }

    public function loginHandler(Request $req)
    {
        $email = $req->email;
        $password = $req->password;

        if (!Auth::attempt(['email' => $email, 'password' => $password])) {
            return response()->json([
                "status" => false,
                "message" => "Email atau password yang anda masukkan salah!",
            ]);
        } else {
            $user = Auth::user();
            session([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role_id' => $user->role_id,
                'logged_in' => true
            ]);
          
            return response()->json([
                "status" => true,
                "message" => "Login sukses!",
                "user" => $user
            ]);

        }
    }
    public function updateProfile(Request $req)
    {
        if ($req->photo) {
            $imageName = time() . '.' . $req->photo->extension();
            $req->photo->move(public_path('images'), $imageName);

            $user = User::findOrFail($req->id);
            if ($req->password) {
                $user->update([
                    'name' => $req->name,
                    'email' => $req->email,
                    'password' => Hash::make($req->password),
                    'photo' => $imageName,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            } else {
                $user->update([
                    'name' => $req->name,
                    'email' => $req->email,
                    'photo' => $imageName,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            }
        } else {
            $user = User::findOrFail($req->id);
            if ($req->password) {
                $user->update([
                    'name' => $req->name,
                    'email' => $req->email,
                    'password' => Hash::make($req->password),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            } else {
                $user->update([
                    'name' => $req->name,
                    'email' => $req->email,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            }
        }
        return; // Ubah sesuai kondisi
    }
    public function viewUpdatePassword()
    {
        return view('sample/update-password');
    }
    public function updatePassword(Request $req)
    {
        $id_user = $req->id_user;
        $user = User::findOrFail($id_user);
        $check = Hash::check($req->old_password, $user->password);

        if (!$check) {
            return response()->json([
                "success" => false,
                "message" => "Old password wrong!"
            ]);
        }

        if ($req->password != $req->password_confirmation) {
            return response()->json([
                "success" => false,
                "message" => "Password doesn't match!"
            ]);
        }

        $user->update([
            'password' => Hash::make($req->password),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return; // Ubah sesuai kondisi
    }

    public function logoutHandler(Request $req)
    {
        Auth::logout();

        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect('/auth/login')->with('success', 'Logout sukses!');
    }
}
