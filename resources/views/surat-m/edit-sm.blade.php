@extends("layouts.main")

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Edit Surat Masuk</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a>Surat Masuk</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Surat Masuk</li>
            </ol>
        </nav>
    </div>

    <div class="grid-margin stretch-card">
        <div class="card">
            <div class="card-body" style="background-color: #ECE5ED;">
                <p class="card-description"></p>

                <form method="POST" action="/update-sm/{{ $data->id }}" enctype="multipart/form-data" class="forms-sample">
                    {{ csrf_field() }}
                    <div class="form-group ">
                        <input type="hidden" name="id" class="form-control" id="exampleInputName1" placeholder="Id Surat" value="{{ $data->idSmasuk }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nomor Surat</label>
                        <input type="text" name="noSmasuk" class="form-control" id="exampleInputEmail3" placeholder="Nomor Surat" value="{{ $data->noSmasuk }}">
                        @error('noSmasuk')
                        <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Tanggal Surat</label>
                        <input type="date" name="tglMasuk" class="form-control" id="exampleInputPassword4" placeholder="Tanggal Surat" value="{{ $data->tglMasuk }}">
                        @error('tglMasuk')
                        <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword19">Tanggal Terima</label>
                        <input type="date" name="tglTerima" class="form-control" id="exampleInputPassword19" placeholder="Tanggal Terima" value="{{ $data->tglTerima }}">
                        @error('tglTerima')
                        <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity100">No. Agenda</label>
                        <input type="text" name="no_agenda" class="form-control" id="exampleInputCity100" placeholder="no_agenda" value="{{ $data->no_agenda }}">
                        @error('no_agenda')
                        <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity1">Pengirim</label>
                        <input type="text" name="pengirim" class="form-control" id="exampleInputCity1" placeholder="Pengirim" value="{{ $data->pengirim }}">
                        @error('pengirim')
                        <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity18">Perihal</label>
                        <input type="text" name="perihal" class="form-control" id="exampleInputCity18" placeholder="Perihal" value="{{ $data->perihal }}">
                        @error('perihal')
                        <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                        @enderror
                    </div>
                    <!-- rabu -->
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Tujuan Disposisi</label>
                        <select class="form-control" id="exampleFormControlSelect2" name="disposisi">
                            <option value="1" <?php if ($data->pengirim == 1) {
                                                    echo 'selected';
                                                } ?>>Wakil Rektor I</option>
                            <option value="2" <?php if ($data->pengirim == 2) {
                                                    echo 'selected';
                                                } ?>>Wakil Rektor II</option>
                            <option value="3" <?php if ($data->pengirim == 3) {
                                                    echo 'selected';
                                                } ?>>Kepala Biro</option>
                            <option value="4" <?php if ($data->pengirim == 4) {
                                                    echo 'selected';
                                                } ?>>Kabag</option>
                            <option value="5" <?php if ($data->pengirim == 5) {
                                                    echo 'selected';
                                                } ?>>Kasubbag</option>
                            <option value="6" <?php if ($data->pengirim == 6) {
                                                    echo 'selected';
                                                } ?>>Direktur</option>
                            <option value="7" <?php if ($data->pengirim == 7) {
                                                    echo 'selected';
                                                } ?>>Dekan Fakultas</option>
                            <option value="8" <?php if ($data->pengirim == 8) {
                                                    echo 'selected';
                                                } ?>>Ketua Jurusan</option>
                            <option value="9" <?php if ($data->pengirim == 9) {
                                                    echo 'selected';
                                                } ?>>Koordinator Prodi</option>
                            <option value="10" <?php if ($data->pengirim == 10) {
                                                    echo 'selected';
                                                } ?>>Ketua Lembaga</option>
                            <option value="11" <?php if ($data->pengirim == 11) {
                                                    echo 'selected';
                                                } ?>>Kepala Unit</option>
                            <option value="12" <?php if ($data->pengirim == 12) {
                                                    echo 'selected';
                                                } ?>>Kepala Lab</option>
                            <option value="13" <?php if ($data->pengirim == 13) {
                                                    echo 'selected';
                                                } ?>>Lainnya...</option>
                        </select>
                        @error('disposisi')
                        <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Jenis Surat</label>
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
                            <input type="text" class="form-control file-upload-info" disabled placeholder="{{ $data->file }}" style="background-color: #FFFEFF;">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-gradient-primary" type="button">Pilih File</button>
                            </span>
                        </div>
                        @error('file')
                        <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                        @enderror
                        <!-- <img src="{{ url('/' . $data->file) }}" width="100px" height="auto" alt="gambar"
                                                        class="mt-3"> -->
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">Edit Surat</button>
                    <a href="/view-sm" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection