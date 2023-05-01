<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function login()
    {
        $data['title'] = 'Login Dashboard';
        return view('user/login', $data);
    }
}
