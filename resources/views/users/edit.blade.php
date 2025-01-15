<!-- Modal -->
<div id="editUserModal" class="fixed inset-0 z-50 hidden bg-gray-800 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg grid lg:grid-cols-1 md:grid-cols-2 gap-4 p-6" style="height: max-content">
        <h2 class="text-xl font-semibold mb-4" id="modalTitle">Create User</h2>
        <form id="updateUserForm" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" id="userId" name="userId">
            <div class="grid lg:grid-cols-2 md:grid-col-1 gap-3">

                <div>
                    <div class="mb-4">
                        <label for="role_id" class="block text-sm font-medium text-gray-700">Role</label>
                        <select class="mt-1 block w-full border-gray-300 rounded-md" id="role_id_edit" name="role_id"
                            required>
                            <option value="">Select Role</option>
                            @foreach ($dataRoles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <div id="errorMessages" class="mb-4 text-red-500 hidden"></div>
                        <input type="text" class="mt-1 block w-full border-gray-300 rounded-md" id="name_edit"
                            name="name" required>
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                        <input type="text" class="mt-1 block w-full border-gray-300 rounded-md" id="phone_edit"
                            name="phone" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" class="mt-1 block w-full border-gray-300 rounded-md" id="email_Edit"
                            name="email" required>
                    </div>
                </div>
                <div>
                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <input type="text" class="mt-1 block w-full border-gray-300 rounded-md" id="address_Edit"
                            name="address" required>
                    </div>
                    <div class="mb-4">
                        <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                        <input type="file" class="mt-1 block w-full border-gray-300 rounded-md" id="photo_edit"
                            name="photo" onchange="previewImage(this)">
                    </div>
                   
                 
                </div>
            </div>
            <div class="flex justify-end">
                <button type="button" class="mr-2 px-4 py-2 bg-gray-300 text-gray-700 rounded"
                    id="closeModal">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded" id="saveUser">Save</button>
            </div>
        </form>
    </div>
</div>
