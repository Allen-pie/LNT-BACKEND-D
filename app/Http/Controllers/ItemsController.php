<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemsController extends Controller
{
    public function addItemView(){
        return view('add-item');
    }

    // string list = int id
    public function updateItemView(int $id){
        $item = Items::find($id);
        return view('update-item', compact('item'));
    }

    // request adalah sebuah objek (punya properties & method)
    public function addItem(Request $request){

        $request->validate([
            'name' => 'required|string|min:3|max:20|unique:items,name',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0|max:99',
            'image' => 'required|image|mimes:png,jpeg'
        ]);

        $file = $request->file('image');
        $fileName = time() .  $file->getClientOriginalName();
        $filePath = Storage::disk('public')->putFileAs('uploads', $file,  $fileName);

       Items::create([
        // nama kolom tabel => value dari request
            'name' => $request->name,
            'description' => $request->description,
            'stock' => $request->stock,
            'img_path' => $filePath,
            'category_id' => 1
       ]);
       
       return redirect()->route('list.item');
    }

    public function updateItem(Request $request, int $id){

         $request->validate([
            'name' => 'required|string|min:3|max:20|unique:items,name,' . $id,
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0|max:99',
            'image' => 'required|image|mimes:png,jpeg'
        ]);

        $item = Items::findOrFail($id);

        $file = $request->file('image');
        $fileName = time() .  $file->getClientOriginalName();
        $filePath = Storage::disk('public')->putFileAs('uploads', $file,  $fileName);
        
        $item->update([
            'name' => $request->name,
            'description' => $request->description,
            'stock' => $request->stock,
            'img_path' => $filePath
        ]);

        return redirect()->route('list.item');
    }

    public function deleteItem(int $id){
        // dump and die
        $item = Items::findOrFail($id);
        Storage::disk('public')->delete($item->img_path);
        $item->delete();
        return back();
    }

    public function getItems(){
        $items = Items::paginate(5);
        // dd($items[0]->name);
        return view('all-item', compact('items'));
    }
}
