@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @foreach ($applicants as $applicant)
                    <div class="card">
                        <div class="card-header">{{ $applicant->title }}</div>


                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Experience</th>
                                    <th>Resume</th>
                                    <th>Cover Letter</th>
                                </thead>

                                @foreach ($applicant->users as $user)
                                    <tbody>
                                        <tr>
                                            <td>
                                                @if (empty($user->profile->avater))
                                                    <img src="{{ asset('img/ud.jpeg') }}" alt="" width="50" height="50">
                                                @else
                                                    <img src="{{ asset('uploads/avater') }}/{{ $user->profile->avater }}"
                                                        alt="" width="50" height="50">
                                                @endif
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->profile->address }}</td>
                                            <td>{{ $user->profile->phone_number }}</td>
                                            <td>{{ $user->profile->experience }}</td>
                                            <td>
                                                @if (!empty($user->profile->resume))

                                                    <a href="{{ Storage::url($user->profile->resume) }}">
                                                        <button class="btn btn-danger btn-sm">Download Resume</button>
                                                    </a>
                                                @else
                                                    <p>

                                                        Please Upload Resume
                                                    </p>
                                                @endif

                                            </td>

                                            <td>
                                                @if (!empty($user->profile->cover_letter))

                                                    <a href="{{ Storage::url($user->profile->cover_letter) }}">
                                                        <button class="btn btn-danger btn-sm">Download CoverLetter</button>
                                                    </a><br>
                                                @else
                                                    <p>

                                                        Please Upload Cover Letter
                                                    </p>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
