@extends('layouts.vl_admin')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <h6 class="mb-0 text-uppercase">Data User</h6>
            <hr />
            <div class="card">
                <div class="card-header">
                    <div>
                        <button type="button" class="btn btn-primary add" id="add" name="add"><i
                                class="bx bx-book-add"></i></button>
                        <button type="button" class="btn btn-primary btnimportuser" id="btnimportuser"
                            name="btnimportuser">Import User</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table p-3">
                        <table id="example" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="form" id="form" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="form mb-3">
                            <label data-error="wrong" data-success="right" for="role">Role User</label>
                            <select name="role" id="role" class="form-control">
                                <option value="1">Admin</option>
                                <option value="2">Mahasiswa</option>
                            </select>
                        </div>
                        <div class="form mb-3">
                            <label data-error="wrong" data-success="right" for="orangeForm-name">Your name</label>
                            <input type="text" id="name" name="name" class="form-control validate">
                        </div>
                        <div class="form mb-3">
                            <label data-error="wrong" data-success="right" for="orangeForm-email">Your email</label>
                            <input type="email" id="email" name="email" class="form-control validate">
                        </div>
                        <div class="form">
                            <label data-error="wrong" data-success="right" for="orangeForm-pass">Your password</label>
                            <input type="password" id="password" name="password" class="form-control validate">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="submit" name="submit">Simpan</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="formu" id="formu" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="form mb-3">
                            <label data-error="wrong" data-success="right" for="orangeForm-name">Your name</label>
                            <input type="text" id="nameu" name="name" class="form-control validate">
                        </div>
                        <div class="form mb-3">
                            <label data-error="wrong" data-success="right" for="orangeForm-email">Your email</label>
                            <input type="email" id="emailu" name="email" class="form-control validate">

                        </div>

                        <div class="form">
                            <label data-error="wrong" data-success="right" for="orangeForm-pass">Your password</label>
                            <input type="password" id="passwordu" name="password" class="form-control validate">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="update" name="update">Update</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalimport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="formimport" id="formimport" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Data User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="form mb-3">
                            <label data-error="wrong" data-success="right" for="uploaded_file">Pilih File Excel
                                .xlxs/.cvs</label>
                            <input type="file" name="uploaded_file" id="uploaded_file" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">upload</button>

                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection

@push('prepend-script')
    <!-- Vendor js -->
    <script src="vertical/assets/js/jquery.min.js"></script>
@endpush

@push('addon-script')
    {{-- {{-- <script> --}}

    {{-- </script> --}}
    <script>
        var url = window.location.origin;
        $('#submit').on('click', function(id) {
            id.preventDefault()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#submit').html('Please Wait...');
            $("#submit").attr("disabled", true);
            $.ajax({
                url: "{{ url('admin/user') }}",
                type: "POST",
                data: $('#form').serialize(),
                success: function(response) {
                    $('#submit').html('Submit');
                    $("#submit").attr("disabled", false);
                    $('#exampleModal').modal('hide');
                    tabel.ajax.reload();
                    Lobibox.notify('success', {
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        icon: 'bx bx-check-circle',
                        msg: 'Data Tersimpan'
                    });
                }
            });
        });

        $('#update').on('click', function(id) {
            id.preventDefault()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#update').html('Please Wait...');
            $("#update").attr("disabled", true);
            $.ajax({
                url: "{{ url('admin/user/update') }}",
                type: "POST",
                data: $('#formu').serialize(),
                success: function(response) {
                    $('#update').html('update');
                    $("#update").attr("disabled", false);
                    $('#exampleModalu').modal('hide');
                    tabel.ajax.reload();
                    // success_noti();
                    Lobibox.notify('success', {
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        icon: 'bx bx-check-circle',
                        msg: 'Data Terupdate'
                    });
                }
            });
        })

        $(document).ready(function() {
            // tabel.ajax().reload();
            // $('#example').DataTable();
            // var table = $('#example2').DataTable({
            //     lengthChange: false,
            //     buttons: ['copy', 'excel', 'pdf', 'print']
            // });

            // table.buttons().container()
            //     .appendTo('#example2_wrapper .col-md-6:eq(0)');
            tabel = $("#example").DataTable({
                columnDefs: [{
                        targets: 0,
                        width: "20%",
                    },
                    {
                        targets: 1,
                        width: "30%",

                    },
                    {
                        targets: 1,
                        width: "13%",

                    },
                    {
                        targets: 1,
                        width: "12%",

                    },
                    {
                        targets: 1,
                        width: "25%",

                    },

                ],
                processing: true,
                serverSide: true,
                ajax: {
                    // url: "{{ route('user.index') }}",
                    url: "{{ url('admin/user') }}",
                },
                columns: [{
                        nama: 'DT_RowIndex',
                        data: 'DT_RowIndex'
                    },
                    {
                        nama: 'name',
                        data: 'name'
                    },
                    {
                        nama: 'email',
                        data: 'email'
                    },
                    {
                        nama: 'role',
                        data: 'role'
                    },
                    {
                        nama: 'aksi',
                        data: 'aksi'
                    },
                ],

            });

            // var url = window.location.origin;

            // $('#uploadfile').on('click', function(id) {
            //     id.preventDefault()
            //     $.ajaxSetup({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         }
            //     });
            //     $('#uploadfile').html('Please Wait...');
            //     $("#uploadfile").attr("disabled", true);
            //     $.ajax({
            //         url: "{{ url('upload-content') }}",
            //         type: "POST",
            //         data: $('#formimport').serialize(),
            //         success: function(response) {
            //             $('#uploadfile').html('upload');
            //             $("#uploadfile").attr("disabled", false);
            //             $('#modalimport').modal('hide');
            //             tabel.ajax.reload();
            //             Lobibox.notify('success', {
            //                 pauseDelayOnHover: true,
            //                 continueDelayOnInactiveTab: false,
            //                 position: 'top right',
            //                 icon: 'bx bx-check-circle',
            //                 msg: 'Data Tersimpan'
            //             });
            //         }
            //     });
            // });

            $('#formimport').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: "{{ url('upload-content') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $('#formimport').modal('hide');
                        this.reset();
                        Lobibox.notify('success', {
                            pauseDelayOnHover: true,
                            continueDelayOnInactiveTab: false,
                            position: 'top right',
                            icon: 'bx bx-check-circle',
                            msg: 'Berhasil Mengimport User'
                        });
                        console.log(data);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
        });

        $(".add").click(function() {
            var title = " koko";
            $('#exampleModal').modal('show');
        });

        $(".btnimportuser").click(function() {
            var title = " koko";
            $('#modalimport').modal('show');
        });

        function staffdel(id) {
            data = confirm("Klik Ok Untuk Melanjutkan");

            if (data) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // $.LoadingOverlay("show");

                $.ajax({
                    url: url + '/admin/user/' + id,
                    type: "delete",
                    success: function(e) {
                        console.log(e);
                        // $.LoadingOverlay("hide");
                        Lobibox.notify('success', {
                            pauseDelayOnHover: true,
                            continueDelayOnInactiveTab: false,
                            position: 'top right',
                            icon: 'bx bx-check-circle',
                            msg: 'Data Berhasi Dihapus'
                        });
                        if (e == '1') {
                            tabel.ajax.reload();
                        }
                        // window.location.reload();
                    }
                })

            }
        }

        function staffupd(id) {
            url = window.location.origin;
            $('#exampleModalu').modal('show');
            $("#idu").val(id.id);
            $("#nameu").val(id.name);
            $("#emailu").val(id.email);
            $("#passwordu").val(id.password);

            console.log(id);
        }
    </script>
@endpush
