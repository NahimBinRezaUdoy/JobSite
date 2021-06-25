@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="company-profile col-md-12">
                @if (empty(auth()->user()->company->cover_photo))
                    <img src="{{ asset('img/banner.jpg') }}" alt="" width="1100px" height="300">
                @else
                    <img src="{{ asset('uploads/cover_photo') }}/{{ auth()->user()->company->cover_photo }}" alt=""
                        width="1100px" height="300">
                @endif
            </div>
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-header">Company Details</div>
                    <div class="card-body">

                        <h1>{{ $company->cname }}</h1>
                        <p>{{ $company->description }}</p>
                        <p><b>Slogan</b>: {{ $company->slogan }}</p>
                        <p><b>Address</b>: {{ $company->address }}</p>
                        <p><b>Phone</b>: {{ $company->phone }}</p>
                        <p><b>Website</b>: {{ $company->website }}</p>
                    </div>
                </div>

            </div>

            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-header">Available Jobs</div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                @foreach ($company->jobs as $job)
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
                                                <button class="btn btn-success btn-sm">Apply</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>
@endsection
