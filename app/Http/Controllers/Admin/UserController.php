<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ProtectedController;
use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends ProtectedController
{
    public function index()
    {
        $clients = User::get();
        return view('admin.client.index', compact('clients'));
    }
}
