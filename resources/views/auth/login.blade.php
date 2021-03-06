@extends('layout.auth')

@section('title', 'Login')

@section('content')
<div class="container-fluid">
    <div class="container py-5">
        <div class="row py-3">
            <div class="col-md-6 offset-md-3">
                <div class="card border-light shadow-sm">
                <div class="card-body p-4">
                    <h3 class="card-title text-warning">Login Adu.co</h3>
                    <form action="{{ route('loginLogic') }}" method="POST">
                        @csrf
                        <div class="form-group my-3">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" type="email" class="form-control" placeholder="Your email here" aria-describedby="helpId">
                            <!-- <small id="helpId" class="text-muted">Required</small> -->
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" type="password" class="form-control" placeholder="Your email here" aria-describedby="helpId">
                            <!-- <small id="helpId" class="text-muted">Required</small> -->
                        </div>
                        <div class="mt-4">
                            <button class="btn btn-warning px-5" type="submit">Login</button>
                            <a href="{{ route('registerView') }}" class="mx-2 text-dark">Register</a>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
