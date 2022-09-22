<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Drink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('insertdrink',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'category_id' => 'required',
            'name' => 'required|min:2|max:100',     
            'price' => 'required|gte:1000',
            'stock' => 'required|gte:1',
            'image' => 'required'
        ]);
        // dd($validated);

        $validated['image']=$request->file('image')->store('images');
        Drink::create($validated);
        return redirect('/')->with('alert','Drink has been Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function show(Drink $drink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function edit(Drink $drink)
    {
        return view('editdrink',[
            'drink' => $drink,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drink $drink)
    {
        $validated=$request->validate([
            'category_id' => 'required',
            'name' => 'required|min:2|max:100',     
            'price' => 'required|gte:1000',
            'stock' => 'required|gte:1',
            'image' => 'image|file'
        ]);
        if($request->file('image')){
            if($request->oldImage){

            }
            $validated['image']=$request->file('image')->store('images');
        }
        

        Drink::where('id',$drink->id)->update($validated);
        return redirect('/')->with('alert','Drink has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drink $drink)
    {
        Drink::destroy($drink->id);
        return redirect('/')->with('alert','Drink has been removed');
    }
}
