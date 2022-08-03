@extends("layouts.main")

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Edit Jenis Surat</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Jenis Surat</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Jenis Surat</li>
                </ol>
            </nav>
        </div>

        <div class="grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Jenis Surat</h4>
                    <p class="card-description"></p>
                    <form action="/update-jenis/{{ $data->id }}" method="POST" class="forms-sample"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" id="exampleInputName1"
                                placeholder="Id Jenis" value="{{ $data->id }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Kode Surat</label>
                            <input type="text" name="kodeSurat" class="form-control" id="exampleInputEmail3"
                                placeholder="Kode Surat" value="{{ $data->kodeSurat }}">
                            @error('kodeSurat')
                                <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" id="exampleInputPassword4"
                                placeholder="Keterangan" value="{{ $data->keterangan }}">
                            @error('keterangan')
                                <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-gradient-primary mr-2">Edit Surat</button>
                        <a href="/view-jenis" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
