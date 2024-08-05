<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script type="text/javascript" src="/assets/js/instascan.min.js"></script>
</head>

<body>
    {{-- <h1>Hello, world!</h1> --}}
    <div class="container col-lg-4 py-5">
        <div class="card bg-white shadow rounded-3 p-3 border-0">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat</strong> Silahkan masuk.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('fail'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Maaf</strong> Nama anda sudah terdaftar.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <video id="preview" class="active"></video>
        </div>

        <form action="{{ route('store') }}" method="POST" id="form">
            @csrf
            <input type="hidden" name="name" id="name">
        </form>

        <div class="table-responsive mt-5">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Nama</th>
                </tr>
            </table>
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
            console.log(c);
            document.getElementById('name').value = c;
            document.getElementById('form').submit();
        })
    </script>
    <script src="/assets/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
