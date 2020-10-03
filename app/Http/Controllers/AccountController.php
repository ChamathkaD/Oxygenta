<?php

namespace App\Http\Controllers;

use App\Address;
use App\Http\Requests\StoreAddress;
use App\Http\Requests\StoreInformation;
use App\Order;
use App\Prescription;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function index()
    {
        return view('account');
    }

    public function showInformationForm()
    {
        return view('account.information');
    }

    public function storeInformation(StoreInformation $request, $id)
    {

        // The incoming request is valid...

        // Retrieve the validated input data...
        $validated = $request->validated();

        $user = User::where('id', $id)->first();
        $user->title = $request->title;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->nic = $request->nic;
        $user->save();

        return redirect()->back()->with('success', 'Your Information Saved!');
    }

    public function showAddressForm()
    {
        return view('account.address');
    }

    public function storeAddress(StoreAddress $request, $id)
    {
        // The incoming request is valid...

        // Retrieve the validated input data...
        $validated = $request->validated();

        // check if exists address
        $count = Address::where('user_id', $id)->count();

        if ($count > 0)
        {
            // update address
            Address::where('user_id', $id)->update([
                'user_id' => $id,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'street' => $request->street,
                'zip' => $request->zip,
                'phone' => $request->phone,
            ]);
        }
        else
        {
            // create address
            Address::create([
                'user_id' => $id,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'street' => $request->street,
                'zip' => $request->zip,
                'phone' => $request->phone,
            ]);
        }

        return redirect()->back()->with('success', 'Your Address Saved!');
    }

    public function showOrders()
    {
        $orders = Order::OrderBy('id', 'desc')->where('user_id', Auth::user()->id)->get();
        return view('account.order')->with(compact('orders'));
    }

    public function showPrescriptions()
    {
        $prescriptions = Prescription::where('user_id', Auth::user()->id)->get();
        return view('account.prescription')->with(compact('prescriptions'));
    }

    public function approved()
    {
        $orders = Order::with('prescriptions')->where([
            'user_id' => Auth::user()->id,
            'status'=> 1, // get approved orders
        ])->get();
        return view('account.approved')->with(compact('orders'));
    }

}
