@extends('layouts.vl_admin')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <h6 class="mb-0 text-uppercase">Data Total Lulusan</h6>
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
                                    <th>Nama Universitas</th>
                                    <th>Nama Fakultas</th>
                                    <th>Nama Prodi</th>
                                    <th>Tahun Lulus</th>
                                    <th>Total Lususan</th>
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Total Lulusan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="form mb-3">
                            <label data-error="wrong" data-success="right" for="orangeForm-name">Universitas</label>
                            <select name="kd_univ" id="kd_univ" class="form-control validate">
                                <option value="">Pilih</option>
                                @foreach ($univ as $item)
                                    <option value="{{ $item->kd_univ }}">{{ $item->nm_univ }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form mb-3">
                            <label data-error="wrong" data-success="right" for="orangeForm-name">Fakultas</label>
                            <select name="kd_fak" id="kd_fak" class="form-control validate">
                                <option value="">Pilih</option>
                                @foreach ($fakultas as $item)
                                    <option value="{{ $item->kd_fak }}">{{ $item->nama_fak }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form mb-3">
                            <label data-error="wrong" data-success="right" for="orangeForm-name">Program Studi</label>
                            <select name="kode_prodi" id="kode_prodi" class="form-control validate">
                                <option value="">Pilih</option>
                                @foreach ($prodi as $item)
                                    <option value="{{ $item->kode_prodi }}">{{ $item->nama_prodi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form mb-3">
                            <label data-error="wrong" data-success="right" for="orangeForm-name">Tahun Lulus</label>
                            <select name="tahun_tl" id="tahun_tl" class="form-control validate">
                                <option value="">Pilih</option>
                                @foreach ($tahun_lulus as $item)
                                    <option value="{{ $item->nilai_tl }}">{{ $item->nilai_tl }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form mb-3">
                            <label data-error="wrong" data-success="right" for="orangeForm-name">Total Lulus</label>
                            <input type="number" id="total_tl" name="total_tl" class="form-control validate">
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
                url: "{{ url('admin/total_lulus') }}",
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
                    url: "{{ url('admin/total_lulus') }}",
                },
                columns: [{
                        nama: 'DT_RowIndex',
                        data: 'DT_RowIndex'
                    }, {
                        nama: 'nm_univ',
                        data: 'nm_univ'
                    },
                    {
                        nama: 'nama_fak',
                        data: 'nama_fak'
                    },
                    {
                        nama: 'nama_prodi',
                        data: 'nama_prodi'
                    },
                    {
                        nama: 'tahun_tl',
                        data: 'tahun_tl'
                    },
                    {
                        nama: 'total_tl',
                        data: 'total_tl'
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
                    url: url + '/admin/total_lulus/' + id,
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
