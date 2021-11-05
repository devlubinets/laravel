<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ProtectedController;
use App\Models\User;
use Illuminate\View\View;

class UserController extends ProtectedController
{
    public function index(): View
    {
        $clients = User::get();
        return view('admin.client.index', compact('clients'));
    }
}
