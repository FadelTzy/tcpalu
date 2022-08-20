@extends('layouts.vl_admin')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            {{-- <div class="card">
                <div class="card-header"> N = {{ $nialin }}</div>
            </div> --}}
            @if ($jakreditasi == 'emba')
                <div class="card">
                    <div class="card-header">
                        Akreditasi {{ $nilaijakreditasi }} Program Studi {{ $nama_prodi->nama_prodi }}
                    </div>

                </div>
                <div class="card">
                    <div class="card-header">
                        Tabel 3.c.1 Waktu Tunggu Lulusan (Khusus Program Diploma Tiga) / Tabel 3.c.3 Waktu Tunggu Lulusan
                        (Khusus Program Sarjana Terapan)
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Lulus</th>
                                        <th>Jumlah Lulusan</th>
                                        <th>Jumlah Lulusan yang Terlacak</th>
                                        <th>WT < 3 Bulan </th>
                                        <th>3 < WT < 6 Bulan</th>
                                        <th>WT > 6 Bulan</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($jtp == 'diploma')
                                        @foreach ($tahunlulus as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data->nilai_tl }}</td>
                                                <td>
                                                    @php
                                                        $lulusanq = $totallulus->where('tahun_tl', $data->nilai_tl);

                                                    @endphp
                                                    {{ $lulusanq[0]->total_tl ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $lulusanlacakq = $dataumum->where('tahun_lulus', $data->nilai_tl);

                                                    @endphp
                                                    {{ count($lulusanlacakq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $dibawahq = $ddibawah->where('tahun_lulus', $data->nilai_tl);

                                                    @endphp
                                                    {{ count($dibawahq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $diantaraq = $ddiantara->where('tahun_lulus', $data->nilai_tl);
                                                    @endphp
                                                    {{ count($diantaraq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $diatasq = $ddiatas->where('tahun_lulus', $data->nilai_tl);
                                                    @endphp
                                                    {{ count($diatasq) ?? '-' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        Tabel 3.c.2 Waktu Tunggu Lulusan (Khusus Program Sarjana)
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="exampled" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Lulus</th>
                                        <th>Jumlah Lulusan</th>
                                        <th>Jumlah Lulusan yang Terlacak</th>
                                        <th>WT < 6 Bulan </th>
                                        <th>6 < WT < 18 Bulan</th>
                                        <th>WT > 18 Bulan</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($jtp == 'sarjana')
                                        @foreach ($tahunlulus as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data->nilai_tl }}</td>
                                                <td>
                                                    @php
                                                        $lulusanq = $totallulus->where('tahun_tl', $data->nilai_tl);
                                                    @endphp
                                                    {{ $lulusanq[0]->total_tl ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $lulusanlacakq = $dataumum->where('tahun_lulus', $data->nilai_tl);

                                                    @endphp
                                                    {{ count($lulusanlacakq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $dibawahq = $dibawah->where('tahun_lulus', $data->nilai_tl);

                                                    @endphp
                                                    {{ count($dibawahq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $diantaraq = $diantara->where('tahun_lulus', $data->nilai_tl);
                                                    @endphp
                                                    {{ count($diantaraq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $diatasq = $diatas->where('tahun_lulus', $data->nilai_tl);
                                                    @endphp
                                                    {{ count($diatasq) ?? '-' }}
                                                </td>


                                            </tr>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        Tabel 3.d. Kesesuaian Bidang Kerja Lulusan (Khusus Program Diploma Tiga/Sarjana/Sarjana
                        Terapan/Magister/Magister Terapan)
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="examplet" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Lulus</th>
                                        <th>Jumlah Lulusan</th>
                                        <th>Jumlah Lulusan yang Terlacak</th>
                                        <th>Tidak Sesuai</th>
                                        <th>Sesuai</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($tahunlulus as $data)
                                        <tr>
                                            <td>{{ $nod++ }}</td>
                                            <td>{{ $data->nilai_tl }}</td>
                                            <td>
                                                @php
                                                    $lulusanq = $totallulus->where('tahun_tl', $data->nilai_tl);
                                                @endphp
                                                {{ $lulusanq[0]->total_tl ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $lulusanlacakq = $dataumum->where('tahun_lulus', $data->nilai_tl);

                                                @endphp
                                                {{ count($lulusanlacakq) ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $tidaksesuaiq = $tidaksesuai->where('tahun_lulus', $data->nilai_tl);

                                                @endphp
                                                {{ count($tidaksesuaiq) ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $sesuaiq = $sesuai->where('tahun_lulus', $data->nilai_tl);
                                                @endphp
                                                {{ count($sesuaiq) ?? '-' }}
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        Tabel 3.e. Jangkauan Operasi Kerja Lulusan (Khusus Program Diploma Tiga/Sarjana/Sarjana Terapan)
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="examplee" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Lulus</th>
                                        <th>Jumlah Lulusan</th>
                                        <th>Jumlah Lulusan yang Terlacak</th>
                                        <th>Lokal/Wilayah/ Berwirausaha tidak Berizin</th>
                                        <th>Nasional/ Berwirausaha Berizin</th>
                                        <th>Multinasiona/ Internasional</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($tahunlulus as $data)
                                        <tr>
                                            <td>{{ $not++ }}</td>
                                            <td>{{ $data->nilai_tl }}</td>
                                            <td>
                                                @php
                                                    $lulusanq = $totallulus->where('tahun_tl', $data->nilai_tl);
                                                @endphp
                                                {{ $lulusanq[0]->total_tl ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $lulusanlacakq = $dataumum->where('tahun_lulus', $data->nilai_tl);

                                                @endphp
                                                {{ count($lulusanlacakq) ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $ttklokalq = $ttklokal->where('tahun_lulus', $data->nilai_tl);

                                                @endphp
                                                {{ count($ttklokalq) ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $ttknasionalq = $ttknasional->where('tahun_lulus', $data->nilai_tl);
                                                @endphp
                                                {{ count($ttknasionalq) ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $ttkmultinasionalq = $ttkmultinasional->where('tahun_lulus', $data->nilai_tl);
                                                @endphp
                                                {{ count($ttkmultinasionalq) ?? '-' }}
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        Tabel 8.e.2) Kepuasan Pengguna Lulusan
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="examplet" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Lulus</th>
                                        <th>Jumlah Lulusan</th>
                                        <th>Jumlah Lulusan yang Terlacak</th>
                                        <th>Rendah</th>
                                        <th>Sedang</th>
                                        <th>Tinggi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($tahunlulus as $data)
                                        <tr>
                                            <td>{{ $nod++ }}</td>
                                            <td>{{ $data->nilai_tl }}</td>
                                            <td>
                                                @php
                                                    $lulusanq = $totallulus->where('tahun_tl', $data->nilai_tl);
                                                @endphp
                                                {{ $lulusanq[0]->total_tl ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $lulusanlacakq = $dataumum->where('tahun_lulus', $data->nilai_tl);

                                                @endphp
                                                {{ count($lulusanlacakq) ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $rendahq = $rendah->where('tahun_lulus', $data->nilai_tl);

                                                @endphp
                                                {{ count($rendahq) ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $sedangq = $sedang->where('tahun_lulus', $data->nilai_tl);
                                                @endphp
                                                {{ count($sedangq) ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $tinggiq = $tinggi->where('tahun_lulus', $data->nilai_tl);
                                                @endphp
                                                {{ count($tinggiq) ?? '-' }}
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            @elseif ($jakreditasi == 'banpt')
                <div class="card">
                    <div class="card-header">
                        Akreditasi {{ $nilaijakreditasi }} Program Studi {{ $nama_prodi->nama_prodi }}
                    </div>

                </div>
                <div class="card">
                    <div class="card-header">
                        Tabel 8.d.1) Waktu Tunggu Lulusan (Khusus Program Diploma Tiga / Sarjana Terapan)
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Lulus</th>
                                        <th>Jumlah Lulusan</th>
                                        <th>Jumlah Lulusan yang Terlacak</th>
                                        <th>WT < 3 Bulan </th>
                                        <th>3 < WT < 6 Bulan</th>
                                        <th>WT > 6 Bulan</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($jtp == 'diploma')
                                        @foreach ($tahunlulus as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data->nilai_tl }}</td>
                                                <td>
                                                    @php
                                                        $lulusanq = $totallulus->where('tahun_tl', $data->nilai_tl);
                                                    @endphp
                                                    {{ $lulusanq[0]->total_tl ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $lulusanlacakq = $dataumum->where('tahun_lulus', $data->nilai_tl);

                                                    @endphp
                                                    {{ count($lulusanlacakq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $dibawahq = $ddibawah->where('tahun_lulus', $data->nilai_tl);

                                                    @endphp
                                                    {{ count($dibawahq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $diantaraq = $ddiantara->where('tahun_lulus', $data->nilai_tl);
                                                    @endphp
                                                    {{ count($diantaraq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $diatasq = $ddiatas->where('tahun_lulus', $data->nilai_tl);
                                                    @endphp
                                                    {{ count($diatasq) ?? '-' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="card-header">
                        Tabel 8.d.1) Waktu Tunggu Lulusan (Khusus Program Sarjana)
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="exampled" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Lulus</th>
                                        <th>Jumlah Lulusan</th>
                                        <th>Jumlah Lulusan yang Terlacak</th>
                                        <th>WT < 6 Bulan </th>
                                        <th>6 < WT < 18 Bulan</th>
                                        <th>WT > 18 Bulan</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($jtp == 'sarjana')
                                        @foreach ($tahunlulus as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data->nilai_tl }}</td>
                                                <td>
                                                    @php
                                                        $lulusanq = $totallulus->where('tahun_tl', $data->nilai_tl);
                                                    @endphp
                                                    {{ $lulusanq[0]->total_tl ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $lulusanlacakq = $dataumum->where('tahun_lulus', $data->nilai_tl);

                                                    @endphp
                                                    {{ count($lulusanlacakq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $dibawahq = $dibawah->where('tahun_lulus', $data->nilai_tl);

                                                    @endphp
                                                    {{ count($dibawahq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $diantaraq = $diantara->where('tahun_lulus', $data->nilai_tl);
                                                    @endphp
                                                    {{ count($diantaraq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $diatasq = $diatas->where('tahun_lulus', $data->nilai_tl);
                                                    @endphp
                                                    {{ count($diatasq) ?? '-' }}
                                                </td>


                                            </tr>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>



                <div class="card">
                    <div class="card-header">
                        Tabel 8.e.1) Tempat Kerja Lulusan
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="examplee" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Lulus</th>
                                        <th>Jumlah Lulusan</th>
                                        <th>Jumlah Lulusan yang Terlacak</th>
                                        <th>Lokal/Wilayah/ Berwirausaha tidak Berizin</th>
                                        <th>Nasional/ Berwirausaha Berizin</th>
                                        <th>Multinasiona/ Internasional</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($tahunlulus as $data)
                                        <tr>
                                            <td>{{ $not++ }}</td>
                                            <td>{{ $data->nilai_tl }}</td>
                                            <td>
                                                @php
                                                    $lulusanq = $totallulus->where('tahun_tl', $data->nilai_tl);
                                                @endphp
                                                {{ $lulusanq[0]->total_tl ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $lulusanlacakq = $dataumum->where('tahun_lulus', $data->nilai_tl);

                                                @endphp
                                                {{ count($lulusanlacakq) ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $ttklokalq = $ttklokal->where('tahun_lulus', $data->nilai_tl);

                                                @endphp
                                                {{ count($ttklokalq) ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $ttknasionalq = $ttknasional->where('tahun_lulus', $data->nilai_tl);
                                                @endphp
                                                {{ count($ttknasionalq) ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $ttkmultinasionalq = $ttkmultinasional->where('tahun_lulus', $data->nilai_tl);
                                                @endphp
                                                {{ count($ttkmultinasionalq) ?? '-' }}
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        Tabel 3.f. Kepuasan Pengguna (Khusus program Diploma Tiga/Sarjana/Sarjana Terapan/Magister/Magister
                        Terapan)
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="examplet" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Lulus</th>
                                        <th>Jumlah Lulusan</th>
                                        <th>Jumlah Lulusan yang Terlacak</th>
                                        <th>Rendah</th>
                                        <th>Sedang</th>
                                        <th>Tinggi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($tahunlulus as $data)
                                        <tr>
                                            <td>{{ $nod++ }}</td>
                                            <td>{{ $data->nilai_tl }}</td>
                                            <td>
                                                @php
                                                    $lulusanq = $totallulus->where('tahun_tl', $data->nilai_tl);
                                                @endphp
                                                {{ $lulusanq[0]->total_tl ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $lulusanlacakq = $dataumum->where('tahun_lulus', $data->nilai_tl);

                                                @endphp
                                                {{ count($lulusanlacakq) ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $rendahq = $rendah->where('tahun_lulus', $data->nilai_tl);

                                                @endphp
                                                {{ count($rendahq) ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $sedangq = $sedang->where('tahun_lulus', $data->nilai_tl);
                                                @endphp
                                                {{ count($sedangq) ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $tinggiq = $tinggi->where('tahun_lulus', $data->nilai_tl);
                                                @endphp
                                                {{ count($tinggiq) ?? '-' }}
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            @elseif ($jakreditasi == 'lamdik')
                <div class="card">
                    <div class="card-header">
                        Akreditasi {{ $nilaijakreditasi }} Program Studi {{ $nama_prodi->nama_prodi }}
                    </div>

                </div>
                <div class="card">
                    <div class="card-header">
                        Tabel 9.1.2.4 Tracer Study, Waktu Tunggu Mendapatkan Pekerjaan Pertama (Khusus Program Diploma Tiga
                        / Sarjana Terapan)
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Lulus</th>
                                        <th>Jumlah Lulusan</th>
                                        <th>Jumlah Lulusan yang Terlacak</th>
                                        <th>WT < 3 Bulan </th>
                                        <th>3 < WT < 6 Bulan</th>
                                        <th>WT > 6 Bulan</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($jtp == 'diploma')
                                        @foreach ($tahunlulus as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data->nilai_tl }}</td>
                                                <td>
                                                    @php
                                                        $lulusanq = $totallulus->where('tahun_tl', $data->nilai_tl);
                                                    @endphp
                                                    {{ $lulusanq[0]->total_tl ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $lulusanlacakq = $dataumum->where('tahun_lulus', $data->nilai_tl);

                                                    @endphp
                                                    {{ count($lulusanlacakq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $dibawahq = $ddibawah->where('tahun_lulus', $data->nilai_tl);

                                                    @endphp
                                                    {{ count($dibawahq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $diantaraq = $ddiantara->where('tahun_lulus', $data->nilai_tl);
                                                    @endphp
                                                    {{ count($diantaraq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $diatasq = $ddiatas->where('tahun_lulus', $data->nilai_tl);
                                                    @endphp
                                                    {{ count($diatasq) ?? '-' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        Tabel 9.1.2.4 Tracer Study, Waktu Tunggu Mendapatkan Pekerjaan Pertama (Khusus Program Sarjana)
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="exampled" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Lulus</th>
                                        <th>Jumlah Lulusan</th>
                                        <th>Jumlah Lulusan yang Terlacak</th>
                                        <th>WT < 6 Bulan </th>
                                        <th>6 < WT < 18 Bulan</th>
                                        <th>WT > 18 Bulan</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($jtp == 'sarjana')
                                        @foreach ($tahunlulus as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data->nilai_tl }}</td>
                                                <td>
                                                    @php
                                                        $lulusanq = $totallulus->where('tahun_tl', $data->nilai_tl);
                                                    @endphp
                                                    {{ $lulusanq[0]->total_tl ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $lulusanlacakq = $dataumum->where('tahun_lulus', $data->nilai_tl);

                                                    @endphp
                                                    {{ count($lulusanlacakq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $dibawahq = $dibawah->where('tahun_lulus', $data->nilai_tl);

                                                    @endphp
                                                    {{ count($dibawahq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $diantaraq = $diantara->where('tahun_lulus', $data->nilai_tl);
                                                    @endphp
                                                    {{ count($diantaraq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $diatasq = $diatas->where('tahun_lulus', $data->nilai_tl);
                                                    @endphp
                                                    {{ count($diatasq) ?? '-' }}
                                                </td>


                                            </tr>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        Tabel 9.1.2.5 Tingkat Relevansi Pekerjaan
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="examplet" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Lulus</th>
                                        <th>Jumlah Lulusan</th>
                                        <th>Jumlah Lulusan yang Terlacak</th>
                                        <th>Rendah</th>
                                        <th>Sedang</th>
                                        <th>Tinggi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($tahunlulus as $data)
                                        <tr>
                                            <td>{{ $nod++ }}</td>
                                            <td>{{ $data->nilai_tl }}</td>
                                            <td>
                                                @php
                                                    $lulusanq = $totallulus->where('tahun_tl', $data->nilai_tl);
                                                @endphp
                                                {{ $lulusanq[0]->total_tl ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $lulusanlacakq = $dataumum->where('tahun_lulus', $data->nilai_tl);

                                                @endphp
                                                {{ count($lulusanlacakq) ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $rendahq = $rendah->where('tahun_lulus', $data->nilai_tl);

                                                @endphp
                                                {{ count($rendahq) ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $sedangq = $sedang->where('tahun_lulus', $data->nilai_tl);
                                                @endphp
                                                {{ count($sedangq) ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $tinggiq = $tinggi->where('tahun_lulus', $data->nilai_tl);
                                                @endphp
                                                {{ count($tinggiq) ?? '-' }}
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        Tabel 9.3 Kepuasan Pengguna Lulusan
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="examplee" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Kemampuan</th>
                                        <th>Sangat Baik</th>
                                        <th>Baik</th>
                                        <th>Cukup</th>
                                        <th>Kurang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Etika</th>
                                        <td>16</td>
                                        <td>4</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Keahlian Pada Bidang Ilmu (Kompetensi Utama)</th>
                                        <td>13</td>
                                        <td>7</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Kemampuan Berbahasa Asing</th>
                                        <td>2</td>
                                        <td>12</td>
                                        <td>6</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Penggunaan Teknologi Informasi</th>
                                        <td>12</td>
                                        <td>8</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Kemampuan Berkomunikasi</th>
                                        <td>12</td>
                                        <td>8</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Kerjasama</th>
                                        <td>17</td>
                                        <td>3</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Pengembangan Diri</th>
                                        <td>12</td>
                                        <td>8</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Jumlah</th>
                                        <td>84</td>
                                        <td>50</td>
                                        <td>6</td>
                                        <td>0</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            @elseif ($jakreditasi == 'laminfokom')
                <div class="card">
                    <div class="card-header">
                        Akreditasi {{ $nilaijakreditasi }} Program Studi {{ $nama_prodi->nama_prodi }}
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        Tabel 9.4 Rata-rata Masa Tunggu Lulusan untuk bekerja pertama Kali
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="examplet" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Lulus</th>
                                        <th>Jumlah Lulusan</th>
                                        <th>Jumlah Lulusan yang Terlacak</th>
                                        <th>Rata-rata Waktu Tunggu (Bulan)</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($tahunlulus as $data)
                                        <tr>
                                            <td>{{ $nod++ }}</td>
                                            <td>{{ $data->nilai_tl }}</td>
                                            <td>
                                                @php
                                                    $lulusanq = $totallulus->where('tahun_tl', $data->nilai_tl);
                                                @endphp
                                                {{ $lulusanq[0]->total_tl ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $lulusanlacakq = $dataumum->where('tahun_lulus', $data->nilai_tl);

                                                @endphp
                                                {{ count($lulusanlacakq) ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $wheresf502 = [];
                                                    $wheresf502[] = ['tahun_lulus', $data->nilai_tl];
                                                    $wheresf502[] = ['f8', 1];
                                                    $wheresf502[] = ['kdpstmsmh', $prodi];

                                                    $wheredf502 = [];
                                                    $wheredf502[] = ['tahun_lulus', $data->nilai_tl];
                                                    $wheredf502[] = ['f8', 3];
                                                    $wheredf502[] = ['kdpstmsmh', $prodi];

                                                    $nilapembagisatu = DB::table('questioners')
                                                        ->join('questionersatus', 'questionersatus.id_questioners', '=', 'questioners.id')
                                                        ->select('questionersatus.f8')
                                                        ->where($wheresf502)
                                                        ->orwhere($wheredf502)
                                                        ->get()
                                                        ->count();
                                                    $nilapembagidua = DB::table('questioners')
                                                        ->join('questionersatus', 'questionersatus.id_questioners', '=', 'questioners.id')
                                                        ->where($wheredf502)
                                                        ->get()
                                                        ->count();
                                                    $nilapembagitotal = $nilapembagisatu + $nilapembagidua;

                                                    $nilaif502 = DB::table('questioners')
                                                        ->join('questionersatus', 'questionersatus.id_questioners', '=', 'questioners.id')
                                                        ->select('questionersatus.f502')
                                                        ->where($wheresf502)
                                                        ->orWhere($wheredf502)
                                                        ->sum('questionersatus.f502');

                                                    $nilaif506 = DB::table('questioners')
                                                        ->join('questionersatus', 'questionersatus.id_questioners', '=', 'questioners.id')
                                                        ->select('questionersatus.f506')
                                                        ->where($wheresf502)
                                                        ->orWhere($wheredf502)
                                                        ->sum('questionersatus.f506');

                                                    $nilaif = $nilaif502 + $nilaif506;
                                                @endphp
                                                @if ($nilapembagitotal == 0)
                                                    -
                                                @else
                                                    {{ round($nilaif / $nilapembagisatu, 2) ?? '-' }}
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        Tabel 9.5. Kesesuaian Bidang Kerja Lulusan
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="examplee" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Lulus</th>
                                        <th>Jumlah Lulusan</th>
                                        <th>Jumlah Lulusan yang Terlacak</th>
                                        <th>Profesi Kerja Bidang Infokom</th>
                                        <th>Profesi Kerja Bidang Non Infokom</th>
                                        <th>Multinasiona/ Internasional</th>
                                        <th>Nasional</th>
                                        <th>Wirausaha</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($tahunlulus as $data)
                                        <tr>
                                            <td>{{ $not++ }}</td>
                                            <td>{{ $data->nilai_tl }}</td>
                                            <td>
                                                @php
                                                    $lulusanq = $totallulus->where('tahun_tl', $data->nilai_tl);
                                                @endphp
                                                {{ $lulusanq[0]->total_tl ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $lulusanlacakq = $dataumum->where('tahun_lulus', $data->nilai_tl);

                                                @endphp
                                                {{ count($lulusanlacakq) ?? '-' }}
                                            </td>
                                            <td>
                                                -
                                            </td>
                                            <td>
                                                -
                                            </td>
                                            <td>
                                                @php
                                                    $ttkmultinasionalq = $ttkmultinasional->where('tahun_lulus', $data->nilai_tl);
                                                @endphp
                                                {{ count($ttkmultinasionalq) ?? '-' }}
                                            </td>

                                            <td>
                                                @php
                                                    $ttklokalq = $ttklokal->where('tahun_lulus', $data->nilai_tl);
                                                    $ttknasionalq = $ttknasional->where('tahun_lulus', $data->nilai_tl);

                                                @endphp
                                                {{ count($ttklokalq) + count($ttknasionalq) ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $ttkwirausahaq = $ttkwirausaha->where('tahun_lulus', $data->nilai_tl);
                                                @endphp
                                                {{ count($ttkwirausahaq) ?? '-' }}

                                            </td>


                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        Tabel 9.3 Kepuasan Pengguna Lulusan
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="examplee" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Kemampuan</th>
                                        <th>Sangat Baik</th>
                                        <th>Baik</th>
                                        <th>Cukup</th>
                                        <th>Kurang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Etika</th>
                                        <td>16</td>
                                        <td>4</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Keahlian Pada Bidang Ilmu (Kompetensi Utama)</th>
                                        <td>13</td>
                                        <td>7</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Kemampuan Berbahasa Asing</th>
                                        <td>2</td>
                                        <td>12</td>
                                        <td>6</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Penggunaan Teknologi Informasi</th>
                                        <td>12</td>
                                        <td>8</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Kemampuan Berkomunikasi</th>
                                        <td>12</td>
                                        <td>8</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Kerjasama</th>
                                        <td>17</td>
                                        <td>3</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Pengembangan Diri</th>
                                        <td>12</td>
                                        <td>8</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Jumlah</th>
                                        <td>84</td>
                                        <td>50</td>
                                        <td>6</td>
                                        <td>0</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            @elseif ($jakreditasi == 'lamteknik')
                <div class="card">
                    <div class="card-header">
                        Akreditasi {{ $nilaijakreditasi }} Program Studi {{ $nama_prodi->nama_prodi }}
                    </div>

                </div>
                <div class="card">
                    <div class="card-header">
                        Tabel 8.d.1) Waktu Tunggu Lulusan (Khusus Program Diploma Tiga / Sarjana Terapan)
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Lulus</th>
                                        <th>Jumlah Lulusan</th>
                                        <th>Jumlah Lulusan yang Terlacak</th>
                                        <th>WT < 3 Bulan </th>
                                        <th>3 < WT < 6 Bulan</th>
                                        <th>WT > 6 Bulan</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($jtp == 'diploma')
                                        @foreach ($tahunlulus as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data->nilai_tl }}</td>
                                                <td>
                                                    @php
                                                        $lulusanq = $totallulus->where('tahun_tl', $data->nilai_tl);
                                                    @endphp
                                                    {{ $lulusanq[0]->total_tl ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $lulusanlacakq = $dataumum->where('tahun_lulus', $data->nilai_tl);

                                                    @endphp
                                                    {{ count($lulusanlacakq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $dibawahq = $ddibawah->where('tahun_lulus', $data->nilai_tl);

                                                    @endphp
                                                    {{ count($dibawahq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $diantaraq = $ddiantara->where('tahun_lulus', $data->nilai_tl);
                                                    @endphp
                                                    {{ count($diantaraq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $diatasq = $ddiatas->where('tahun_lulus', $data->nilai_tl);
                                                    @endphp
                                                    {{ count($diatasq) ?? '-' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="card-header">
                        Tabel 8.d.1) Waktu Tunggu Lulusan (Khusus Program Sarjana)
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="exampled" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Lulus</th>
                                        <th>Jumlah Lulusan</th>
                                        <th>Jumlah Lulusan yang Terlacak</th>
                                        <th>WT < 6 Bulan </th>
                                        <th>6 < WT < 18 Bulan</th>
                                        <th>WT > 18 Bulan</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($jtp == 'sarjana')
                                        @foreach ($tahunlulus as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data->nilai_tl }}</td>
                                                <td>
                                                    @php
                                                        $lulusanq = $totallulus->where('tahun_tl', $data->nilai_tl);
                                                    @endphp
                                                    {{ $lulusanq[0]->total_tl ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $lulusanlacakq = $dataumum->where('tahun_lulus', $data->nilai_tl);

                                                    @endphp
                                                    {{ count($lulusanlacakq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $dibawahq = $dibawah->where('tahun_lulus', $data->nilai_tl);

                                                    @endphp
                                                    {{ count($dibawahq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $diantaraq = $diantara->where('tahun_lulus', $data->nilai_tl);
                                                    @endphp
                                                    {{ count($diantaraq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $diatasq = $diatas->where('tahun_lulus', $data->nilai_tl);
                                                    @endphp
                                                    {{ count($diatasq) ?? '-' }}
                                                </td>


                                            </tr>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        Tabel 8.d.2) Kesesuaian Bidang Kerja Lulusan
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="examplet" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Lulus</th>
                                        <th>Jumlah Lulusan</th>
                                        <th>Jumlah Lulusan yang Terlacak</th>
                                        <th>Rendah</th>
                                        <th>Sedang</th>
                                        <th>Tinggi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($tahunlulus as $data)
                                        <tr>
                                            <td>{{ $nod++ }}</td>
                                            <td>{{ $data->nilai_tl }}</td>
                                            <td>
                                                @php
                                                    $lulusanq = $totallulus->where('tahun_tl', $data->nilai_tl);
                                                @endphp
                                                {{ $lulusanq[0]->total_tl ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $lulusanlacakq = $dataumum->where('tahun_lulus', $data->nilai_tl);

                                                @endphp
                                                {{ count($lulusanlacakq) ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $rendahq = $rendah->where('tahun_lulus', $data->nilai_tl);

                                                @endphp
                                                {{ count($rendahq) ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $sedangq = $sedang->where('tahun_lulus', $data->nilai_tl);
                                                @endphp
                                                {{ count($sedangq) ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $tinggiq = $tinggi->where('tahun_lulus', $data->nilai_tl);
                                                @endphp
                                                {{ count($tinggiq) ?? '-' }}
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        Tabel 8.e.1) Tempat Kerja Lulusan
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="examplee" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Lulus</th>
                                        <th>Jumlah Lulusan</th>
                                        <th>Jumlah Lulusan yang Terlacak</th>
                                        <th>Lokal/Wilayah/ Berwirausaha tidak Berizin</th>
                                        <th>Nasional/ Berwirausaha Berizin</th>
                                        <th>Multinasiona/ Internasional</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($tahunlulus as $data)
                                        <tr>
                                            <td>{{ $not++ }}</td>
                                            <td>{{ $data->nilai_tl }}</td>
                                            <td>
                                                @php
                                                    $lulusanq = $totallulus->where('tahun_tl', $data->nilai_tl);
                                                @endphp
                                                {{ $lulusanq[0]->total_tl ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $lulusanlacakq = $dataumum->where('tahun_lulus', $data->nilai_tl);

                                                @endphp
                                                {{ count($lulusanlacakq) ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $ttklokalq = $ttklokal->where('tahun_lulus', $data->nilai_tl);

                                                @endphp
                                                {{ count($ttklokalq) ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $ttknasionalq = $ttknasional->where('tahun_lulus', $data->nilai_tl);
                                                @endphp
                                                {{ count($ttknasionalq) ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $ttkmultinasionalq = $ttkmultinasional->where('tahun_lulus', $data->nilai_tl);
                                                @endphp
                                                {{ count($ttkmultinasionalq) ?? '-' }}
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        Tabel 8.e.2) Kepuasan Pengguna Lulusan
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="examplee" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Kemampuan</th>
                                        <th>Sangat Baik</th>
                                        <th>Baik</th>
                                        <th>Cukup</th>
                                        <th>Kurang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Etika</th>
                                        <td>16</td>
                                        <td>4</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Keahlian Pada Bidang Ilmu (Kompetensi Utama)</th>
                                        <td>13</td>
                                        <td>7</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Kemampuan Berbahasa Asing</th>
                                        <td>2</td>
                                        <td>12</td>
                                        <td>6</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Penggunaan Teknologi Informasi</th>
                                        <td>12</td>
                                        <td>8</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Kemampuan Berkomunikasi</th>
                                        <td>12</td>
                                        <td>8</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Kerjasama</th>
                                        <td>17</td>
                                        <td>3</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Pengembangan Diri</th>
                                        <td>12</td>
                                        <td>8</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Jumlah</th>
                                        <td>84</td>
                                        <td>50</td>
                                        <td>6</td>
                                        <td>0</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            @elseif ($jakreditasi == 'lamsama')
                <div class="card">
                    <div class="card-header">
                        Akreditasi {{ $nilaijakreditasi }} Program Studi {{ $nama_prodi->nama_prodi }}
                    </div>

                </div>
                <div class="card">
                    <div class="card-header">
                        Tabel 9.d Waktu Tunggu Lulusan (Khusus Program Diploma Tiga / Sarjana Terapan)
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Lulus</th>
                                        <th>Jumlah Lulusan</th>
                                        <th>Jumlah Lulusan yang Terlacak</th>
                                        <th>WT < 3 Bulan </th>
                                        <th>3 < WT < 6 Bulan</th>
                                        <th>WT > 6 Bulan</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($jtp == 'diploma')
                                        @foreach ($tahunlulus as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data->nilai_tl }}</td>
                                                <td>
                                                    @php
                                                        $lulusanq = $totallulus->where('tahun_tl', $data->nilai_tl);
                                                    @endphp
                                                    {{ $lulusanq[0]->total_tl ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $lulusanlacakq = $dataumum->where('tahun_lulus', $data->nilai_tl);

                                                    @endphp
                                                    {{ count($lulusanlacakq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $dibawahq = $ddibawah->where('tahun_lulus', $data->nilai_tl);

                                                    @endphp
                                                    {{ count($dibawahq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $diantaraq = $ddiantara->where('tahun_lulus', $data->nilai_tl);
                                                    @endphp
                                                    {{ count($diantaraq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $diatasq = $ddiatas->where('tahun_lulus', $data->nilai_tl);
                                                    @endphp
                                                    {{ count($diatasq) ?? '-' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="card-header">
                        Tabel 9.d Waktu Tunggu Lulusan (Khusus Program Sarjana)
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="exampled" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Lulus</th>
                                        <th>Jumlah Lulusan</th>
                                        <th>Jumlah Lulusan yang Terlacak</th>
                                        <th>WT < 6 Bulan </th>
                                        <th>6 < WT < 18 Bulan</th>
                                        <th>WT > 18 Bulan</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($jtp == 'sarjana')
                                        @foreach ($tahunlulus as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data->nilai_tl }}</td>
                                                <td>
                                                    @php
                                                        $lulusanq = $totallulus->where('tahun_tl', $data->nilai_tl);
                                                    @endphp
                                                    {{ $lulusanq[0]->total_tl ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $lulusanlacakq = $dataumum->where('tahun_lulus', $data->nilai_tl);

                                                    @endphp
                                                    {{ count($lulusanlacakq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $dibawahq = $dibawah->where('tahun_lulus', $data->nilai_tl);

                                                    @endphp
                                                    {{ count($dibawahq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $diantaraq = $diantara->where('tahun_lulus', $data->nilai_tl);
                                                    @endphp
                                                    {{ count($diantaraq) ?? '-' }}
                                                </td>
                                                <td>
                                                    @php
                                                        $diatasq = $diatas->where('tahun_lulus', $data->nilai_tl);
                                                    @endphp
                                                    {{ count($diatasq) ?? '-' }}
                                                </td>


                                            </tr>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        Tabel 9.e.1 Tempat Kerja atau Studi lanjut lulusan
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="examplee" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Lulus</th>
                                        <th>Jumlah Lulusan</th>
                                        <th>Jumlah Lulusan yang Terlacak</th>
                                        <th>Lokal/Wilayah/ Berwirausaha tidak Berizin</th>
                                        <th>Nasional/ Berwirausaha Berizin</th>
                                        <th>Multinasiona/ Internasional</th>
                                        <th>Melanjutkan Studi</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($tahunlulus as $data)
                                        <tr>
                                            <td>{{ $not++ }}</td>
                                            <td>{{ $data->nilai_tl }}</td>
                                            <td>
                                                @php
                                                    $lulusanq = $totallulus->where('tahun_tl', $data->nilai_tl);
                                                @endphp
                                                {{ $lulusanq[0]->total_tl ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $lulusanlacakq = $dataumum->where('tahun_lulus', $data->nilai_tl);

                                                @endphp
                                                {{ count($lulusanlacakq) ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $ttklokalq = $ttklokal->where('tahun_lulus', $data->nilai_tl);

                                                @endphp
                                                {{ count($ttklokalq) ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $ttknasionalq = $ttknasional->where('tahun_lulus', $data->nilai_tl);
                                                @endphp
                                                {{ count($ttknasionalq) ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $ttkmultinasionalq = $ttkmultinasional->where('tahun_lulus', $data->nilai_tl);
                                                @endphp
                                                {{ count($ttkmultinasionalq) ?? '-' }}
                                            </td>
                                            <td>
                                                @php
                                                    $lanjutstudiq = $lanjutstudi->where('tahun_lulus', $data->nilai_tl);
                                                @endphp
                                                {{ count($lanjutstudiq) ?? '-' }}
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        Tabel 9.e.3 Kepuasan Pengguna Lulusan
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="examplee" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Kemampuan</th>
                                        <th>Sangat Baik</th>
                                        <th>Baik</th>
                                        <th>Cukup</th>
                                        <th>Kurang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Etika</th>
                                        <td>16</td>
                                        <td>4</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Keahlian Pada Bidang Ilmu (Kompetensi Utama)</th>
                                        <td>13</td>
                                        <td>7</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Kemampuan Berbahasa Asing</th>
                                        <td>2</td>
                                        <td>12</td>
                                        <td>6</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Penggunaan Teknologi Informasi</th>
                                        <td>12</td>
                                        <td>8</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Kemampuan Berkomunikasi</th>
                                        <td>12</td>
                                        <td>8</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Kerjasama</th>
                                        <td>17</td>
                                        <td>3</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Pengembangan Diri</th>
                                        <td>12</td>
                                        <td>8</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Jumlah</th>
                                        <td>84</td>
                                        <td>50</td>
                                        <td>6</td>
                                        <td>0</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            @endif




        </div>
        <!--end page wrapper -->
    @endsection

    @push('prepend-script')
        <!-- Vendor js -->
        <script src="vertical/assets/js/jquery.min.js"></script>
    @endpush

    @push('addon-script')
        <script>
            $(document).ready(function() {
                // tabel = $("#example").DataTable({
                //     columnDefs: [{
                //             targets: 0,
                //             width: "10%",
                //         }, {
                //             targets: 1,
                //             width: "20%",
                //         },
                //         {
                //             targets: 2,
                //             width: "30%",

                //         },

                //     ],
                //     processing: true,
                //     serverSide: false,
                //     ajax: {
                //         url: "{{ url('admin/report_status/hasilget') }}",
                //     },
                //     columns: [{
                //             nama: 'id',
                //             data: 'id'
                //         }, {
                //             nama: 'nama_prodi',
                //             data: 'nama_prodi'
                //         },
                //         {
                //             nama: 'id',
                //             data: 'id'
                //         },
                //     ],

                // });
                $("#example").DataTable({
                    "pageLength": 88
                });
                $("#exampled").DataTable({
                    "pageLength": 88
                });
                $("#examplet").DataTable({
                    "pageLength": 88
                });
                $("#examplee").DataTable({
                    "pageLength": 88
                });
            });
        </script>
    @endpush
