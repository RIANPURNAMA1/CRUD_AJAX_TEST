<!-- Modal -->
<div id="createUserModal" class="fixed inset-0 z-50 hidden bg-gray-800 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg grid lg:grid-cols-1 md:grid-cols-2 gap-4 p-6">
        <h2 class="text-xl font-semibold mb-4" id="modalTitle">Create User</h2>
        <form id="createUserForm" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" id="userId" name="userId">
            <div class="mb-4">
                <label for="role_id" class="block text-sm font-medium text-gray-700">Role</label>
                <select class="mt-1 block w-full border-gray-300 rounded-md" id="role_id" name="role_id" >
                    <option value="">Select Role</option>
                    @foreach ($dataRoles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <div id="errorMessages" class="mb-4 text-red-500 hidden"></div>
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md" id="name" name="name"
                    >
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md" id="phone" name="phone"
                >
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" class="mt-1 block w-full border-gray-300 rounded-md" id="email" name="email"
                    >
            </div>
            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md" id="address" name="address"
                    >
            </div>
            <div class="mb-4">
                <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                <input type="file" class="mt-1 block w-full border-gray-300 rounded-md" id="photo" name="photo"
                    onchange="previewImage(this)">
            </div>
            <div id="photoPreview" class="mb-4 hidden">
                <label class="block text-sm font-medium text-gray-700">Image Preview</label>
                <img id="imagePreview" src="#" alt="Image Preview"
                    class="w-32 h-32 object-cover mt-2 border rounded-full">
            </div>
            <div class="flex justify-end">
                <button type="button" class="mr-2 px-4 py-2 bg-gray-300 text-gray-700 rounded"
                    id="closeModal">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded" id="saveUser">Save</button>
            </div>
        </form>
    </div>
</div>  


