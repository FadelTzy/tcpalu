@extends('layouts.vl_admin')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <h6 class="mb-0 text-uppercase">Data Status</h6>
            <hr />
            <div class="card">
                <div class="card-header">
                    <div>
                        <button type="button" class="btn btn-primary add" id="add" name="add"><i
                                class="bx bx-book-add"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table p-3">
                        <table id="example" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Status</th>
                                    <th>Deskripsi</th>
                                    <th>Nilai</th>
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
                <form name="formstatus" id="formstatus" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="form mb-3">
                            <label data-error="wrong" data-success="right" for="orangeForm-name">Nama Statu</label>
                            <input type="text" id="nama_status" name="nama_status" class="form-control validate">
                        </div>
                        <div class="form mb-3">
                            <label data-error="wrong" data-success="right" for="deskripsi_status">Deskripsi</label>
                            <input type="text" id="deskripsi_status" name="deskripsi_status" class="form-control validate">

                        </div>

                        <div class="form">
                            <label data-error="wrong" data-success="right" for="orangeForm-pass">Nilai Status</label>
                            <input type="text" id="nilai_status" name="nilai_status" class="form-control validate">
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
                <form name="formstatusu" id="formstatusu" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="form mb-3">
                            <label data-error="wrong" data-success="right" for="orangeForm-name">Nama Statu</label>
                            <input type="text" id="nama_statusu" name="nama_status" class="form-control validate">
                            <input type="hidden" id="idu" name="id" class="form-control validate">
                        </div>
                        <div class="form mb-3">
                            <label data-error="wrong" data-success="right" for="deskripsi_status">Deskripsi</label>
                            <input type="text" id="deskripsi_statusu" name="deskripsi_status" class="form-control validate">

                        </div>

                        <div class="form">
                            <label data-error="wrong" data-success="right" for="orangeForm-pass">Nilai Status</label>
                            <input type="text" id="nilai_statusu" name="nilai_status" class="form-control validate">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="update" class="btn btn-primary" id="update" name="update">Update</button>
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
                url: "{{ url('admin/status') }}",
                type: "POST",
                data: $('#formstatus').serialize(),
                success: function(response) {
                    $('#submit').html('Submit');
                    $("#submit").attr("disabled", false);
                    $('#exampleModal').modal('hide');
                    tabel.ajax.reload();
                    // success_noti();
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
                url: "{{ url('admin/status/update') }}",
                type: "POST",
                data: $('#formstatusu').serialize(),
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
            tabel = $("#example").DataTable({
                columnDefs: [{
                        targets: 0,
                        width: "10%",
                    }, {
                        targets: 1,
                        width: "20%",
                    },
                    {
                        targets: 2,
                        width: "30%",

                    },
                    {
                        targets: 3,
                        width: "10%",

                    },
                    {
                        targets: 4,
                        width: "20%",

                    },

                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('admin/status') }}",
                },
                columns: [{
                        nama: 'DT_RowIndex',
                        data: 'DT_RowIndex'
                    }, {
                        nama: 'nama_status',
                        data: 'nama_status'
                    },
                    {
                        nama: 'deskripsi_status',
                        data: 'deskripsi_status'
                    },
                    {
                        nama: 'nilai_status',
                        data: 'nilai_status'
                    },
                    {
                        nama: 'aksi',
                        data: 'aksi'
                    },
                ],

            });
        });

        $(".add").click(function() {
            var title = " koko";
            $('#exampleModal').modal('show');
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
                    url: url + '/admin/status/' + id,
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
            $("#nama_statusu").val(id.nama_status);
            $("#deskripsi_statusu").val(id.deskripsi_status);
            $("#nilai_statusu").val(id.nilai_status);

            console.log(id);
        }
    </script>
@endpush
