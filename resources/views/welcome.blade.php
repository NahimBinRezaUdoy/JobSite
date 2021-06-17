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
                                    <button class="btn btn-success btn-sm">Apply</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
