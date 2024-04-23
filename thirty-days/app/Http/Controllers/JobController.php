<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    //Index
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(3);

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    //Create
    public function create()
    {
        return view('jobs.create');
    }

    // Show
    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);

    }

    // Store
    public function store()
    {
        //validation...
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);
        return redirect('/jobs');
    }

    // Edit
    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);

    }

    // Update
    public function update(Job $job)
    {
        //  TODO: authorize the request

        //validate
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        // Update the job
        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),

        ]);

        // redirect to job specific page
        return redirect('/jobs/' . $job->id);
    }

    // Destroy
    public function destroy(Job $job)
    {
        // TODO: authorize
        Gate::authorize('edit-job', $job);

        // Delete the Job
        $job->delete();

        // redirect
        return redirect('/jobs');
    }
}