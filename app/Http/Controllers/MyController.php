<?php

namespace App\Http\Controllers;

use App\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyController extends Controller
{
    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('voyager.login');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $doctors = Doctor::where('name', 'like', "%$query%")
            ->orWhere('specialization', 'like', "%$query%")
            ->get();
        return view('search-results')->with('doctors', $doctors);
    }
}
