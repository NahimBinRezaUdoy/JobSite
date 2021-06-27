@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>All Recent Jobs</h1><br>

            {{-- Search --}}

            <form action="{{ route('jobs.alljobs') }}" method="get">
                @csrf
                <div class="form-inline">
                    <div class="form-group mx-1 my-2">
                        <br><label for="keywords">Keywords &nbsp;</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                    </div>
                    <div class="form-group mx-1 my-2">
                        <label for="type">Employment Type &nbsp;</label>
                        <select name="type" class="form-control" value="{{ old('type') }}">
                            <option>Select Type</option>
                            <option value="fullTime">Full Time</option>
                            <option value="partTime">Part Time</option>
                            <option value="casual">Casual</option>
                        </select>
                    </div>
                    <div class="form-group mx-1 my-2">
                        <label for="category">Category &nbsp;</label>
                        <select name="category_id" class="form-control" value="old('category_id')">
                            <option>Select Category</option>
                            @foreach (App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mx-1 my-2">
                        <label for="address">Address &nbsp;</label>
                        <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                    </div>
                    <div class="form-group mx-1 my-2">
                        <button class="btn btn-outline-dark">Search</button>
                    </div>
                </div>
            </form>

            {{-- alljobs --}}

            <table class="table">
                <thead>
                    <th>Image</th>
                    <th>Title</th>
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
                                <i class="fa fa-map-signs" aria-hidden="true"></i>
                                {{ $job->title }}
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
                                    <button type="submit" class="btn btn-success btn-sm">View</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $jobs->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
