@extends('layout.app')

@section('title', 'List Pengaduan')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 py-3">
                <h1>{{ $complaint->user->name }}</h1> {{ ' in ' . \Carbon\Carbon::parse($complaint->created_at)->diffForHumans() }}
                <div class="text-center">
                    <img src="{{ $complaint->picture == null ? asset('img/noimg.jpg') : asset('img/pengaduan/'.$complaint->picture) }}" alt="{{ $complaint->name }}" class="w-100">
                </div>
                <div class="my-3">
                    <h3>Tanggapan</h3>
                </div>
                @if ($complaint->respond != null && count($complaint->respond) != 0)
                @foreach ($complaint->respond as $item)
                    <div class="my-3 rad shadow-sm p-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>{{ $item->user->name }}, <span class="text-sm text-gray">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span></h5>
                                    {{ $item->respond }}
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
        </div>
    </div>
@endsection