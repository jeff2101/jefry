<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;

class ListController extends Controller
{
    public function index()
    {
        // Retrieve all admins and users
        $admins = Admin::all();
        $users = User::all();
        
        // Pass data to the view
        return view('welcome', compact('admins', 'users'));
    }
}
