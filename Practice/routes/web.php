<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use \App\Product;
use Illuminate\Http\Request;

Route::get('/', function () {
    $products = Product::orderBy('created_at','desc')->get();

    return view('home', compact('products'));
});

Route::get('/up/{id}', function ($id){
    return view('product.update', compact('id')) ;

});

Route::get('up/update/{id}', function ($id, Request $request){
    //
    $validator = Validator::make($request->all(),[
        'title' =>'required|max:255',
        'price' =>'required|max:255',
        'images' =>'required|max:255',
    ]);

    if ($validator->fails()){
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $product = Product::where('id', $id)->first();
    $product->title = $request->title;
    $product->price = $request->price;
    $product->images = $request->images;
    if($product->save()){
        return redirect('/');
    }

});


Route::get('/delete/{delete}', function ($id){
    Product::findOrFail($id)->delete();
    return redirect('/');
});

Route::post('/search', function (Request $request){
    $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
        'search' => 'required|max:255'
    ]);
    if ($validator->fails()){
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    $products = Product::where('title', 'like', $request->search)
        ->orwhere('id','=',$request->search)
        ->get();
    return view('home', compact('products'));
});

Route::get('/add', function (){
    return view('product.add') ;

});

Route::get('/add/add',function (Request $request){
    //Validate Information
    $validator = Validator::make($request->all(),[
        'title' =>'required|max:255',
        'price' =>'required|max:255',
        'images' =>'required|max:255',
    ]);

    if ($validator->fails()){
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $product = new Product;
    $product->title = $request->title;
    $product->price = $request->price;
    $product->images = $request->images;
    if($product->save()){
        return redirect('/');
    }

});
