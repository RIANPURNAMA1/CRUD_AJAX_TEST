<!-- Modal Detail Pengguna -->
<div id="showUserModal" class="fixed inset-0 z-50 hidden bg-gray-800 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg p-6 w-11/12 md:w-1/3">
        <h2 class="text-xl font-semibold mb-4" id="modalTitle">Detail Pengguna : <span id="userNameHeader"></span></h2>
        <div id="userDetailContent" class="flex justify-between items-center">
            <div class="mb-4">
                <strong>Photo:</strong>
                <img id="userPhoto" src="#" alt="User  Photo" class="w-32 h-32 object-cover mt-2 border rounded-full">
            </div>
            <div>
                <p><strong>Role:</strong> <span id="userRole"></span></p>
                <p><strong>Name:</strong> <span id="userName"></span></p>
                <p><strong>Phone:</strong> <span id="userPhone"></span></p>
                <p><strong>Email:</strong> <span id="userEmail"></span></p>
                <p><strong>Address:</strong> <span id="userAddress"></span></p>
            </div>
        </div>
        <div class="flex justify-end">
            <button type="button" class="px-4 py-2 bg-gray-300 text-gray-700 rounded closeModal" id="closeModal" onclick="closeModal()">Tutup</button>
        </div>
    </div>
</div>