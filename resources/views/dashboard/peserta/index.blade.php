@extends('dashboard.layouts.main')

@section('container')
    <div id="main-content">

        <div class="page-heading">
            <div class="page-title mb-5">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Daftar Peserta</h3>
                        {{-- <p class="text-subtitle text-muted">Navbar will appear on the top of the page.</p> --}}
                    </div>
                </div>
            </div>

            <section class="section">
                <div class="card">
                    <div class="card-header">
                        Import Peserta
                        <form action="{{ route('import-csv') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="messages">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            </div>
                            <div class="fields">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="import_csv" name="import_csv">
                                    <label class="input-group-text" for="import_csv">Upload</label>
                                </div>
                                <button type="submit" class="btn btn-success">Import CSV</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>

            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <a href="/peserta/create" class="btn btn-primary">Tambah Peserta</a>
                    </div>
                </div>
            </section>

            <section class="section">
                <div class="card">
                    <div class="card-header">
                        Daftar Peserta
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>No</th>
                                    <th>Pendidikan</th>
                                    <th>Sesi</th>
                                    <th>Scan pada</th>
                                    <th>Kehadiran</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesertas as $peserta)
                                    <tr>
                                        <td>{{ $peserta->name }}</td>
                                        <td>{{ $peserta->email }}</td>
                                        <td>{{ $peserta->no }}</td>
                                        <td>{{ $peserta->education }}</td>
                                        <td>{{ $peserta->session }}</td>
                                        <td>{{ $peserta->present_time }}</td>
                                        <td>{{ $peserta->present ? 'Hadir' : 'Tidak Hadir' }}</td>
                                        <td>
                                            <a href="/peserta/{{ $peserta->id }}/edit" class="btn btn-warning">Update</a>
                                            <form action="/peserta/{{ $peserta->id }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="confirm('Anda yakin?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </section>

            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h5>Ringkasan</h5>
                    </div>
                    <div class="card-body">
                        <p>Total Peserta : {{ $total_peserta }}</p>
                        <p>Total Peserta Hadir : {{ $total_peserta_hadir }}</p>
                        <p>Total Peserta Tidak Hadir : {{ $total_peserta - $total_peserta_hadir }}</p>
                        <h6>Ringkasan 10 Agustus</h6>
                        <p>Total Peserta : {{ $total_peserta10 }}</p>
                        <p>Total Peserta Hadir : {{ $total_peserta10_hadir }}</p>
                        <p>Total Peserta Tidak Hadir : {{ $total_peserta10 - $total_peserta10_hadir }}</p>
                        <h6>Ringkasan 11 Agustus</h6>
                        <p>Total Peserta : {{ $total_peserta11 }}</p>
                        <p>Total Peserta Hadir : {{ $total_peserta11_hadir }}</p>
                        <p>Total Peserta Tidak Hadir : {{ $total_peserta11 - $total_peserta11_hadir }}</p>
                        <a href="/export" class="btn btn-success">Export data .xlsx</a>
                    </div>
                </div>
            </section>

        </div>

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2021 &copy; Mazer</p>
                </div>
                <div class="float-end">
                    <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                        by <a href="https://ahmadsaugi.com">Saugi</a></p>
                </div>
            </div>
        </footer>
    </div>
@endsection
