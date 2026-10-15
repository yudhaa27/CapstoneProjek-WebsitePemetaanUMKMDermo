<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pengelola - SIG Pemetaan UMKM Dermo</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="h-full flex items-center justify-center p-4 antialiased">
    <div class="w-full max-w-md">
        <!-- Logo / Brand Header -->
        <div class="text-center mb-8">
            <div class="inline-flex w-16 h-16 rounded-2xl bg-gradient-to-tr from-emerald-600 to-teal-400 items-center justify-center text-white shadow-xl shadow-emerald-500/20 mb-4">
                <svg class="w-9 h-9" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-white tracking-tight">Portal Pengelola SIG</h1>
            <p class="text-sm text-slate-400 mt-1">Sistem Informasi Pemetaan UMKM Kelurahan Dermo</p>
        </div>

        <!-- Login Card -->
        <div class="bg-slate-800/80 backdrop-blur-xl border border-slate-700/80 rounded-2xl p-8 shadow-2xl">
            @if(session('info'))
                <div class="p-3 mb-6 rounded-lg bg-sky-950/60 border border-sky-600/40 text-sky-300 text-xs font-medium">
                    {{ session('info') }}
                </div>
            @endif

            @if($errors->any())
                <div class="p-3 mb-6 rounded-lg bg-red-950/60 border border-red-600/40 text-red-300 text-xs font-medium">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Alamat Email</label>
                    <div class="relative">
                        <input type="email" id="email" name="email" value="{{ old('email', 'admin@dermo.kelurahan.id') }}" required autocomplete="email" autofocus
                            class="w-full px-4 py-2.5 rounded-xl bg-slate-900/80 border border-slate-700 text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Kata Sandi</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" value="password" required autocomplete="current-password"
                            class="w-full px-4 py-2.5 rounded-xl bg-slate-900/80 border border-slate-700 text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition">
                    </div>
                </div>

                <div class="flex items-center justify-between text-xs">
                    <label class="flex items-center gap-2 text-slate-400 cursor-pointer select-none">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded bg-slate-900 border-slate-700 text-emerald-500 focus:ring-emerald-500 focus:ring-offset-slate-800">
                        Ingat Saya
                    </label>
                    <span class="text-slate-500 text-[11px]">Akun Khusus Admin Kelurahan</span>
                </div>

                <button type="submit" class="w-full py-3 px-4 rounded-xl bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700 text-white font-semibold text-sm shadow-lg shadow-emerald-500/25 transition duration-150">
                    Masuk ke Dashboard
                </button>
            </form>

            <div class="mt-6 pt-6 border-t border-slate-700/60 text-center">
                <a href="{{ route('public.home') }}" class="inline-flex items-center gap-1.5 text-xs text-slate-400 hover:text-emerald-400 transition font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Kembali ke Halaman Publik
                </a>
            </div>
        </div>

        <div class="mt-6 text-center text-xs text-slate-500">
            Kredensial Default Percobaan: <code class="text-emerald-400">admin@dermo.kelurahan.id</code> / <code class="text-emerald-400">password</code>
        </div>
    </div>
</body>
</html>
