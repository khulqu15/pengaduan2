@extends('layout.dashboard')

@section('title', request()->route()->getName() == 'edit.complaint' ? 'Edit Complaint '. $complaint->name : 'Tambah Complaint')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h3>{{ request()->route()->getName() == 'edit.complaint' ? 'Edit Complaint '. $complaint->name : 'Tambah Complaint Baru' }}</h3>
                <form enctype="multipart/form-data" method="POST" action="{{ request()->route()->getName() == 'edit.complaint' ? route('update.complaint', $complaint->id) : route('store.complaint') }}">
                    @csrf
                    @if (request()->route()->getName() == 'edit.complaint')
                        <input type="hidden" name="_method" value="PATCH">
                    @endif
                    <div class="form-group">
                        <label for="nik">Nik</label>
                        <input type="text" required value="{{ request()->route()->getName() == 'edit.complaint' ? $complaint->nik : '' }}"
                        name="nik" id="nik" class="form-control" placeholder="NIK" aria-describedby="nikId">
                        <small id="nikId" class="text-muted">Required</small>
                    </div>
                    <div class="form-group">
                        <label for="name">Judul</label>
                        <input type="text" required value="{{ request()->route()->getName() == 'edit.complaint' ? $complaint->name : '' }}"
                        name="name" id="name" class="form-control" placeholder="Judul Permasalahan" aria-describedby="nameId">
                        <small id="nameId" class="text-muted">Required</small>
                    </div>
                    <div class="form-group">
                        <label for="report">Isi Permasalahan</label>
                        <textarea name="report" required id="report" class="form-control" placeholder="Isi Permasalahan" rows="10">{{ request()->route()->getName() == 'edit.complaint' ? $complaint->report : '' }}</textarea>
                        <small id="nameId" class="text-muted">Required</small>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="picture">Lampiran Gambar</label>
                                <input type="file" accept=".jpg, .png, .jpeg" name="picture" id="picture" class="form-control" aria-describedby="pictureId">
                                <small id="pictureId" class="text-muted">Optional</small>
                            </div>
                        </div>
                        <div class="col-6">
                            @if(request()->route()->getName() == 'edit.complaint')
                                @if ($complaint->picture != null)
                                    <img src="{{ asset('img/pengaduan/'.$complaint->picture) }}" id="preview" class="w-100" alt="No Image">                                    
                                @else
                                    <img src="{{ asset('img/noimg.jpg') }}" id="preview" class="w-100" alt="No Image">                                    
                                @endif
                            @else
                                <img src="{{ asset('img/noimg.jpg') }}" id="preview" class="w-100" alt="No Image">                                    
                            @endif
                        </div>
                    </div>
                    <button class="btn btn-warning px-5">Save</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function readURL(input) {
            if(input.files && input.files[0]) {
                var reader = new FileReader()
                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0])
            }
        }
        $('#picture').change(function() {
            readURL(this)
        })
    </script>
@endsection