@extends('layout.dashboard')

@section('title', Request::route()->getName() == 'edit.user' ? "Edit $user->name" : "Tambah User")

@section('content')
    <div class="container pt-5 pb-3">
        <div class="row">
            <form enctype="multipart/form-data" action="{{ Request::route()->getName() == 'edit.user' ? route('update.user', $user->id) : route('store.user') }}" method="post">
                <div class="col-md-8 offset-md-2">
                    <h4>{{ Request::route()->getName() == 'edit.user' ? "Edit $user->name" : "Tambah User" }}</h4>
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" required class="form-control" 
                            name="name" id="name" aria-describedby="name-tooltip" placeholder="Masukkan Nama"
                            value="{{ Request::route()->getName() == 'edit.user' ? $user->name : '' }}">
                        <small id="name-tooltip" class="form-text text-muted">Required</small>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" required class="form-control" 
                            name="email" id="email" aria-describedby="email-tooltip" placeholder="Masukkan Email"
                            value="{{ Request::route()->getName() == 'edit.user' ? $user->email : '' }}">
                        <small id="email-tooltip" class="form-text text-muted">Required</small>
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" required class="form-control" id="level" aria-describedby="level-tooltip">
                            <option value="">Pilih Level</option>
                            <option {{ Request::route()->getName() == 'edit.user' && $user->level == 'admin' ? 'selected' : '' }} value="admin">Admin</option>
                            <option {{ Request::route()->getName() == 'edit.user' && $user->level == 'petugas' ? 'selected' : '' }} value="petugas">Petugas</option>
                            <option {{ Request::route()->getName() == 'edit.user' && $user->level == 'user' ? 'selected' : '' }} value="user">User</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="avatar">Avatar</label>
                      <input {{ Request::route()->getName() == 'store.user' ? 'required' : '' }} 
                        type="file" name="avatar" id="avatar" accept=".jpg, .png, .jpeg" class="form-control" aria-describedby="helpId">
                      <small id="helpId" class="text-muted">{{ Request::route()->getName() == 'store.user' ? 'Required' : 'Optional' }} </small>
                    </div>
                    <button class="btn btn-warning px-5 mt-2">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection