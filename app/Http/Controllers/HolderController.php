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
        if (auth()->user()->id !== 1) {
            return redirect('/');
        }
        $users = [];
        if (auth()->check()) {
            $users = User::leftJoin('holders', 'holders.user_id' , '=', 'users.id')
                ->whereNull('holders.user_id')
                ->select('users.*')
                ->where('users.id', '!=', 1)
                ->get();
        }
        return view('create-holder',['users' => $users]);
    }

    public function showEditScreen(Holder $holder) {
        // If name of var ($post in this case) matches how the route was setup
        // Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
        // Laravel automatically looks this up for us
        if ( (auth()->user()->id !== $holder['user_id']) && (auth()->user()->id != 1) ) {
            return redirect('/');
        }

        $users = [];
        if (auth()->check()) {
            // we want to show all users here, as opposed to create
            $users = User::leftJoin('holders', 'holders.user_id' , '=', 'users.id')
                //->whereNull('holders.user_id')
                ->select('users.*')
                ->where('users.id', '!=', 1)
                ->get();
        }
        return view('edit-holder', ['holder' => $holder, 'users' => $users]);
    }

    public function updateHolder(Holder $holder, Request $request) {
        if ( (auth()->user()->id !== $holder['user_id']) && (auth()->user()->id != 1) ) {
            return redirect('/');
        }
        $incomingFields = $request->validate([
            'name' => 'required',
            'birthday' => 'required',
            'spend_percent' => 'required',
            'save_percent' => 'required',
            'give_percent' => 'required',
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['name']);

        $holder->update($incomingFields);
        return redirect('/');
    }

}
