<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meal;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $cats = Category::all();
        $order = Order::orderBy('id', 'DESC')->get();
        if (Auth()->user()->is_admin == 1) {

            return view('AdminPage', compact("order"));
        } else {

            if (!$request->category) {
                $cat1 = "la page d'accueil";
                $meals = Meal::all();

                return view('userPage', compact('cats', 'meals', "cat1"));
            } else {
                $cat1 = $request->category;
                $meals = Meal::where('category', $request->category)->get();

                return view('userPage', compact('cats', 'meals', 'cat1'));
            }
        }
    }
    public function orderstore(Request $request)
    {
        Order::insert([
            'user_id' => Auth()->user()->id,
            'phone' => $request->phone,
            'date' => $request->date,
            'time' => $request->time,
            'meal_id' => $request->meal_id,
            'qty' => $request->qty,
            'adress' => $request->adress,
            'status' => 'en attente!!',
        ]);

        $notification = array(
            'message_id' => "Votre commande a été ajoutée",
            'alert-type' => 'success'
        );
        return redirect()->route('home')->with($notification);
    }

    public function show_order()
    {
        $order = Order::where('user_id', Auth::user()->id)->get();
        return view('order.show_order', compact('order'));
    }

    public function changestatus(Request $request, $id)
    {
        $order = Order::find($id);
        Order::where('id', $id)->update(['status' => $request->status]);
        return back();
    }
}
