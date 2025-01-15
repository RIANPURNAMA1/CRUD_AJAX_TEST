<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Test Fullstack | Rian Purnama</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100 relative">

    <div x-data="{ open: false }" class="flex">
        <!-- Sidebar -->
        <div class=" sidebar hidden lg:block w-64 bg-white shadow-md " style="height: 150vh">
            <div class="p-4">
                <h1 class="text-2xl font-bold text-blue-900 ">Test Fullstack | <span class="text-black">Rian
                        Purnama</span></h1>
            </div>
            <nav class="mt-6">
                <a href="/" class="flex items-center py-2.5 px-4 text-gray-700 hover:bg-gray-200">
                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                </a>
                <a href="/users" class="flex items-center py-2.5 px-4 text-gray-700 hover:bg-gray-200">
                    <i class="fas fa-users mr-2"></i> Users
                </a>

            </nav>
        </div>

        {{-- sidebar mobile --}}
        @include('components.sidebarResponsif')
        
        <!-- Main Content -->
        <div class="flex-1 p-6">
            <button onclick="toggleSidebarResponsif()" @click="open = !open"
            class="md:hidden p-2 bg-blue-900 text-white rounded"><i
            class="fa-solid fa-bars text-2xl px-2 py-1"></i></button>
            <hr class="my-4">

            @yield('content')
        </div>
       
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
    <script src="{{ asset('assets/js/Script.js') }}"></script>
    
    
    <script>
        function toggleSidebarResponsif() {
            $('.sidebarMobile').toggleClass('hidden');
        }
        function toggleClose() {
            $('.sidebarMobile').toggleClass('hidden');
        }
        </script>

@stack('script')
</body>

</html>
