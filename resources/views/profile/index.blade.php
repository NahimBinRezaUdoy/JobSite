@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img style="border-radius:40%" src="{{ asset('img/ud.jpeg') }}" alt="" width="100">
                <div class="card">
                    <div class="card-header">Update Avater</div>
                    <div class="card-body">
                        <input type="file" name="avater" class="form-group">
                        <button class="btn btn-primary btn-sm">Update</button>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Update Your Information</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Address">Address</label>
                            <textarea class="form-control" name="address" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="experience">Experience</label>
                            <textarea class="form-control" name="experience" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="dio">Biodata</label>
                            <textarea class="form-control" name="dio" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

                <div class="card">
                    <div class="card-header">User Description</div>
                    <div class="card-body">User Details</div>
                </div>

                <div class="card">
                    <div class="card-header">Update Cover Letter</div>
                    <div class="card-body">
                        <input type="file" name="cover_letter" class="form-group">
                        <button class="btn btn-primary btn-sm">Update</button>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Update Resume</div>
                    <div class="card-body">
                        <input type="file" name="resume" class="form-group">
                        <button class="btn btn-primary btn-sm">Update</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
