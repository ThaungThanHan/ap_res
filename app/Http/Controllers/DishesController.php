<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\DishCreatedRequest;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::all();
        // $dish = Dish::find(1);
        // dd($dish->category);
        return view('kitchen.dish',compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('kitchen.DishCreate',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DishCreatedRequest $request) //replace Request with DishCreateRequest(Request created for create)
    {
        $dish = new Dish(); // ma thu tr tway myr tl..request name nae column name so yin new Model() ko tone pyy .
        $dish->name = $request->name;
        $dish->category_id = $request->category;

        $imageName = date('YmdHis'). "." . request()->dish_image->getClientOriginalExtension(); #date.jpg or date.png extensions
        request()->dish_image->move(public_path('images'),$imageName);  // moving the image from user request to public\images

        $dish->image = $imageName;
        $dish->save();  // must be saved..but Dish::create() nae tone khe tl so save ma lo. Model::create() ka blog project mr tone pee trr
        // saving the new Dish
        return redirect('dishes')->with('message','Dish created successfully!');  // flash message.
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish) // Route model binding $dish nae route:list htl ka {dish} nae thu ya
    {   
        $categories = Category::all();
        return view('kitchen.DishEdit',compact('dish','categories'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        request()->validate([       // we are validating here because we dun want to use rukes in the DishCreatedRequest
            'name' => 'required',   // we want to give image as optional but not required.
            'category' => 'required'
        ]);
        $dish->name = $request->name;
        $dish->category_id = $request->category;

        if($request->dish_image){
            $imageName = date('YmdHis'). "." . request()->dish_image->getClientOriginalExtension(); #date.jpg or date.png extensions
            request()->dish_image->move(public_path('images'),$imageName);  // moving the image from user request to public\images
            $dish->image = $imageName;    
        }
        $dish->save();      // saving the existing Dish
        return redirect('dishes')->with('message','Dish updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect('dishes')->with('message','Dish deleted successfully!');
    }
}
