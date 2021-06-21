@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                @if (empty(auth()->user()->profile->avater))
                    <img style="width:100%" src="{{ asset('img/ud.jpeg') }}" alt="" width="100" height="200">
                @else
                    <img style="width:100%" src="{{ asset('uploads/avater') }}/{{ auth()->user()->profile->avater }}"
                        alt="" width="100" height="200">
                @endif

                <form action="{{ route('profile.avater') }}" method="post" enctype="multipart/form-data" class="mt-5">
                    @csrf
                    <div class="card">
                        <div class="card-header">Update Avater</div>
                        <div class="card-body">
                            <input type="file" name="avater" class="form-group">
                            <button class="btn btn-primary btn-sm">Update</button>
                            @error('avater')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Update Your Information</div>
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <form action="{{ route('profile.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Address">Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" name="address"
                                    rows="3">{{ auth()->user()->profile->address }}</textarea>
                                @error('address')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" name="phone_number"
                                    class="form-control @error('phone_number') is-invalid @enderror"
                                    value="{{ auth()->user()->profile->phone_number }}">

                                @error('phone_number')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="experience">Experience</label>
                                <textarea class="form-control @error('experience') is-invalid @enderror" name="experience"
                                    rows="3">{{ auth()->user()->profile->experience }}</textarea>

                                @error('experience')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="bio">Biodata</label>
                                <textarea class="form-control @error('bio') is-invalid @enderror" name="bio"
                                    rows="3">{{ auth()->user()->profile->bio }}</textarea>

                                @error('bio')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">User Details</div>
                    <div class="card-body">
                        <p><b>Name: </b>{{ auth()->user()->name }}</p>
                        <p><b>Email: </b>{{ auth()->user()->email }}</p>
                        <p><b>Address: </b>{{ auth()->user()->profile->address }}</p>
                        <p><b>Phone: </b>{{ auth()->user()->profile->phone_number }}</p>
                        <p><b>Experience: </b>{{ auth()->user()->profile->experience }}</p>
                        <p><b>BioData: </b>{{ auth()->user()->profile->bio }}</p>
                        <p><b>Member Since: </b>{{ date('F d, Y', strtotime(auth()->user()->created_at)) }}</p>

                        @if (!empty(auth()->user()->profile->cover_letter))
                            <b>Cover Letter: </b>
                            <a href="{{ Storage::url(auth()->user()->profile->cover_letter) }}">
                                <button class="btn btn-danger btn-sm">Download Cover Letter</button>
                            </a><br>
                        @else
                            <p>
                                <b>Cover Letter: </b>
                                Please Upload Cover Letter
                            </p>
                        @endif

                        @if (!empty(auth()->user()->profile->resume))
                            <br><b>Resume : </>
                                <a href="{{ Storage::url(auth()->user()->profile->resume) }}">
                                    <button class="btn btn-danger btn-sm">Download Resume</button>
                                </a>
                            @else
                                <p>
                                    <b>Resume : </b>
                                    Please Upload Resume
                                </p>
                        @endif


                    </div>
                </div>

                <form action="{{ route('profile.coverletter') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">Update Cover Letter</div>
                        <div class="card-body">
                            <input type="file" name="cover_letter"
                                class="form-group @error('cover_letter') is-invalid @enderror">
                            @error('cover_letter')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <button class="btn btn-primary btn-sm">Update</button>
                        </div>
                    </div>
                </form>

                <form action="{{ route('profile.resume') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">Update Resume</div>
                        <div class="card-body">
                            <input type="file" name="resume" class="form-group @error('resume') is-invalid @enderror">
                            @error('resume')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <button class="btn btn-primary btn-sm">Update</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
