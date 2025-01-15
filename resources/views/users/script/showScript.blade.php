@push('script')
    <script>
         // Menampilkan detail pengguna di modal
         $('body').on('click', '.showUserButton', function() {
                var userId = $(this).data('id'); 

                $.ajax({
                    type: 'GET',
                    url: `/users/${userId}`, 
                    success: function(data) {
                        // Memuat detail pengguna ke dalam modal
                        $('#userRole').text(data.roles.name); 
                        $('#userName').text(data.name);
                        $('#userNameHeader').text(data.name);
                        $('#userPhone').text(data.phone);
                        $('#userEmail').text(data.email);
                        $('#userAddress').text(data.address);
                        $('#userPhoto').attr('src', data.photo ? data.photo :
                            '/path/to/default/image.png');

                        $('#showUserModal').removeClass('hidden'); 
                    },
                    error: function(xhr) {
                        console.error(xhr);
                        alert('Terjadi kesalahan saat memuat detail pengguna.'); 
                    }
                });
            });
            // show data detail


            $('body').on('click', '.closeModal', function() {
                $('#showUserModal').addClass('hidden')
            })
    </script>
@endpush