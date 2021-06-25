<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobController extends Controller
{
    public function index()
    {
        $companies = Company::all()->take(12);
        $jobs = Job::all()->take(10);
        return view('welcome', compact('jobs', 'companies'));
    }

    public function show($id, Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $company = Company::where('user_id', $user_id)->first();
        $company_id = $company->id;



        Job::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'roles' => request('roles'),
            'description' => request('description'),
            'category_id' => request('category'),
            'position' => request('position'),
            'address' => request('address'),
            'type' => request('type'),
            'status' => request('status'),
            'last_date' => request('deadline'),
        ]);

        return redirect()->back()->with('message', 'Job Posted Successfully');
    }

    public function myjobs()
    {
        $jobs = Job::where('user_id', auth()->user()->id)->get();

        return view('jobs.myjobs', compact('jobs'));
    }

    public function apply($id)
    {
        $jobId = Job::find($id);
        $jobId->users()->attach(auth()->user()->id);
        return redirect()->back()->with('message', 'Job Applied Successfully');
    }

    public function applicants()
    {
        $applicants = Job::has('users')->where('user_id', auth()->user()->id)->get();

        return view('jobs.applicants', compact('applicants'));
    }

    public function alljobs()
    {
        $jobs = Job::latest()->paginate(10);
        return view('jobs.alljobs', compact('jobs'));
    }
}
