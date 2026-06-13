{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="icon" type="image/x-icon" href="{{ asset('kaaladp.png') }}">
    <title>Kaala</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        * { font-family: 'Inter', sans-serif; }

        body {
            background: radial-gradient(ellipse at top, #1a0a00 0%, #0d0d0d 60%, #000 100%);
            min-height: 100vh;
        }

        .fire-text {
            background: linear-gradient(135deg, #facc15, #f97316, #ef4444);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(249, 115, 22, 0.15);
            box-shadow:
                0 0 40px rgba(249, 115, 22, 0.08),
                0 0 80px rgba(239, 68, 68, 0.04),
                inset 0 1px 0 rgba(255,255,255,0.05);
        }

        .table-row {
            transition: all 0.2s ease;
            border-radius: 12px;
        }

        .table-row:hover {
            background: rgba(249, 115, 22, 0.08);
            transform: translateX(2px);
        }

        .badge-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f97316, #ef4444);
            display: inline-block;
            box-shadow: 0 0 6px rgba(249,115,22,0.7);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; box-shadow: 0 0 6px rgba(249,115,22,0.7); }
            50% { opacity: 0.6; box-shadow: 0 0 12px rgba(249,115,22,0.4); }
        }

        .gradient-header-row th {
            background: linear-gradient(90deg, #ca8a04, #f97316, #dc2626);
        }

        /* Scrollbar */
        .scroll-area::-webkit-scrollbar { width: 4px; }
        .scroll-area::-webkit-scrollbar-track { background: transparent; }
        .scroll-area::-webkit-scrollbar-thumb {
            background: linear-gradient(#f97316, #ef4444);
            border-radius: 4px;
        }

        /* Pagination links */
        .pagination-wrapper nav {
            display: flex !important;
            flex-direction: row !important;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 4px;
        }

        .pagination-wrapper nav > * {
            display: flex !important;
            flex-direction: row !important;
        }

        .pagination-wrapper nav span,
        .pagination-wrapper nav a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 32px;
            height: 32px;
            padding: 0 10px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            margin: 0 2px;
            transition: all 0.2s;
        }

        .pagination-wrapper nav a {
            background: rgba(249, 115, 22, 0.12);
            color: #fb923c;
            border: 1px solid rgba(249,115,22,0.2);
            text-decoration: none;
        }

        .pagination-wrapper nav a:hover {
            background: rgba(249, 115, 22, 0.25);
            border-color: rgba(249,115,22,0.5);
        }

        .pagination-wrapper nav span[aria-current="page"] {
            background: linear-gradient(135deg, #f97316, #ef4444);
            color: white;
            border: none;
        }

        .pagination-wrapper nav span:not([aria-current]) {
            color: #6b7280;
        }

        /* Ambient glow orbs */
        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.12;
            pointer-events: none;
            z-index: 0;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4 overflow-x-hidden">

    <!-- Ambient orbs -->
    <div class="orb w-64 h-64 bg-orange-500 top-0 left-0 -translate-x-1/2 -translate-y-1/2"></div>
    <div class="orb w-48 h-48 bg-red-600 bottom-0 right-0 translate-x-1/2 translate-y-1/2"></div>

    <!-- Main panel -->
    <div class="relative z-10 w-full max-w-md">

        <!-- Header -->
        <div class="text-center mb-6">
            <div class="inline-flex items-center gap-2 mb-3">
                <span class="badge-dot"></span>
                <span class="text-xs text-orange-400/70 font-medium tracking-widest uppercase">Live Feed</span>
                <span class="badge-dot"></span>
            </div>
            <h1 class="text-6xl font-black fire-text tracking-tight mb-2">Kaala :)</h1>
            <p class="text-gray-500 text-sm font-light">A list of all the feeds &amp; responses</p>
        </div>

        <!-- Glass card -->
        <div class="glass-card rounded-3xl overflow-hidden">

            <!-- Card top bar -->
            <div class="flex items-center justify-between px-5 py-4 border-b border-white/5">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-table-list text-orange-400 text-sm"></i>
                    <span class="text-gray-300 text-sm font-medium">All Responses</span>
                </div>
                <span class="text-xs text-gray-600 font-mono">{{ $responses->total() }} total</span>
            </div>

            <!-- Table -->
            <div class="scroll-area overflow-x-auto max-h-[52vh] overflow-y-auto">
                <table class="w-full text-sm border-separate border-spacing-0">
                    <thead class="sticky top-0 z-10">
                        <tr class="gradient-header-row">
                            <th class="text-left text-black font-bold text-xs uppercase tracking-wider px-5 py-3 rounded-none first:rounded-tl-none">
                                <i class="fa-solid fa-user mr-1.5 opacity-80"></i>Name
                            </th>
                            <th class="text-left text-black font-bold text-xs uppercase tracking-wider px-5 py-3">
                                <i class="fa-solid fa-message mr-1.5 opacity-80"></i>Response
                            </th>
                            <th class="text-left text-black font-bold text-xs uppercase tracking-wider px-5 py-3">
                                <i class="fa-solid fa-clock mr-1.5 opacity-80"></i>Time
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/[0.04]">
                        @foreach($responses as $response)
                        <tr class="table-row group">
                            <td class="px-5 py-3.5">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-7 h-7 rounded-full bg-gradient-to-br from-yellow-400 to-red-500 flex items-center justify-center text-black text-xs font-bold flex-shrink-0">
                                        {{ strtoupper(substr($response->name, 0, 1)) }}
                                    </div>
                                    <span class="text-gray-200 font-medium truncate max-w-[80px]">{{ $response->name }}</span>
                                </div>
                            </td>
                            <td class="px-5 py-3.5">
                                <span class="text-gray-400 line-clamp-1 max-w-[140px] block">{{ $response->query }}</span>
                            </td>
                            <td class="px-5 py-3.5">
                                <span class="text-gray-600 text-xs font-mono whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($response->created_at)->format('d M, h:i A') }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($responses->isEmpty())
                <div class="text-center py-16 text-gray-700">
                    <i class="fa-solid fa-inbox text-3xl mb-3 block"></i>
                    <p class="text-sm">No responses yet</p>
                </div>
                @endif
            </div>
            <div class="pagination-wrapper px-5 py-4 border-t border-white/5 flex justify-center">
                {{ $responses->links() }}
            </div>
        </div>
        <div class="text-center mt-6 space-y-1">
            <p class="text-gray-600 text-xs">
                If you say yes, I will be happy :) By —
                <a href="https://wa.me/9944370597"
                   class="fire-text font-semibold hover:opacity-80 transition-opacity">
                    Vicky..!
                </a>
            </p>
            <p class="fire-text text-xs font-medium">Copyright © 2026 · All rights reserved</p>
            <p class="text-gray-700 text-xs">Designed by ABUBAKKAR SIDHIK</p>
        </div>
    </div>

</body>
</html> --}}



