@extends('layout.dashboard')

@section('title', 'User')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="" method="GET">
                    <div class="row">
                        <div class="col-md-8 offset-md-4">
                            <div class="row">
                                <div class="col-5 pb-3">
                                    <div class="form-group">
                                        <input type="text" value="{{ request()->get('name') != '' ? request()->get('name') : '' }}" class="form-control" name="name" placeholder="Cari berdasarkan nama">
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <select name="level" class="form-control">
                                            <option {{ request()->get('level') == 'null' && request()->get('level') ? 'selected' : '' }} value="null">Pilih Level</option>
                                            <option {{ request()->get('level') == 'admin' ? 'selected' : '' }} value="admin">Admin</option>
                                            <option {{ request()->get('level') == 'petugas' ? 'selected' : '' }} value="petugas">Petugas</option>
                                            <option {{ request()->get('level') == 'user' ? 'selected' : '' }} value="user">User</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <button class="btn btn-warning w-100">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($user as $item)
                            <tr>
                                <td scope="row">
                                    <div class="img-avatar-dashboard d-inline-block rounded-circle img-circle">
                                        @if ($item->avatar == null)
                                            <img src="{{ asset('img/user/avatar.svg') }}" alt="Img">
                                        @else
                                            <img src="{{ asset('img/user/'.$item->avatar) }}" alt="Img">
                                        @endif
                                    </div>
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ ucwords($item->level) }}</td>
                                <td>
                                    <button onclick="window.location.href = '{{ route('edit.user', $item->id) }}'" class="btn btn-warning rounded {{ $item->level != 'user' ? 'disabled' : '' }}" {{ $item->level != 'user' ? 'disabled' : '' }}>
                                        <i class="fas fa-pen"></i>
                                    </button>
                                    <form action="{{ route('delete.user', $item->id) }}" class="d-inline-block" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger rounded {{ $item->level != 'user' ? 'disabled' : '' }}" {{ $item->level != 'user' ? 'disabled' : '' }}>
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection