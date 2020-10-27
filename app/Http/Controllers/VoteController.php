<?php

namespace App\Http\Controllers;

use App\Token;
use App\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function show()
    {
        return view('home.vote');
    }

    public function submit(Request $request)
    {
        $req = $request->validate([
            'token' => [ 'required', 'string', 'size:6', 'exists:tokens,token_vote' ],
            'calon' => [ 'required', 'in:lingga,gede' ]
        ]);

        $input_token = $req['token'];
        $calon_dipilih = $req['calon'];

        $token_model = Token::where('token_vote', $input_token)->first();
        if($token_model->is_token_used)
            return back()->with('failed', 'Token sudah digunakan!');

        $vote_model = Vote::where('panggilan', $calon_dipilih)->first();
        $vote_model->total_suara++;
        $vote_model->saveOrFail();

        $token_model->is_token_used = true;
        $token_model->save();

        $user = \Auth::user();
        $user->is_voted = true;
        $user->save();

        return back()->with('success', 'Berhasil Vote');
    }
}
