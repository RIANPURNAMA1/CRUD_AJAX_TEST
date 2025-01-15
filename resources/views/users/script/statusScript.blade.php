@push('script')
    <script>
         // status active dan inactive
         $('body').on('click', '.statusButton', function() {
                var userId = $(this).data('id'); 
                var status = $(this).data('status'); 

                swal({
                    title: "Konfirmasi",
                    text: "Apakah Anda yakin ingin mengubah status pengguna ini?",
                    type: "warning",
                    buttons: true,
                    dangerMode: true,

                }).then((ubahStatus) => {
                    if (ubahStatus) {
                        $.ajax({
                            type: 'POST',
                            url: `/users/status/${userId}`, 
                            data: {
                                status: status 
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content') // Token CSRF
                            },
                            success: function(data) {
                                console.log(data);
                                swal({
                                    title: "Status Berhasil Diubah",
                                    text: "Status Berhasil Diubah",
                                    icon: "success",
                                    buttons: false,
                                });
                                $('#myTable').DataTable().ajax
                            .reload(); // Reload DataTable
                            },
                            error: function(xhr) {
                                console.error(xhr);
                                alert(
                                    'Terjadi kesalahan saat mengubah status'
                                    ); // Pesan error
                            }
                        });

                    }

                })


            });
    </script>
@endpush