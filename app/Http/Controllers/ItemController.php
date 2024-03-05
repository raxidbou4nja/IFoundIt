<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::paginate(1);
        return view('index', compact('items'));
    }

    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('show', compact('item'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'city' => 'required',
            'address' => 'required',
            'when_at' => 'required',
            'picture' => 'mimes:jpeg,png,gif,webp|max:1048'
        ]);

        $item = new Item();
        $item->title = $request->title;
        $item->description = $request->description;
        $item->city = $request->city;
        $item->address = $request->address;
        $item->when_at = $request->when_at;
        
        if ($request->hasFile('picture')) {
            
            $file = $request->file('picture');
            $filename = time() .'-'. $file->getClientOriginalName();
            $file->storeAs('public/pictures', $filename);
            $item->picture = $filename;

        }

        $item->save();
        return redirect('/create?created=success');
    }

}
