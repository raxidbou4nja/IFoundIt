<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as RequestItem;
use App\Models\Chat;
use App\Models\Item;
class ChatController extends Controller
{
    public function show($reference)
    {

        $messages = RequestItem::where('reference', $reference)->with('chat')->get();

        // groupe last messages by request_id
        $last_messages = $messages->map(function($item) {
            return $item->chat->last();
        });

        return view('chat.index', compact('messages','last_messages'));
    }
    
    public function showOwnerContact($reference)
    {
        $item = Item::where('reference', $reference)->firstOrFail();

        $requests = RequestItem::where('item_id', $item->id)->with('chat')->get();
        
        // groupe last messages by request_id
        $last_messages = $requests->map(function($item) {
            return $item->chat->last();
        });

        // if last_messages is empty send empty array
        return view('chat.index-owner', compact('requests', 'last_messages'));
    }

    public function showOwnerContactMessages($reference, $request_id)
    {
        $item = Item::where('reference', $reference)->firstOrFail();

        $requests = RequestItem::where('reference', $request_id)->with('chat')->get();

        // groupe last messages by request_id
        $last_messages = $requests->map(function($item) {
            return $item->chat->last();
        });

        // if last_messages is empty send empty array
        return view('chat.index-owner', compact('requests', 'last_messages'));
    }



    // send message
    public function sendToFinder(Request $request, $reference)
    {
        $request->validate([
            'message' => 'required|max:255',
            'proof' => 'mimes:jpeg,png,gif,webp|max:1048'
        ]);

        $requestItem = RequestItem::where('reference', $reference)->first();

        $chat = new Chat();
        $chat->message = strip_tags($request->message);
        $chat->request_id = $requestItem->id;
        $chat->user = 'owner';

        if ($request->hasFile('proof')) {
            
            $file = $request->file('proof');
            $filename = time() .'-'. $file->getClientOriginalName();
            $file->storeAs('public/pictures', $filename);
            $chat->proof = 'pictures/'.$filename;

        }

        $chat->save();

        return redirect()->route('indexChatWithFinder', $reference);
    }

}
