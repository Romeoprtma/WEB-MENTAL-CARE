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
            <form method="">
                <h1>Daftar Akun</h1>
                <input type="text" placeholder="Name" required>
                <input type="email" placeholder="Email" required>
                <!-- Password Field with Toggle -->
                <div class="password-container">
                    <input type="password" placeholder="Password" id="registerPassword" required>
                    <span class="toggle-password">
                        <i class="fa-solid fa-eye-slash" id="toggleRegisterPassword"></i>
                    </span>
                </div>
                <select class="role-select" name="role" required>
                    <option value="" disabled selected>Pilih Role</option>
                    <option value="user">User</option>
                    <option value="psikolog">Psikolog</option>
                </select>
                <button type="submit">Daftar</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form method="">
                <h1>Login</h1>
                <input type="email" placeholder="Email" required>
                <!-- Password Field with Toggle -->
                <div class="password-container">
                    <input type="password" placeholder="Password" id="loginPassword" required>
                    <span class="toggle-password">
                        <i class="fa-solid fa-eye-slash" id="toggleLoginPassword"></i>
                    </span>
                </div>
                <a href="/forgetPassword">Lupa password Anda?</a>
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

    <script>
        const container = document.getElementById('container');
        const registerBtn = document.getElementById('register');
        const loginBtn = document.getElementById('login');

        registerBtn.addEventListener('click', () => {
            container.classList.add("active");
        });

        loginBtn.addEventListener('click', () => {
            container.classList.remove("active");
        });

        // Register Password Toggle
        const toggleRegisterPassword = document.getElementById('toggleRegisterPassword');
        const registerPassword = document.getElementById('registerPassword');

        toggleRegisterPassword.addEventListener('click', () => {
            const isPassword = registerPassword.type === 'password';
            registerPassword.type = isPassword ? 'text' : 'password';
            toggleRegisterPassword.classList.toggle('fa-eye', isPassword);
            toggleRegisterPassword.classList.toggle('fa-eye-slash', !isPassword);
        });

        // Login Password Toggle
        const toggleLoginPassword = document.getElementById('toggleLoginPassword');
        const loginPassword = document.getElementById('loginPassword');

        toggleLoginPassword.addEventListener('click', () => {
            const isPassword = loginPassword.type === 'password';
            loginPassword.type = isPassword ? 'text' : 'password';
            toggleLoginPassword.classList.toggle('fa-eye', isPassword);
            toggleLoginPassword.classList.toggle('fa-eye-slash', !isPassword);
        });
    </script>
</body>

</html>
