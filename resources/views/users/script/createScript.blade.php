@push('script')

<script>
  $(document).ready(function() {
    // Event handler ketika tombol create diklik
    $('#createUserButton').on('click', function() {
        $('#createUserModal').removeClass('hidden');
        $('#modalTitle').text('Create User');  
        $('#userId').val('');  
    });

    // Event handler untuk menutup modal
    $('#closeModal').click(function() {
        $('#createUserModal').addClass('hidden');  
        $('#createUserForm')[0].reset(); 
        $('#photoPreview').addClass('hidden');  
    });

    // Event handler untuk mengirimkan form (create user)
    $('#createUserForm').on('submit', function(event) {
        event.preventDefault(); 

        // Validasi input form
        var isValid = true;

        // Validasi Name
        if ($('#name').val().trim() === '') {
            isValid = false;
            swal({
                title: "Error",
                text: "Name is required",
                icon: "error",
                button: "OK",
            });
        }

        // Validasi Role
        if ($('#role_id').val() === '') {
            isValid = false;
            swal({
                title: "Error",
                text: "Role is required",
                icon: "error",
                button: "OK",
            });
        }

        // Validasi Phone
        if ($('#phone').val().trim() === '') {
            isValid = false;
            swal({
                title: "Error",
                text: "Phone number is required",
                icon: "error",
                button: "OK",
            });
        }

        // Validasi Email
        if ($('#email').val().trim() === '') {
            isValid = false;
            swal({
                title: "Error",
                text: "Email is required",
                icon: "error",
                button: "OK",
            });
        }

        // Validasi Address
        if ($('#address').val().trim() === '') {
            isValid = false;
            swal({
                title: "Error",
                text: "Address is required",
                icon: "error",
                button: "OK",
            });
        }

        // Validasi Photo
        if ($('#photo').get(0).files.length === 0) {
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

        let formData = new FormData(this);  // Mengambil data dari form

        $.ajax({
            url: '/users',  // Hanya menggunakan URL untuk store
            type: 'POST',
            data: formData,
            contentType: false,  // Menjaga form-data tetap sebagai multipart
            processData: false,  // Tidak memproses data agar tetap bisa mengirimkan file
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  // Mengirimkan token CSRF untuk keamanan
            },
            success: function(response) {
                $('#createUserModal').addClass('hidden');  // Menyembunyikan modal setelah sukses
                $('#createUserForm')[0].reset();  // Mereset form input
                $('#photoPreview').addClass('hidden');  // Menyembunyikan preview foto
                $('#myTable').DataTable().ajax.reload();  // Mengupdate DataTable dengan data terbaru
                swal({
                    title: "Success",
                    text: "User created successfully",  // Menampilkan notifikasi sukses
                    icon: "success",
                });
            },
            error: function(xhr, status, error) {
                console.error(error);  // Menampilkan error di konsol jika terjadi kesalahan
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
