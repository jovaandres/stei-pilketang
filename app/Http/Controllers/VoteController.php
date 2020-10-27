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

    public function vote()
    {
        return view('home.vote');
    }

    public function success_vote(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'name' => 'required'
        ]);

        $input_token = $request->token;
        $calon_dipilih = $request->calon;

        if (Token::where('token_vote', $input_token)->exists() &&
            !Token::where('token_vote', $input_token)->select('is_token_used')->get()[0]['is_token_used'])
        {
            $this->update_total_suara($calon_dipilih);
            $this->update_token($input_token);
            return redirect('vote')->with('success', 'Berhasil Vote');
        }
        return redirect('vote')->with('failed', 'Invalid Token');
    }

    public function update_token($input_token)
    {
        Token::where('token_vote', $input_token)->update([
            'is_token_used' => true
        ]);
    }

    public function update_total_suara($calon_dipilih)
    {
        $suara_sementara = Vote::where('panggilan', $calon_dipilih)->select('total_suara')->get()[0]['total_suara'];
        Vote::where('panggilan', $calon_dipilih)->update([
            'total_suara' => $suara_sementara + 1
        ]);
    }
}
