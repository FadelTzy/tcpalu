@extends('layouts.vl_admin')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <h6 class="mb-0 text-uppercase">Data Kepuasan</h6>
            <hr />
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary btnrekap btn-sm" id="btnrekap" name="btnrekap">Eksport
                        Excel</button>
                </div>
                {{-- <div class="card-body">
                    <div class="table p-3">
                        <table id="example" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tahun Lulus</th>
                                    <th>p1 </th>
                                    <th>p2 </th>
                                    <th>p3 </th>
                                    <th>p4 </th>
                                    <th>p5 </th>
                                    <th>p6 </th>
                                    <th>p7 </th>
                                    <th>p8 </th>
                                    <th>p9 </th>
                                    <th>p10 </th>
                                    <th>p11 </th>
                                    <th>p12 </th>
                                    <th>p13 </th>
                                    <th>p14 </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="formsrekap" id="formsrekap" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Unduh Rekap</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="form mb-3">
                            <label data-error="wrong" data-success="right" for="kd_univ">Pilih Universitas</label>
                            <select name="kd_univ" id="kd_univ" class="form-control">
                                <option value="">Pilih</option>
                                @foreach ($datauniv as $item)
                                    <option value={{ $item->kd_univ }}>
                                        {{ $item->nm_univ }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form mb-3">
                            <label data-error="wrong" data-success="right" for="kode_prodi">Pilih Program Studi</label>
                            <select name="kode_prodi" id="kode_prodi" class="form-control">
                                <option value="">Pilih</option>
                                @foreach ($dataprodi as $item)
                                    <option value={{ $item->kode_prodi }}>
                                        {{ $item->nama_prodi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form mb-3">
                            <label data-error="wrong" data-success="right" for="tahun_lulus">Pilih Tahun</label>
                            <select name="tahun_lulus" id="tahun_lulus" class="form-control">
                                <option value="">Pilih</option>
                                @foreach ($datatahun as $item)
                                    <option value={{ $item->nilai_tl }}>
                                        {{ $item->nilai_tl }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="submit" name="submit">Cetak Rekap</button>

                        {{-- <div id="divbtn" name="divbtn">
                            <a class="btn btn-success exportbtn" id="exportbtn" href="#" name="exportbtn">
                                Unduh File Excel
                            </a>
                        </div> --}}
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
        // $('#divbtn').addClass('d-none');


        $('#submit').on('click', function(id) {
            var tahun = $("#tahun_lulus").val();
            var prodi = $("#kode_prodi").val();
            var univ = $("#kd_univ").val();
            console.log(tahun);


            var ini = "{{ url('kepuasan/export?tahun_lulus=') }}" + tahun + "&univ=" + univ + "&prodi=" + prodi;
            console.log(ini);
            window.open(ini, "_blank");

        });


        $(document).ready(function() {
            tabel = $("#example").DataTable({
                // columnDefs: [{
                //         targets: 0,
                //         width: "10%",
                //     }, {
                //         targets: 1,
                //         width: "32%",
                //     },
                //     // {
                //     //     targets: 2,
                //     //     width: "32%",
                //     // },

                // ],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('admin/kepuasan') }}",
                },
                columns: [{
                        nama: 'id',
                        data: 'id'
                    },
                    {
                        nama: 'name',
                        data: 'name'
                    }, {
                        nama: 'tahun_lulus',
                        data: 'tahun_lulus'
                    },
                    {
                        nama: 'kp1',
                        data: 'kp1'
                    },
                    {
                        nama: 'kp2',
                        data: 'kp2'
                    },
                    {
                        nama: 'kp3',
                        data: 'kp3'
                    },
                    {
                        nama: 'kp4',
                        data: 'kp4'
                    },
                    {
                        nama: 'kp5',
                        data: 'kp5'
                    },
                    {
                        nama: 'kp6',
                        data: 'kp6'
                    },
                    {
                        nama: 'kp7',
                        data: 'kp7'
                    },
                    {
                        nama: 'kp8',
                        data: 'kp8'
                    },
                    {
                        nama: 'kp9',
                        data: 'kp9'
                    },
                    {
                        nama: 'kp10',
                        data: 'kp10'
                    },
                    {
                        nama: 'kp11',
                        data: 'kp11'
                    },
                    {
                        nama: 'kp12',
                        data: 'kp12'
                    },
                    {
                        nama: 'kp13',
                        data: 'kp13'
                    },
                    {
                        nama: 'kp14',
                        data: 'kp14'
                    },
                ],

            });

            $(".btnrekap").click(function() {
                var title = " koko";
                $('#exampleModal').modal('show');
            });

            // $("#tahun_lulus").on("change", function() {
            //     var nilai = $(this).val();
            //     $("#exportbtn").attr("href", nilai);
            //     if (nilai == "") {
            //         $('#divbtn').addClass('d-none');

            //     } else {
            //         $('#divbtn').removeClass('d-none');

            //     }

            // });

        });

        function btnexport() {
            alert("koko");
        }
    </script>
@endpush
