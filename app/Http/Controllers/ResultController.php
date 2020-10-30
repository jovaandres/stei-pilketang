<?php

namespace App\Http\Controllers;

use App\Vote;
use Illuminate\Http\Request;

class ResultController extends Controller
{


    public function result()
    {
        $result = Vote::orderBy('total_suara', 'DESC')->first()->panggilan;
        return view('result', compact('result'));
    }
}
