<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secure Web Application</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .lightning {
            position: absolute;
            top: 50%;
            width: 120px;
            height: 4px;
            background: linear-gradient(
                to right,
                transparent,
                #facc15,
                #fde047,
                #facc15,
                transparent
            );
            animation: pulse 0.4s infinite alternate;
        }

        .lightning-left {
            right: -120px;
        }

        .lightning-right {
            left: -120px;
        }

        @keyframes pulse {
            from { opacity: 0.3; }
            to { opacity: 1; }
        }
    </style>
</head>

<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center">

    <div class="flex items-center gap-12 relative">

        <!-- LEFT CAT -->
        <div class="relative">
            <img
                src="https://media.giphy.com/media/JIX9t2j0ZTN9S/giphy.gif"
                alt="Cat Left"
                class="w-32 h-32 object-contain"
            >
            <div class="lightning lightning-left"></div>
        </div>

        <!-- CENTER TEXT -->
        <div class="text-center px-8">
            <h1 class="text-5xl font-extrabold tracking-wide text-yellow-400">
                Secure Web Application
            </h1>

            <p class="mt-4 text-lg text-gray-300">
                Built with Laravel · OWASP Compliant · Secure Coding Practices
            </p>

            <p class="mt-4 text-lg text-gray-300">
                task management system with role-based access control
            </p>


            <div class="mt-8 space-x-4">
                @auth
                    <a href="{{ route('dashboard') }}"
                       class="px-6 py-3 bg-yellow-400 text-black rounded-lg font-semibold hover:bg-yellow-300 transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="px-6 py-3 bg-yellow-400 text-black rounded-lg font-semibold hover:bg-yellow-300 transition">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="px-6 py-3 border border-yellow-400 rounded-lg font-semibold hover:bg-yellow-400 hover:text-black transition">
                        Register
                    </a>
                @endauth
            </div>
        </div>

        <!-- RIGHT CAT -->
        <div class="relative">
            <img
                src="https://media.giphy.com/media/JIX9t2j0ZTN9S/giphy.gif"
                alt="Cat Right"
                class="w-32 h-32 object-contain scale-x-[-1]"
            >
            <div class="lightning lightning-right"></div>
        </div>

    </div>

</body>
</html>
