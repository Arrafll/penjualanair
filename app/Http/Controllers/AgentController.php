<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentController extends Controller
{
    //
    public function dashboard(){
        $data = [
            'title' => 'Login'
        ];
        return view('agent.dashboard', $data);
    }
}
