<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meal;
use Illuminate\Http\Request;

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

        if (Auth()->user()->is_admin == 1) {

            return view('AdminPage');

        } else {

            if (!$request->category) {
                $cat1="la page d'accueil";
                $meals = Meal::all();

                return view('userPage', compact('cats', 'meals',"cat1"));

            } else {
                $cat1=$request->category;
                $meals = Meal::where('category', $request->category)->get();

                return view('userPage', compact('cats', 'meals','cat1'));
            }
        }
    }
}
