<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/loginStyle.css">
    <title>Login</title>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <!-- Register Form -->
            <form method="POST" action="/auth">
                @csrf
                <input type="hidden" name="form_type" value="register">
                <h1>Daftar Akun</h1>
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <div class="password-container">
                    <input type="password" name="password" id="passwordRegister" placeholder="Password" required>
                    <span class="toggle-password" data-target="passwordRegister">
                        <i class="fa-solid fa-eye-slash"></i>
                    </span>
                </div>
                <div class="password-container">
                    <input type="password" name="password_confirmation" id="passwordConfirm" placeholder="Konfirmasi Password" required>
                    <span class="toggle-password" data-target="passwordConfirm">
                        <i class="fa-solid fa-eye-slash"></i>
                    </span>
                </div>
                <h5 id="passwordError" class="error-message">*Password tidak cocok</h5>
                <select class="role-select" name="role" required>
                    <option value="" disabled selected>Pilih Role</option>
                    <option value="user">User</option>
                    <option value="psikolog">Psikolog</option>
                </select>
                <button type="submit">Daftar</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <!-- Login Form -->
            <form method="POST" action="/auth" id="loginForm">
                @csrf
                <input type="hidden" name="form_type" value="login">
                <h1>Login</h1>
                <input type="email" name="email" id="emailLogin" placeholder="Email" required>
                <div class="password-container">
                    <input type="password" name="password" id="passwordLogin" placeholder="Password" required>
                    <span class="toggle-password" data-target="passwordLogin">
                        <i class="fa-solid fa-eye-slash"></i>
                    </span>
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Selamat Datang Kembali</h1>
                    <p>Masukkan email dan password Anda untuk masuk ke MentalCare</p>
                    <button class="hidden" id="login">Login</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hallo, Sobat MentalCare</h1>
                    <p>Daftar menggunakan data diri Anda untuk masuk ke MentalCare</p>
                    <button class="hidden" id="register">Daftar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const passwordField = document.getElementById('passwordRegister');
        const confirmPasswordField = document.getElementById('passwordConfirm');
        const passwordError = document.getElementById('passwordError');
        const container = document.getElementById('container');
        const registerBtn = document.getElementById('register');
        const loginBtn = document.getElementById('login');
        const registerForm = document.querySelector('.sign-up form');
        const submitButton = registerForm.querySelector('button[type="submit"]');

        registerBtn.addEventListener('click', () => {
            container.classList.add("active");
        });

        loginBtn.addEventListener('click', () => {
            container.classList.remove("active");
        });

        // Function to toggle password visibility
        function togglePassword(event) {
            const toggleIcon = event.target.closest('.toggle-password');
            if (!toggleIcon) return;
            const targetId = toggleIcon.getAttribute('data-target');
            const passwordField = document.getElementById(targetId);

            if (passwordField) {
                const isPassword = passwordField.type === 'password';
                passwordField.type = isPassword ? 'text' : 'password';
                toggleIcon.querySelector('i').classList.toggle('fa-eye', isPassword);
                toggleIcon.querySelector('i').classList.toggle('fa-eye-slash', !isPassword);
            }
        }

        // toggle hidden password
        document.querySelectorAll('.toggle-password').forEach(toggle => {
            toggle.addEventListener('click', togglePassword);
        });

        // fungsi untuk mengecek kesesuaian password
        function validatePasswordMatch() {
            if (confirmPasswordField.value !== passwordField.value) {
                passwordError.style.display = 'block'; // Show error message
            } else {
                passwordError.style.display = 'none'; // Hide error message
            }
        }

        // validasi password
        passwordField.addEventListener('input', validatePasswordMatch);
        confirmPasswordField.addEventListener('input', validatePasswordMatch);

        // validasi saat submit
        registerForm.addEventListener('submit', (event) => {
            if (passwordField.value !== confirmPasswordField.value) {
                event.preventDefault();
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Password anda tidak sesuai!",
                    customClass: {
                        confirmButton: 'btn-confirm'
                    }
                });
            }
        });

        // validasi login ke database
        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ $errors->first() }}',
                customClass: {
                    confirmButton: 'btn-confirm'
                }
            });
        @endif
    </script>
</body>
</html>
