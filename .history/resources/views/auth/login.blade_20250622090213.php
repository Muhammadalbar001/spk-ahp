<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login - SPK AHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-tr from-indigo-100 via-white to-indigo-200 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-8 space-y-6">
        <h2 class="text-2xl font-bold text-center text-indigo-700">🔐 Login Aplikasi SPK AHP</h2>

        @if(session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('status') }}
        </div>
        @endif

        @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc list-inside text-sm">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                <input type="email" id="email" name="email" required autofocus
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
                <input type="password" id="password" name="password" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="remember"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                    <span class="text-sm text-gray-600">Ingat saya</span>
                </label>
                @if (Route::has('password.request'))
                <a class="text-sm text-indigo-600 hover:underline" href="{{ route('password.request') }}">
                    Lupa password?
                </a>
                @endif
            </div>

            <div>
                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg shadow transition">
                    Masuk
                </button>
            </div>
        </form>

        <p class="text-sm text-center text-gray-600">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">Daftar di sini</a>
        </p>
    </div>

</body>

</html>