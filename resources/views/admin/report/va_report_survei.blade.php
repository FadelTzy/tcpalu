@extends('layouts.vl_admin')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">Report Survei Pengguna</h5>
                    </div>
                    <hr>
                    <form class="form-horizontal form-groups-bordered" name="formstatus" id="formstatus">
                        <div class="row form-group">
                            <label for="tahun" class="col-sm-3 control-label">Tahun Lulus</label>
                            <input type="number" class="col-sm-5 " id="tahun" name="tahun">
                        </div>
                        <input type="hidden" name="jreport" id="jreport" value="kompetensi">
                        <hr>
                        <div class="col-12">
                            <button type="button" class="btn btn-primary px-5 submit">Submit</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
            <div class="alert alert-danger d-none" id="responseMessage"> </div>
            <div id="divChart" class=" d-none">
                <h6 class="mb-0 text-uppercase" id="nChart">N : </h6>
                <hr/>
                <div class="card">
                    <div class="card-header">
                        Report Survei Pengguna Lulusan 
                    </div>
                    <div class="card-body p-5">
                        <div class="chart-container1">
                            <canvas id="surveiChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Report Penguasaan Kompetensi Alumni
                    </div>
                    <div class="card-body">
                        <div class="table p-3">
                            <table id="example" class="table table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th>Sikap/Etika</th>
                                        <th>Keahlian pada bidang ilmu</th>
                                        <th>Kemampuan berbahasa asing</th>
                                        <th>Penggunaan teknologi informasi</th>
                                        <th>Kemampuan berkomunikasi</th>
                                        <th>Kemampuan Kerjasama</th>
                                        <th>Kemampuan Pengembangan Diri</th>
                                        <th>Kepemimpinan</th>
                                        <th>Etos Kerja</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td id="item1"></td>
                                    <td id="item2"></td>
                                    <td id="item3"></td>
                                    <td id="item4"></td>
                                    <td id="item5"></td>
                                    <td id="item6"></td>
                                    <td id="item7"></td>
                                    <td id="item8"></td>
                                    <td id="item9"></td>
                                </tbody>
                            </table>
                        </div>
                    </div>
    
                </div>
                <div class="card">
                    <div class="card-header">
                        Report Skor Ideal Kompetensi
                    </div>
                    <div class="card-body">
                        <div class="table p-3">
                            <table id="example" class="table table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th>Sikap/Etika</th>
                                        <th>Keahlian pada bidang ilmu</th>
                                        <th>Kemampuan berbahasa asing</th>
                                        <th>Penggunaan teknologi informasi</th>
                                        <th>Kemampuan berkomunikasi</th>
                                        <th>Kemampuan Kerjasama</th>
                                        <th>Kemampuan Pengembangan Diri</th>
                                        <th>Kepemimpinan</th>
                                        <th>Etos Kerja</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td id="item11"></td>
                                    <td id="item12"></td>
                                    <td id="item13"></td>
                                    <td id="item14"></td>
                                    <td id="item15"></td>
                                    <td id="item16"></td>
                                    <td id="item17"></td>
                                    <td id="item18"></td>
                                    <td id="item19"></td>
                                </tbody>
                            </table>
                        </div>
                    </div>
    
                </div>
            </div>
            
        </div>
    </div>
    <!--end page wrapper -->
    
@endsection
@push('prepend-script')
    <!-- Vendor js -->
    <script src="vertical/assets/js/jquery.min.js"></script>
@endpush

@push('addon-script')
    <script>
        var url = window.location.origin;
        $('.submit').on('click', function(id) {
            id.preventDefault()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#submit').html('Please Wait...');
            $("#submit").attr("disabled", true);
            $.ajax({
                url: "{{ url('admin/report_survei/hasil') }}",
                type: "POST",
                data: $('#formstatus').serialize(),
                success: function(response) {
                    $('#submit').html('Submit');
                    $("#submit").attr("disabled", false);
                    if (response.status){
                        $("#responseMessage").addClass('d-none');
                        $("#divChart").removeClass('d-none');
                        $("#nChart").html('N : '+ response.n);
                        
                        // chart 4
                        new Chart(document.getElementById("surveiChart"), {
                            type: 'radar',
                            data: {
                                labels: response.labels,
                                datasets: [{
                                    label: response.label[0],
                                    fill: true,
                                    backgroundColor: "rgb(13 110 253 / 23%)",
                                    borderColor: "#0d6efd",
                                    pointBorderColor: "#fff",
                                    pointBackgroundColor: "rgba(179,181,198,1)",
                                    data: response.data1
                                }, {
                                    label: response.label[1],
                                    fill: true,
                                    backgroundColor: "rgba(255,99,132,0.2)",
                                    borderColor: "rgba(255,99,132,1)",
                                    pointBorderColor: "#fff",
                                    pointBackgroundColor: "rgba(255,99,132,1)",
                                    pointBorderColor: "#fff",
                                    data: response.data2
                                }]
                            },
                            options: {
                                maintainAspectRatio: false,
                                title: {
                                    display: true,
                                    text: 'Report Rata-Rata Survei Pengguna Lulusan'
                                }
                            }
                        });
                        $("#item1").html(response.data1[0]);
                        $("#item2").html(response.data1[1]);
                        $("#item3").html(response.data1[2]);
                        $("#item4").html(response.data1[3]);
                        $("#item5").html(response.data1[4]);
                        $("#item6").html(response.data1[5]);
                        $("#item7").html(response.data1[6]);
                        $("#item8").html(response.data1[7]);
                        $("#item9").html(response.data1[8]);
                        $("#item11").html(response.data2[0]);
                        $("#item12").html(response.data2[1]);
                        $("#item13").html(response.data2[2]);
                        $("#item14").html(response.data2[3]);
                        $("#item15").html(response.data2[4]);
                        $("#item16").html(response.data2[5]);
                        $("#item17").html(response.data2[6]);
                        $("#item18").html(response.data2[7]);
                        $("#item19").html(response.data2[8]);
                    }else{
                        $("#responseMessage").html(response.message);
                        $("#responseMessage").removeClass('d-none');
                        $("#divChart").addClass('d-none');
                    }
                }
            });
            return false;
        });
    </script>
@endpush
