@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="company-profile">
                <img src="{{ asset('img/banner1.jpg') }}" alt="" width="100%">
            </div>
            <div class="company-desc"><br>
                <img src="{{ asset('img/ud.jpeg') }}" alt="" width="100">
                <h1>{{ $company->cname }}</h1>
                <p>{{ $company->description }}</p>
                <p><b>Slogan</b>: {{ $company->slogan }}</p>
                <p><b>Address</b>: {{ $company->address }}</p>
                <p><b>Phone</b>: {{ $company->phone }}</p>
                <p><b>Website</b>: {{ $company->website }}</p>


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
@endsection
