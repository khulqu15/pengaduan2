@extends('layout.dashboard')

@section('title', 'Pengaduan ' . $complaint->name)

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $complaint->name }}</h2>
                <div>
                    <span class="text-md">Date : {{ $complaint->created_at }}</span>
                </div>
                <div>
                    <span class="text-md">From : {{ $complaint->user->name }} - {{ $complaint->nik }}</span>
                </div>
                <img src="{{ $complaint->picture == null ? asset('img/noimg.jpg') : asset('img/pengaduan/'.$complaint->picture) }}" class="w-100" alt="{{ $complaint->name }} Image">
                <p>{{ $complaint->report }}</p>
            </div>
        </div>
    </div>
    

    <div class="container">
        <h4>Tanggapan {{ $complaint->name }}</h4>
        <form action="{{ route('store.respond') }}" method="POST">
            @csrf
            <div class="row py-3">
                <div class="col-9">
                    <input required type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <input required type="hidden" name="complaint_id" value="{{ $complaint->id }}">
                    <input required type="text" name="respond" placeholder="Beri tanggapan disini" class="form-control">
                </div>
                <div class="col-3">
                    <button type="submit" class="w-100 btn btn-warning">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        </form>
        @if ($complaint->respond != null && count($complaint->respond) != 0)
        @foreach ($complaint->respond as $item)
            <div class="my-3 rad shadow-sm p-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <h5>{{ $item->user->name }}, <span class="text-sm text-gray">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span></h5>
                            {{ $item->respond }}
                        </div>
                        <div class="col-md-3 text-right">
                            <form class="d-inline-block" action="{{ route('delete.respond', $item->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button onclick="return confirm('Yakin ?')" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @else
        <div class="alert alert-danger" role="alert">
            <strong>Tidak ada data</strong>
        </div>
        @endif
    </div>

@endsection