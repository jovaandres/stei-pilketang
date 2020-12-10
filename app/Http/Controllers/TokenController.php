<?php

namespace App\Http\Controllers;

use App\Token;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Boolean;

class TokenController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function verify_token(Request $request)
    {
        $req = $request->validate([
            'token' => ['required', 'string', 'size:6', 'exists:tokens']
        ]);
        $token = Token::where('token_vote', $req['token'])->first();
        if($token)
            return response()
                ->json([
                    'token' => $token,
                ]);
    }

    public function mark_notice(Request $request)
    {
        $req = $request->validate([
            'mark_notice' => ['required', 'accepted']
        ]);
        if(!$request->has('mark_notice'))
            return back()->with('error', 'Kamu belum setuju dengan aturan klaim token!');

        $user = Auth::user();
        $user->is_notice_read = boolval($req['mark_notice']);
        $user->save();
        return back()->with('success', 'Berhasil menyetujui aturan klaim token');
    }

    public function claim()
    {
        $user = Auth::user();
        return view('home.token', [ 'user' => $user ]);
    }

    public function generateToken()
    {
        $token = Str::random(6);
        if(Token::where(DB::raw('BINARY `token_vote`'), $token)->exists())
            return $this->generateToken();
        return $token;
    }

    public function store()
    {
        $user = Auth::user();
        if(!$user->is_notice_read)
            return response("Anda belum setuju dengan aturan.", 403);
        if($user->is_token_claimed)
            return response("Token sudah diclaim.", 403);
        $token = $this->generateToken();
        $tokenModel = new Token;
        $tokenModel->token_vote = $token;
        $tokenModel->save();
        $user->is_token_claimed = true;
        $user->save();
        return response()
            ->json([
                'token' => $token,
            ]);
    }
}
