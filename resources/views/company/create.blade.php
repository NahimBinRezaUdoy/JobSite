@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                @if (empty(auth()->user()->company->logo))
                    <img style="width:100%" src="{{ asset('img/ud.jpeg') }}" alt="" width="100" height="200">
                @else
                    <img style="width:100%" src="{{ asset('uploads/logo') }}/{{ auth()->user()->company->logo }}" alt=""
                        width="100" height="200">
                @endif

                <form action="{{ route('company.logo') }}" method="post" enctype="multipart/form-data" class="mt-5">
                    @csrf
                    <div class="card">
                        <div class="card-header">Update logo</div>
                        <div class="card-body">
                            <input type="file" name="logo" class="form-group @error('logo') is-invalid @enderror">
                            <button class="btn btn-primary btn-sm">Update</button>
                            @error('logo')
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
                    <form action="{{ route('company.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Address">Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" name="address"
                                    rows="3">{{ auth()->user()->company->address }}</textarea>
                                @error('address')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ auth()->user()->company->phone }}">

                                @error('phone')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" name="website"
                                    class="form-control @error('website') is-invalid @enderror"
                                    value="{{ auth()->user()->company->website }}">

                                @error('website')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="slogan">Slogan</label>
                                <input type="text" name="slogan" class="form-control @error('slogan') is-invalid @enderror"
                                    value="{{ auth()->user()->company->slogan }}">

                                @error('slogan')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                    rows="3">{{ auth()->user()->company->description }}</textarea>

                                @error('description')
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
                    <div class="card-header">Company Details</div>
                    <div class="card-body">
                        <p><b>Company Name: </b>{{ auth()->user()->company->cname }}</p>
                        <p><b>Company Email: </b>{{ auth()->user()->email }}</p>
                        <p><b>Address: </b>{{ auth()->user()->company->address }}</p>
                        <p><b>Phone: </b>{{ auth()->user()->company->phone }}</p>
                        <p><b>Website: </b>{{ auth()->user()->company->website }}</p>
                        <p><b>Slogan: </b>{{ auth()->user()->company->slogan }}</p>
                        <p><b>Description: </b>{{ auth()->user()->company->description }}</p>
                        <p><b>Member Since: </b>{{ date('F d, Y', strtotime(auth()->user()->created_at)) }}</p>

                        @if (!empty(auth()->user()->company->cover_photo))
                            <b>Cover Letter: </b>
                            <a href="{{ Storage::url(auth()->user()->company->cover_photo) }}">
                                <button class="btn btn-danger btn-sm">Download Cover Letter</button>
                            </a><br>
                        @else
                            <p>
                                <b>Cover Letter: </b>
                                Please Upload Cover Letter
                            </p>
                        @endif

                    </div>
                </div>

                <form action="{{ route('company.cover_photo') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">Update Cover Photo</div>
                        <div class="card-body">
                            <input type="file" name="cover_photo"
                                class="form-group @error('cover_photo') is-invalid @enderror">
                            @error('cover_photo')
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
