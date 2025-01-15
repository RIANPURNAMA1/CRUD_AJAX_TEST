@push('script')
    <script>
        $(document).ready(function() {

            // read data
            $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/users/data',
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1
                        },
                        orderable: false,
                        searchable: false,

                    },
                    {
                        data: 'role_id',
                        name: 'roles.name'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'photo',
                        name: 'photo',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'status',
                        name: 'status',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });


           
        



        })
    </script>
@endpush
