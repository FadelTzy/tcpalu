@extends('layouts.vl_admin')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <h6 class="mb-0 text-uppercase">Data Kota / Kabupaten</h6>
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
                                    <th>ID Kota</th>
                                    <th>Nama Kota</th>
                                    <th>Nama Provinsi</th>
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kota / Kabupaten</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="form mb-3">
                            <label data-error="wrong" data-success="right" for="orangeForm-name">ID Kota / Kabupaten</label>
                            <input type="text" id="id_wil" name="id_wil" class="form-control validate">
                        </div>
                        <div class="form mb-3">
                            <label data-error="wrong" data-success="right" for="orangeForm-name">Nama Kota /
                                Kabupaten</label>
                            <input type="text" id="nm_wil" name="nm_wil" class="form-control validate">
                        </div>
                        <div class="form mb-3">
                            <label data-error="wrong" data-success="right" for="orangeForm-name">Provinsi Kota /
                                Kabupaten</label>
                            {{-- <input type="text" id="id_induk_wilayah" name="id_induk_wilayah" class="form-control validate"> --}}
                            <select name="id_induk_wilayah" id="" class="single-select">
                                @foreach ($dataprov as $item)
                                    <option value="{{ $item->id_wil }}">{{ $item->nm_wil }}</option>
                                @endforeach
                            </select>
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
                url: "{{ url('admin/kota') }}",
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
                        width: "30%",
                    },
                    {
                        targets: 1,
                        width: "30%",
                    },
                    {
                        targets: 1,
                        width: "20%",
                    },
                    {
                        targets: 1,
                        width: "20%",
                    },

                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('admin/kota') }}",
                },
                columns: [{
                        nama: 'DT_RowIndex',
                        data: 'DT_RowIndex'
                    }, {
                        nama: 'id_wil',
                        data: 'id_wil'
                    },
                    {
                        nama: 'nm_wil',
                        data: 'nm_wil'
                    },
                    {
                        nama: 'nama_provinsi',
                        data: 'nama_provinsi'
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

        $('.single-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
            dropdownParent: $("#exampleModal")

        });
        $('.multiple-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
        $("#select2insidemodal").select2({
            dropdownParent: $("#exampleModal")
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
                    url: url + '/admin/kota/' + id,
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
    </script>
@endpush
