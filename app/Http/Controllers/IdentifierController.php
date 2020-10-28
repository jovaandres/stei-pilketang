<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class IdentifierController extends Controller
{
    public function show($identifier)
    {
        $identifier = base64_decode($identifier);
        $user = User::where('identifier_id', $identifier)->first();
        return view('identifier', [ 'user' => $user ])->with('validated');
    }
}
