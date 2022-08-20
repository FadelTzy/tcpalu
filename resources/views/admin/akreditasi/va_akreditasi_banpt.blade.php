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
                        <h5 class="mb-0 text-primary">Akreditasi BAN PT </h5>
                    </div>
                    <hr>
                    <form class="form-horizontal form-groups-bordered" name="formstatus" id="formstatus" method="post"
                        action="{{ route('hasilemba') }}">
                        {{-- <div class="row form-group">
                            <label for="kd_univ" class="col-sm-3 control-label">Kode PT</label>
                            <input type="number" class="col-sm-5 " id="kd_univ" name="kd_univ" value="001036">
                        </div>
                        <hr>
                        <div class="row form-group">
                            <label for="kelompok" class="col-sm-3 control-label">Pengelompokkan</label>
                            <select name="kelompok" id="kelompok" class="col-sm-5 ">
                                <option value="univ">Universitas</option>
                                <option value="prodi">Program Studi</option>
                            </select>
                        </div>
                        <hr> --}}
                        <div class="row form-group">
                            <label for="tahun" class="col-sm-3 control-label">Program Studi</label>
                            <select name="kode_prodi" id="kode_prodi" class=" col-sm-5">
                                <option value="">Pilih</option>
                                @foreach ($prodi as $p)
                                    <option value="{{ $p->kode_prodi }}">{{ $p->nama_prodi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="jakreditasi" id="jakreditasi" value="banpt">
                        <hr>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary px-5">Submit</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
            @if (!empty($successMsg))
                <div class="alert alert-danger"> {{ $successMsg }}</div>
            @endif
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
                url: "{{ url('admin/akreditasi_emba/hasil') }}",
                type: "POST",
                data: $('#formstatus').serialize(),
                success: function(response) {
                    $('#submit').html('Submit');
                    $("#submit").attr("disabled", false);
                    // $('#exampleModal').modal('hide');
                    // tabel.ajax.reload();
                    // success_noti();
                    // Lobibox.notify('success', {
                    //     pauseDelayOnHover: true,
                    //     continueDelayOnInactiveTab: false,
                    //     position: 'top right',
                    //     icon: 'bx bx-check-circle',
                    //     msg: 'Data Tersimpan'
                    // });
                }
            });
            return false;
        });
    </script>
@endpush
