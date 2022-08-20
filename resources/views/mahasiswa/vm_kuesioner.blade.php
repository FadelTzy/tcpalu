@extends('layouts.vl_mahasiswa')
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
                            {{-- <br />
                            <p>
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
                            </p>
                            <br /> --}}
                            <!-- SmartWizard html -->
                            <form name="formquestioner" id="formquestioner" method="post" class="form">

                                <div id="smartwizard" class="sw sw-justified sw-theme-dots">
                                    <ul class="nav">
                                        <li class="nav-item">
                                            <a class="nav-link inactive" href="#step-1"> <strong>Step
                                                    1</strong>
                                                <br>Profil</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#step-2"> <strong>Step 2</strong>
                                                <br>Keadaan Sekarang</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#step-3"> <strong>Step 3</strong>
                                                <br>Tingkat Kompetensi (LULUS)</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#step-4"> <strong>Step 4</strong>
                                                <br>Tingkat Kompetensi (SEKARANG)</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#step-5"> <strong>Step 5</strong>
                                                <br>Masa Transisi</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#step-6"> <strong>Step 6</strong>
                                                <br>Kuesioner Kepuasan</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                                            <h3>Step 1 Biodata</h3>
                                            <div class="row">
                                                <div class="form mb-3 col">
                                                    <label data-error="wrong" data-success="right" for="nimhsmsmh">Nomor
                                                        Induk
                                                        Mahasiswa</label>
                                                    <input type="number" id="nimhsmsmh" name="nimhsmsmh"
                                                        class="form-control validate" value="{{ Auth::user()->email }}">
                                                </div>
                                                <div class="form mb-3 col">
                                                    <label data-error="wrong" data-success="right" for="nmmhsmsmh">Nama
                                                        Lengkap</label>
                                                    <input type="text" id="nmmhsmsmh" name="nmmhsmsmh"
                                                        class="form-control validate" value="{{ Auth::user()->name }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form mb-3 col">
                                                    <label data-error="wrong" data-success="right"
                                                        for="telpomsmh">Telepon/WA</label>
                                                    <input type="number" id="telpomsmh" name="telpomsmh"
                                                        class="form-control validate">
                                                </div>
                                                <div class="form mb-3 col">
                                                    <label data-error="wrong" data-success="right"
                                                        for="emailmsmh">Email</label>
                                                    <input type="email" id="emailmsmh" name="emailmsmh"
                                                        class="form-control validate">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form mb-3 col">
                                                    <label data-error="wrong" data-success="right" for="nik">Nomor Induk
                                                        Kependudukan (NIK/No. KTP)</label>
                                                    <input type="number" id="nik" name="nik" class="form-control validate">
                                                </div>
                                                <div class="form mb-3 col">
                                                    <label data-error="wrong" data-success="right" for="npwp">NPWP (isi
                                                        angka
                                                        saja, kosongkan bila tidak ada)</label>
                                                    <input type="number" id="npwp" name="npwp"
                                                        class="form-control validate">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form mb-3 col">
                                                    <label data-error="wrong" data-success="right" for="tahun_lulus">Tahun
                                                        Lulus (Yudisium)</label>
                                                    <select name="tahun_lulus" id="tahun_lulus" class="form-control">
                                                        <option value="">Pilih</option>
                                                        @foreach ($tahun_lulus as $item)
                                                            @if ($item->status_tl == 0)
                                                                <option value="{{ $item->nilai_tl }}" disabled>
                                                                    {{ $item->nilai_tl }}
                                                                </option>
                                                            @else
                                                                <option value="{{ $item->nilai_tl }}">
                                                                    {{ $item->nilai_tl }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form mb-3 col">
                                                    <label data-error="wrong" data-success="right" for="kdpstmsmh">Alumni
                                                        UNM
                                                        untuk
                                                        Jurusan/ Prodi?</label>
                                                    <select name="kdpstmsmh" id="kdpstmsmh" class="single-select">
                                                        <option value="">Pilih</option>
                                                        @foreach ($prodi as $item)
                                                            <option value="{{ $item->kode_prodi }}">
                                                                {{ $item->nama_prodi }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                                            <h3>Step 2 Keadaan Sekarang</h3>
                                            <div class="form mb-3">
                                                <label data-error="wrong" data-success="right" for="f8">f8 - Jelaskan
                                                    status Anda saat ini? (termasuk pekerjaan sambilan)</label>
                                                <select name="f8" id="f8" class="single-select">
                                                    <option value="">Pilih</option>
                                                    @foreach ($status as $item)
                                                        <option value="{{ $item->nilai_status }}">
                                                            {{ $item->nama_status }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form mb-3" id="divf18a">
                                                <label data-error="wrong" data-success="right" for="f18a">f18a - Bagi
                                                    yang
                                                    saat ini studi lanjut, Sumber Biaya dari?</label>
                                                <select name="f18a" id="f18a" class="single-select">
                                                    <option value="">Pilih</option>
                                                    @foreach ($sumber_biaya as $item)
                                                        <option value="{{ $item->nilai_sb }}">
                                                            {{ $item->nama_sb }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form mb-3" id="divf18b">
                                                <label data-error="wrong" data-success="right" for="f18b">f18b - Bagi
                                                    yang saat ini studi lanjut, Perguruan Tinggi yang ditempati studi
                                                    lanjut?</label>
                                                <input type="text" id="f18b" name="f18b" class="form-control validate">
                                            </div>

                                            <div class="form mb-3" id="divf18c">
                                                <label data-error="wrong" data-success="right" for="f18c">f18c - Bagi yang
                                                    saat ini studi lanjut, Program Studi yang diambil?</label>
                                                <input type="text" id="f18c" name="f18c" class="form-control validate">
                                            </div>

                                            <div class="form mb-3" id="divf18d">
                                                <label data-error="wrong" data-success="right" for="f18d">f18d - Tanggal
                                                    Masuk ketika studi lanjut? (Cukup pastikan bulan dan tahun)</label>
                                                <input type="date" id="f18d" name="f18d" class="form-control validate">
                                            </div>
                                            <div class="form mb-3" id="divf504">
                                                <label data-error="wrong" data-success="right" for="f504">f504 - Apakah anda
                                                    telah mendapatkan pekerjaan <= 6 bulan / termasuk bekerja sebelum lulus
                                                        ?</label>
                                                        <select name="f504" id="f504" class="form-control">
                                                            <option value="">Pilih</option>
                                                            <option value="1">Iya</option>
                                                            <option value="2">TIdak</option>
                                                        </select>
                                            </div>
                                            <div class="form mb-3" id="div502">
                                                <label data-error="wrong" data-success="right" for="f502">f502 - Dalam
                                                    berapa bulan, anda mendapatkan pekerjaan ?</label>
                                                {{-- <input type="number" id="f502" name="f502" class="form-control validate"
                                                    max="6"> --}}
                                                <select name="f502" id="f502" class="form-control">
                                                    <option value="">pilih</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                </select>
                                            </div>
                                            <div class="form mb-3" id="div506">
                                                <label data-error="wrong" data-success="right" for="f506">506 - Dalam
                                                    berapa bulan, anda mendapatkan pekerjaan ?
                                                    (cukup ketikkan angka)</label>
                                                {{-- <input type="number" id="f506" name="f506" class="form-control validate"
                                                    min="7"> --}}
                                                <select name="f506" id="f506" class="form-control">
                                                    <option value="">pilih</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                            </div>
                                            <div class="form mb-3" id="divf505">
                                                <label data-error="wrong" data-success="right" for="f505">f505 - Berapa
                                                    rata-rata TOTAL pendapatan (gaji, bisnis sampingan, tunjangan lain, dll)
                                                    anda per bulan ? (tanpa titik atau koma, contoh : 4500000, bila belum
                                                    bekerja isi 0)</label>
                                                <input type="number" id="f505" name="f505" class="form-control validate">
                                            </div>
                                            <div class="row">
                                                <div class="form mb-3 col">
                                                    <label data-error="wrong" data-success="right" for="f5a1">f5a1 - Di
                                                        provinsi
                                                        mana Anda bekerja/tinggal?</label>
                                                    <select name="f5a1" id="f5a1" class="single-select">
                                                        <option value="">Pilih</option>
                                                        @foreach ($provinsi as $item)
                                                            <option value="{{ $item['id_wil'] }}">
                                                                {{ $item['nm_wil'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form mb-3 col">
                                                    <label data-error="wrong" data-success="right" for="f5a2">f5a2 -
                                                        Kabupaten /
                                                        Kota?</label>
                                                    <select name="f5a2" id="f5a2" class="single-select">
                                                        <option value="">Pilih</option>
                                                        @foreach ($kota as $item)
                                                            <option value="{{ $item->id_wil }}">
                                                                {{ $item->nm_wil }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form mb-3 col" id="divf1101">
                                                    <label data-error="wrong" data-success="right" for="f1101">f1101 - Apa
                                                        jenis
                                                        perusahaan/instansi/institusi tempat anda bekerja sekarang?</label>
                                                    <select name="f1101" id="f1101" class="single-select">
                                                        <option value="">Pilih</option>
                                                        @foreach ($jenis_tk as $item)
                                                            <option value="{{ $item->nilai_jtk }}">
                                                                {{ $item->nama_jtk }}
                                                            </option>
                                                        @endforeach
                                                        <option value="5">Lainnya</option>

                                                    </select>
                                                </div>

                                                <div class="form mb-3 col" id="divf1102">
                                                    <label data-error="wrong" data-success="right" for="f1102">f1102 -
                                                        Tuliskan
                                                        disini jika memilih lainnya </label>
                                                    <input type="text" id="f1102" name="f1102"
                                                        class="form-control validate">
                                                </div>
                                            </div>
                                            <div class="form mb-3" id="divf5b">
                                                <label data-error="wrong" data-success="right" for="f5b">f5b - Apa nama
                                                    perusahaan/kantor tempat Anda bekerja?</label>
                                                <input type="text" id="f5b" name="f5b" class="form-control validate">
                                            </div>
                                            <div class="form mb-3" id="divf5c">
                                                <label data-error="wrong" data-success="right" for="f5c">f5c - Bila
                                                    berwiraswasta, apa posisi/jabatan Anda saat ini ?</label>
                                                <select name="f5c" id="f5c" class="single-select">
                                                    <option value="">Pilih</option>
                                                    @foreach ($jabatan as $item)
                                                        <option value="{{ $item->nilai_jab }}">
                                                            {{ $item->nama_jab }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form mb-3" id="divf5d">
                                                <label data-error="wrong" data-success="right" for="f5d">f5d - Apa tingkat
                                                    tempat kerja Anda?</label>
                                                <select name="f5d" id="f5d" class="single-select">
                                                    <option value="">Pilih</option>
                                                    @foreach ($tingkat_tk as $item)
                                                        <option value="{{ $item->nilai_ttk }}">
                                                            {{ $item->nama_ttk }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="form mb-3 col">
                                                    <label data-error="wrong" data-success="right" for="f1201">f1201 -
                                                        Ketika
                                                        anda
                                                        kuliah di UNM, sumberdana dalam pembiayaan kuliah?</label>
                                                    <select name="f1201" id="f1201" class="single-select">
                                                        <option value="">Pilih</option>
                                                        @foreach ($sumber_dana as $item)
                                                            <option value="{{ $item->nilai_sd }}">
                                                                {{ $item->nama_sd }}
                                                            </option>
                                                        @endforeach
                                                        <option value="7">Lainnya</option>
                                                    </select>
                                                </div>

                                                <div class="form mb-3 col" id="divf1202">
                                                    <label data-error="wrong" data-success="right" for="f1202">f1202 -
                                                        Tuliskan
                                                        disini ketika menjawab lainnya</label>
                                                    <input type="text" id="f1202" name="f1202"
                                                        class="form-control validate">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form mb-3 col" id="divf14">
                                                    <label data-error="wrong" data-success="right" for="f14">f14 - Seberapa
                                                        erat hubungan antara bidang studi dengan pekerjaan anda?</label>
                                                    <select name="f14" id="f14" class="single-select">
                                                        <option value="">Pilih</option>
                                                        @foreach ($hubungan as $item)
                                                            <option value="{{ $item->nilai_hub }}">
                                                                {{ $item->nama_hub }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form mb-3 col" id="divf15">
                                                    <label data-error="wrong" data-success="right" for="f15">f15 - Tingkat
                                                        pendidikan apa yang paling tepat/sesuai untuk pekerjaan anda saat
                                                        ini?</label>
                                                    <select name="f15" id="f15" class="single-select">
                                                        <option value="">Pilih</option>
                                                        @foreach ($tingkat_pendidikan as $item)
                                                            <option value="{{ $item->nilai_tp }}">
                                                                {{ $item->nama_tp }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                                            <h3>Step 3 f17A - PADA SAAT LULUS, pada tingkat mana kompetensi di bawah ini
                                                anda KUASAI? (A)</h3>
                                            <div class="form mb-1 col">
                                                <label data-error="wrong" data-success="right" for="none">f1761 -
                                                    Etika</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Rendah</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="f1761" id="f1761"
                                                    value="1">
                                                <label class="form-check-label" for="f1761">1</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1761" id="f1761"
                                                    value="2">
                                                <label class="form-check-label" for="f1761">2</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1761" id="f1761"
                                                    value="3">
                                                <label class="form-check-label" for="f1761">3</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1761" id="f1761"
                                                    value="4">
                                                <label class="form-check-label" for="f1761">4</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1761" id="f1761"
                                                    value="5">
                                                <label class="form-check-label" for="f1761">5</label>
                                            </div>
                                            <div class="form-check form-check-inline mb-3">
                                                <label class="form-check-label">Sangat Tinggi</label>
                                            </div>

                                            <div class="form mb-1 col">
                                                <label data-error="wrong" data-success="right" for="none">f1763 - Keahlian
                                                    berdasarkan bidang ilmu</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Rendah</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="f1763" id="f1763"
                                                    value="1">
                                                <label class="form-check-label" for="f1763">1</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1763" id="f1763"
                                                    value="2">
                                                <label class="form-check-label" for="f1763">2</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1763" id="f1763"
                                                    value="3">
                                                <label class="form-check-label" for="f1763">3</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1763" id="f1763"
                                                    value="4">
                                                <label class="form-check-label" for="f1763">4</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1763" id="f1763"
                                                    value="5">
                                                <label class="form-check-label" for="f1763">5</label>
                                            </div>
                                            <div class="form-check form-check-inline mb-3">
                                                <label class="form-check-label">Sangat Tinggi</label>
                                            </div>


                                            <div class="form mb-1 col">
                                                <label data-error="wrong" data-success="right" for="none">f1765 - Bahasa
                                                    Inggris</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Rendah</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="f1765" id="f1765"
                                                    value="1">
                                                <label class="form-check-label" for="f1765">1</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1765" id="f1765"
                                                    value="2">
                                                <label class="form-check-label" for="f1765">2</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1765" id="f1765"
                                                    value="3">
                                                <label class="form-check-label" for="f1765">3</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1765" id="f1765"
                                                    value="4">
                                                <label class="form-check-label" for="f1765">4</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1765" id="f1765"
                                                    value="5">
                                                <label class="form-check-label" for="f1765">5</label>
                                            </div>
                                            <div class="form-check form-check-inline mb-3">
                                                <label class="form-check-label">Sangat Tinggi</label>
                                            </div>


                                            <div class="form mb-1 col">
                                                <label data-error="wrong" data-success="right" for="none">f1767 - Penggunaan
                                                    Teknologi Informasi</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Rendah</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="f1767" id="f1767"
                                                    value="1">
                                                <label class="form-check-label" for="f1767">1</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1767" id="f1767"
                                                    value="2">
                                                <label class="form-check-label" for="f1767">2</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1767" id="f1767"
                                                    value="3">
                                                <label class="form-check-label" for="f1767">3</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1767" id="f1767"
                                                    value="4">
                                                <label class="form-check-label" for="f1767">4</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1767" id="f1767"
                                                    value="5">
                                                <label class="form-check-label" for="f1767">5</label>
                                            </div>
                                            <div class="form-check form-check-inline mb-3">
                                                <label class="form-check-label">Sangat Tinggi</label>
                                            </div>


                                            <div class="form mb-1 col">
                                                <label data-error="wrong" data-success="right" for="none">f1769 -
                                                    Komunikasi</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Rendah</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="f1769" id="f1769"
                                                    value="1">
                                                <label class="form-check-label" for="f1769">1</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1769" id="f1769"
                                                    value="2">
                                                <label class="form-check-label" for="f1769">2</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1769" id="f1769"
                                                    value="3">
                                                <label class="form-check-label" for="f1769">3</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1769" id="f1769"
                                                    value="4">
                                                <label class="form-check-label" for="f1769">4</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1769" id="f1769"
                                                    value="5">
                                                <label class="form-check-label" for="f1769">5</label>
                                            </div>
                                            <div class="form-check form-check-inline mb-3">
                                                <label class="form-check-label">Sangat Tinggi</label>
                                            </div>


                                            <div class="form mb-1 col">
                                                <label data-error="wrong" data-success="right" for="none">f1771 - Kerja sama
                                                    tim</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Rendah</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="f1771" id="f1771"
                                                    value="1">
                                                <label class="form-check-label" for="f1771">1</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1771" id="f1771"
                                                    value="2">
                                                <label class="form-check-label" for="f1771">2</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1771" id="f1771"
                                                    value="3">
                                                <label class="form-check-label" for="f1771">3</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1771" id="f1771"
                                                    value="4">
                                                <label class="form-check-label" for="f1771">4</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1771" id="f1771"
                                                    value="5">
                                                <label class="form-check-label" for="f1771">5</label>
                                            </div>
                                            <div class="form-check form-check-inline mb-3">
                                                <label class="form-check-label">Sangat Tinggi</label>
                                            </div>


                                            <div class="form mb-1 col">
                                                <label data-error="wrong" data-success="right" for="none">f1773 -
                                                    Pengembangan Diri</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Rendah</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="f1773" id="f1773"
                                                    value="1">
                                                <label class="form-check-label" for="f1773">1</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1773" id="f1773"
                                                    value="2">
                                                <label class="form-check-label" for="f1773">2</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1773" id="f1773"
                                                    value="3">
                                                <label class="form-check-label" for="f1773">3</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1773" id="f1773"
                                                    value="4">
                                                <label class="form-check-label" for="f1773">4</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1773" id="f1773"
                                                    value="5">
                                                <label class="form-check-label" for="f1773">5</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Tinggi</label>
                                            </div>


                                        </div>

                                        <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
                                            <h3>Step 4 f17B - PADA SAAT SEKARANG, pada tingkat mana kompetensi di bawah ini
                                                DIPERLUKAN DALAM PEKERJAAN? (B)</h3>

                                            <div class="form mb-1 col">
                                                <label data-error="wrong" data-success="right" for="none">f1762 -
                                                    Etika</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Rendah</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="f1762" id="f1762"
                                                    value="1">
                                                <label class="form-check-label" for="f1762">1</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1762" id="f1762"
                                                    value="2">
                                                <label class="form-check-label" for="f1762">2</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1762" id="f1762"
                                                    value="3">
                                                <label class="form-check-label" for="f1762">3</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1762" id="f1762"
                                                    value="4">
                                                <label class="form-check-label" for="f1762">4</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1762" id="f1762"
                                                    value="5">
                                                <label class="form-check-label" for="f1762">5</label>
                                            </div>
                                            <div class="form-check form-check-inline mb-3">
                                                <label class="form-check-label">Sangat Tinggi</label>
                                            </div>

                                            <div class="form mb-1 col">
                                                <label data-error="wrong" data-success="right" for="none">f1764 - Keahlian
                                                    berdasarkan bidang ilmu</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Rendah</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="f1764" id="f1764"
                                                    value="1">
                                                <label class="form-check-label" for="f1764">1</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1764" id="f1764"
                                                    value="2">
                                                <label class="form-check-label" for="f1764">2</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1764" id="f1764"
                                                    value="3">
                                                <label class="form-check-label" for="f1764">3</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1764" id="f1764"
                                                    value="4">
                                                <label class="form-check-label" for="f1764">4</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1764" id="f1764"
                                                    value="5">
                                                <label class="form-check-label" for="f1764">5</label>
                                            </div>
                                            <div class="form-check form-check-inline mb-3">
                                                <label class="form-check-label">Sangat Tinggi</label>
                                            </div>


                                            <div class="form mb-1 col">
                                                <label data-error="wrong" data-success="right" for="none">f1766 - Bahasa
                                                    Inggris</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Rendah</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="f1766" id="f1766"
                                                    value="1">
                                                <label class="form-check-label" for="f1766">1</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1766" id="f1766"
                                                    value="2">
                                                <label class="form-check-label" for="f1766">2</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1766" id="f1766"
                                                    value="3">
                                                <label class="form-check-label" for="f1766">3</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1766" id="f1766"
                                                    value="4">
                                                <label class="form-check-label" for="f1766">4</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1766" id="f1766"
                                                    value="5">
                                                <label class="form-check-label" for="f1766">5</label>
                                            </div>
                                            <div class="form-check form-check-inline mb-3">
                                                <label class="form-check-label">Sangat Tinggi</label>
                                            </div>


                                            <div class="form mb-1 col">
                                                <label data-error="wrong" data-success="right" for="none">f1768 - Penggunaan
                                                    Teknologi Informasi</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Rendah</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="f1768" id="f1768"
                                                    value="1">
                                                <label class="form-check-label" for="f1768">1</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1768" id="f1768"
                                                    value="2">
                                                <label class="form-check-label" for="f1768">2</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1768" id="f1768"
                                                    value="3">
                                                <label class="form-check-label" for="f1768">3</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1768" id="f1768"
                                                    value="4">
                                                <label class="form-check-label" for="f1768">4</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1768" id="f1768"
                                                    value="5">
                                                <label class="form-check-label" for="f1768">5</label>
                                            </div>
                                            <div class="form-check form-check-inline mb-3">
                                                <label class="form-check-label">Sangat Tinggi</label>
                                            </div>


                                            <div class="form mb-1 col">
                                                <label data-error="wrong" data-success="right" for="none">f1770 -
                                                    Komunikasi</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Rendah</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="f1770" id="f1770"
                                                    value="1">
                                                <label class="form-check-label" for="f1770">1</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1770" id="f1770"
                                                    value="2">
                                                <label class="form-check-label" for="f1770">2</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1770" id="f1770"
                                                    value="3">
                                                <label class="form-check-label" for="f1770">3</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1770" id="f1770"
                                                    value="4">
                                                <label class="form-check-label" for="f1770">4</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1770" id="f1770"
                                                    value="5">
                                                <label class="form-check-label" for="f1770">5</label>
                                            </div>
                                            <div class="form-check form-check-inline mb-3">
                                                <label class="form-check-label">Sangat Tinggi</label>
                                            </div>


                                            <div class="form mb-1 col">
                                                <label data-error="wrong" data-success="right" for="none">f1772 - Kerja sama
                                                    tim</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Rendah</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="f1772" id="f1772"
                                                    value="1">
                                                <label class="form-check-label" for="f1772">1</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1772" id="f1772"
                                                    value="2">
                                                <label class="form-check-label" for="f1772">2</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1772" id="f1772"
                                                    value="3">
                                                <label class="form-check-label" for="f1772">3</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1772" id="f1772"
                                                    value="4">
                                                <label class="form-check-label" for="f1772">4</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1772" id="f1772"
                                                    value="5">
                                                <label class="form-check-label" for="f1772">5</label>
                                            </div>
                                            <div class="form-check form-check-inline mb-3">
                                                <label class="form-check-label">Sangat Tinggi</label>
                                            </div>


                                            <div class="form mb-1 col">
                                                <label data-error="wrong" data-success="right" for="none">f1774 -
                                                    Pengembangan Diri</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Rendah</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="f1774" id="f1774"
                                                    value="1">
                                                <label class="form-check-label" for="f1774">1</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1774" id="f1774"
                                                    value="2">
                                                <label class="form-check-label" for="f1774">2</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1774" id="f1774"
                                                    value="3">
                                                <label class="form-check-label" for="f1774">3</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1774" id="f1774"
                                                    value="4">
                                                <label class="form-check-label" for="f1774">4</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="f1774" id="f1774"
                                                    value="5">
                                                <label class="form-check-label" for="f1774">5</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Tinggi</label>
                                            </div>

                                        </div>

                                        <div id="step-5" class="tab-pane" role="tabpanel" aria-labelledby="step-5">
                                            <h3>Step 5 Masa Transisi</h3>
                                            <div class="form mb-3">
                                                <label data-error="wrong" data-success="right" for="nmmhsmsmh"
                                                    class="mb-1">f2 - Menurut
                                                    anda seberapa besar penekanan pada metode pembelajaran di bawah ini
                                                    dilaksanakan di program studi anda?</label>
                                                <div class="form mb-1 col">
                                                    <label data-error="wrong" data-success="right" for="none">f21 -
                                                        Perkuliahan </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">Sangat Besar</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input" name="f21" id="f21"
                                                        value="1">
                                                    <label class="form-check-label" for="f21">1</label>
                                                </div>
                                                <div class="form-check form-check-inline ms-4">
                                                    <input type="radio" class="form-check-input" name="f21" id="f21"
                                                        value="2">
                                                    <label class="form-check-label" for="f21">2</label>
                                                </div>
                                                <div class="form-check form-check-inline ms-4">
                                                    <input type="radio" class="form-check-input" name="f21" id="f21"
                                                        value="3">
                                                    <label class="form-check-label" for="f21">3</label>
                                                </div>
                                                <div class="form-check form-check-inline ms-4">
                                                    <input type="radio" class="form-check-input" name="f21" id="f21"
                                                        value="4">
                                                    <label class="form-check-label" for="f21">4</label>
                                                </div>
                                                <div class="form-check form-check-inline ms-4">
                                                    <input type="radio" class="form-check-input" name="f21" id="f21"
                                                        value="5">
                                                    <label class="form-check-label" for="f21">5</label>
                                                </div>
                                                <div class="form-check form-check-inline mb-3">
                                                    <label class="form-check-label">Tidak Sama Sekali</label>
                                                </div>

                                                <div class="form mb-1 col">
                                                    <label data-error="wrong" data-success="right" for="none">f22 -
                                                        Demonstrasi </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">Sangat Besar</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input" name="f22" id="f22"
                                                        value="1">
                                                    <label class="form-check-label" for="f22">1</label>
                                                </div>
                                                <div class="form-check form-check-inline ms-4">
                                                    <input type="radio" class="form-check-input" name="f22" id="f22"
                                                        value="2">
                                                    <label class="form-check-label" for="f22">2</label>
                                                </div>
                                                <div class="form-check form-check-inline ms-4">
                                                    <input type="radio" class="form-check-input" name="f22" id="f22"
                                                        value="3">
                                                    <label class="form-check-label" for="f22">3</label>
                                                </div>
                                                <div class="form-check form-check-inline ms-4">
                                                    <input type="radio" class="form-check-input" name="f22" id="f22"
                                                        value="4">
                                                    <label class="form-check-label" for="f22">4</label>
                                                </div>
                                                <div class="form-check form-check-inline ms-4">
                                                    <input type="radio" class="form-check-input" name="f22" id="f22"
                                                        value="5">
                                                    <label class="form-check-label" for="f22">5</label>
                                                </div>
                                                <div class="form-check form-check-inline mb-3">
                                                    <label class="form-check-label">Tidak Sama Sekali</label>
                                                </div>

                                                <div class="form mb-1 col">
                                                    <label data-error="wrong" data-success="right" for="none">f23 -
                                                        Partisipasi dalam proyek riset</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">Sangat Besar</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input" name="f23" id="f23"
                                                        value="1">
                                                    <label class="form-check-label" for="f23">1</label>
                                                </div>
                                                <div class="form-check form-check-inline ms-4">
                                                    <input type="radio" class="form-check-input" name="f23" id="f23"
                                                        value="2">
                                                    <label class="form-check-label" for="f23">2</label>
                                                </div>
                                                <div class="form-check form-check-inline ms-4">
                                                    <input type="radio" class="form-check-input" name="f23" id="f23"
                                                        value="3">
                                                    <label class="form-check-label" for="f23">3</label>
                                                </div>
                                                <div class="form-check form-check-inline ms-4">
                                                    <input type="radio" class="form-check-input" name="f23" id="f23"
                                                        value="4">
                                                    <label class="form-check-label" for="f23">4</label>
                                                </div>
                                                <div class="form-check form-check-inline ms-4">
                                                    <input type="radio" class="form-check-input" name="f23" id="f23"
                                                        value="5">
                                                    <label class="form-check-label" for="f23">5</label>
                                                </div>
                                                <div class="form-check form-check-inline mb-3">
                                                    <label class="form-check-label">Tidak Sama Sekali</label>
                                                </div>


                                                <div class="form mb-1 col">
                                                    <label data-error="wrong" data-success="right" for="none">f24 - Magang
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">Sangat Besar</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input" name="f24" id="f24"
                                                        value="1">
                                                    <label class="form-check-label" for="f24">1</label>
                                                </div>
                                                <div class="form-check form-check-inline ms-4">
                                                    <input type="radio" class="form-check-input" name="f24" id="f24"
                                                        value="2">
                                                    <label class="form-check-label" for="f24">2</label>
                                                </div>
                                                <div class="form-check form-check-inline ms-4">
                                                    <input type="radio" class="form-check-input" name="f24" id="f24"
                                                        value="3">
                                                    <label class="form-check-label" for="f24">3</label>
                                                </div>
                                                <div class="form-check form-check-inline ms-4">
                                                    <input type="radio" class="form-check-input" name="f24" id="f24"
                                                        value="4">
                                                    <label class="form-check-label" for="f24">4</label>
                                                </div>
                                                <div class="form-check form-check-inline ms-4">
                                                    <input type="radio" class="form-check-input" name="f24" id="f24"
                                                        value="5">
                                                    <label class="form-check-label" for="f24">5</label>
                                                </div>
                                                <div class="form-check form-check-inline mb-3">
                                                    <label class="form-check-label">Tidak Sama Sekali</label>
                                                </div>

                                                <div class="form mb-1 col">
                                                    <label data-error="wrong" data-success="right" for="none">f25 -
                                                        Praktikum
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">Sangat Besar</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input" name="f25" id="f25"
                                                        value="1">
                                                    <label class="form-check-label" for="f25">1</label>
                                                </div>
                                                <div class="form-check form-check-inline ms-4">
                                                    <input type="radio" class="form-check-input" name="f25" id="f25"
                                                        value="2">
                                                    <label class="form-check-label" for="f25">2</label>
                                                </div>
                                                <div class="form-check form-check-inline ms-4">
                                                    <input type="radio" class="form-check-input" name="f25" id="f25"
                                                        value="3">
                                                    <label class="form-check-label" for="f25">3</label>
                                                </div>
                                                <div class="form-check form-check-inline ms-4">
                                                    <input type="radio" class="form-check-input" name="f25" id="f25"
                                                        value="4">
                                                    <label class="form-check-label" for="f25">4</label>
                                                </div>
                                                <div class="form-check form-check-inline ms-4">
                                                    <input type="radio" class="form-check-input" name="f25" id="f25"
                                                        value="5">
                                                    <label class="form-check-label" for="f25">5</label>
                                                </div>
                                                <div class="form-check form-check-inline mb-3">
                                                    <label class="form-check-label">Tidak Sama Sekali</label>
                                                </div>

                                                <div class="form mb-1 col">
                                                    <label data-error="wrong" data-success="right" for="none">f26 - Kerja
                                                        Lapangan
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">Sangat Besar</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input" name="f26" id="f26"
                                                        value="1">
                                                    <label class="form-check-label" for="f26">1</label>
                                                </div>
                                                <div class="form-check form-check-inline ms-4">
                                                    <input type="radio" class="form-check-input" name="f26" id="f26"
                                                        value="2">
                                                    <label class="form-check-label" for="f26">2</label>
                                                </div>
                                                <div class="form-check form-check-inline ms-4">
                                                    <input type="radio" class="form-check-input" name="f26" id="f26"
                                                        value="3">
                                                    <label class="form-check-label" for="f26">3</label>
                                                </div>
                                                <div class="form-check form-check-inline ms-4">
                                                    <input type="radio" class="form-check-input" name="f26" id="f26"
                                                        value="4">
                                                    <label class="form-check-label" for="f26">4</label>
                                                </div>
                                                <div class="form-check form-check-inline ms-4">
                                                    <input type="radio" class="form-check-input" name="f26" id="f26"
                                                        value="5">
                                                    <label class="form-check-label" for="f26">5</label>
                                                </div>
                                                <div class="form-check form-check-inline mb-3">
                                                    <label class="form-check-label">Tidak Sama Sekali</label>
                                                </div>

                                                <div class="form mb-1 col">
                                                    <label data-error="wrong" data-success="right" for="none">f27 - Diskusi
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">Sangat Besar</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input" name="f27" id="f27"
                                                        value="1">
                                                    <label class="form-check-label" for="f27">1</label>
                                                </div>
                                                <div class="form-check form-check-inline ms-4">
                                                    <input type="radio" class="form-check-input" name="f27" id="f27"
                                                        value="2">
                                                    <label class="form-check-label" for="f27">2</label>
                                                </div>
                                                <div class="form-check form-check-inline ms-4">
                                                    <input type="radio" class="form-check-input" name="f27" id="f27"
                                                        value="3">
                                                    <label class="form-check-label" for="f27">3</label>
                                                </div>
                                                <div class="form-check form-check-inline ms-4">
                                                    <input type="radio" class="form-check-input" name="f27" id="f27"
                                                        value="4">
                                                    <label class="form-check-label" for="f27">4</label>
                                                </div>
                                                <div class="form-check form-check-inline ms-4">
                                                    <input type="radio" class="form-check-input" name="f27" id="f27"
                                                        value="5">
                                                    <label class="form-check-label" for="f27">5</label>
                                                </div>
                                                <div class="form-check form-check-inline mb-3">
                                                    <label class="form-check-label">Tidak Sama Sekali</label>
                                                </div>

                                                <div class="row">
                                                    <div class="form mb-3 col">
                                                        <label data-error="wrong" data-success="right" for="none">f301 -
                                                            Kapan
                                                            anda mulai mencari pekerjaan? Mohon pekerjaan sambilan tidak
                                                            dimasukkan
                                                        </label>
                                                        <select name="f301" id="f301" class="form-control">
                                                            <option value="">Pilih</option>
                                                            <option value="1">Sebelum lulus</option>
                                                            <option value="2">Setelah lulus</option>
                                                        </select>
                                                    </div>
                                                    <div class="form mb-3 col" id="divf302">
                                                        <label data-error="wrong" data-success="right" for="f302">f302 -
                                                            Jika
                                                            menjawab SEBELUM lulus, berapa bulan sebelum lulus? (tuliskan
                                                            angka
                                                            saja)
                                                        </label>
                                                        <input type="number" name="f302" id="f302" class="form-control">
                                                    </div>

                                                    <div class="form mb-3 col" id="divf303">
                                                        <label data-error="wrong" data-success="right" for="f303">f303 -
                                                            Jika
                                                            menjawab SETELAH lulus, berapa bulan setelah lulus? (tuliskan
                                                            angka
                                                            saja)
                                                        </label>
                                                        <input type="number" name="f303" id="f303" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form mb-3">
                                                    <label data-error="wrong" data-success="right" for="none"
                                                        class="mb-2">f4 - Bagaimana
                                                        anda mencari pekerjaan tersebut? Jawaban bisa lebih dari satu
                                                    </label>
                                                    <br>
                                                    <input type="checkbox" name="f401" id="f401" value="1"> 01 - Melalui
                                                    iklan di
                                                    koran/majalah, brosur
                                                    <br>
                                                    <input type="checkbox" name="f1402" id="f1402" value="1"> 02 - Melamar
                                                    ke
                                                    perusahaan tanpa mengetahui lowongan yang ada
                                                    <br>
                                                    <input type="checkbox" name="f403" id="f403" value="1"> 03 - Pergi ke
                                                    bursa/pameran kerja
                                                    <br>
                                                    <input type="checkbox" name="f404" id="f404" value="1"> 04 - Mencari
                                                    lewat internet/iklan online/milis
                                                    <br>
                                                    <input type="checkbox" name="f405" id="f405" value="1"> 05 - Dihubungi
                                                    oleh perusahaan
                                                    <br>
                                                    <input type="checkbox" name="f406" id="f406" value="1"> 06 - Menghubungi
                                                    Kemenakertrans
                                                    <br>
                                                    <input type="checkbox" name="f407" id="f407" value="1"> 07 - Menghubungi
                                                    agen tenaga kerja komersial/swasta
                                                    <br>
                                                    <input type="checkbox" name="f408" id="f408" value="1"> 08 - Memeroleh
                                                    informasi dari pusat/kantor pengembangan karir fakultas/universitas
                                                    <br>
                                                    <input type="checkbox" name="f409" id="f409" value="1"> 09 - Menghubungi
                                                    kantor kemahasiswaan/hubungan alumni
                                                    <br>
                                                    <input type="checkbox" name="f410" id="f410" value="1"> 10 - Membangun
                                                    jejaring (network) sejak masih kuliah
                                                    <br>
                                                    <input type="checkbox" name="f411" id="f411" value="1"> 11 - Melalui
                                                    relasi (misalnya dosen, orang tua, saudara, teman, dll.)
                                                    <br>
                                                    <input type="checkbox" name="f412" id="f412" value="1"> 12 - Membangun
                                                    bisnis sendiri
                                                    <br>
                                                    <input type="checkbox" name="f413" id="f413" value="1"> 13 - Melalui
                                                    penempatan kerja atau magang
                                                    <br>
                                                    <input type="checkbox" name="f414" id="f414" value="1"> 14 - Bekerja di
                                                    tempat yang sama dengan tempat kerja semasa kuliah
                                                    <br>
                                                    <input type="checkbox" name="f415" id="f415" value="1"> 15 - Lainnya
                                                    <br>
                                                </div>

                                                <div class="form mb-3 col" id="divf416">
                                                    <label data-error="wrong" data-success="right" for="f416">f416 -
                                                        Jika menjawab lainnya, tuliskan disini
                                                    </label>
                                                    <input type="text" name="f416" id="f416" class="form-control">
                                                </div>

                                                <div class="form mb-3">
                                                    <label data-error="wrong" data-success="right" for="f6">f6 - Berapa
                                                        perusahaan/instansi/institusi yang sudah anda lamar (lewat surat
                                                        atau e-mail) sebelum anda memeroleh pekerjaan pertama? (Isi angka
                                                        saja)
                                                    </label>
                                                    <input type="number" name="f6" id="f6" class="form-control">
                                                </div>

                                                <div class="form mb-3">
                                                    <label data-error="wrong" data-success="right" for="f7">f7 - Berapa
                                                        banyak perusahaan/instansi/institusi yang merespons lamaran anda?
                                                        (isi angka saja)
                                                    </label>
                                                    <input type="number" name="f7" id="f7" class="form-control">
                                                </div>

                                                <div class="form mb-3">
                                                    <label data-error="wrong" data-success="right" for="f7a">f7a - Berapa
                                                        banyak perusahaan/instansi/institusi yang mengundang anda untuk
                                                        wawancara? (isi angka saja)
                                                    </label>
                                                    <input type="number" name="f7a" id="f7a" class="form-control">
                                                </div>

                                                <div class="row">
                                                    <div class="form mb-3 col">
                                                        <label data-error="wrong" data-success="right" for="f1001">f1001 -
                                                            Apakah
                                                            anda aktif mencari pekerjaan dalam 4 minggu terakhir?
                                                        </label>
                                                        <select name="f1001" id="f1001" class="form-control">
                                                            <option value="1">1 - Tidak
                                                            </option>
                                                            <option value="2">2 - Tidak, tapi saya sedang menunggu hasil
                                                                lamaran
                                                                kerja</option>
                                                            <option value="3">3 - Ya, saya akan mulai bekerja dalam 2 minggu
                                                                ke
                                                                depan</option>
                                                            <option value="4">4 - Ya, tapi saya belum pasti akan bekerja
                                                                dalam 2
                                                                minggu ke depan</option>
                                                            <option value="5">5 - Lainnya</option>
                                                        </select>
                                                    </div>

                                                    <div class="form mb-3 col" id="divf1002">
                                                        <label data-error="wrong" data-success="right" for="f1002">f1002 -
                                                            Jika menjawab lainnya, tuliskan disini
                                                        </label>
                                                        <input type="text" name="f1002" id="f1002" class="form-control">
                                                    </div>

                                                </div>

                                                <div class="form mb-3">
                                                    <label data-error="wrong" data-success="right" for="f16"
                                                        class="mb-2">f16 - Jika
                                                        menurut anda pekerjaan anda saat ini tidak sesuai dengan pendidikan
                                                        anda, mengapa anda mengambilnya? Jawaban bisa lebih dari satu
                                                    </label>
                                                    <br>
                                                    <input type="checkbox" name="f1601" id="f1601" value="1"> 01 -
                                                    Pertanyaan
                                                    tidak sesuai; pekerjaan saya
                                                    sekarang sudah sesuai dengan pendidikan saya.
                                                    <br>
                                                    <input type="checkbox" name="f1602" id="f1602" value="1"> 02 -
                                                    Saya belum mendapatkan pekerjaan yang lebih sesuai.
                                                    <br>
                                                    <input type="checkbox" name="f1603" id="f1603" value="1"> 03 -
                                                    Di pekerjaan ini saya memeroleh prospek karir yang baik.
                                                    <br>
                                                    <input type="checkbox" name="f1604" id="f1604" value="1"> 04 -
                                                    Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya
                                                    dengan pendidikan saya.
                                                    <br>
                                                    <input type="checkbox" name="f1605" id="f1605" value="1"> 05 -
                                                    Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan
                                                    saya dibanding posisi sebelumnya.
                                                    <br>
                                                    <input type="checkbox" name="f1606" id="f1606" value="1"> 06 -
                                                    Saya dapat memeroleh pendapatan yang lebih tinggi di pekerjaan ini.
                                                    <br>
                                                    <input type="checkbox" name="f1607" id="f1607" value="1"> 07 -
                                                    Pekerjaan saya saat ini lebih aman/terjamin/secure.
                                                    <br>
                                                    <input type="checkbox" name="f1608" id="f1608" value="1"> 08 -
                                                    Pekerjaan saya saat ini lebih menarik.
                                                    <br>
                                                    <input type="checkbox" name="f1609" id="f1609" value="1"> 09 -
                                                    Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan
                                                    tambahan/jadwal yang fleksibel, dll.
                                                    <br>
                                                    <input type="checkbox" name="f1610" id="f1610" value="1"> 10 -
                                                    Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya.
                                                    <br>
                                                    <input type="checkbox" name="f1611" id="f1611" value="1"> 11 -
                                                    Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya.
                                                    <br>
                                                    <input type="checkbox" name="f1612" id="f1612" value="1"> 12 -
                                                    Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak
                                                    berhubungan dengan pendidikan saya.
                                                    <br>
                                                    <input type="checkbox" name="f1613" id="f1613" value="1"> 13 -
                                                    Lainnya:
                                                    <br>

                                                </div>
                                                <div class="form mb-3 col" id="divf1614">
                                                    <label data-error="wrong" data-success="right" for="f1614">f1614 -
                                                        Jika menjawab lainnya, tuliskan disini
                                                    </label>
                                                    <input type="text" name="f1614" id="f1614" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div id="step-6" class="tab-pane" role="tabpanel" aria-labelledby="step-6">
                                            <h3>Step 6 Kuesioner Kepuasan</h3>
                                            <div class="form mb-1 col">
                                                <label data-error="wrong" data-success="right" for="none">1. Keterlibatan
                                                    lulusan dalam menyusun kurikulum dan profil program studi </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Tidak Puas</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="kp1" id="kp1" value="1">
                                                <label class="form-check-label" for="kp1">1</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp1" id="kp1" value="2">
                                                <label class="form-check-label" for="kp1">2</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp1" id="kp1" value="3">
                                                <label class="form-check-label" for="kp1">3</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp1" id="kp1" value="4">
                                                <label class="form-check-label" for="kp1">4</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp1" id="kp1" value="5">
                                                <label class="form-check-label" for="kp1">5</label>
                                            </div>
                                            <div class="form-check form-check-inline mb-3">
                                                <label class="form-check-label">Sangat Puas</label>
                                            </div>

                                            <div class="form mb-1 col">
                                                <label data-error="wrong" data-success="right" for="none">2. Kemudahan
                                                    mengakses informasi akademik dan kepegawaian.</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Tidak Puas</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="kp2" id="kp2" value="1">
                                                <label class="form-check-label" for="kp2">1</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp2" id="kp2" value="2">
                                                <label class="form-check-label" for="kp2">2</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp2" id="kp2" value="3">
                                                <label class="form-check-label" for="kp2">3</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp2" id="kp2" value="4">
                                                <label class="form-check-label" for="kp2">4</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp2" id="kp2" value="5">
                                                <label class="form-check-label" for="kp2">5</label>
                                            </div>
                                            <div class="form-check form-check-inline mb-3">
                                                <label class="form-check-label">Sangat Puas</label>
                                            </div>

                                            <div class="form mb-1 col">
                                                <label data-error="wrong" data-success="right" for="none">3. Kesempatan
                                                    untuk menyampaikan saran dan kritikan.</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Tidak Puas</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="kp3" id="kp3" value="1">
                                                <label class="form-check-label" for="kp3">1</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp3" id="kp3" value="2">
                                                <label class="form-check-label" for="kp3">2</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp3" id="kp3" value="3">
                                                <label class="form-check-label" for="kp3">3</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp3" id="kp3" value="4">
                                                <label class="form-check-label" for="kp3">4</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp3" id="kp3" value="5">
                                                <label class="form-check-label" for="kp3">5</label>
                                            </div>
                                            <div class="form-check form-check-inline mb-3">
                                                <label class="form-check-label">Sangat Puas</label>
                                            </div>


                                            <div class="form mb-1 col">
                                                <label data-error="wrong" data-success="right" for="none">4. Tindak lanjut
                                                    kritik, saran dan keluhan yang disampaikan oleh lulusan.</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Tidak Puas</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="kp4" id="kp4" value="1">
                                                <label class="form-check-label" for="kp4">1</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp4" id="kp4" value="2">
                                                <label class="form-check-label" for="kp4">2</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp4" id="kp4" value="3">
                                                <label class="form-check-label" for="kp4">3</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp4" id="kp4" value="4">
                                                <label class="form-check-label" for="kp4">4</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp4" id="kp4" value="5">
                                                <label class="form-check-label" for="kp4">5</label>
                                            </div>
                                            <div class="form-check form-check-inline mb-3">
                                                <label class="form-check-label">Sangat Puas</label>
                                            </div>


                                            <div class="form mb-1 col">
                                                <label data-error="wrong" data-success="right" for="none">5. Pemberdayaan
                                                    lulusan</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Tidak Puas</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="kp5" id="kp5" value="1">
                                                <label class="form-check-label" for="kp5">1</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp5" id="kp5" value="2">
                                                <label class="form-check-label" for="kp5">2</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp5" id="kp5" value="3">
                                                <label class="form-check-label" for="kp5">3</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp5" id="kp5" value="4">
                                                <label class="form-check-label" for="kp5">4</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp5" id="kp5" value="5">
                                                <label class="form-check-label" for="kp5">5</label>
                                            </div>
                                            <div class="form-check form-check-inline mb-3">
                                                <label class="form-check-label">Sangat Puas</label>
                                            </div>


                                            <div class="form mb-1 col">
                                                <label data-error="wrong" data-success="right" for="none">6. Perlakuan yang
                                                    adil terhadap mahasiswa berkaitan dengan kinerja program studi.</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Tidak Puas</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="kp6" id="kp6" value="1">
                                                <label class="form-check-label" for="kp6">1</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp6" id="kp6" value="2">
                                                <label class="form-check-label" for="kp6">2</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp6" id="kp6" value="3">
                                                <label class="form-check-label" for="kp6">3</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp6" id="kp6" value="4">
                                                <label class="form-check-label" for="kp6">4</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp6" id="kp6" value="5">
                                                <label class="form-check-label" for="kp6">5</label>
                                            </div>
                                            <div class="form-check form-check-inline mb-3">
                                                <label class="form-check-label">Sangat Puas</label>
                                            </div>


                                            <div class="form mb-1 col">
                                                <label data-error="wrong" data-success="right" for="none">7. Ketersediaan
                                                    informasi tentang legalisir ijazah dan transkrip nilai.</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Tidak Puas</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="kp7" id="kp7" value="1">
                                                <label class="form-check-label" for="kp7">1</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp7" id="kp7" value="2">
                                                <label class="form-check-label" for="kp7">2</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp7" id="kp7" value="3">
                                                <label class="form-check-label" for="kp7">3</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp7" id="kp7" value="4">
                                                <label class="form-check-label" for="kp7">4</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp7" id="kp7" value="5">
                                                <label class="form-check-label" for="kp7">5</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Puas</label>
                                            </div>

                                            <div class="form mb-1 col">
                                                <label data-error="wrong" data-success="right" for="none">8. Keramahan
                                                    tenaga kependidikan dalam melayani lulusan.</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Tidak Puas</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="kp8" id="kp8" value="1">
                                                <label class="form-check-label" for="kp8">1</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp8" id="kp8" value="2">
                                                <label class="form-check-label" for="kp8">2</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp8" id="kp8" value="3">
                                                <label class="form-check-label" for="kp8">3</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp8" id="kp8" value="4">
                                                <label class="form-check-label" for="kp8">4</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp8" id="kp8" value="5">
                                                <label class="form-check-label" for="kp8">5</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Puas</label>
                                            </div>

                                            <div class="form mb-1 col">
                                                <label data-error="wrong" data-success="right" for="none">9. Kemudahan dalam
                                                    proses legalisir ijazah dan transkrip nilai.</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Tidak Puas</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="kp9" id="kp9" value="1">
                                                <label class="form-check-label" for="kp9">1</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp9" id="kp9" value="2">
                                                <label class="form-check-label" for="kp9">2</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp9" id="kp9" value="3">
                                                <label class="form-check-label" for="kp9">3</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp9" id="kp9" value="4">
                                                <label class="form-check-label" for="kp9">4</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp9" id="kp9" value="5">
                                                <label class="form-check-label" for="kp9">5</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Puas</label>
                                            </div>

                                            <div class="form mb-1 col">
                                                <label data-error="wrong" data-success="right" for="none">10. Kejelasan
                                                    prosedur dalam legalisir ijazah dan transkrip nilai.</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Tidak Puas</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="kp10" id="kp10"
                                                    value="1">
                                                <label class="form-check-label" for="kp10">1</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp10" id="kp10"
                                                    value="2">
                                                <label class="form-check-label" for="kp10">2</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp10" id="kp10"
                                                    value="3">
                                                <label class="form-check-label" for="kp10">3</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp10" id="kp10"
                                                    value="4">
                                                <label class="form-check-label" for="kp10">4</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp10" id="kp10"
                                                    value="5">
                                                <label class="form-check-label" for="kp10">5</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Puas</label>
                                            </div>

                                            <div class="form mb-1 col">
                                                <label data-error="wrong" data-success="right" for="none">11. Kepastian
                                                    waktu pengambilan legalisir ijazah dan transkrip nilai.</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Tidak Puas</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="kp11" id="kp11"
                                                    value="1">
                                                <label class="form-check-label" for="kp11">1</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp11" id="kp11"
                                                    value="2">
                                                <label class="form-check-label" for="kp11">2</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp11" id="kp11"
                                                    value="3">
                                                <label class="form-check-label" for="kp11">3</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp11" id="kp11"
                                                    value="4">
                                                <label class="form-check-label" for="kp11">4</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp11" id="kp11"
                                                    value="5">
                                                <label class="form-check-label" for="kp11">5</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Puas</label>
                                            </div>

                                            <div class="form mb-1 col">
                                                <label data-error="wrong" data-success="right" for="none">12. Tenaga
                                                    kependidikan memberikan perilaku yang adil dalam pengambilan legalisir
                                                    ijazah dan transkrip nilai.</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Tidak Puas</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="kp12" id="kp12"
                                                    value="1">
                                                <label class="form-check-label" for="kp12">1</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp12" id="kp12"
                                                    value="2">
                                                <label class="form-check-label" for="kp12">2</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp12" id="kp12"
                                                    value="3">
                                                <label class="form-check-label" for="kp12">3</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp12" id="kp12"
                                                    value="4">
                                                <label class="form-check-label" for="kp12">4</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp12" id="kp12"
                                                    value="5">
                                                <label class="form-check-label" for="kp12">5</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Puas</label>
                                            </div>

                                            <div class="form mb-1 col">
                                                <label data-error="wrong" data-success="right" for="none">13. Ketersediaan
                                                    informasi tentang lowongan kerja.</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Tidak Puas</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="kp13" id="kp13"
                                                    value="1">
                                                <label class="form-check-label" for="kp13">1</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp13" id="kp13"
                                                    value="2">
                                                <label class="form-check-label" for="kp13">2</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp13" id="kp13"
                                                    value="3">
                                                <label class="form-check-label" for="kp13">3</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp13" id="kp13"
                                                    value="4">
                                                <label class="form-check-label" for="kp13">4</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp13" id="kp13"
                                                    value="5">
                                                <label class="form-check-label" for="kp13">5</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Puas</label>
                                            </div>

                                            <div class="form mb-1 col">
                                                <label data-error="wrong" data-success="right" for="none">14. Ketersediaan
                                                    informasi tentang pelatihan dalam pengembangan karir.</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Tidak Puas</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="kp14" id="kp14"
                                                    value="1">
                                                <label class="form-check-label" for="kp14">1</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp14" id="kp14"
                                                    value="2">
                                                <label class="form-check-label" for="kp14">2</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp14" id="kp14"
                                                    value="3">
                                                <label class="form-check-label" for="kp14">3</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp14" id="kp14"
                                                    value="4">
                                                <label class="form-check-label" for="kp14">4</label>
                                            </div>
                                            <div class="form-check form-check-inline ms-4">
                                                <input type="radio" class="form-check-input" name="kp14" id="kp14"
                                                    value="5">
                                                <label class="form-check-label" for="kp14">5</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">Sangat Puas</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
    <input type="hidden" value="1" id="stepJs">
    <input type="hidden" value="0" id="validJs">
    <!--end page wrapper -->
@endsection

@push('prepend-script')
    <!-- Vendor js -->
    <script src="vertical/assets/js/jquery.min.js"></script>
@endpush

@push('addon-script')
    <script>
        $(document).ready(function() {
            hidef8();
            hide502();
            hide506();
            hidef1102();
            hidef1202();
            hidef302();
            hidef303();
            hidef416();
            hidef1002();
            hidekerja();
            hidef5c();

            // Toolbar extra buttons
            var btnFinish = $('<button id="tombolfinis" name="tombolfinis"></button>').text('Finish').addClass(
                'btn btn-info').on(
                'click',
                function() {
                    // alert('Apakah anda sudah yakin ?');

                    finishkuesionerp();
                    return false;
                });

            var btnCancel = $('<button></button>').text('Cancel').addClass('btn btn-danger').on('click',
                function() {
                    $('#smartwizard').smartWizard("reset");
                    return true;
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
                // $(".sw-btn-next").addClass('d-none');
            });
            // Smart Wizard
            $('#smartwizard').smartWizard({
                selected: 0,
                theme: 'dots',
                transition: {
                    animation: 'fade', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
                },
                toolbarSettings: {
                    toolbarPosition: 'bottom', // both bottom
                    toolbarExtraButtons: [btnFinish]
                },
                anchorSettings: {
                    anchorClickable: false, // Enable/Disable anchor navigation
                    enableAllAnchors: false, // Activates all anchors clickable all times
                    markDoneStep: true, // Add done state on navigation
                    markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                    removeDoneStepOnNavigateBack: false, // While navigate back done step after active step will be cleared
                    enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                },

            });

            // External Button Events
            $("#reset-btn").on("click", function() {
                // Reset wizard
                $('#smartwizard').smartWizard("reset");
                return true;
            });
            $(".sw-btn-prev").on("click", function() {
                // Navigate previous
                var step = $("#stepJs").val();
                step--;
                $("#stepJs").val(step);

                // $('#smartwizard').smartWizard("prev");
                return true;
            });
            $("#tombolfinis").addClass('disabled');
            $(".sw-btn-next").on("click", function() {
                // Navigate next
                var step = $("#stepJs").val();
                var result;

                if (step == 1) {
                    result = validationStep1();
                } else if (step == 2) {
                    result = validationStep2();
                } else if (step == 3) {
                    result = validationStep3();
                } else if (step == 4) {
                    result = validationStep4();
                } else if (step == 5) {
                    finishkuesioner();
                    result = true;
                }

                console.log()
                console.log(result);
                if (result) {

                    // $('#smartwizard').smartWizard("next");
                    step++;
                    $("#stepJs").val(step);
                    console.log(step);
                    return;
                } else {
                    $('#smartwizard').smartWizard("prev");
                }
                // alert($nilai);
            });

            function validationStep1() {
                if ($("#telpomsmh").val() == "") {
                    lobiBox('error', "Inputan Nomor Telepon masih kosong!");
                    return false;
                } else if ($("#emailmsmh").val() == "") {
                    lobiBox('error', "Inputan Email masih kosong!");
                    return false;
                } else if ($("#nik").val() == "") {
                    lobiBox('error', "Inputan NIK masih kosong!");
                    return false;
                } else if ($("#tahun_lulus").val() == "") {
                    lobiBox('error', "Belum Memilih Tahun Lulus!");
                    return false;
                } else if ($("#kdpstmsmh").val() == "") {
                    lobiBox('error', "Belum Memilih Program Studi!");
                    return false;
                }

                return true;
            }

            function validationStep2() {
                var valid = $("#validJs").val();
                if ($("#f8").val() == "") {
                    lobiBox('error', "Inputan f8 masih kosong!");
                    return false;
                } else if ($("#f5a1").val() == "") {
                    lobiBox('error', "Belum memilih f5a1 !");
                    return false;
                } else if ($("#f5a2").val() == "") {
                    lobiBox('error', "Belum memilih f5a2 !");
                    return false;
                } else if ($("#f1201").val() == "") {
                    lobiBox('error', "Belum memilih f1201 !");
                    return false;
                } else if (valid == 4) {
                    if ($("#f18a").val() == "") {
                        lobiBox('error', "Belum memilih f18a !");
                        return false;
                    } else if ($("#f18b").val() == "") {
                        lobiBox('error', "Belum memilih f18b !");
                        return false;
                    } else if ($("#f18c").val() == "") {
                        lobiBox('error', "Belum memilih f18c !");
                        return false;
                    } else if ($("#f18d").val() == "") {
                        lobiBox('error', "Belum memilih f18d !");
                        return false;
                    }
                    return true;
                } else if (valid == 1) {
                    if ($("#f504").val() == "") {
                        lobiBox('error', "Belum memilih f504 !");
                        return false;
                    } else if ($("#f505").val() == "") {
                        lobiBox('error', "Inputan f505 masih kosong!");
                        return false;
                    } else if ($("#f1101").val() == "") {
                        lobiBox('error', "Belum memilih f1101 !");
                        return false;
                    } else if ($("#f5b").val() == "") {
                        lobiBox('error', "Inputan f5b masih kosong!");
                        return false;
                    } else if ($("#f5d").val() == "") {
                        lobiBox('error', "Belum memilih f5d !");
                        return false;
                    } else if ($("#f14").val() == "") {
                        lobiBox('error', "Belum memilih f14 !");
                        return false;
                    } else if ($("#f15").val() == "") {
                        lobiBox('error', "Belum memilih f15 !");
                        return false;
                    }
                    return true;
                } else if (valid == 3) {
                    if ($("#f504").val() == "") {
                        lobiBox('error', "Belum memilih f504 !");
                        return false;
                    } else if ($("#f505").val() == "") {
                        lobiBox('error', "Inputan f505 masih kosong!");
                        return false;
                    } else if ($("#f1101").val() == "") {
                        lobiBox('error', "Belum memilih f1101 !");
                        return false;
                    } else if ($("#f5b").val() == "") {
                        lobiBox('error', "Inputan f5b masih kosong!");
                        return false;
                    } else if ($("#f5d").val() == "") {
                        lobiBox('error', "Belum memilih f5d !");
                        return false;
                    } else if ($("#f14").val() == "") {
                        lobiBox('error', "Belum memilih f14 !");
                        return false;
                    } else if ($("#f15").val() == "") {
                        lobiBox('error', "Belum memilih f15 !");
                        return false;
                    } else if ($("#f5c").val() == "") {
                        lobiBox('error', "Belum memilih f5c !");
                        return false;
                    }
                    return true;
                } else if (valid == 0) {
                    return true;
                }
                return true;
            }

            function validationStep3() {

                if (verifradio('f1761') == false) {
                    return false;
                } else if (verifradio('f1763') == false) {
                    return false;
                } else if (verifradio('f1765') == false) {
                    return false;
                } else if (verifradio('f1767') == false) {
                    return false;
                } else if (verifradio('f1769') == false) {
                    return false;
                } else if (verifradio('f1771') == false) {
                    return false;
                } else if (verifradio('f1773') == false) {
                    return false;
                }
                console.log("ini valid3");

                return true;
            }

            function validationStep4() {

                if (verifradio('f1762') == false) {
                    return false;
                } else if (verifradio('f1764') == false) {
                    return false;
                } else if (verifradio('f1766') == false) {
                    return false;
                } else if (verifradio('f1768') == false) {
                    return false;
                } else if (verifradio('f1770') == false) {
                    return false;
                } else if (verifradio('f1772') == false) {
                    return false;
                } else if (verifradio('f1774') == false) {
                    return false;
                }
                console.log("ini valid4");

                return true;
            }




            function lobiBox(status, message) {
                Lobibox.notify(status, {
                    pauseDelayOnHover: true,
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    icon: 'bx bx-check-circle',
                    msg: message
                });
            }

            function verifradio(name) {
                var off_payment_method = document.getElementsByName(name);
                var ischecked_method = false;
                for (var i = 0; i < off_payment_method.length; i++) {
                    if (off_payment_method[i].checked) {
                        ischecked_method = true;
                        break;
                    }
                }
                if (!ischecked_method) { //payment method button is not checked
                    lobiBox('error', "Belum Memilih " + name + " !");
                    return false;
                }
            }
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

            $("#f8").on("change", function() {
                var nilai = $(this).val();
                if (nilai == "4") {
                    showf8();
                    hidekerja();
                    hidef5c();
                    $("#validJs").val(4);
                    refreshform();
                } else if (nilai == "1") {
                    showkerja();
                    hidef8();
                    hidef5c();
                    $("#validJs").val(1);
                    refreshform();
                } else if (nilai == "3") {
                    showkerja();
                    hidef8();
                    showf5c();
                    $("#validJs").val(3);
                    refreshform();
                } else {
                    hidef8();
                    hidekerja();
                    hidef5c();
                    $("#validJs").val(0);
                    refreshform();
                }
            });

            $("#f504").on("change", function() {
                var nilai = $(this).val();
                // alert(nilai);
                if (nilai == "1") {
                    $('#div502').removeClass('d-none');
                    $('#div506').addClass('d-none');
                    refreshform();


                } else if (nilai == "2") {
                    $('#div506').removeClass('d-none');
                    $('#div502').addClass('d-none');
                    refreshform();


                } else {
                    $('#div502').addClass('d-none');
                    $('#div506').addClass('d-none');
                    refreshform();


                }
            });

            $("#f1101").on("change", function() {
                var nilai = $(this).val();
                if (nilai == "5") {
                    $('#divf1102').removeClass('d-none');
                    // refreshform();
                } else {
                    hidef1102();
                    // refreshform();
                }
            });

            $("#f1201").on("change", function() {
                var nilai = $(this).val();
                if (nilai == "7") {
                    $('#divf1202').removeClass('d-none');
                    // refreshform();
                } else {
                    hidef1202();
                    // refreshform();
                }
            });

            $("#f301").on("change", function() {
                var nilai = $(this).val();
                // alert(nilai);
                if (nilai == "1") {
                    hidef303();
                    $('#divf302').removeClass('d-none');
                    // refreshform();
                } else if (nilai == "2") {
                    hidef302();
                    $('#divf303').removeClass('d-none');

                    // refreshform();
                } else {
                    hidef302();
                    hidef303();
                }
            });

            $('#f415').click(function() {
                if ($(this).is(':checked')) {
                    $('#divf416').removeClass('d-none');
                    refreshform();
                } else {
                    hidef416();
                }
            });

            $("#f1001").on("change", function() {
                var nilai = $(this).val();
                if (nilai == "5") {
                    $('#divf1002').removeClass('d-none');
                    // refreshform();
                } else {
                    hidef1002();
                    // refreshform();
                }
            });
            var dtprov = JSON.parse('{!! json_encode($provinsi) !!}');

            $("#f5a1").on("change", function() {
                var nilai = $(this).val();
                let htmlop = `<option selected disabled> Pilih kabupaten </option>`;

                if (nilai == '') {

                } else {
                    var tess = dtprov.filter((data) => {
                        return data['id_wil'] == nilai;
                    })

                    tess[0]['kota'].forEach((val) => {
                        htmlop += `<option value="${val['id_wil']}" > ${val['nm_wil']} </option>`;
                    })
                }

                $("#f5a2").html(htmlop)
            });
            // var tes = [1, 2, 3, 4]

            function finishkuesioner() {
                // alert('Data kuesioner akan disimpan, Apakah anda sudah yakin?');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ url('mahasiswa/kuesioner') }}",
                    type: "POST",
                    data: $('#formquestioner').serialize(),
                    success: function(response) {
                        console.log("sukses nyimpan");
                    },
                    // error: function(request, status, error) {
                    //     alert(request.responseText);
                    // }
                });
                $("#tombolfinis").removeClass('disabled');

            }

            function finishkuesionerp() {
                var url = "{{ url('mahasiswa/dashboard') }}";
                console.log(url);
                // die();
                alert('Terima kasih telah mengisi kuesioner tracer study alumni UNM');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ url('mahasiswa/kuesionerp') }}",
                    type: "POST",
                    data: $('#formquestioner').serialize(),
                    success: function(response) {
                        window.location.href = url;
                    },
                    // error: function(request, status, error) {
                    //     alert(request.responseText);
                    // }

                });
            }
        });

        function hidef8() {
            $('#divf18a').addClass('d-none');
            $('#divf18b').addClass('d-none');
            $('#divf18c').addClass('d-none');
            $('#divf18d').addClass('d-none');
        }

        function showf8() {
            $('#divf18a').removeClass('d-none');
            $('#divf18b').removeClass('d-none');
            $('#divf18c').removeClass('d-none');
            $('#divf18d').removeClass('d-none');
        }

        function hide502() {
            $('#div502').addClass('d-none');
        }

        function hide506() {
            $('#div506').addClass('d-none');
        }

        function hidef1102() {
            $('#divf1102').addClass('d-none');
        }

        function hidef1202() {
            $('#divf1202').addClass('d-none');
        }

        function refreshform() {
            $('#smartwizard').smartWizard("prev");
            $('#smartwizard').smartWizard("next");
        }

        function hidef302() {
            $('#divf302').addClass('d-none');
        }

        function hidef303() {
            $('#divf303').addClass('d-none');
        }

        function hidef416() {
            $('#divf416').addClass('d-none');
        }

        function hidef1002() {
            $('#divf1002').addClass('d-none');
        }

        function hidekerja() {
            $('#divf504').addClass('d-none');
            $('#divf505').addClass('d-none');
            $('#divf1101').addClass('d-none');
            $('#divf5b').addClass('d-none');
            $('#divf5d').addClass('d-none');
            // $('#divf14').addClass('d-none');
            // $('#divf15').addClass('d-none');
        }

        function hidef5c() {
            $('#divf5c').addClass('d-none');

        }

        function showkerja() {
            $('#divf504').removeClass('d-none');
            $('#divf505').removeClass('d-none');
            $('#divf1101').removeClass('d-none');
            $('#divf5b').removeClass('d-none');
            $('#divf5d').removeClass('d-none');
            $('#divf14').removeClass('d-none');
            $('#divf15').removeClass('d-none');
        }

        function showf5c() {
            $('#divf5c').removeClass('d-none');

        }
    </script>
@endpush
