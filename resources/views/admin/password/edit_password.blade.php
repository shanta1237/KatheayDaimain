@extends('admin.admin_master')

@section('admin')
    <div class="row">
        <div class="col-lg-6">
            <div class="admin_profile_info rounded m-5 bg-light p-4">
                <h3>Change Password</h3>
                <form method="POST" action="{{ route('admin.password.update') }}">
                    @csrf
                    <div class="form-group">
                        <label for="username">Current Password</label>
                        <input id="current_password" type="password" class="form-control"  name="old_password">
                    </div>
                    <div class="form-group">
                        <label for="username">New Password</label>
                        <input id="password" type="password" class="form-control"  name="password">
                    </div>
                    <div class="form-group">
                        <label for="username">Confirm Password</label>
                        <input id="password_confirmation" type="password" class="form-control"  name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
