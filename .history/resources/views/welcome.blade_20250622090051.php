<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>SPK AHP SMA Negeri 1 Simpang Empat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-indigo-100 to-white min-h-screen flex flex-col">

    <!-- NAVBAR -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-2xl font-bold text-indigo-600">SMA 1 Simpang Empat</a>
            <div class="space-x-4">
                @if(Route::has('login'))
                @auth
                <a href="{{ url('/dashboard') }}" class="text-indigo-600 hover:text-indigo-800">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800">Login</a>
                @if(Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-indigo-600 hover:text-indigo-800">Register</a>
                @endif
                @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <main class="flex-grow flex items-center justify-center text-center p-6">
        <div class="max-w-2xl space-y-6">
            <h1 class="text-4xl sm:text-5xl font-extrabold text-indigo-700">
                Sistem Pendukung Keputusan <br> Pertukaran Pelajar
            </h1>
            <p class="text-lg text-gray-700">
                Metode Analytic Hierarchy Process (AHP) untuk membantu proses seleksi,
                memastikan keputusan adil, transparan, dan berbasis data.
            </p>
            <div class="flex justify-center space-x-4 mt-6">
                <a href="{{ route('login') }}"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded-lg shadow">
                    🔐 Login
                </a>
                @if(Route::has('register'))
                <a href="{{ route('register') }}"
                    class="bg-white hover:bg-indigo-50 text-indigo-600 font-semibold px-6 py-3 rounded-lg border border-indigo-600 shadow">
                    📝 Daftar
                </a>
                @endif
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-white shadow-inner py-4">
        <div class="max-w-7xl mx-auto px-4 text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} SMA Negeri 1 Simpang Empat. All rights reserved.
        </div>
    </footer>
</body>

</html>