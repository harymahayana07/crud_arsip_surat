@extends("layouts.main")

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Edit Surat Keluar</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Surat Keluar</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Surat Keluar</li>
                </ol>
            </nav>
        </div>

        <div class="grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Surat Keluar</h4>
                    <p class="card-description"></p>

                    <form method="POST" action="/update-sk/{{ $data->id }}" enctype="multipart/form-data"
                        class="forms-sample">
                        {{ csrf_field() }}
                        <div class="form-group ">
                            <input type="hidden" name="id" class="form-control" id="exampleInputName1"
                                placeholder="Id Surat" value="{{ $data->idSkeluar }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Nomor Surat</label>
                            <input type="text" name="noSkeluar" class="form-control" id="exampleInputEmail3"
                                placeholder="Nomor Surat" value="{{ $data->noSkeluar }}">
                            @error('noSkeluar')
                                <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Tanggal Surat</label>
                            <input type="date" name="tglKeluar" class="form-control" id="exampleInputPassword4"
                                placeholder="Tanggal Surat" value="{{ $data->tglKeluar }}">
                            @error('tglKeluar')
                                <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCity1">Tujuan</label>
                            <input type="text" name="tujuan" class="form-control" id="exampleInputCity1"
                                placeholder="Tujuan" value="{{ $data->tujuan }}">
                            @error('tujuan')
                                <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Perihal</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="jenisSurat_id">
                                <option value="{{ $data->jenisSurat_id }}">{{ $data->jenisSurat['keterangan'] }}
                                </option>
                                @foreach ($jenis as $x)
                                    <option value="{{ $x->id }}">{{ $x->keterangan }}</option>
                                @endforeach
                            </select>
                            @error('jenisSurat_id')
                                <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>File upload</label>
                            <input type="file" name="file" class="file-upload-default">
                            <input type="hidden" name="pathFile" value="{{ $data->file }}">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="{{ $data->file }}">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-gradient-primary"
                                        type="button">Upload</button>
                                </span>
                            </div>
                            @error('file')
                                <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-gradient-primary mr-2">Edit Surat</button>
                        <a href="/view-sk" class="btn btn-light">Cancel</a>
                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection
