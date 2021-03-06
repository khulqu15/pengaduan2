@extends('layout.auth')

@section('title', 'Register')

@section('content')
<div class="container py-5">
    <div class="row py-3">
        <div class="col-md-6 offset-md-3">
            <div class="card border-light shadow-sm rounded">
              <div class="card-body p-4">
                <h3 class="card-title text-warning">Register Adu.co</h3>
                <form action="{{ route('registerLogic') }}" method="POST">
                    @csrf
                    <div class="form-group my-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" type="text" class="form-control" placeholder="Your Name here" aria-describedby="helpId">
                        <!-- <small id="helpId" class="text-muted">Required</small> -->
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" type="email" class="form-control" placeholder="Your email here" aria-describedby="helpId">
                        <!-- <small id="helpId" class="text-muted">Required</small> -->
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" type="password" class="form-control" placeholder="Your password here" aria-describedby="helpId">
                        <!-- <small id="helpId" class="text-muted">Required</small> -->
                    </div>
                    <div class="form-group mb-3">
                        <label for="repassword">Ulangi Password</label>
                        <input type="password" name="repassword" id="repassword" type="password" class="form-control" placeholder="Your repassword here" aria-describedby="helpId">
                        <!-- <small id="helpId" class="text-muted">Required</small> -->
                    </div>
                    <div class="form-group mb-3">
                        <label for="level">Level</label>
                        <select name="level" id="level" class="form-control" aria-describedby="helpId">
                            <option value="umum">Umum</option>
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                        </select>
                        <!-- <small id="helpId" class="text-muted">Required</small> -->
                    </div>
                    <button class="btn btn-warning px-5" type="submit">Register</button>
                    <a href="{{ route('loginView') }}" class="text-dark mx-3">Login</a>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
