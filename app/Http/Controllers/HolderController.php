<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Holder;
use Illuminate\Http\Request;

class HolderController extends Controller
{
    public function createHolder(Request $request) {
        $incomingFields = $request->validate([
            'name' => 'required',
            'birthday' => 'required',
            'spend_percent' => 'required',
            'save_percent' => 'required',
            'give_percent' => 'required',
            'user_id' => 'required'
        ]);

        foreach ($incomingFields as $k => $v) {
            $incomingFields[$k] = strip_tags($v);
        }


        Holder::create($incomingFields);

        return redirect('/');
    }

    public function showCreateScreen() {
        // If name of var ($post in this case) matches how the route was setup
        // Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
        // Laravel automatically looks this up for us
        if (auth()->user()->id !== 1) {
            //return redirect('/');
        }
        $users = [];
        if (auth()->check()) {
            $users = User::where('id', '!=' , 1)->get();
        }
        return view('create-holder',['users' => $users]);
    }

}
