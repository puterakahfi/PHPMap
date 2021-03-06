<?php

namespace App\Http\Controllers\Api\Users;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('scope:manage-profile');
    }

    public function update(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->update([
            'intro' => $request->get('intro'),
        ]);

        $user->save();
    }
}
