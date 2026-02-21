<?php

use App\Http\Controllers\ItemsController;
use App\Models\ItemCategories;
use App\Models\Items;
use App\Models\Warehouses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function(){
    return view('home');
});

Route::get('/collection', function(){
    return view('collection');
});

Route::get('/register', function(){
    return view('register');
});

Route::post('/submit', function(){
    return true;
});

Route::prefix('item')->group(function (){
    Route::get('/add', [ItemsController::class , 'addItemView'])->name('view.add.item');
    // /list
    Route::get('/list', [ItemsController::class, 'getItems'])->name('list.item');
    Route::get('/{id}', [ItemsController::class, 'updateItemView'])->name('view.update.item');

    Route::put('/{id}', [ItemsController::class , 'updateItem'])->name('update.item');
    Route::delete('/{id}', [ItemsController::class, 'deleteItem'])->name('delete.item');
    Route::post('/add', [ItemsController::class, 'addItem'])->name('add.item');
});

Route::get('/test', function(){
    // $items = Items::with('category')->where('category_id', 4)->get();
    // $items = ItemCategories::with('items')->find(4);

    // return response()->json($items);

    // $item = Items::find(5);
    // $item->warehouses()->attach(3, ['quantity' => 12]);

    // $warehouse = Warehouses::find(2);
    // $warehouse->items()->attach(10, ['quantity' => 14]);

    $warehouse = Warehouses::find(3); // ambil warehouse yang id nya 2
    $items = $warehouse->items; // array of items dari warehouse yang id nya 2

    // ambil index pertama [0]
    // $quantity = $items->first()->pivot; // sama aja

    // $quantity = $items[0]->pivot;

    // $warehouse = Warehouses::find(2); // ambil warehouse yang id nya 2
    // $warehouse->items()->detach([10 , 5]); // putusin hubungan warehouse id 2 dengan items yang id nya 10 dan 5

    return response()->json($items);
});

Route::get('/api/item/list', function(){
    $items = Items::limit(10)->get();
    return response()->json($items);
});


Route::post('/api/item/add', function(Request $request){
    $item = Items::create($request->all());
    // dd($item);

    return response()->json($item, 201);
});



