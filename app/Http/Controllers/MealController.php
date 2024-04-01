<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meal;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class MealController extends Controller
{

    public function index()
    {
        $meals = Meal::paginate(3);
        return view('meal.index', compact('meals'));
    }

    public function create()
    {
        $cats = Category::latest()->get();
        return view('meal.create_meal', compact('cats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:40',
            'description' => 'required|min:3|max:500',
            'price' => 'required|numeric',
            'image' => 'required|mimes:png,jpeg,png'
        ]);

        // make the name of the picture as a number an resize it
        if ($request->file('image')) {
            $manager = new ImageManager(new Driver());
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(300, 300);
            $img->save("upload/Meals/" . $name_gen);
            $save_url = "upload/Meals/" . $name_gen;
        }

        //    insert the data in meal table
        Meal::insert([
            'category' => $request->category,
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price,
            "image" => $save_url,
        ]);

        $notification = array(
            'message_id' => 'Ajouter avec succès',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function edit( $id){
        $meal = Meal::find($id);
        $cats = Category::latest()->get();
        return view('meal.edit',compact('meal',"cats"));
    }

    public function update(Request $request,$id){
        $old_img = $request->old_image;
        if($request->file('image')){
            unlink($old_img);
            $manager = new ImageManager(new Driver());
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(300, 300);
            $img->save("upload/Meals/" . $name_gen);
            $save_url = "upload/Meals/" . $name_gen;

            Meal::findOrFail($id)->update([
                'category' => $request->category,
                "name" => $request->name,
                "description" => $request->description,
                "price" => $request->price,
                "image" => $save_url,
            ]);
            return redirect()->route('meal.index')->with('message',"repas modifier avec succeès");
        }else{
            Meal::findOrFail($id)->update([
                'category' => $request->category,
                "name" => $request->name,
                "description" => $request->description,
                "price" => $request->price,
            ]);
            return redirect()->route('meal.index')->with('message',"repas modifier avec succeès");
        }
    }

    public function show_details($id){
        $meal = Meal::findOrFail($id);
        return view('meal.meal_details',compact('meal'));
    }
}
