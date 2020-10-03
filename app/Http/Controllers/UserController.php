<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getRegisteredUsers()
    {
        $users = User::all();
        return view('vendor.voyager.users.browse')->with(compact('users'));
    }

    public function getUserDetails($id = null)
    {
        $user = User::with('address')->where('id', $id)->first();
        return view('vendor.voyager.users.read')->with('user', $user);
    }

    public function changePassword(Request $request)
    {
        // Check if the method is POST
        if ($request->isMethod('POST')) {
            // Validate the form data
            $request->validate([
                'current_password' => 'required',
                'password' => 'required|min:8|confirmed',
            ]);
            // Retrieve all of the input data from change password form
            $data = $request->all();
            $current_password = $data['current_password'];
            // Retrieve all of the data from Admin table via Admin Modal
            $records = User::where(['id' => Auth::user()->id])->first();
            // Check if the Hash passwords are match
            if (Hash::check($current_password, $records->password)) {
                // Hash the New Password
                $hashed_password = Hash::make($data['password_confirmation']);
                // Change Password
                User::where(['id' => Auth::user()->id])->update(['password' => $hashed_password]);
                return redirect()->back()->with('success', 'Your Password has been updated!');
            } else {
                return redirect()->back()->withErrors('Your current password is not valid. Enter your valid password.');
            }
        }
        return view('auth.passwords.change');
    }
}
