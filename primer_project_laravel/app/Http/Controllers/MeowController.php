<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeowController extends Controller
{
    public function list_messages(){
        return view('meows-list');
    }

    public function details_messages(string $id){
        return view('meonw-details',['id' => $id]);
    }
}
