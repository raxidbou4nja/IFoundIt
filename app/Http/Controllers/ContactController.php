<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Request as RequestItem;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function sendRequest(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'message' => 'required|max:255',
            'picture' => 'mimes:jpeg,png,gif,webp|max:1048'
        ]);

        // check if $id exist
        $item = Item::findOrFail($id);

        $requestItem = new RequestItem();
        $requestItem->title = strip_tags($request->title);
        $requestItem->message = strip_tags($request->message);
        $requestItem->reference =  Str::random(15);
        $requestItem->item_id = $item->id;
 

        if ($request->hasFile('picture')) {
            
            $file = $request->file('picture');
            $filename = time() .'-'. $file->getClientOriginalName();
            $file->storeAs('public/pictures', $filename);
            $requestItem->proof = 'pictures/'.$filename;

        }

        $requestItem->save();
        $cookieName = "chat-reference";
        $cookieValue = $requestItem->reference;
        $cookieExpiration = time() + (86400 * 30); // 30 days
        setcookie($cookieName, $cookieValue, $cookieExpiration, '/');

        return redirect()->route('indexChatWithFinder', $requestItem->reference);

    }

    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('contact', compact('item'));
    }
}
