<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login & Register | MentalCare</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        /* === [SESUAI DASHBOARD] Palet Warna Baru === */
        body {
            /* Latar belakang abu-abu terang, cocok dengan section review */
            background-color: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            position: relative;
            width: 850px;
            max-width: 100%;
            min-height: 520px;
            /* Panel form putih bersih seperti kartu di dashboard */
            background: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-weight: 600;
            margin-bottom: 20px;
            /* Warna teks gelap yang konsisten */
            color: #1f2937; 
        }

        input {
            width: 100%;
            padding: 12px 15px;
            margin: 8px 0;
            /* Warna latar input abu-abu netral */
            background-color: #f3f4f6;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            color: #1f2937;
            outline: none;
        }

        input::placeholder {
            color: #6b7280;
        }
        
        button {
            border-radius: 8px;
            /* Warna tombol aksi biru, sesuai tombol 'Kirim' & 'Booking' */
            border: 1px solid #2563eb;
            background-color: #2563eb;
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.2s ease-in;
            margin-top: 10px;
        }

        button:hover {
            background-color: #1d4ed8;
            border-color: #1d4ed8;
        }

        .toggle-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            /* Warna overlay ungu, warna utama dari dashboard Anda */
            background: #756AB6; 
            border-radius: 150px 0 0 150px;
            transition: border-radius 0.6s ease-in-out;
        }

        .toggle-panel h1, .toggle-panel p {
            color: #ffffff;
        }

        button.hidden {
            background-color: transparent;
            border: 2px solid #fff;
        }
        /* === AKHIR PENYESUAIAN WARNA === */

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
            background: none; 
        }

        form {
            background: none;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 60px;
            height: 100%;
            text-align: center;
        }

        .sign-in {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .sign-up {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        .container.active .sign-in {
            transform: translateX(100%);
            opacity: 0; 
        }

        .container.active .sign-up {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: show 0.6s;
        }

        @keyframes show {
            0%, 49.99% {
                opacity: 0;
                z-index: 1;
            }
            50%, 100% {
                opacity: 1;
                z-index: 5;
            }
        }

        .password-container {
            position: relative;
            width: 100%;
        }

        .sign-up .password-container:last-of-type {
            margin-bottom: 10px;
        }

        .password-container input {
            padding-right: 45px;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6b7280;
        }
        
        button:active {
            transform: scale(0.95);
        }

        .toggle-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: all 0.6s ease-in-out;
            z-index: 100;
        }

        .container.active .toggle-container {
            transform: translateX(calc(-100% + 1px));
        }

        .container.active .toggle-container::before {
            border-radius: 0 150px 150px 0;
        }

        .toggle {
            position: relative;
            height: 100%;
            width: 200%;
            color: #fff;
            transition: all 0.6s ease-in-out;
            transform: translateX(-50%); 
        }

        .container.active .toggle {
            transform: translateX(0);
        }

        .toggle-panel {
            position: absolute;
            width: 50%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            text-align: center;
            top: 0;
        }
        
        .toggle-panel h1 {
            font-size: 2em;
        }

        .toggle-panel p {
            font-size: 14px;
            line-height: 1.5;
            margin: 20px 0;
        }

        .toggle-left {
           left: 0;
        }

        .toggle-right {
            right: 0;
        }
        
        .error-message {
            color: #c53030;
            font-size: 12px;
            display: none;
            font-weight: 500;
            height: 15px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
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
                <button type="submit">Daftar</button>
            </form>
        </div>

        <div class="form-container sign-in">
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
                <a href="#" style="font-size: 13px; margin: 10px 0;">Lupa password?</a>
                <button type="submit">Login</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Selamat Datang Kembali</h1>
                    <p>Masukkan email dan password Anda untuk masuk kembali ke MentalCare</p>
                    <button class="hidden" id="login">Login</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hallo, Sobat MentalCare</h1>
                    <p>Belum punya akun? Daftar sekarang untuk memulai perjalanan sehat mentalmu bersama kami.</p>
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
        
        registerBtn.addEventListener('click', () => {
            container.classList.add("active");
        });

        loginBtn.addEventListener('click', () => {
            container.classList.remove("active");
        });

        function togglePassword(event) {
            const toggleIcon = event.target.closest('.toggle-password');
            if (!toggleIcon) return;
            const targetId = toggleIcon.getAttribute('data-target');
            const passwordField = document.getElementById(targetId);

            if (passwordField) {
                const isPassword = passwordField.type === 'password';
                passwordField.type = isPassword ? 'text' : 'password';
                const icon = toggleIcon.querySelector('i');
                if (isPassword) {
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                } else {
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                }
            }
        }

        document.querySelectorAll('.toggle-password').forEach(toggle => {
            toggle.addEventListener('click', togglePassword);
        });

        function validatePasswordMatch() {
            if (passwordField.value === '' && confirmPasswordField.value === '') {
                 passwordError.style.display = 'none';
                 return;
            }
            if (confirmPasswordField.value !== passwordField.value) {
                passwordError.style.display = 'block';
            } else {
                passwordError.style.display = 'none';
            }
        }

        passwordField.addEventListener('input', validatePasswordMatch);
        confirmPasswordField.addEventListener('input', validatePasswordMatch);

        registerForm.addEventListener('submit', (event) => {
            if (passwordField.value !== confirmPasswordField.value) {
                event.preventDefault();
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Password anda tidak sesuai!",
                });
            }
        });
    </script>
</body>
</html>