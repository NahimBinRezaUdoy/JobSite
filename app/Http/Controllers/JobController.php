<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Jobs::all()->take(10);
        return view('welcome', compact('jobs'));
    }

    public function show($id, Jobs $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function create()
    {
        return view('jobs.create');
    }
}
