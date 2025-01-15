 {{-- sidebar mobile --}}
 <div class=" sidebarMobile transition-transform  hidden  duration-3000 fixed top-0 left-0 z-50 bottom-0 lg:hidden w-56 bg-white shadow-md"
     style="">
     <div class="p-4 flex justify-between items-start">
         <h1 class="lg:text-2xl md:text-1xl font-bold text-blue-900 ">Test Fullstack | <span class="text-black">Rian
                 Purnama</span></h1>
         <button onclick="toggleClose()" class="bg-blue-900 text-white rounded "><i
                 class="fa-solid fa-x text-2xl px-3 py-1"></i></button>
     </div>
     <div>
     </div>
     <nav class="mt-6">
         <a href="/" class="flex items-center py-2.5 px-4 text-gray-700 hover:bg-gray-200">
             <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
         </a>
         <a href="/users" class="flex items-center py-2.5 px-4 text-gray-700 hover:bg-gray-200">
             <i class="fas fa-users mr-2"></i> Users
         </a>
         <a href="#" class="flex items-center py-2.5 px-4 text-gray-700 hover:bg-gray-200">
             <i class="fa-solid fa-user mr-2"></i> Roles
         </a>

     </nav>
 </div>
