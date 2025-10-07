<?php

namespace App\Http\Controllers;

use App\Models\Holder;
use App\Models\Account;
use App\Enums\AccountType;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function createHolder(Request $request) {
        $incomingFields = $request->validate([
            'nickname' => 'required',
            'account_type' => 'required',
            'holder_id' => 'required',
        ]);

        foreach ($incomingFields as $k => $v) {
            $incomingFields[$k] = strip_tags($v);
        }

        Account::create($incomingFields);

        return redirect('/');
    }

    public function showCreateScreen() {
         if (auth()->user()->id !== 1) {
            return redirect('/');
        }
        $holders = [];
        if (auth()->check()) {
            $holders = Holder::leftJoin('accounts', 'accounts.holder_id' , '=', 'holders.id')
                ->whereNull('accounts.holder_id')
                ->select('holders.*')
                ->get();
        }
        return view('create-account',['accountTypes' => AccountType::class, 'holders' => $holders]);
    }
}
