@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Recent Jobs</h1>
            <table class="table">
                <thead>
                    <th>Image</th>
                    <th>Position</th>
                    <th>Address</th>
                    <th>Date</th>
                    <th>Action</th>
                </thead>

                <tbody>

                    @foreach ($jobs as $job)
                        <tr>
                            <td>
                                <img src="{{ asset('img/ud.jpeg') }}" alt="profile_image" width="80">
                            </td>
                            <td>
                                <i class="fas fa-crosshairs"></i>
                                {{ $job->position }}
                                <br>
                                <i class="fas fa-clock"></i>
                                ({{ $job->type }})
                            </td>
                            <td>
                                <i class="fa fa-map-marker"></i>
                                {{ $job->address }}
                            </td>
                            <td>
                                <i class="fas fa-user-clock"></i>

                                {{ $job->created_at->diffForHumans() }}
                            </td>
                            <td>
                                <a href="{{ route('jobs.show', [$job->id, $job->slug]) }}">
                                    <button class="btn btn-success btn-sm">Show</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div>
            <a href="{{ route('jobs.alljobs') }}">
                <button style="width: 100%" class="btn btn-primary btn-lg">Show All Jobs</button>
            </a>
        </div>
        <br><br>
        <h1 class="text-center">Feature Company</h1>
        <div class="container">
            <div class="row">
                @foreach ($companies as $company)
                    <div class="col-md-4">
                        <div class="card m-2" style="width: 18rem;">

                            @if (empty(auth()->user()->company->cover_photo))
                                <img src="{{ asset('img/banner.jpg') }}" alt="">
                            @else
                                <img class="card-img-top"
                                    src="{{ asset('uploads/cover_photo') }}/{{ auth()->user()->company->cover_photo }}"
                                    alt="Card image cap">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $company->cname }}</h5>
                                <p class="card-text">{{ Str::limit($company->description, 100) }}</p>
                                <a href="{{ route('company.index', [$company->id, $company->slug]) }}"
                                    class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
