@extends(Auth::user()->level == 'user' ? 'layout.app' : 'layout.dashboard')

@section('title', Auth::user()->name)

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8">
                <div class="avatar-profile d-inline-block mx-3">
                    <img src="{{ $user->avatar == null ? asset('img/user/avatar.svg') : asset('img/user/'.$user->avatar) }}" class="w-100 h-100 object-fit" alt="">
                </div>
                <div class="d-inline-block position-relative" style="top: -10px">
                    <h1>{{ Auth::user()->name }}</h1>
                    <p>{{ Auth::user()->email }}</p>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-pen"></i>
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-left">
                                <form method="POST" enctype="multipart/form-data" action="{{ route('profile.update.user') }}">
                                    @csrf
                                    <input type="hidden" name="_method" value="PATCH">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input required value="{{ $user->name }}" type="text" name="name" id="name" class="form-control" placeholder="Your Name Here" aria-describedby="nameId">
                                        <small id="nameId" class="text-muted">Required</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Email</label>
                                        <input required value="{{ $user->email }}" type="email" name="email" id="email" class="form-control" placeholder="Your Email Here" aria-describedby="emailId">
                                        <small id="emailId" class="text-muted">Required</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="avatar">Avatar</label>
                                        <input type="file" accept=".jpg, .jpeg, .png" name="avatar" id="avatar" class="form-control" placeholder="Your avatar Here" aria-describedby="avatarId">
                                        <small id="avatarId" class="text-muted">Optional</small>
                                    </div>
                                    <button class="btn btn-warning px-5 mt-4">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (Auth::user()->level == 'user')
    <div class="container">
        <h2>Pengaduan</h2>
        <div class="row">
            <div class="col-12">
            @if ($user->complaint != null && count($user->complaint) != 0)
                @foreach ($user->complaint as $item)
                    <div class="my-3 rad shadow-sm p-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9">
                                    <h5>{{ $user->name }}, <span class="text-sm text-gray">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span></h5>
                                    <p class="mb-0">{{ substr($item->report, 0, 20) }}{{ strlen($item->report) > 20 ? '...' : ''}}</p>
                                </div>
                                <div class="col-md-3 text-right">
                                    <form class="d-inline-block" action="{{ route('destroy.complaint', $item->id) }}" method="POST">
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
        </div>
    </div>
    @else
    <div class="container">
        <h2>Tanggapan</h2>
        <div class="row">
            <div class="col-12">
            @if ($user->respond != null && count($user->respond) != 0)
                @foreach ($user->respond as $item)
                    <div class="my-3 rad shadow-sm p-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9">
                                    <h5>{{ $user->name }}, <span class="text-sm text-gray">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span></h5>
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
        </div>
    </div>
    @endif

@endsection