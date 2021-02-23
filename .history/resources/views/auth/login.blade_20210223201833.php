@extends('layout.auth')

@section('title', 'Login')

@section('content')
<div class="container py-5">
    <div class="row py-3">
        <div class="col-md-6 offset-md-3">
            <div class="card border-light">
              <div class="card-body">
                <h4 class="card-title">Login</h4>
                <form action="{{ route('loginLogic') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" type="email" class="form-control" placeholder="Your email here" aria-describedby="helpId">
                        <small id="helpId" class="text-muted">Required</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" type="password" class="form-control" placeholder="Your email here" aria-describedby="helpId">
                        <small id="helpId" class="text-muted">Required</small>
                    </div>
                    <button class="btn btn-primary px-5" type="submit">Login</button>
                    <a href="{{ route('registerView') }}">Register</a>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
