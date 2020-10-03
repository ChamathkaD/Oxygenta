<?php

namespace App\Http\Controllers;

use App\Address;
use App\Http\Requests\AdminStoreOrderPrice;
use App\Http\Requests\StoreOrder;
use App\Http\Requests\UpdateOrder;
use App\Mail\CODOrderMail;
use App\Mail\OrderApproveMail;
use App\Mail\OrderDeclineMail;
use App\Mail\OrderRequestMail;
use App\Order;
use App\Prescription;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index()
    {
        return view('order');
    }

    public function store(StoreOrder $request)
    {
        // The incoming request is valid...

        // Retrieve the validated input data...
        $validated = $request->validated();

        Order::create([
            'user_id' => Auth::user()->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'nic' => $request->nic,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'state' => $request->state,
            'city' => $request->city,
            'street' => $request->street,
            'zip' => $request->zip,
            'country' => $request->country,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);
        //get the last inserted id
        $order_id = DB::getPdo()->lastInsertId();

        // store prescriptions
        if($request->hasFile('attachment')) {
            foreach ($request->file('attachment') as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = uniqid() . "." . $extension;
                $file->move(public_path('uploads/prescriptions/'), $filename);
                // save to database
                Prescription::create([
                    'order_id' => $order_id,
                    'user_id' => Auth::user()->id,
                    'image' => $filename
                ]);
            }
        }

        // send mail to customer about prescription processing
        Mail::to(Auth::user()->email)->send(new OrderRequestMail($order_id));

        return redirect()->back()->with('success', 'Thank you for ordering!');

    }

    public function getRequests()
    {
        $orders = Order::orderBy('id','desc')->where('status', 0)->get();
        return view('vendor.voyager.requests.browse')->with(compact('orders'));
    }

    public function getRequestsDetails($id = null)
    {
        $prescriptions = Prescription::where('order_id', $id)->get();
        $order = Order::where([
            'id'=> $id,
            'status' => 1, // display approved prescription prices
        ])->first();
        return view('vendor.voyager.requests.read')->with(compact('prescriptions', 'order'));
    }

    public function notify(AdminStoreOrderPrice $request, $id)
    {
        // The incoming request is valid...

        // Retrieve the validated input data...
        $validated = $request->validated();

        // store to table
        Order::where('id', $id)->update([
            'total' => $request->price,
            'shipping' => $request->shipping,
            'grand_total' => $request->total,
            'status' => 1, // Approve after prescription processing
        ]);
        // notify to relevant customer using email
        Mail::to(Auth::user()->email)->send(new OrderApproveMail($id));
        // set the flash message
        return redirect()->back()->with('success', 'Saved Successfull!');
    }

    public function addCart(Request $request)
    {
        if (Session::has('session_id')) {
            $session_id = Session::get('session_id');
        } else {
            $session_id = session_create_id('order');
            Session::put('session_id', $session_id);
        }

        if (Auth::check()) {
            $count = DB::table('cart')->where([
                'user_id' => $request->user_id,
                'session_id' => $session_id,
            ])->count();
            // prevent duplicate items
            if ($count > 0) {
                return redirect()->back()->with('warning', 'Some order is in your cart. Please check and place order or remove from your cart and Try again!');
            }
        }

        DB::table('cart')->insert([
            'order_id' => $request->order_id,
            'user_id' => $request->user_id,
            'total' => $request->total,
            'shipping' => $request->shipping,
            'grand_total' => $request->grand_total,
            'session_id' => $session_id,
            'created_at' => Carbon::now(),
        ]);

        return redirect('cart')->with('success', 'Order has been added in the shopping cart!');
    }

    public function decline($id = null)
    {
        Order::where([
            'user_id' => Auth::user()->id,
            'id' => $id
        ])->update([
            'status' => 3,
        ]);
        DB::table('cart')->where([
            'user_id' => Auth::user()->id,
            'order_id' => $id
        ])->delete();

        // send mail to customer about delete their orders
        $user = User::where('id', Auth::user()->id)->first();
        Mail::send(new OrderDeclineMail($user, $id));

        return redirect()->back();
    }

    public function cart()
    {
        if(Auth::check()) {
            $cart = DB::table('cart')->where('user_id', Auth::user()->id)->first();
        } else {
            $session_id = Session::get('session_id');
            $cart = DB::table('cart')->where(['session_id' => $session_id])->first();
        }

        if (!is_null($cart)) {
            // get relavant order details using order_id for display on cart
            $order = Order::where('id', $cart->order_id)->first();
        } else {
            $order = null;
        }

        return view('cart', [
            'cart' => $cart,
            'order' => $order,
        ]);
    }

    public function deleteCart($cart_id = null)
    {
        DB::table('cart')->where('id', $cart_id)->delete();
        return redirect()->back()->with('success', 'Order has been deleted from cart!');
    }

    public function checkout(UpdateOrder $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();

        $user_id = Auth::user()->id;
        $order_id = $request->order_id;

        // update orders table
        Order::where('id', $order_id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'state' => $request->state,
            'city' => $request->city,
            'street' => $request->street,
            'zip' => $request->zip,
            'country' => $request->country,
            'phone' => $request->phone,
        ]);

        if (!empty($request->saveAddress)) {
            // update address for next time
            Address::where('user_id', $user_id)->update([
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'street' => $request->street,
                'zip' => $request->zip,
                'phone' => $request->phone,
            ]);
        }

        // redirect to order review page
        return redirect()->route('review', [$order_id]);

    }

    public function orderReview($order_id = null)
    {
        $order = Order::where([
            'id' => $order_id,
            'user_id' => Auth::user()->id,
        ])->first();
        return view('review')->with(compact('order'));
    }

    public function placeOrder(Request $request)
    {
        Order::where([
            'user_id' => Auth::user()->id,
            'id' => $request->order_id,
        ])->update([
            'status' => 2, // approved == place order
            'method' => $request->input('paymentMethod'),
        ]);

        Session::put('order_id', $request->order_id);

        Session::put('grand_total', $request->input('grand_total'));

        if ($request->input('paymentMethod') == "cod") {
            $order = Order::where([
                'id' => $request->order_id,
                'user_id' => Auth::user()->id,
            ])->first();
            // send order mail to relevant customer
            Mail::send(new CODOrderMail($order));

            // COD-Redirect user to Thanks page after saving order
            return redirect('/thanks');
        }
    }

    public function thanks()
    {
        // remove order from cart table after ordered.
        DB::table('cart')->where('user_id', Auth::user()->id)->delete();
        return view('thanks');
    }

    public function getOrder()
    {
        $orders = Order::orderBy('id', 'desc')->where('status', 2)->get();
        return view('vendor.voyager.orders.browse')->with(compact('orders'));
    }

    public function getOrderDetails($order_id = null)
    {
        $prescriptions = Prescription::where('order_id', $order_id)->get();
        return view('vendor.voyager.orders.read')->with(compact('prescriptions'));
    }
}
