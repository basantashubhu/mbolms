<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PendingRequestController extends Controller
{
    function index() {
        $pendingRequests = $this->getAllPendingRequests();
        return view('pending_requests.index', compact('pendingRequests'));
    }

    private function getAllPendingRequests() {
        return User::query()
            ->where([
                ['is_admin', '=', 0],
                ['is_active', '=', 0],
            ])
            ->with('loans')
            ->get();
    }

    function approveUser(User $user) {
        $user->is_active = 1;
        $user->save();
        return response()->json([
            'message' => 'User approved successfully.',
        ], 200);
    }
}
