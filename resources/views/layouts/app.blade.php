<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Admin Panel</title>
        <link rel="icon" type="image/png" href="{{ asset('storage/logo/logonegeriharia.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            :root {
                --primary-purple: #6C5CE7;
                --lavender-light: #E6E1FA;
                --bg-page: #E8EBF7;
                --text-primary: #1F2430;
                --text-secondary: #5B6070;
                --cyan-accent: #2EC4D6;
                --green-online: #22C55E;
                --navy-dark: #0F1A3D;
                --red-alert: #E11D2E;
                --red-badge: #EF4444;
            }
            
            body {
                font-family: 'Figtree', sans-serif;
                background-color: var(--bg-page);
            }
            
            /* Sidebar Styles */
            .sidebar {
                width: 290px;
                background: white;
                height: 100vh;
                position: fixed;
                left: 0;
                top: 0;
                transition: transform 0.3s ease;
                z-index: 40;
                overflow-y: auto;
                box-shadow: 2px 0 8px rgba(0,0,0,0.05);
            }
            
            .sidebar.collapsed {
                transform: translateX(-100%);
            }
            
            .sidebar-header {
                padding: 24px 16px;
                text-align: center;
                border-bottom: 1px solid #F0F0F0;
            }
            
            .sidebar-menu {
                padding: 16px 12px;
            }
            
            .menu-item {
                display: flex;
                align-items: center;
                padding: 16px;
                margin-bottom: 4px;
                border-radius: 14px;
                color: #3A3F4F;
                font-weight: 600;
                font-size: 15px;
                transition: all 0.2s;
                text-decoration: none;
            }
            
            .menu-item:hover {
                background-color: rgba(230, 225, 250, 0.5);
                color: var(--primary-purple);
            }
            
            .menu-item.active {
                background-color: var(--lavender-light);
                color: var(--primary-purple);
            }
            
            .menu-item i {
                width: 24px;
                margin-right: 12px;
                font-size: 18px;
            }
            
            /* Main Content */
            .main-content {
                margin-left: 290px;
                min-height: 100vh;
                transition: margin-left 0.3s ease;
            }
            
            .main-content.sidebar-collapsed {
                margin-left: 0;
            }
            
            /* Header */
            .admin-header {
                background: white;
                height: 100px;
                box-shadow: 0 2px 8px rgba(0,0,0,0.05);
                position: sticky;
                top: 0;
                z-index: 30;
            }
            
            /* Content Area */
            .content-wrapper {
                background: var(--bg-page);
                border-top-left-radius: 24px;
                padding: 28px;
                min-height: calc(100vh - 100px);
            }
            
            /* Responsive */
            @media (max-width: 992px) {
                .sidebar {
                    transform: translateX(-100%);
                }
                .sidebar.mobile-open {
                    transform: translateX(0);
                }
                .main-content {
                    margin-left: 0;
                }
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div id="app">
            @include('layouts.navigation')

            <!-- Main Content Area -->
            <div class="main-content" id="mainContent">
                <!-- Header -->
                <div class="admin-header">
                    <div class="flex justify-between items-center px-8 h-full">
                        <!-- Left: Logo, Hamburger, Search -->
                        <div class="flex items-center gap-6">
                            <!-- Hamburger -->
                            <button onclick="toggleSidebar()" class="flex justify-center items-center bg-purple-100 hover:bg-purple-200 rounded-xl w-12 h-12 text-purple-600 transition">
                                <i class="fas fa-bars"></i>
                            </button>
                            
                            <!-- Logo & Title -->
                            <div class="flex items-center gap-3">
                                <img src="{{ asset('storage/logo/logonegeriharia.png') }}" alt="Logo" class="rounded-full w-12 h-12 object-contain">
                                <div>
                                    <h1 class="font-bold text-purple-600 text-xl uppercase tracking-wide">Negeri Haria</h1>
                                    <p class="text-gray-500 text-xs">Sistem Informasi Desa</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Right: User Only -->
                        <div class="flex items-center gap-4">
                            <!-- User Greeting -->
                            <span class="hidden md:block text-gray-700">
                                Hi, <span class="font-bold text-purple-600">{{ Auth::user()->name }}</span>
                            </span>
                            
                            <!-- User Avatar & Settings -->
                            <div class="flex items-center gap-3 bg-purple-100 hover:bg-purple-200 px-3 py-2 rounded-full transition cursor-pointer">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=6C5CE7&color=fff" 
                                     alt="Avatar" 
                                     class="rounded-full w-10 h-10">
                                <a href="{{ route('admin.settings.index') }}" class="text-purple-600 hover:text-purple-700">
                                    <i class="fas fa-cog"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Page Content -->
                <div class="content-wrapper">
                    {{ $slot }}
                </div>
            </div>
        </div>

        <script>
            function toggleSidebar() {
                const sidebar = document.getElementById('sidebar');
                const mainContent = document.getElementById('mainContent');
                
                if (window.innerWidth <= 992) {
                    // Mobile: Toggle sidebar overlay
                    sidebar.classList.toggle('mobile-open');
                } else {
                    // Desktop: Toggle sidebar collapse
                    sidebar.classList.toggle('collapsed');
                    mainContent.classList.toggle('sidebar-collapsed');
                }
            }
            
            // Close mobile sidebar when clicking outside
            document.addEventListener('click', function(event) {
                const sidebar = document.getElementById('sidebar');
                const hamburger = event.target.closest('button[onclick="toggleSidebar()"]');
                
                if (window.innerWidth <= 992 && !sidebar.contains(event.target) && !hamburger) {
                    sidebar.classList.remove('mobile-open');
                }
            });
        </script>
    </body>
</html>
