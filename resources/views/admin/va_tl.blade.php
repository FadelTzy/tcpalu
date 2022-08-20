@extends('layouts.vl_admin')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <h6 class="mb-0 text-uppercase">Data Tahun Lulus</h6>
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
                                    <th>Tahun Lulus</th>
                                    <th>Aktif / Nonaktif</th>
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Tahun Lulus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="form mb-3">
                            <label data-error="wrong" data-success="right" for="orangeForm-name">Tahun Lulus</label>
                            <input type="text" id="nilai_tl" name="nilai_tl" class="form-control validate">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="submit" name="submit">Save changes</button>
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
                url: "{{ url('admin/tahun_lulus') }}",
                type: "POST",
                data: $('#formstatus').serialize(),
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
                        targets: 1,
                        width: "10%",
                    },
                    {
                        targets: 1,
                        width: "25%",
                    },

                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('admin/tahun_lulus') }}",
                },
                columns: [{
                        nama: 'DT_RowIndex',
                        data: 'DT_RowIndex'
                    }, {
                        nama: 'nilai_tl',
                        data: 'nilai_tl'
                    }, {
                        nama: 'status_tl',
                        data: 'status_tl',
                        render: function(data) {
                            let link;
                            if (data == 1) {
                                link =
                                    '<button class="btn btn-success btn-sm">Aktif</button>';
                            } else if (data == 0) {
                                link =
                                    '<button class="btn btn-danger btn-sm ">Nonaktif</button>';
                            }

                            return link;
                        }
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
                    url: url + '/admin/tahun_lulus/' + id,
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

        function updateaktif(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('admin/tahun_lulus/update') }}",
                type: "POST",
                data: {
                    id: id,
                    status_tl: 1,
                },
                success: function(response) {
                    tabel.ajax.reload();
                    // success_noti();
                    Lobibox.notify('success', {
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        icon: 'bx bx-check-circle',
                        msg: 'Data Terupdate'
                    });
                    console.log(response);
                }
            });

        }

        function updatenonaktif(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('admin/tahun_lulus/update') }}",
                type: "POST",
                data: {
                    id: id,
                    status_tl: 0,
                },
                success: function(response) {
                    tabel.ajax.reload();
                    // success_noti();
                    Lobibox.notify('success', {
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        icon: 'bx bx-check-circle',
                        msg: 'Data Terupdate'
                    });
                    console.log(response);
                }
            });

        }
    </script>
@endpush