{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    backgroundImage: {
                        'fire': 'linear-gradient(135deg, #facc15, #f97316, #ef4444)',
                        'fire-h': 'linear-gradient(90deg, #ca8a04, #f97316, #dc2626)',
                        'radial-dark': 'radial-gradient(ellipse at top, #1a0a00 0%, #0d0d0d 60%, #000 100%)',
                    },
                    keyframes: {
                        glow: {
                            '0%, 100%': { opacity: '1', boxShadow: '0 0 6px rgba(249,115,22,0.7)' },
                            '50%':       { opacity: '0.6', boxShadow: '0 0 12px rgba(249,115,22,0.4)' },
                        },
                    },
                    animation: {
                        glow: 'glow 2s ease-in-out infinite',
                    },
                    boxShadow: {
                        'glass': '0 0 40px rgba(249,115,22,0.08), 0 0 80px rgba(239,68,68,0.04), inset 0 1px 0 rgba(255,255,255,0.05)',
                    },
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="kaaladp.PNG">
    <title>Kaala</title>
    <style>
        /* Scrollbar — no Tailwind equivalent */
        .scroll-area::-webkit-scrollbar { width: 4px; }
        .scroll-area::-webkit-scrollbar-track { background: transparent; }
        .scroll-area::-webkit-scrollbar-thumb { background: linear-gradient(#f97316, #ef4444); border-radius: 4px; }

        /* Pagination — Laravel-generated markup, styled via CSS selectors */
        .pagination-nav { display: flex !important; flex-direction: row !important; flex-wrap: wrap; align-items: center; justify-content: center; gap: 4px; }
        .pagination-nav > * { display: flex !important; flex-direction: row !important; }
        .pagination-nav span,
        .pagination-nav a { display: inline-flex; align-items: center; justify-content: center; min-width: 32px; height: 32px; padding: 0 10px; border-radius: 8px; font-size: 13px; font-weight: 500; margin: 0 2px; transition: all 0.2s; text-decoration: none; }
        .pagination-nav a { background: rgba(249,115,22,0.12); color: #fb923c; border: 1px solid rgba(249,115,22,0.2); }
        .pagination-nav a:hover { background: rgba(249,115,22,0.25); border-color: rgba(249,115,22,0.5); }
        .pagination-nav span[aria-current="page"] { background: linear-gradient(135deg, #f97316, #ef4444); color: white; border: none; }
        .pagination-nav span:not([aria-current]) { color: #6b7280; }
    </style>
</head>

<body class="font-sans bg-radial-dark flex items-center justify-center min-h-screen p-4 overflow-x-hidden">

    <!-- Ambient orbs -->
    <div class="fixed top-0 left-0 w-64 h-64 -translate-x-1/2 -translate-y-1/2 rounded-full bg-orange-500 blur-[80px] opacity-[0.12] pointer-events-none z-0"></div>
    <div class="fixed bottom-0 right-0 w-48 h-48 translate-x-1/2 translate-y-1/2 rounded-full bg-red-600 blur-[80px] opacity-[0.12] pointer-events-none z-0"></div>

    <!-- Main panel -->
    <div class="relative z-10 w-full max-w-md">

        <!-- Header -->
        <div class="text-center mb-6">
            <div class="inline-flex items-center gap-2 mb-3">
                <!-- Glow dot -->
                <span class="w-1.5 h-1.5 rounded-full bg-fire inline-block shadow-[0_0_6px_rgba(249,115,22,0.7)] animate-glow"></span>
                <span class="text-xs text-orange-400/70 font-medium tracking-widest uppercase">Live Feed</span>
                <span class="w-1.5 h-1.5 rounded-full bg-fire inline-block shadow-[0_0_6px_rgba(249,115,22,0.7)] animate-glow"></span>
            </div>
            <h1 class="text-6xl font-black tracking-tight mb-2 bg-fire bg-clip-text text-transparent">Kaala :)</h1>
            <p class="text-gray-500 text-sm font-light">A list of all the feeds &amp; responses</p>
        </div>

        <!-- Glass card -->
        <div class="rounded-3xl overflow-hidden border border-orange-500/15 bg-white/[0.03] backdrop-blur-xl shadow-glass">

            <!-- Card top bar -->
            <div class="flex items-center justify-between px-5 py-4 border-b border-white/5">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-table-list text-orange-400 text-sm"></i>
                    <span class="text-gray-300 text-sm font-medium">All Responses</span>
                </div>
                <span class="text-xs text-gray-600 font-mono">{{ $responses->total() }} total</span>
            </div>

            <!-- Table -->
            <div class="scroll-area overflow-x-auto max-h-[52vh] overflow-y-auto">
                <table class="w-full text-sm border-separate border-spacing-0">
                    <thead class="sticky top-0 z-10">
                        <tr>
                            <th class="text-left text-black font-bold text-xs uppercase tracking-wider px-5 py-3 bg-fire-h">
                                <i class="fa-solid fa-user mr-1.5 opacity-80"></i>Name
                            </th>
                            <th class="text-left text-black font-bold text-xs uppercase tracking-wider px-5 py-3 bg-fire-h">
                                <i class="fa-solid fa-message mr-1.5 opacity-80"></i>Response
                            </th>
                            <th class="text-left text-black font-bold text-xs uppercase tracking-wider px-5 py-3 bg-fire-h">
                                <i class="fa-solid fa-clock mr-1.5 opacity-80"></i>Time
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/[0.04]">
                        @foreach($responses as $response)
                        <tr class="transition-all duration-200 ease-in-out hover:bg-orange-500/[0.08] hover:translate-x-0.5 group">
                            <td class="px-5 py-3.5">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-7 h-7 rounded-full bg-gradient-to-br from-yellow-400 to-red-500 flex items-center justify-center text-black text-xs font-bold flex-shrink-0">
                                        {{ strtoupper(substr($response->name, 0, 1)) }}
                                    </div>
                                    <span class="text-gray-200 font-medium truncate max-w-[80px]">{{ $response->name }}</span>
                                </div>
                            </td>
                            <td class="px-5 py-3.5">
                                <span class="text-gray-400 line-clamp-1 max-w-[140px] block">{{ $response->query }}</span>
                            </td>
                            <td class="px-5 py-3.5">
                                <span class="text-gray-600 text-xs font-mono whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($response->created_at)->format('d M, h:i A') }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($responses->isEmpty())
                <div class="text-center py-16 text-gray-700">
                    <i class="fa-solid fa-inbox text-3xl mb-3 block"></i>
                    <p class="text-sm">No responses yet</p>
                </div>
                @endif
            </div>

            <div class="px-5 py-4 border-t border-white/5 flex justify-center [&_nav]:flex [&_nav]:flex-row [&_nav]:flex-wrap [&_nav]:items-center [&_nav]:justify-center [&_nav]:gap-1 [&_nav>*]:flex [&_nav>*]:flex-row [&_nav_span]:inline-flex [&_nav_span]:items-center [&_nav_span]:justify-center [&_nav_span]:min-w-[32px] [&_nav_span]:h-8 [&_nav_span]:px-2.5 [&_nav_span]:rounded-lg [&_nav_span]:text-[13px] [&_nav_span]:font-medium [&_nav_a]:inline-flex [&_nav_a]:items-center [&_nav_a]:justify-center [&_nav_a]:min-w-[32px] [&_nav_a]:h-8 [&_nav_a]:px-2.5 [&_nav_a]:rounded-lg [&_nav_a]:text-[13px] [&_nav_a]:font-medium [&_nav_a]:bg-orange-500/10 [&_nav_a]:text-orange-400 [&_nav_a]:border [&_nav_a]:border-orange-500/20 [&_nav_a]:no-underline [&_nav_a:hover]:bg-orange-500/25 [&_nav_a:hover]:border-orange-500/50 [&_nav_span[aria-current=page]]:bg-fire [&_nav_span[aria-current=page]]:text-white [&_nav_span:not([aria-current])]:text-gray-500">
                {{ $responses->links() }}
            </div>
        </div>
        <div class="text-center mt-6 space-y-1">
            <p class="text-gray-600 text-xs">
                If you say yes, I will be happy :) By —
                <a href="https://wa.me/9944370597"
                   class="bg-fire bg-clip-text text-transparent font-semibold hover:opacity-80 transition-opacity">
                    Vicky..!
                </a>
            </p>
            <p class="bg-fire bg-clip-text text-transparent text-xs font-medium">Copyright © 2026 · All rights reserved</p>
            <p class="text-gray-700 text-xs">Designed by ABUBAKKAR SIDHIK</p>
        </div>
    </div>

</body>
</html> --}}



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6F" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('kaaladp.png') }}">
    <title>Kaala</title>
    <style>
        .pagination-nav { display: flex !important; flex-direction: row !important; flex-wrap: wrap; align-items: center; justify-content: center; gap: 4px; }
        .pagination-nav > * { display: flex !important; flex-direction: row !important; }
        .pagination-nav span,
        .pagination-nav a { display: inline-flex; align-items: center; justify-content: center; min-width: 32px; height: 32px; padding: 0 10px; border-radius: 8px; font-size: 13px; font-weight: 500; margin: 0 2px; transition: all 0.2s; text-decoration: none; }
        .pagination-nav a { background: rgba(249,115,22,0.12); color: #fb923c; border: 1px solid rgba(249,115,22,0.2); }
        .pagination-nav a:hover { background: rgba(249,115,22,0.25); border-color: rgba(249,115,22,0.5); }
        .pagination-nav span[aria-current="page"] { background: linear-gradient(135deg, #f97316, #ef4444); color: white; border: none; }
        .pagination-nav span:not([aria-current]) { color: #6b7280; }
    </style>
</head>
<body class="overflow-hidden lg:flex flex-col min-h-screen justify-center items-center">

    <section class="relative h-screen bg-[url(kaala.png)] bg-cover lg:w-[30vw] z-0">
        <div class="absolute inset-0">
            <div class="text-center my-5">
                <span class="text-7xl bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 bg-clip-text text-transparent font-bold animate-pulse animate-infinite">Kaala :)</span>
                <p class="text-gray-300 mt-2">See the list of all the feeds!</p>
            </div>

            <div class="lg:mx-4 lg:pt-12 pt-8 px-2 lg:px-4">
                <div class="rounded-2xl overflow-hidden border border-orange-400/40 shadow-lg shadow-orange-500/20 backdrop-blur-sm bg-black/30">
                    <div class="flex items-center justify-between px-5 py-4 border-b border-white/5">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-table-list text-orange-400 text-sm"></i>
                            <span class="text-gray-300 text-sm font-medium">All Feeds</span>
                        </div>
                        <span class="text-xs text-gray-300 font-mono">{{ $responses->total() }} total</span>
                    </div>
                    <table class="table w-full text-left text-gray-300 text-sm mb-0">
                        <thead>
                            <tr class="text-black font-bold">
                                <th class="bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 px-4 py-3"><i class="fa-solid fa-user mr-1.5 opacity-80"></i>Name</th>
                                <th class="bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 px-4 py-3"><i class="fa-solid fa-comment mr-1.5 opacity-80"></i>Response</th>
                                <th class="bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 px-4 py-3"><i class="fa-solid fa-clock mr-1.5 opacity-80"></i>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($responses as $response)
                            <tr class="border-b border-orange-400/20 hover:bg-white/5 transition-colors duration-150">
                                <td class="px-4 py-2">{{ $response->name }}</td>
                                <td class="px-4 py-2">{{ $response->query }}</td>
                                <td class="px-4 py-2">{{ $response->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-5 py-4 border-t border-white/5 flex justify-center [&_nav]:flex [&_nav]:flex-row [&_nav]:flex-wrap [&_nav]:items-center [&_nav]:justify-center [&_nav]:gap-1 [&_nav>*]:flex [&_nav>*]:flex-row [&_nav_span]:inline-flex [&_nav_span]:items-center [&_nav_span]:justify-center [&_nav_span]:min-w-[32px] [&_nav_span]:h-8 [&_nav_span]:px-2.5 [&_nav_span]:rounded-lg [&_nav_span]:text-[13px] [&_nav_span]:font-medium [&_nav_a]:inline-flex [&_nav_a]:items-center [&_nav_a]:justify-center [&_nav_a]:min-w-[32px] [&_nav_a]:h-8 [&_nav_a]:px-2.5 [&_nav_a]:rounded-lg [&_nav_a]:text-[13px] [&_nav_a]:font-medium [&_nav_a]:bg-orange-500/10 [&_nav_a]:text-orange-400 [&_nav_a]:border [&_nav_a]:border-orange-500/20 [&_nav_a]:no-underline [&_nav_a:hover]:bg-orange-500/25 [&_nav_a:hover]:border-orange-500/50 [&_nav_span[aria-current=page]]:bg-fire [&_nav_span[aria-current=page]]:text-white [&_nav_span:not([aria-current])]:text-gray-300">
                        {{ $responses->links() }}
                     </div>
                </div>
            </div>

            <div class="absolute w-full bottom-10 text-center mb-6">
                <span class="text-extrabold text-gray-200 mt-4">If you say yes, I will be happy :) By - </span>
                <a href="https://wa.me/9944370597" class="bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 bg-clip-text text-transparent font-bold mb-4">Vicky..!</a>
            </div>
            <div class="absolute bottom-3 w-full text-center mb-4">
                <span class="bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 bg-clip-text text-transparent text-sm">Copyright © 2026 - All rights reserved.</span>
            </div>
            <div class="absolute bottom-0 w-full text-center mb-2">
                <span class="text-gray-400 text-sm">Designed By - ABUBAKKAR SIDHIK</span>
            </div>
        </div>
    </section>
</body>
</html>
