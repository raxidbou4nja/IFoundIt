<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::paginate(100);
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
            'title' => 'required|max:100',
            'description' => 'max:255',
            'city' => 'required|max:25',
            'address' => 'required|max:100',
            'when_at' => 'required|date',
            'picture' => 'mimes:jpeg,png,gif,webp|max:1048'
        ]);

        $item = new Item();
        $item->title = strip_tags($request->title);
        $item->description = strip_tags($request->description);
        $item->city = strip_tags($request->city);
        $item->address = strip_tags($request->address);
        $item->when_at = strip_tags($request->when_at);
        
        if ($request->hasFile('picture')) {
            
            $file = $request->file('picture');
            $filename = time() .'-'. $file->getClientOriginalName();
            $file->storeAs('public/pictures', $filename);
            $item->picture = 'pictures/'.$filename;

        }

        $item->save();
        return redirect('/create?created=success');
    }

}
