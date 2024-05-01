<script>
    const saveAccessToken = (token) => {
        Cookies.set('access_token', token, {
            expires: 7,
            secure: true,
            sameSite: 'strict'
        });
    }

    const saveRole = (role) => {
        Cookies.set('user_role', role, {
            expires: 7,
            secure: true,
            sameSite: 'strict'
        });
    }

    async function loginUser(email, pass, token, user) {
        try {
            let tokenResponse = await $.ajax({
                type: "POST",
                url: "{{ route('login.token') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    token: token,
                    userDatas: user
                },
                success: function(response) {
                    console.log('response', response);
                    saveAccessToken(response.access_token);
                    saveRole(response.userDatas.role);

                },
            });

            let sessionResponse = await $.ajax({
                type: "POST",
                url: "{{ route('login.session') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    email: email,
                    password: pass
                }
            });

            Swal.fire({
                title: 'Berhasil!',
                text: 'Login ke Akun Anda berhasil!',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                let url = "{{ route('home') }}";
                window.location.href = url;
            });

        } catch (error) {
            console.log(error);
        }
    }

    $(document).ready(function() {
        console.log('ready')
        $("#login-form").submit(function(e) {
            console.log('submit')
            e.preventDefault();

            var email = $("#email").val();
            var password = $("#password").val();

            var data = {
                email: email,
                password: password
            };

            $.ajax({
                type: "POST",
                url:`https://devfundation.propertio.id/api/v1/auth/login`,
                data: data,
                success: function(response) {
                    if (response.status === "success") {
                        loginUser(email, password, response.data.token, response.data.user)
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: response.message,
                            icon: 'error',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }
                },
                error: function(error) {
                    if (error.status === 422) {
                        var errors = error.responseJSON.data;

                        $.each(errors, function(field, errorMessages) {
                            var errorContainerId = field + '-error';
                            var errorContainer = $('#' + errorContainerId);
                            errorContainer.text(errorMessages[0]);
                        });
                        Swal.fire({
                            title: 'Error',
                            text: "Email/Password tidak sesuai!",
                            icon: 'error',
                            timer: 2000,
                            showConfirmButton: false
                        });

                    } else if (error.status === 401) {
                        let message = JSON.stringify(error.responseJSON.message);
                        Swal.fire({
                            title: 'Error!',
                            text: message === '"User Inactive"' ?
                                "Akun Anda belum aktif! Segera hubungi admin jika ingin menggunakannya kembali." :
                                message,
                            icon: 'error',
                        });
                    } else if (error.status === 500) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Terjadi kesalahan pada server.',
                            icon: 'error',
                        });
                    }

                }
            });
        });
    });
</script>
