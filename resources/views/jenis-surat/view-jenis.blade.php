@extends("layouts.main")

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Jenis Surat</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @if (auth()->user()->level == 'admin')
                        <a href="input-jenis" type="button" class="btn btn-gradient-primary btn-icon-text btn-sm">
                            <i class="mdi mdi mdi-plus btn-icon-prepend"></i>Tambah Surat</a>
                    @endif
                </ol>
            </nav>
        </div>
        <div class="grid-margin stretch-card">
            <div class="card">
                <div class="card-body" style="overflow-x:auto;">
                    <h4 class="card-title">Jenis Surat</h4>
                    <div class="table-responsive-md">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-md-1"> # </th>
                                    <th> Kode Surat </th>
                                    <th> Keterangan </th>
                                    <!-- <th> Jumlah Surat </th> -->
                                    @if (auth()->user()->level == 'admin')
                                        <th class="col-md-1"> Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $x)
                                    <tr>
                                        <td>{{ $x->id }}</td>
                                        <td>{{ $x->kodeSurat }}</td>
                                        <td>{{ $x->keterangan }}</td>
                                        @if (auth()->user()->level == 'admin')
                                            <td>
                                                <a type="button" href="/edit-jenis/{{ $x->id }}"
                                                    class="btn-sm btn-inverse-dark btn-rounded m-lg-1" data-toggle="tooltip"
                                                    data-placement="top" title="Edit">
                                                    <i class="mdi mdi-border-color"></i>
                                                </a>

                                                <a type="button" href="/hapus-jenis/{{ $x->id }}"
                                                    onclick="return confirm('Apakah anda yakin menghapus data?')"
                                                    class="btn-sm btn-inverse-danger btn-rounded m-lg-1"
                                                    data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </td>
                                        @endif
                                    </tr>
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
