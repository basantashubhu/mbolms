<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index() {
        $users = $this->getUsers();
        return view('users.index', compact('users'));
    }

    private function getUsers() {
        return User::query()->where([
            ['is_admin', '=', false],
            ['is_active', '=', true]
        ])->get();
    }
}
