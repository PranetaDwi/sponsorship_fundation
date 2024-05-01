<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
</head>
@yield('head')

<body class="hold-transition login-page">
@yield('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script>
        $(document).ready(function() {
            var currentYear = new Date().getFullYear();
            $("#logout-button").click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('logout') }}",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        sessionStorage.clear();
                        window.location.href =
                            "{{ route('login') }}";
                    },
                    error: function(error) {
                        console.log(error);
                        swal.fire({
                            title: "Gagal!",
                            text: "Logout Gagal, Silahkan diulang setelah beberapa saat!",
                            icon: "error",
                            confirmButtonText: "OK",
                            confirmButtonColor: "#3085d6",
                            timer: 3000,
                        });
                    }
                });
            });
        });
    </script>
@yield('script')
</body>

