@push('script')
    <script>
        // Event handler untuk menghapus user
    $('body').on('click', '.deleteUserButton', function() {
       
       const userId = $(this).data('id');  // Mendapatkan id user yang akan dihapus
       const url = `/users/${userId}`;  // URL untuk menghapus user

       // Konfirmasi sebelum menghapus
       swal({
           title: "Apakaj Kamu Yakin ?",
           text: " Kamu akan menghapus user ini secara permanen.",
           icon: "warning",
           buttons: true,
           dangerMode: true,
       }).then((willDelete) => {
           if (willDelete) {
               $.ajax({
                   url: url,
                   type: 'POST', 
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }, // Menggunakan DELETE untuk menghapus user
                   success: function(response) {
                       $('#myTable').DataTable().ajax.reload();  // Mengupdate DataTable setelah penghapusan
                       swal({
                           title: "Success",
                           text: "User deleted successfully",  // Menampilkan notifikasi setelah berhasil menghapus
                           icon: "success",
                       });
                   },
                   error: function(xhr, status, error) {
                       console.error(error);  // Menampilkan error jika terjadi masalah
                   },
               });
           }
       });
   }); // end delete user
    </script>
@endpush