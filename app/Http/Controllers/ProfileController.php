<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $profile = Profile::first();

        return view('admin.profile.index', ['profile' => $profile]);
    }
}
