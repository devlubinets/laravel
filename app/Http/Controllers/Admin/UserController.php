<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ProtectedController;
use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends ProtectedController
{
    public function index(): View
    {
        $clients = User::get();
        return view('admin.client.index', compact('clients'));
    }
}
