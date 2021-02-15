@extends('layout.app')

@section('title', 'Register')

@section('content')
<div class="container py-5">
    <div class="row py-3">
        <div class="col-md-6 offset-md-3">
            <div class="card border-light">
              <div class="card-body">
                <h4 class="card-title">Register</h4>
                <form action="{{ route('loginLogic') }}" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" type="text" class="form-control" placeholder="Your Name here" aria-describedby="helpId">
                        <small id="helpId" class="text-muted">Required</small>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" type="email" class="form-control" placeholder="Your email here" aria-describedby="helpId">
                        <small id="helpId" class="text-muted">Required</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" type="password" class="form-control" placeholder="Your password here" aria-describedby="helpId">
                        <small id="helpId" class="text-muted">Required</small>
                    </div>
                    <div class="form-group">
                        <label for="repassword">Ulangi Password</label>
                        <input type="password" name="repassword" id="repassword" type="password" class="form-control" placeholder="Your repassword here" aria-describedby="helpId">
                        <small id="helpId" class="text-muted">Required</small>
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" id="level" class="form-control" aria-describedby="helpId">
                            <option value="umum">Umum</option>
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                        </select>
                        <small id="helpId" class="text-muted">Required</small>
                    </div>
                    <button class="btn btn-primary px-5" type="submit">Login</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
