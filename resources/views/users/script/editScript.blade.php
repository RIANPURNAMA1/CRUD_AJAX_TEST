@push('script')
<script>
$(document).ready(function() {
   
    $(document).on('click', '.editUserButton', function() {
        const user = {
            id: $(this).data('id'),               
            name: $(this).data('name'),           
            role_id: $(this).data('role_id'),     
            phone: $(this).data('phone'),        
            email: $(this).data('email'),         
            address: $(this).data('address'),     
            photo: $(this).data('photo'),         
        };
        editUser(user);  
    });

    // Function to fill the modal with the user's data
    function editUser(user) {
        $('#userId').val(user.id);  
        $('#role_id_edit').val(user.role_id); 
        $('#name_edit').val(user.name);  
        $('#phone_edit').val(user.phone);  
        $('#email_Edit').val(user.email);  
        $('#address_Edit').val(user.address); 

        if (user.photo) {
            $('#photoPreviewEdit').removeClass('hidden');
            $('#imagePreviewEdit').attr('src', user.photo);
        } else {
            $('#photoPreviewEdit').addClass('hidden');
        }

        $('#modalTitle').text('Edit User');
        $('#editUserModal').removeClass('hidden');
    }

    // Event handler for closing modal
    $('body').on('click', '#closeModal', function() {
        $('#editUserModal').addClass('hidden');
    })

    // Event handler for updating user data (AJAX)
    $('#updateUserForm').on('submit', function(event) {
        event.preventDefault();

        // Validasi form
        var isValid = true;

        // Validasi Name
        if ($('#name_edit').val().trim() === '') {
            isValid = false;
            swal({
                title: "Error",
                text: "Name is required",
                icon: "error",
                button: "OK",
            });
        }

        // Validasi Role
        if ($('#role_id_edit').val() === '') {
            isValid = false;
            swal({
                title: "Error",
                text: "Role is required",
                icon: "error",
                button: "OK",
            });
        }

        // Validasi Phone
        if ($('#phone_edit').val().trim() === '') {
            isValid = false;
            swal({
                title: "Error",
                text: "Phone number is required",
                icon: "error",
                button: "OK",
            });
        }

        // Validasi Email
        if ($('#email_Edit').val().trim() === '') {
            isValid = false;
            swal({
                title: "Error",
                text: "Email is required",
                icon: "error",
                button: "OK",
            });
        }

        // Validasi Address
        if ($('#address_Edit').val().trim() === '') {
            isValid = false;
            swal({
                title: "Error",
                text: "Address is required",
                icon: "error",
                button: "OK",
            });
        }

        // Validasi Photo
        if ($('#photo_edit').get(0).files.length === 0 && !$('#photoPreviewEdit').hasClass('hidden')) {
            isValid = false;
            swal({
                title: "Error",
                text: "Photo is required",
                icon: "error",
                button: "OK",
            });
        }

        if (!isValid) {
            return;  // Jika ada yang kosong, tidak lanjutkan pengiriman form
        }

        let userId = $('#userId').val();  
        let formData = new FormData(this);  

        $.ajax({
            url: `/users/${userId}/update`,  
            type: 'POST',  
            data: formData,
            contentType: false,  
            processData: false,  
            success: function(response) {
                $('#editUserModal').addClass('hidden');
                $('#updateUserForm')[0].reset();
                $('#photoPreviewEdit').addClass('hidden');
                $('#myTable').DataTable().ajax.reload();
                swal({
                    title: "Success",
                    text: "User updated successfully",
                    icon: "success",
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
                swal({
                    title: "Error",
                    text: "There was an error processing the request.",
                    icon: "error",
                });
            },
        });
    });
});
</script>
@endpush
