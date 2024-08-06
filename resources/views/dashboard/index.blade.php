@extends('dashboard.layouts.main')

@section('container')
    <div id="main-content">

        <div class="page-heading">
            <div class="page-title">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center">
                        <h3>Arahkan barcode Anda ke Kamera</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="row justify-content-center">
            <div class="col-md-4 col-sm-12">
                <div class="card card-scanner bg-white shadow rounded-3 p-3 border-0">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>SELAMAT</strong> Silahkan masuk.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session()->has('fail'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>MAAF</strong> Nama anda tidak terdaftar.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session()->has('terpakai'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>TERPAKAI</strong> Nama anda sudah terpakai.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <video id="preview" class="active camera-preview"></video>
                    {{-- <div class="wrapper-scanner">
                        <div class="scanner"></div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade text-left" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Konfirmasi</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ route('store') }}" method="POST" id="form">
                    @csrf
                    <input type="hidden" name="name" id="name">
                    <div class="modal-body">
                        <h5 id="nama-peserta"></h5>
                        <h5 id="kloter-peserta"></h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tolak</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Terima</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <script type="text/javascript">
            let scanner = new Instascan.Scanner({
                video: document.getElementById('preview')
            });
            // scanner.addListener('scan', function(content) {
            //     console.log(content);
            // });
            Instascan.Camera.getCameras().then(function(cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                }
            }).catch(function(e) {
                console.error(e);
            });

            scanner.addListener('scan', function(c) {
                const content = c.split(',');
                const nama = content[0];
                const kloter = content[1];
                // const date = new Date(kloter);
                // const formatter = new Intl.DateTimeFormat('id-ID', {
                //     weekday: "long",
                //     year: "numeric",
                //     month: "long",
                //     day: "numeric",
                // });
                // const formattedDate = formatter.format(date);
                console.log(c);
                $('#myModal').modal('show')
                $('#nama-peserta').text(`Nama: ${nama}`);
                $('#kloter-peserta').text(`Kloter: ${kloter}`);
                $('#name').val(nama)
                console.log(document.getElementById('name'));
                // document.getElementById('name').value = nama
                // document.getElementById('form').submit();
                // myModal.show();
            })
        </script>
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
