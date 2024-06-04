@include('admin.partial.header')
@include('admin.partial.navbar')
@include('admin.partial.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Peserta</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ 'dashboard' }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Peserta</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel data peserta</h3>
                            <div class="text-right">
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#peserta">
                                    Tambah peserta
                                </button>
                            </div>
                        </div>
                        <div class="modal fade" id="peserta">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah Peserta</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('peserta.post') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Nama Siswa</label>
                                                        <select class="form-control" name="id_siswa">
                                                            @foreach ($user as $user)
                                                                <option value="{{ $user->id }}">{{ $user->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Beasiswa</label>
                                                        <select class="form-control" name="id_beasiswa">
                                                            @foreach ($beasiswa as $beas)
                                                                <option value="{{ $beas->id }}">
                                                                    {{ $beas->nama_beasiswa }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Pekerjaan</label>
                                                        <select class="form-control" name="pekerjaan">
                                                            @foreach ($subkriteria as $sub)
                                                                @if ($sub->id_kriteria == 3)
                                                                    <option value="{{ $sub->nilai }}">
                                                                        {{ $sub->subkriteria }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Penghasilan</label>
                                                        <select class="form-control" name="penghasilan">
                                                            @foreach ($subkriteria as $sub)
                                                                @if ($sub->id_kriteria == 1)
                                                                    <option value="{{ $sub->nilai }}">
                                                                        {{ $sub->subkriteria }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Tanggungan</label>
                                                        <select class="form-control" name="tanggungan">
                                                            @foreach ($subkriteria as $sub)
                                                                @if ($sub->id_kriteria == 2)
                                                                    <option value="{{ $sub->nilai }}">
                                                                        {{ $sub->subkriteria }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Asset</label>
                                                        <select class="form-control" name="asset">
                                                            @foreach ($subkriteria as $sub)
                                                                @if ($sub->id_kriteria == 4)
                                                                    <option value="{{ $sub->nilai }}">
                                                                        {{ $sub->subkriteria }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Siswa</th>
                                        <th>Beasiswa</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        @if (
                                            (Auth::user()->role == 'TU' && $item->status == 'Diproses') ||
                                                (Auth::user()->role == 'TU' && $item->status == 'Lolos') ||
                                                (Auth::user()->role == 'TU' && $item->status == 'Tidak Lolos'))
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->idSiswa->name }}</td>
                                                <td>{{ $item->idBeasiswa->nama_beasiswa }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('peserta.detail', $item->id) }}"
                                                            type="button" class="btn btn-info">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <button url="{{ route('peserta.delete', $item->id) }}"
                                                            type="button" class="btn btn-danger delete"
                                                            data-id="{{ $item->id }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @foreach ($data as $item)
                                        @if (Auth::user()->role == 'komite')
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->idSiswa->name }}</td>
                                                <td>{{ $item->idBeasiswa->nama_beasiswa }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('peserta.detail', $item->id) }}"
                                                            type="button" class="btn btn-info">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <button url="{{ route('peserta.delete', $item->id) }}"
                                                            type="button" class="btn btn-danger delete"
                                                            data-id="{{ $item->id }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
    </section>
</div>
@include('admin.partial.footer')
