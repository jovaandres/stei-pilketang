<?php

namespace App\Http\Controllers;

use App\Token;
use App\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $user = \Auth::user();
        if ($user->is_voted)
            return back()->with('failed', 'Kamu sudah pernah vote');

        $req = $request->validate([
            'token' => ['required', 'string', 'size:6', 'exists:tokens,token_vote'],
            'calon' => ['required', 'in:lingga,gede']
        ]);

        $input_token = $req['token'];
        $calon_dipilih = $req['calon'];

        $token_model = Token::where('token_vote', $input_token)->first();
        if ($token_model->is_token_used)
            return back()->with('failed', 'Token sudah digunakan!');
        $vote_model = Vote::where('panggilan', $calon_dipilih)->first();

        DB::beginTransaction();
        try {
            $vote_model->total_suara++;
            $token_model->is_token_used = true;
            $user->is_voted = true;
            if($vote_model->save() && $token_model->save() && $user->save()){
                DB::commit();
                return back()->with('success', 'Berhasil Vote');
            } else {
                DB::rollBack();
                return back()->with('failed', 'Internal Server Error');
            }
        } catch (\Exception $e){
            DB::rollBack();
            return back()->with('failed', 'Internal Server Error');
        }
    }
}
