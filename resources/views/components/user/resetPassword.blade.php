<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Forget Password</title>
</head>
<body class="bg-gradient-to-r from-gray-200 to-indigo-200 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg w-full max-w-md p-6">
        <h1 class="text-2xl font-bold text-gray-700 text-center">Forget Password</h1>
        <p class="text-gray-600 text-sm text-center mt-2 mb-6">
            Masukkan email Anda untuk menerima link reset password.
        </p>
        <form action="#" method="POST" class="space-y-4">
            <!-- Email Input -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Masukkan email Anda"
                    class="w-full px-4 py-2 mt-1 text-sm text-gray-800 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-400"
                    required
                >
            </div>
            <!-- Submit Button -->
            <button
                type="submit"
                class="w-full py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-400 focus:outline-none"
            >
                Kirim Link Reset
            </button>
        </form>
        <div class="text-center mt-4">
            <a href="login.html" class="text-indigo-600 text-sm font-medium hover:underline">
                Kembali ke Login
            </a>
        </div>
    </div>
</body>
</html>
