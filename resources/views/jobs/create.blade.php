@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center"><b>{{ __('Post Your Jobs Here') }}</b></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('jobs.store') }}">
                            @csrf

                            @if (Session::has('message'))
                                <div class="alert alert-success">
                                    {{ Session::get('message') }}
                                </div>
                            @endif

                            <div class="form-group row">
                                <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-8">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="roles" class="col-md-2 col-form-label text-md-right">{{ __('Roles') }}</label>

                                <div class="col-md-8">
                                    <input id="roles" type="text" class="form-control @error('roles') is-invalid @enderror"
                                        name="roles" value="{{ old('roles') }}" required autocomplete="roles">

                                    @error('roles')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="position"
                                    class="col-md-2 col-form-label text-md-right">{{ __('Position') }}</label>

                                <div class="col-md-8">
                                    <input id="position" type="text"
                                        class="form-control @error('position') is-invalid @enderror" name="position"
                                        value="{{ old('position') }}" required autocomplete="position">

                                    @error('position')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address"
                                    class="col-md-2 col-form-label text-md-right">{{ __('Address') }}</label>
                                <div class="col-md-8">
                                    <textarea class="form-control @error('address') is-invalid @enderror" name="address"
                                        rows="2" required></textarea>

                                    @error('address')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description"
                                    class="col-md-2 col-form-label text-md-right">{{ __('Description') }}</label>
                                <div class="col-md-8">
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                        name="description" rows="2" required></textarea>

                                    @error('description')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="category"
                                    class="col-md-2 col-form-label text-md-right">{{ __('Category') }}</label>
                                <div class="col-md-8">
                                    <select name="category" id="category" class="form-control">
                                        @foreach (App\Models\Category::all() as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="type" class="col-md-2 col-form-label text-md-right">{{ __('Type') }}</label>
                                <div class="col-md-8">
                                    <select name="type" id="type" class="form-control">
                                        <option value="fulltime">Full time</option>
                                        <option value="parttime">Part time</option>
                                        <option value="casual">Casual</option>
                                    </select>
                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status"
                                    class="col-md-2 col-form-label text-md-right">{{ __('Status') }}</label>
                                <div class="col-md-8">
                                    <select name="status" id="status" class="form-control">
                                        <option value="live">Live</option>
                                        <option value="draft">Draft</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="deadline"
                                    class="col-md-2 col-form-label text-md-right">{{ __('Apply Deadline') }}</label>

                                <div class="col-md-8">
                                    <input id="deadline" type="date"
                                        class="form-control @error('deadline') is-invalid @enderror" name="deadline"
                                        value="{{ old('deadline') }}" required autocomplete="deadline">

                                    @error('deadline')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-2">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
