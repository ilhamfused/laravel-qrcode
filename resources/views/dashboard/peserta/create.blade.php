@extends('dashboard.layouts.main')

@section('container')
    <div id="main-content">

        <div class="page-heading">
            <div class="page-title mb-5">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Tambah Peserta</h3>
                        {{-- <p class="text-subtitle text-muted">Navbar will appear on the top of the page.</p> --}}
                    </div>
                </div>
            </div>

            <section class="section">
                <div class="card">
                    <div class="card-header">
                        Tambah Peserta
                    </div>
                    <div class="card-body">
                        <form action="/peserta" method="post" enctype="multipart/form-data">
                            {{-- @method('put') --}}
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" class="form-control" id="name" placeholder="name"
                                                value="" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" placeholder="email"
                                                value="" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="no">No. HP</label>
                                            <input type="text" class="form-control" id="no" placeholder="no"
                                                value="" name="no">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="education">Pendidikan</label>
                                            <input type="text" class="form-control" id="education"
                                                placeholder="education" value="" name="education">
                                        </div>
                                        <div class="form-group">
                                            <label for="session">Sesi</label>
                                            <input type="date" class="form-control" id="session" placeholder="session"
                                                value="" name="session">
                                        </div>
                                        <div class="form-group">
                                            <label for="present">Kehadiran</label>
                                            <select class="choices form-select" id="present" name="present">
                                                <option value="1" selected>Hadir</option>
                                                <option value="0">Tidak Hadir</option>
                                            </select>
                                        </div>


                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
