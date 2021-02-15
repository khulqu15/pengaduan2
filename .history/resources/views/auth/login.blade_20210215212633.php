@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container py-5">
    <div class="row py-3">
        <div class="col-md-6 offset-md-3">
            <div class="card border-light">
              <div class="card-body">
                <h4 class="card-title">Login</h4>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" name="email" id="email" class="form-control" placeholder="Your email here" aria-describedby="helpId">
                  <small id="helpId" class="text-muted">Required</small>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
