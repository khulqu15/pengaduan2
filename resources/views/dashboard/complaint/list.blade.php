@extends('layout.dashboard')

@section('title', 'Pengaduan')

@section('content')
    <div class="container py-5">
        <div class="row py-4">
            <div class="col-md-10 offset-md-1">
                <h2>Table Pengaduan</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>User</th>
                            <th>Judul</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($complaint as $item)
                        <tr>
                            <td>
                                @if ($item->picture == null)
                                    <img src="{{ asset('img/noimg.jpg') }}" width="75px" alt="No Image">
                                @else
                                    <img src="{{ asset('img/pengaduan/'.$item->picture) }}" width="75px" alt="No Image">
                                @endif
                            </td>
                            <td scope="row">{{ $item->user->name }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                @if (Auth::user()->level == 'petugas')
                                    <form class="d-inline-block" action="{{ route('set.status.complaint', $item->id) }}" method="POST">
                                        @csrf
                                        <button class="btn {{ $item->status == 'open' ? 'btn-primary' : 'btn-light' }}" onclick="return confirm('Yakin ?')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </form>
                                @endif
                                @if (Auth::user()->level != 'petugas')
                                    <button class="btn btn-primary" onclick="window.location.href = '{{ route('show.complaint', $item->id) }}'">
                                        <i class="fas fa-comment"></i>
                                    </button>
                                @endif
                                @if (Auth::user()->level != 'user')
                                    <button class="btn btn-success" onclick="window.location.href = '{{ route('edit.complaint', $item->id) }}'">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                    <form class="d-inline-block" action="{{ route('destroy.complaint', $item->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="DELETE" name="_method">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection