@extends("layouts.main")

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Surat Masuk </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @if (auth()->user()->level == 'admin')
                <a href="input-sm" type="button" class="btn btn-gradient-primary btn-icon-text btn-sm">
                    <i class="mdi mdi mdi-plus btn-icon-prepend"></i>Tambah Surat</a>
                @endif
            </ol>
        </nav>
    </div>
    <div class="grid-margin stretch-card">
        <div class="card">
            <div class="card-body" style="overflow-x:auto;background-color: #ECE5ED;">
                <div class="table-responsive-md table-striped">
                    <table id="example1" class="table table-bordered">
                        <thead>
                            <tr class="bg-warning">
                                <th> #</th>
                                <th>No.Surat</th>
                                <th class="col-md-1"> Tanggal Surat</th>
                                <th class="col-md-1"> Tanggal Terima</th>
                                <th> No.Agenda</th>
                                <th> Pengirim</th>
                                <th> Perihal</th>
                                <th> Tujuan Disposisi</th>
                                <th> Jenis Surat </th>
                                <th class="col-md-1"> File</th>
                                <th class="col-md-1"> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $x)
                            <tr>
                                <td>{{ $x->id }}</td>
                                <td>{{ $x->noSmasuk }}</td>
                                <td>{{ $x->tglMasuk }}</td>
                                <td>{{ $x->tglTerima }}</td>
                                <td>{{ $x->no_agenda }}</td>
                                <td>{{ $x->pengirim }}</td>
                                <td>{{ $x->perihal }}</td>
                                <td><?php
                                    if ($x->disposisi == 1) {
                                        echo "Wakil Rektor I";
                                    } else if ($x->disposisi == 2) {
                                        echo "Wakil Rektor II";
                                    } else if ($x->disposisi == 3) {
                                        echo "Wak";
                                    } else if ($x->disposisi == 4) {
                                        echo "Wakil Rektor I";
                                    } else if ($x->disposisi == 5) {
                                        echo "Wakil Rektor I";
                                    } else if ($x->disposisi == 6) {
                                        echo "Wakil Rektor I";
                                    } else if ($x->disposisi == 7) {
                                        echo "Wakil Rektor I";
                                    } else if ($x->disposisi == 8) {
                                        echo "Wakil Rektor I";
                                    } else if ($x->disposisi == 9) {
                                        echo "Wakil Rektor I";
                                    } else if ($x->disposisi == 10) {
                                        echo "Wakil Rektor I";
                                    } else if ($x->disposisi == 11) {
                                        echo "Wakil Rektor I";
                                    } else if ($x->disposisi == 12) {
                                        echo "Wakil Rektor I";
                                    } else if ($x->disposisi == 13) {
                                        echo "Wakil Rektor I";
                                    } else {
                                        echo "Jawaban Anda Dipertanyakan";
                                    }
                                    ?></td>
                                <td>{{ $x->jenisSurat['keterangan'] }}</td>
                                <td>
                                    @empty($x->file)
                                    <span class="badge badge-danger">Surat Tidak ada</span>
                                    @else
                                    <span class="badge badge-success">Surat Ada</span>
                                    @endempty
                                </td>
                                <!-- <td> <img src="{{ $x->file }}" width="100px" height="auto" alt="file"></td> -->
                                <td>

                                    <a type="button" href="{{ $x->file }}" download class="btn-sm btn-inverse-info btn-rounded m-lg-1" data-toggle="tooltip" data-placement="top" title="Download File">
                                        <i class="mdi mdi-format-vertical-align-bottom"></i>
                                    </a>
                                    @if (auth()->user()->level == 'admin')
                                    <a type="button" href="/edit-sm/{{ $x->id }}" class="btn-sm btn-inverse-dark btn-rounded m-lg-1" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="mdi mdi-border-color"></i>
                                    </a>
                                    <a type="button" href="/hapus-sm/{{ $x->id }}" onclick="return confirm('Apakah anda yakin menghapus data?')" class="btn-sm btn-inverse-danger btn-rounded m-lg-1" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="mdi mdi-delete"></i>
                                    </a>
                                    @endif
                                </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Digunakan untuk alert-->
@include('sweetalert::alert')
@endsection