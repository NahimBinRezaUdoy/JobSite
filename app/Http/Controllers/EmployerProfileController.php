<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployerProfileController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('employer');
    // }

    public function store(Request $request)
    {
        $this->validate($request, [
            'cname' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'email' => request('email'),
            'user_type' => request('user_type'),
            'password' => Hash::make(request('password')),
        ]);

        $company = Company::create([
            'user_id' => $user->id,
            'cname' => request('cname'),
            'slug' =>  Str::slug(request('cname')),
        ]);

        return redirect('login');
    }
}
