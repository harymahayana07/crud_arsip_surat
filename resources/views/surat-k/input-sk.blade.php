@extends("layouts.main")

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Tambah Surat Keluar</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Surat Keluar</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Surat Keluar</li>
                </ol>
            </nav>
        </div>

        <div class="grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Surat Keluar</h4>
                    <p class="card-description"></p>

                    <form class="forms-sample" method="POST" action="/save-sk" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail3">Nomor Surat</label>
                            <input type="text" name="noSkeluar" class="form-control" id="exampleInputEmail3"
                                placeholder="Nomor Surat" value="{{ old('noSkeluar') }}">
                            @error('noSkeluar')
                                <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Tanggal Surat</label>
                            <input type="date" name="tglKeluar" class="form-control" id="exampleInputPassword4"
                                placeholder="Tanggal Surat" value="{{ old('tglKeluar') }}">
                            @error('tglKeluar')
                                <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCity1">Tujuan</label>
                            <input type="text" name="tujuan" class="form-control" id="exampleInputCity1"
                                placeholder="Tujuan" value="{{ old('tujuan') }}">
                            @error('tujuan')
                                <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Perihal</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="jenisSurat_id"
                                value="{{ old('jenisSurat_id') }}">
                                <option selected disabled>Select one</option>
                                @foreach ($data as $x)
                                    <option value="{{ $x->id }}">{{ $x->keterangan }}</option>
                                @endforeach
                            </select>
                            @error('jenisSurat_id')
                                <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>File upload</label>
                            <input type="file" name="file" class="file-upload-default" value="{{ old('file') }}">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload File">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-gradient-primary"
                                        type="button">Upload</button>
                                </span>
                            </div>
                            @error('file')
                                <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-gradient-primary mr-2">Tambah Surat</button>
                        <a href="view-sk" class="btn btn-light">Cancel</a>
                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection
