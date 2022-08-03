@extends("layouts.main")

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Tambah Jenis Surat</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Jenis Surat</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Jenis Surat</li>
                </ol>
            </nav>
        </div>

        <div class="grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Jenis Surat</h4>
                    <p class="card-description"></p>
                    <form action="/save-jenis" method="POST" class="forms-sample" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail3">Kode Jenis Surat</label>
                            <input name="kodeSurat" type="text"
                                class="form-control @error('kodeSurat') is-invalid @enderror" id="exampleInputEmail3"
                                placeholder="Kode Surat" value="{{ old('kodeSurat') }}">
                            @error('kodeSurat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Keterangan</label>
                            <input name="keterangan" type="text"
                                class="form-control @error('keterangan') is-invalid @enderror" id="exampleInputPassword4"
                                placeholder="Keterangan" value="{{ old('keterangan') }}">
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-gradient-primary mr-2">Tambah
                            Surat</button>
                        <a href="/view-jenis" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
