<x-guest-full-layout>
    <style>
        :root {
            --ink: #0d0f12;
            --panel: #1b1c20;
            --blue: #3b5bff;
            --blue-2: #1f3de0;
            --soft: #d0d4ff;
            --muted: #a6a8b1;
        }
        .rk-bg {
            min-height: 100vh;
            background:
                radial-gradient(circle at 20% 20%, rgba(255,255,255,0.08), transparent 45%),
                radial-gradient(circle at 80% 70%, rgba(255,255,255,0.08), transparent 45%),
                #101114;
            color: #fff;
            position: relative;
            overflow: hidden;
            font-family: "Space Grotesk", "Poppins", system-ui, sans-serif;
        }
        .rk-bg::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image:
                url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='120' height='120' viewBox='0 0 120 120'%3E%3Cg fill='none' stroke='%235d6068' stroke-width='2' opacity='0.25'%3E%3Cpath d='M22 46h40l-6-12H28l-6 12Z'/%3E%3Ccircle cx='32' cy='58' r='6'/%3E%3Ccircle cx='52' cy='58' r='6'/%3E%3Cpath d='M70 46h40l-6-12H76l-6 12Z'/%3E%3Ccircle cx='80' cy='58' r='6'/%3E%3Ccircle cx='100' cy='58' r='6'/%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.25;
            mix-blend-mode: screen;
            pointer-events: none;
        }
        .rk-wave {
            position: absolute;
            left: -10%;
            right: -10%;
            bottom: -40px;
            height: 280px;
            background: radial-gradient(120% 120% at 50% 0%, #6a7bff 0%, var(--blue) 50%, #2631a8 100%);
            border-top-left-radius: 60% 80%;
            border-top-right-radius: 40% 70%;
            transform: skewY(-3deg);
            opacity: 0.95;
        }
        .rk-wrap {
            position: relative;
            z-index: 2;
            display: grid;
            grid-template-columns: minmax(280px, 380px) 1fr;
            gap: 40px;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 80px 24px 120px;
        }
        .rk-card {
            background: #2a2b31;
            border-radius: 18px;
            padding: 28px;
            box-shadow: 0 12px 35px rgba(0,0,0,0.35);
            border: 1px solid rgba(255,255,255,0.06);
        }
        .rk-logo {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            display: grid;
            place-items: center;
            background: linear-gradient(145deg, #ff3d5a, #ff9a3c);
            margin-bottom: 16px;
        }
        .rk-logo svg {
            width: 34px;
            height: 34px;
        }
        .rk-title {
            font-weight: 700;
            font-size: 24px;
            margin-bottom: 16px;
        }
        .rk-input {
            width: 100%;
            background: transparent;
            border: 2px solid #4a4d56;
            color: #fff;
            padding: 12px 16px;
            border-radius: 999px;
            outline: none;
        }
        .rk-input:focus {
            border-color: var(--soft);
            box-shadow: 0 0 0 4px rgba(59, 91, 255, 0.25);
        }
        .rk-btn {
            background: var(--blue);
            color: #fff;
            border: none;
            border-radius: 999px;
            padding: 10px 18px;
            font-weight: 600;
            cursor: pointer;
        }
        .rk-btn:hover { background: var(--blue-2); }
        .rk-link { color: var(--soft); text-decoration: underline; font-size: 14px; }
        .rk-hero h1 { font-size: 56px; line-height: 1.05; margin: 0 0 14px; }
        .rk-hero p { color: var(--muted); margin: 0 0 24px; }
        .rk-pill {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background: #1b1f2a;
            padding: 6px 8px;
            border-radius: 999px;
        }
        .rk-pill a {
            color: #fff;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 999px;
        }
        .rk-pill .active {
            background: var(--blue);
            font-weight: 600;
        }
        .rk-google {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #ffd3d8;
            text-decoration: none;
            font-size: 14px;
        }
        @media (max-width: 900px) {
            .rk-wrap { grid-template-columns: 1fr; }
            .rk-hero h1 { font-size: 40px; }
        }
    </style>

    <div class="rk-bg">
        <div class="rk-wrap">
            <div class="rk-card">
                <div class="rk-logo" aria-hidden="true">
                    <svg viewBox="0 0 64 64" fill="none">
                        <path d="M14 34h36l-4-8H18l-4 8Z" fill="white"/>
                        <circle cx="20" cy="42" r="5" fill="white"/>
                        <circle cx="44" cy="42" r="5" fill="white"/>
                    </svg>
                </div>
                <div class="rk-title">Welcome Back</div>

                <x-auth-session-status class="mb-4" :status="session('status')" />
                @if (session('error'))
                    <div class="mb-4 text-sm text-red-300">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login', absolute: false) }}" class="space-y-4">
                    @csrf
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="text-slate-200" />
                        <x-text-input id="email" class="rk-input mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="text-slate-200" />
                        <x-text-input id="password" class="rk-input mt-1" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="flex items-center gap-3">
                        <button class="rk-btn" type="submit">Next</button>
                        @if (Route::has('password.request'))
                            <a class="rk-link" href="{{ route('password.request') }}">forgot password</a>
                        @endif
                    </div>
                </form>

                <div class="mt-4">
                    <a class="rk-google" href="{{ route('google.login') }}">Login dengan Google</a>
                </div>
            </div>

            <div class="rk-hero">
                <div class="rk-pill mb-6">
                    <a class="active" href="{{ route('login') }}">login</a>
                    <a href="{{ route('register') }}">signup</a>
                </div>
                <h1>RENTAL KENDARAAN<br>WEBSITE</h1>
                <p>Login Page</p>
            </div>
        </div>
        <div class="rk-wave" aria-hidden="true"></div>
    </div>
</x-guest-full-layout>
