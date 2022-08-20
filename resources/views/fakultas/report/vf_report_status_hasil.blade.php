@extends('layouts.vl_fakultas')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card">
                <div class="card-header"> N = {{ $nialin }}</div>
            </div>
            @if ($jreport == 'status')
                <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} Universitas
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                {!! $chart->container() !!}

                                <script src="{{ $chart->cdn() }}"></script>

                                {{ $chart->script() }}
                            </div>
                            <div class="col-6">
                                {!! $chartdua->container() !!}

                                <script src="{{ $chartdua->cdn() }}"></script>

                                {{ $chartdua->script() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} Program Studi
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Fakultas</th>
                                        <th>Nama Prodi</th>
                                        <th>Bekerja</th>
                                        <th>Wiraswasta</th>
                                        <th>Melanjutkan Pendidikan</th>
                                        <th>Tidak Kerja tetapi sedang mencari kerja</th>
                                        <th>Belum Bekerja</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($dataprodi as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nama_fak }}</td>
                                            <td>{{ $data->nama_prodi }}</td>
                                            <td>{{ count($bekerja->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ count($wiraswasta->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ count($lanjut->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ count($tdkkerja->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ count($blmkerja->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ count($bekerja->where('kdpstmsmh', $data->kode_prodi)) + count($wiraswasta->where('kdpstmsmh', $data->kode_prodi)) + count($lanjut->where('kdpstmsmh', $data->kode_prodi)) + count($tdkkerja->where('kdpstmsmh', $data->kode_prodi)) + count($blmkerja->where('kdpstmsmh', $data->kode_prodi)) }}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            @elseif ($jreport == 'masatunggu' && $kelompok == 'univ')
                <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} Universitas
                    </div>
                    <div class="card-body">

                        {!! $chartdua->container() !!}

                        <script src="{{ $chartdua->cdn() }}"></script>

                        {{ $chartdua->script() }}

                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} Universitas
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Universitas</th>
                                        <th>Nama Universitas</th>
                                        <th>Mendapatkan pekerjaan <= 6 bulan</th>
                                        <th>Mendapatkan pekerjaan > 6 bulan</th>
                                        <th>Median</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datauniv as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->kd_univ }}</td>
                                            <td>{{ $data->nm_univ }}</td>
                                            <td>{{ count($bawah) }}</td>
                                            <td>{{ count($atas) }}</td>
                                            <td>{{ $scoresMedian }}</td>
                                            <td>{{ count($bawah) + count($atas) }}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            @elseif ($jreport == 'masatunggu' && $kelompok == 'fakultas')
                <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} Fakultas
                    </div>
                    <div class="card-body">

                        {!! $chartdua->container() !!}

                        <script src="{{ $chartdua->cdn() }}"></script>

                        {{ $chartdua->script() }}

                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} Fakultas
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Fakultas</th>
                                        <th>Nama Fakultas</th>
                                        <th>Mendapatkan pekerjaan <= 6 bulan</th>
                                        <th>Mendapatkan pekerjaan > 6 bulan</th>
                                        <th>Median</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datafakultas as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->kd_fak }}</td>
                                            <td>{{ $data->nama_fak }}</td>
                                            <td>{{ count($bawah->where('kd_fak', $data->kd_fak)) }}</td>
                                            <td>{{ count($atas->where('kd_fak', $data->kd_fak)) }}</td>
                                            <td>{{ $medianfak[$noa++] }}</td>
                                            <td>{{ count($bawah->where('kd_fak', $data->kd_fak)) + count($atas->where('kd_fak', $data->kd_fak)) }}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            @elseif ($jreport == 'masatunggu' && $kelompok == 'prodi')
                {{-- <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} Universitas
                    </div>
                    <div class="card-body">

                        {!! $chartdua->container() !!}

                        <script src="{{ $chartdua->cdn() }}"></script>

                        {{ $chartdua->script() }}

                    </div>
                </div> --}}
                <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} Program Studi
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Fakultas</th>
                                        <th>Nama Prodi</th>
                                        <th>Bawah</th>
                                        <th>Atas</th>
                                        <th>Median</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataprodi as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nama_fak }}</td>
                                            <td>{{ $data->nama_prodi }}</td>
                                            <td>{{ count($bawah->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ count($atas->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td> 1</td>
                                            <td>{{ count($bawah->where('kdpstmsmh', $data->kode_prodi)) + count($atas->where('kdpstmsmh', $data->kode_prodi)) }}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            @elseif ($jreport == 'jtb' && $kelompok == 'univ')
                <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} Universitas
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                {!! $chart->container() !!}

                                <script src="{{ $chart->cdn() }}"></script>

                                {{ $chart->script() }}
                            </div>
                            {{-- <div class="col-6">
                                {!! $chartdua->container() !!}

                                <script src="{{ $chartdua->cdn() }}"></script>

                                {{ $chartdua->script() }}
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} Universitas
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Universitas</th>
                                        <th>Instansi pemerintah</th>
                                        <th>BUMN/BUMD</th>
                                        <th>Institusi/Organisasi Multilateral</th>
                                        <th>Organisasi non-profit/LSM</th>
                                        <th>Perusahaan swasta</th>
                                        <th>Wiraswasta</th>
                                        <th>Lainnya</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datauniv as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nm_univ }}</td>
                                            <td>{{ $nialidatac1 }}</td>
                                            <td>{{ $nilaidatac2 }}</td>
                                            <td>{{ $nialidatac3 }}</td>
                                            <td>{{ $nialidatac4 }}</td>
                                            <td>{{ $nialidatac5 }}</td>
                                            <td>{{ $nialidatac6 }}</td>
                                            <td>{{ $nialidatac7 }}</td>
                                            <td>{{ $nialin }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            @elseif ($jreport == 'jtb' && $kelompok == 'fakultas')
                <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} Fakultas
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Fakultas</th>
                                        <th>Instansi pemerintah</th>
                                        <th>BUMN/BUMD</th>
                                        <th>Institusi/Organisasi Multilateral</th>
                                        <th>Organisasi non-profit/LSM</th>
                                        <th>Perusahaan swasta</th>
                                        <th>Wiraswasta</th>
                                        <th>Lainnya</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datafakultas as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nama_fak }}</td>
                                            <td>{{ count($datac1->where('kd_fak', $data->kd_fak)) }}</td>
                                            <td>{{ count($datac2->where('kd_fak', $data->kd_fak)) }}</td>
                                            <td>{{ count($datac3->where('kd_fak', $data->kd_fak)) }}</td>
                                            <td>{{ count($datac4->where('kd_fak', $data->kd_fak)) }}</td>
                                            <td>{{ count($datac5->where('kd_fak', $data->kd_fak)) }}</td>
                                            <td>{{ count($datac6->where('kd_fak', $data->kd_fak)) }}</td>
                                            <td>{{ count($datac7->where('kd_fak', $data->kd_fak)) }}</td>
                                            <td>{{ count($datac1->where('kd_fak', $data->kd_fak)) + count($datac2->where('kd_fak', $data->kd_fak)) + count($datac3->where('kd_fak', $data->kd_fak)) + count($datac4->where('kd_fak', $data->kd_fak)) + count($datac5->where('kd_fak', $data->kd_fak)) + count($datac6->where('kd_fak', $data->kd_fak)) + count($datac7->where('kd_fak', $data->kd_fak)) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @elseif ($jreport == 'jtb' && $kelompok == 'prodi')
                <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} Program Studi
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Prodi</th>
                                        <th>Instansi pemerintah</th>
                                        <th>BUMN/
                                            BUMD</th>
                                        <th>Institusi/Organisasi Multilateral</th>
                                        <th>Organisasi non-profit/LSM</th>
                                        <th>Perusahaan Swasta</th>
                                        <th>Wiraswasta</th>
                                        <th>Lainnya</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataprodi as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nama_prodi }}</td>
                                            <td>{{ count($datac1->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ count($datac2->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ count($datac3->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ count($datac4->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ count($datac5->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ count($datac6->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ count($datac7->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ count($datac1->where('kdpstmsmh', $data->kode_prodi)) + count($datac2->where('kdpstmsmh', $data->kode_prodi)) + count($datac3->where('kdpstmsmh', $data->kode_prodi)) + count($datac4->where('kdpstmsmh', $data->kode_prodi)) + count($datac5->where('kdpstmsmh', $data->kode_prodi)) + count($datac6->where('kdpstmsmh', $data->kode_prodi)) + count($datac7->where('kdpstmsmh', $data->kode_prodi)) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @elseif($jreport == 'ttb')
                <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} Universitas
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                {!! $chart->container() !!}

                                <script src="{{ $chart->cdn() }}"></script>

                                {{ $chart->script() }}
                            </div>
                            <div class="col-6">
                                {!! $chartdua->container() !!}

                                <script src="{{ $chartdua->cdn() }}"></script>

                                {{ $chartdua->script() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} Program Studi
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Fakultas</th>
                                        <th>Nama Prodi</th>
                                        <th>Lokal/Wilayah/Wiraswasta tidak berbadan Hukum</th>
                                        <th>Nasional/Wiraswasta Berbadan Hukum</th>
                                        <th>Multinasional/Internasional</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($dataprodi as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nama_fak }}</td>
                                            <td>{{ $data->nama_prodi }}</td>
                                            <td>{{ count($datac1->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ count($datac2->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ count($datac3->where('kdpstmsmh', $data->kode_prodi)) }}</td>

                                            <td>{{ count($datac1->where('kdpstmsmh', $data->kode_prodi)) + count($datac2->where('kdpstmsmh', $data->kode_prodi)) + count($datac3->where('kdpstmsmh', $data->kode_prodi)) }}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            @elseif($jreport == 'penghasilan')
                <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} Program Studi
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Fakultas</th>
                                        <th>Nama Prodi</th>
                                        <th>
                                            <= 1JT</th>
                                        <th>
                                            <= 3 JT</th>
                                        <th>
                                            <= 5 JT</th>
                                        <th>> 5 JT</th>
                                        <th> N/A</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($dataprodi as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nama_fak }}</td>
                                            <td>{{ $data->nama_prodi }}</td>
                                            <td>{{ count($datac1->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ count($datac2->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ count($datac3->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ count($datac4->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ count($datac5->where('kdpstmsmh', $data->kode_prodi)) }}</td>

                                            <td>{{ count($datac1->where('kdpstmsmh', $data->kode_prodi)) + count($datac2->where('kdpstmsmh', $data->kode_prodi)) + count($datac3->where('kdpstmsmh', $data->kode_prodi)) + count($datac4->where('kdpstmsmh', $data->kode_prodi)) + count($datac5->where('kdpstmsmh', $data->kode_prodi)) }}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            @elseif($jreport == 'sdk')
                <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} Universitas
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                {!! $chart->container() !!}

                                <script src="{{ $chart->cdn() }}"></script>

                                {{ $chart->script() }}
                            </div>
                            <div class="col-6">
                                {!! $chartdua->container() !!}

                                <script src="{{ $chartdua->cdn() }}"></script>

                                {{ $chartdua->script() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} Program Studi
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="example" class="table table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama
                                            Fakultas</th>
                                        <th>Nama
                                            Prodi</th>
                                        <th>Biaya Sendiri</th>
                                        <th>Beasiswa
                                            ADIK</th>
                                        <th>Beasiswa
                                            BIDIKMISI</th>
                                        <th>Beasiswa
                                            PPA</th>
                                        <th>Beasiswa
                                            AFIRMASI</th>
                                        <th>Perusahaan/
                                            Swasta</th>
                                        <th>Lainnya</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($dataprodi as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nama_fak }}</td>
                                            <td>{{ $data->nama_prodi }}</td>
                                            <td>{{ count($datac1->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ count($datac2->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ count($datac3->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ count($datac4->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ count($datac5->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ count($datac6->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ count($datac7->where('kdpstmsmh', $data->kode_prodi)) }}</td>

                                            <td>{{ count($datac1->where('kdpstmsmh', $data->kode_prodi)) +
                                                count($datac2->where('kdpstmsmh', $data->kode_prodi)) +
                                                count($datac3->where('kdpstmsmh', $data->kode_prodi)) +
                                                count($datac4->where('kdpstmsmh', $data->kode_prodi)) +
                                                count($datac5->where('kdpstmsmh', $data->kode_prodi)) +
                                                count($datac6->where('kdpstmsmh', $data->kode_prodi)) +
                                                count($datac7->where('kdpstmsmh', $data->kode_prodi)) }}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            @elseif($jreport == 'vertikal')
                <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} Universitas
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                {!! $chart->container() !!}

                                <script src="{{ $chart->cdn() }}"></script>

                                {{ $chart->script() }}
                            </div>
                            <div class="col-6">
                                {!! $chartdua->container() !!}

                                <script src="{{ $chartdua->cdn() }}"></script>

                                {{ $chartdua->script() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} Program Studi
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="example" class="table table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Fakultas</th>
                                        <th>Nama Prodi</th>
                                        <th>Tinggi</th>
                                        <th>Sama</th>
                                        <th>Rendah</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($dataprodi as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nama_fak }}</td>
                                            <td>{{ $data->nama_prodi }}</td>
                                            <td>{{ count($datac1->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ count($datac2->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ count($datac3->where('kdpstmsmh', $data->kode_prodi)) }}</td>

                                            <td>{{ count($datac1->where('kdpstmsmh', $data->kode_prodi)) +
                                                count($datac2->where('kdpstmsmh', $data->kode_prodi)) +
                                                count($datac3->where('kdpstmsmh', $data->kode_prodi)) }}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            @elseif($jreport == 'horizontal')
                <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} Universitas
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                {!! $chart->container() !!}

                                <script src="{{ $chart->cdn() }}"></script>

                                {{ $chart->script() }}
                            </div>
                            <div class="col-6">
                                {!! $chartdua->container() !!}

                                <script src="{{ $chartdua->cdn() }}"></script>

                                {{ $chartdua->script() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} Program Studi
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="example" class="table table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Fakultas</th>
                                        <th>Nama Prodi</th>
                                        <th>Tinggi</th>
                                        <th>Sedang</th>
                                        <th>Rendah</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($dataprodi as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nama_fak }}</td>
                                            <td>{{ $data->nama_prodi }}</td>
                                            <td>{{ count($datac1->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ count($datac2->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ count($datac3->where('kdpstmsmh', $data->kode_prodi)) }}</td>

                                            <td>{{ count($datac1->where('kdpstmsmh', $data->kode_prodi)) +
                                                count($datac2->where('kdpstmsmh', $data->kode_prodi)) +
                                                count($datac3->where('kdpstmsmh', $data->kode_prodi)) }}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            @elseif ($jreport == 'ikusatu' && $kelompok == 'univ')
                <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} Universitas
                    </div>
                    <div class="card-body">

                        {!! $chartdua->container() !!}

                        <script src="{{ $chartdua->cdn() }}"></script>

                        {{ $chartdua->script() }}

                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} Universitas
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Universitas</th>
                                        <th>Nama Universitas</th>
                                        <th>Bekerja IKU 1</th>
                                        <th>Wiraswasta IKU 1</th>
                                        <th>Lanjut Studi IKU 1</th>
                                        <th>Presentase</th>
                                        <th>Delta</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datauniv as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->kd_univ }}</td>
                                            <td>{{ $data->nm_univ }}</td>
                                            <td>{{ $nilaidatac1 }}</td>
                                            <td>{{ $nilaidatac2 }}</td>
                                            <td>{{ $nilaidatac3 }}</td>
                                            <td>{{ $presentasetotal }}%</td>
                                            <td>{{ 80 - $presentasetotal }}</td>
                                            <td>{{ $nialin }}</td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            @elseif ($jreport == 'ikusatu' && $kelompok == 'fakultas')
                <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} Fakultas
                    </div>
                    <div class="card-body">

                        {!! $chartdua->container() !!}

                        <script src="{{ $chartdua->cdn() }}"></script>

                        {{ $chartdua->script() }}

                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} Fakultas
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Fakultas</th>
                                        <th>Nama Fakultas</th>
                                        <th>Mendapatkan pekerjaan <= 6 bulan</th>
                                        <th>Mendapatkan pekerjaan > 6 bulan</th>
                                        <th>Median</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datafakultas as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->kd_fak }}</td>
                                            <td>{{ $data->nama_fak }}</td>
                                            <td>{{ count($bawah->where('kd_fak', $data->kd_fak)) }}</td>
                                            <td>{{ count($atas->where('kd_fak', $data->kd_fak)) }}</td>
                                            <td>{{ $medianfak[$noa++] }}</td>
                                            <td>{{ count($bawah->where('kd_fak', $data->kd_fak)) + count($atas->where('kd_fak', $data->kd_fak)) }}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            @elseif ($jreport == 'ikusatu' && $kelompok == 'prodi')

            @elseif($jreport == 'kompetensi')
                <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} Universitas
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                {!! $chart->container() !!}

                                <script src="{{ $chart->cdn() }}"></script>

                                {{ $chart->script() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} Pada saat lulus (A)
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="example" class="table table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama
                                            Universitas</th>
                                        <th>Etika</th>
                                        <th>Keahlian berdasarkan bidang ilmu</th>
                                        <th>Bahasa Inggris</th>
                                        <th>Penggunaan Teknologi Informasi</th>
                                        <th>Komunikasi</th>
                                        <th>Kerja sama tim</th>
                                        <th>Pengembangan Diri</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>Universitas Negeri Makassar</td>
                                        <td>{{ $scoresMedian1 }}</td>
                                        <td>{{ $scoresMedian2 }}</td>
                                        <td>{{ $scoresMedian3 }}</td>
                                        <td>{{ $scoresMedian4 }}</td>
                                        <td>{{ $scoresMedian5 }}</td>
                                        <td>{{ $scoresMedian6 }}</td>
                                        <td>{{ $scoresMedian7 }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} dalam Dunia Kerja (B)
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="exampled" class="table table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama
                                            Universitas</th>
                                        <th>Etika</th>
                                        <th>Keahlian berdasarkan bidang ilmu</th>
                                        <th>Bahasa Inggris</th>
                                        <th>Penggunaan Teknologi Informasi</th>
                                        <th>Komunikasi</th>
                                        <th>Kerja sama tim</th>
                                        <th>Pengembangan Diri</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Universitas Negeri Makassar</td>
                                        <td>{{ $scoresMedian8 }}</td>
                                        <td>{{ $scoresMedian9 }}</td>
                                        <td>{{ $scoresMedian10 }}</td>
                                        <td>{{ $scoresMedian11 }}</td>
                                        <td>{{ $scoresMedian12 }}</td>
                                        <td>{{ $scoresMedian13 }}</td>
                                        <td>{{ $scoresMedian14 }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            @elseif ($jreport == 'jumlah_responden')
                <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} Universitas
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                {!! $chart->container() !!}

                                <script src="{{ $chart->cdn() }}"></script>

                                {{ $chart->script() }}
                            </div>
                            <div class="col-6">
                                {!! $chartdua->container() !!}

                                <script src="{{ $chartdua->cdn() }}"></script>

                                {{ $chartdua->script() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Report {{ $nilaijreport }} Program Studi
                    </div>
                    <div class="cartd-body">
                        <div class="table p-3">
                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Fakultas</th>
                                        <th>Nama Prodi</th>
                                        <th>Jumlah Mengisi</th>
                                        <th>Jumlah Lulusan</th>
                                        <th>Presentase Lulusan</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($dataprodi as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nama_fak }}</td>
                                            <td>{{ $data->nama_prodi }}</td>
                                            <td>{{ count($dataumum->where('kdpstmsmh', $data->kode_prodi)) }}</td>
                                            <td>{{ $datalulusanmaster->where('kode_prodi', $data->kode_prodi)->first()->total_tl ?? 0 }}
                                            </td>
                                            <td>
                                                @php
                                                    $isi = count($dataumum->where('kdpstmsmh', $data->kode_prodi));
                                                    $jmlls = $datalulusanmaster->where('kode_prodi', $data->kode_prodi)->first()->total_tl ?? 'none';
                                                @endphp
                                                @if ($jmlls == 'none')
                                                    {{ 'none' }}
                                                @else
                                                    {{ round(($isi * 100) / $jmlls, 2) }}
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach

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
            });
        </script>
    @endpush
