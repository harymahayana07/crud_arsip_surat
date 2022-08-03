@extends("layouts.main")

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Edit User</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Data User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                </ol>
            </nav>
        </div>

        <div class="grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit User</h4>
                    <p class="card-description"></p>

                    <form method="POST" action="/update-user/{{ $data->id }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="form-group">
                            <label for="exampleInputCity1">Nama Lengkap</label>
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                id="exampleInputCity1" placeholder="Nama Lengkap" value="{{ $data->name }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCity2">Email</label>
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                id="exampleInputCity2" placeholder="Email" value="{{ $data->email }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Level User</label>
                            <select class="form-control  @error('level') is-invalid @enderror"
                                id="exampleFormControlSelect2" name="level">
                                <option value="{{ $data->level }}">{{ $data->level }}</option>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                            @error('level')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>File upload</label>
                            <input type="file" name="file" class="file-upload-default  @error('file') is-invalid @enderror">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="{{ $data->file }}">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-gradient-primary"
                                        type="button">Upload</button>
                                </span>
                            </div>
                            @empty($data->file)

                            @else
                                <img src="{{ url('/' . $data->file) }}" width="100px" height="auto" alt="gambar"
                                    class="mt-3">
                            @endempty

                            @error('file')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-gradient-primary mr-2">Edit User</button>
                        <a href="/view-user" class="btn btn-light">Cancel</a>
                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection
