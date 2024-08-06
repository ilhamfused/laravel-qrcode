<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    <script type="text/javascript" src="/assets/js/instascan.min.js"></script>
</head>

<body>
    <div class="container col-lg-4 py-5">
        <div class="card bg-white shadow rounded-3 p-3 border-0">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>SELAMAT</strong> Silahkan masuk.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session()->has('fail'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>MAAF</strong> Nama anda tidak terdaftar.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session()->has('terpakai'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>TERPAKAI</strong> Nama anda sudah terpakai.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <video id="preview" class="active"></video>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tolak</button>
                        <button type="submit" class="btn btn-primary">Terima</button>
                    </div>
                </form>
            </div>
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
    <script src="/assets/js/jquery.slim.min.js"></script>
    <script script src="/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
