@extends('layouts.vl_admin')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <h6 class="mb-0 text-uppercase">Form Wizard</h6>
                    <hr />
                    <div class="card">
                        <div class="card-body">
                            {{-- <br /> --}}
                            {{-- <p>
                                <label>Theme:</label>
                                <select id="theme_selector">
                                    <option value="default">Default</option>
                                    <option value="arrows">Arrows</option>
                                    <option value="dots" selected>Dots</option>
                                    <option value="dark">Dark</option>
                                </select>&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" id="is_justified" value="1" checked />
                                <label for="is_justified">Justified</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <label>Animation:</label>
                                <select id="animation">
                                    <option value="none">None</option>
                                    <option value="fade">Fade</option>
                                    <option value="slide-horizontal" selected>Slide Horizontal</option>
                                    <option value="slide-vertical">Slide Vertical</option>
                                    <option value="slide-swing">Slide Swing</option>
                                </select>&nbsp;&nbsp;&nbsp;&nbsp;
                                <label>Go To:</label>
                                <select id="got_to_step">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>&nbsp;&nbsp;&nbsp;&nbsp;
                                <label>External Buttons:</label>
                                <button class="btn btn-secondary" id="prev-btn" type="button">Go Previous</button>
                                <button class="btn btn-secondary" id="next-btn" type="button">Go Next</button>
                                <button class="btn btn-danger" id="reset-btn" type="button">Reset Wizard</button>
                            </p> --}}
                            {{-- <br /> --}}
                            <!-- SmartWizard html -->
                            <div id="smartwizard">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#step-1"> <strong>Step 1</strong>
                                            <br>Profil</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#step-2"> <strong>Step 2</strong>
                                            <br>Keadaan Sekarang</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#step-3"> <strong>Step 3</strong>
                                            <br>This is step description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#step-4"> <strong>Step 4</strong>
                                            <br>This is step description</a>
                                    </li>
                                </ul>
                                <form name="formstatus" id="formstatus" method="post">
                                    <div class="tab-content">
                                        <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                                            <h3>Step 1 Biodata</h3>
                                            <div class="form mb-3">
                                                <label data-error="wrong" data-success="right" for="nimhsmsmh">Nomor Induk
                                                    Mahasiswa</label>
                                                <input type="number" id="nimhsmsmh" name="nimhsmsmh"
                                                    class="form-control validate">
                                            </div>
                                            <div class="form mb-3">
                                                <label data-error="wrong" data-success="right" for="nmmhsmsmh">Nama
                                                    Lengkap</label>
                                                <input type="text" id="nmmhsmsmh" name="nmmhsmsmh"
                                                    class="form-control validate">
                                            </div>
                                            <div class="form mb-3">
                                                <label data-error="wrong" data-success="right"
                                                    for="telpomsmh">Telepon/WA</label>
                                                <input type="number" id="telpomsmh" name="telpomsmh"
                                                    class="form-control validate">
                                            </div>
                                            <div class="form mb-3">
                                                <label data-error="wrong" data-success="right" for="emailmsmh">Email</label>
                                                <input type="email" id="emailmsmh" name="emailmsmh"
                                                    class="form-control validate">
                                            </div>
                                            <div class="form mb-3">
                                                <label data-error="wrong" data-success="right" for="tahun_lulus">Tahun
                                                    Lulus (Yudisium)</label>
                                                <select name="tahun_lulus" id="tahun_lulus" class="single-select">
                                                    @foreach ($tahun_lulus as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nilai_tl }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form mb-3">
                                                <label data-error="wrong" data-success="right" for="nik">Nomor Induk
                                                    Kependudukan (NIK/No. KTP)</label>
                                                <input type="number" id="nik" name="nik" class="form-control validate">
                                            </div>
                                            <div class="form mb-3">
                                                <label data-error="wrong" data-success="right" for="npwp">NPWP (isi angka
                                                    saja, kosongkan bila tidak ada)</label>
                                                <input type="number" id="npwp" name="npwp" class="form-control validate">
                                            </div>
                                            <div class="form mb-3">
                                                <label data-error="wrong" data-success="right" for="no">Alumni UNM untuk
                                                    Jurusan/ Prodi?</label>
                                                <select name="prod" id="prodi" class="single-select">
                                                    @foreach ($prodi as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama_prodi }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                                            <h3>Step 2 Keadaan Sekarang</h3>
                                            <div class="form mb-3">
                                                <label data-error="wrong" data-success="right" for="f8">f8 - Jelaskan
                                                    status Anda saat ini? (termasuk pekerjaan sambilan)</label>
                                                <select name="f8" id="f8" class="single-select">
                                                    @foreach ($status as $item)
                                                        <option value="{{ $item->nilai_status }}">
                                                            {{ $item->nama_status }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form mb-3">
                                                <label data-error="wrong" data-success="right" for="f504">f504 - Apakah anda
                                                    telah mendapatkan pekerjaan <= 6 bulan / termasuk bekerja sebelum lulus
                                                        ?</label>
                                                        <select name="f504" id="f504" class="single-select">
                                                            <option value="iya">Iya</option>
                                                            <option value="tidak">TIdak</option>
                                                        </select>
                                            </div>
                                            <div class="form mb-3">
                                                <label data-error="wrong" data-success="right" for="f502">f502/506 - Dalam
                                                    berapa bulan SEBELUM atau SESUDAH LULUS, anda mendapatkan pekerjaan ?
                                                    (cukup ketikkan angka)</label>
                                                <input type="number" id="f502" name="f502" class="form-control validate">
                                            </div>
                                            <div class="form mb-3">
                                                <label data-error="wrong" data-success="right" for="f505">f505 - Berapa
                                                    rata-rata TOTAL pendapatan (gaji, bisnis sampingan, tunjangan lain, dll)
                                                    anda per bulan ? (tanpa titik atau koma, contoh : 4500000, bila belum
                                                    bekerja isi 0)</label>
                                                <input type="number" id="f505" name="f505" class="form-control validate">
                                            </div>
                                            <div class="form mb-3">
                                                <label data-error="wrong" data-success="right" for="f5a1">f5a1 - Di provinsi
                                                    mana Anda bekerja/tinggal?</label>
                                                <select name="f5a1" id="f5a1" class="single-select">
                                                    @foreach ($provinsi as $item)
                                                        <option value="{{ $item->id_wil }}">
                                                            {{ $item->nm_wil }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form mb-3">
                                                <label data-error="wrong" data-success="right" for="f5a2">f5a2 - Kabupaten /
                                                    Kota?</label>
                                                <select name="f5a2" id="f5a2" class="single-select">
                                                    @foreach ($kota as $item)
                                                        <option value="{{ $item->id_wil }}">
                                                            {{ $item->nm_wil }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form mb-3">
                                                <label data-error="wrong" data-success="right" for="f5a2">f5a2 - Kabupaten /
                                                    Kota?</label>
                                                <select name="f5a2" id="f5a2" class="single-select">
                                                    @foreach ($kota as $item)
                                                        <option value="{{ $item->id_wil }}">
                                                            {{ $item->nm_wil }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                                            Lorem
                                            Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                            has
                                            been the industry's standard dummy text ever since the 1500s, when an unknown
                                            printer took a galley of type and scrambled it to make a type specimen book. It
                                            has
                                            survived not only five centuries, but also the leap into electronic typesetting,
                                            remaining essentially unchanged. It was popularised in the 1960s with the
                                            release of
                                            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                                            publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                        </div>
                                        <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
                                            <h3>Step 4 Content</h3>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                            Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                            unknown printer took a galley of type and scrambled it to make a type specimen
                                            book.
                                            It has survived not only five centuries, but also the leap into electronic
                                            typesetting, remaining essentially unchanged. It was popularised in the 1960s
                                            with
                                            the release of Letraset sheets containing Lorem Ipsum passages, and more
                                            recently
                                            with desktop publishing software like Aldus PageMaker including versions of
                                            Lorem
                                            Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                            when
                                            an unknown printer took a galley of type and scrambled it to make a type
                                            specimen
                                            book. It has survived not only five centuries, but also the leap into electronic
                                            typesetting, remaining essentially unchanged. It was popularised in the 1960s
                                            with
                                            the release of Letraset sheets containing Lorem Ipsum passages, and more
                                            recently
                                            with desktop publishing software like Aldus PageMaker including versions of
                                            Lorem
                                            Ipsum.
                                        </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
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
        $(document).ready(function() {
            // Toolbar extra buttons
            var btnFinish = $('<button></button>').text('Finish').addClass('btn btn-info').on('click', function() {
                alert('Finish Clicked');
            });
            var btnCancel = $('<button></button>').text('Cancel').addClass('btn btn-danger').on('click',
                function() {
                    $('#smartwizard').smartWizard("reset");
                });
            // Step show event
            $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
                $("#prev-btn").removeClass('disabled');
                $("#next-btn").removeClass('disabled');
                if (stepPosition === 'first') {
                    $("#prev-btn").addClass('disabled');
                } else if (stepPosition === 'last') {
                    $("#next-btn").addClass('disabled');
                } else {
                    $("#prev-btn").removeClass('disabled');
                    $("#next-btn").removeClass('disabled');
                }
            });
            // Smart Wizard
            $('#smartwizard').smartWizard({
                selected: 0,
                theme: 'dots',
                transition: {
                    animation: 'slide-horizontal', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
                },
                toolbarSettings: {
                    toolbarPosition: 'both', // both bottom
                    toolbarExtraButtons: [btnFinish, btnCancel]
                }
            });
            // External Button Events
            $("#reset-btn").on("click", function() {
                // Reset wizard
                $('#smartwizard').smartWizard("reset");
                return true;
            });
            $("#prev-btn").on("click", function() {
                // Navigate previous
                $('#smartwizard').smartWizard("prev");
                return true;
            });
            $("#next-btn").on("click", function() {
                // Navigate next
                $('#smartwizard').smartWizard("next");
                return true;
            });
            // Demo Button Events
            $("#got_to_step").on("change", function() {
                // Go to step
                var step_index = $(this).val() - 1;
                $('#smartwizard').smartWizard("goToStep", step_index);
                return true;
            });
            $("#is_justified").on("click", function() {
                // Change Justify
                var options = {
                    justified: $(this).prop("checked")
                };
                $('#smartwizard').smartWizard("setOptions", options);
                return true;
            });
            $("#animation").on("change", function() {
                // Change theme
                var options = {
                    transition: {
                        animation: $(this).val()
                    },
                };
                $('#smartwizard').smartWizard("setOptions", options);
                return true;
            });
            $("#theme_selector").on("change", function() {
                // Change theme
                var options = {
                    theme: $(this).val()
                };
                $('#smartwizard').smartWizard("setOptions", options);
                return true;
            });
            $('.single-select').select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                    'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),

            });
        });
    </script>
@endpush
