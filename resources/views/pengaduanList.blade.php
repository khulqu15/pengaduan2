@extends('layout.app')

@section('title', 'List Pengaduan')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($complaint != null && count($complaint) != 0) 
                    @foreach ($complaint as $item)
                        <div class="w-100 p-3 my-2 rounded-3 bg-white shadow-sm">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-0"><b>{{ $item->user->name }}</b> <span class="text-sm">in {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-0">{{ substr($item->report, 0, 20) }}{{ strlen($item->report) > 20 ? '...' : ''}}</p>
                                    <div class="text-right">
                                        <button class="btn btn-warning px-5 btn-sm" onclick="window.location.href = '{{ route('show.user.complaint', $item->id) }}'">Selengkapnya</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection