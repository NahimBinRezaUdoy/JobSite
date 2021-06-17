@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><b>{{ $job->title }}</b></div>

                    <div class="card-body">
                        <p>
                        <h3>Description</h3>{{ $job->description }}
                        </p>

                        <p>
                        <h3>Duties</h3>{{ $job->roles }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"><b>Short Info</b> </div>

                    <div class="card-body">
                        <p>
                            <b>Company:</b>
                            <a href="{{ route('company.index', [$job->company->id, $job->company->slug]) }}">
                                {{ $job->company->cname }}
                            </a>
                        </p>

                        <p>
                            <b>Address:</b> {{ $job->address }}
                        </p>

                        <p>
                            <b>Job Position:</b> {{ $job->position }}
                        </p>

                        <p>
                            <b>Estimate:</b> {{ $job->last_date }}
                        </p>
                    </div>
                    @auth
                        <button class="btn btn-success">Apply</button>
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection
