<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CAkreditasi;
use App\Http\Controllers\CJabatan;
use App\Http\Controllers\CJenis_tk;
use App\Http\Controllers\CKota;
use App\Http\Controllers\CStatus;
use App\Http\Controllers\CTahun_lulus;
use App\Http\Controllers\CUser;
use App\Http\Controllers\CProdi;
use App\Http\Controllers\CProvinsi;
use App\Http\Controllers\CSumber_biaya;
use App\Http\Controllers\CSumber_dana;
use App\Http\Controllers\CTingkat_tk;
use App\Http\Controllers\CHubungan;
use App\Http\Controllers\CKepuasan;
use App\Http\Controllers\CKuesioner;
use App\Http\Controllers\CMahasiswa;
use App\Http\Controllers\CRekap;
use App\Http\Controllers\CReport;
use App\Http\Controllers\fakultas\CFReport;
use App\Http\Controllers\CTingkat_pendidikan;
use App\Http\Controllers\CTotal_lulus;
use App\Http\Controllers\CUniv;
use App\Http\Controllers\CUpload;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\SurveiController;
use App\Models\SurveiPengguna;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/survei-pengguna-lulusan', [HomeController::class, 'kuesioner']);
Route::get('/survei2', [HomeController::class, 'survei']);

Route::get('/users/export/', [CUser::class, 'export']);
Route::get('/kuesioner/export/', [CRekap::class, 'export']);
Route::get('/kepuasan/export/', [CKepuasan::class, 'export']);
Route::post('/upload-content', [CUpload::class, 'uploadContent'])->name('import.content');
// Route::get('/survei', [HomeController::class, 'survei']);
Route::resource('survei', SurveiController::class);

Route::group(
    ['middleware' => ['auth']],
    function () {

        Route::group(
            ['middleware' => ['userRole:1']],
            function () {
                Route::get('admin/dashboard', function () {
                    return view('admin/va_home');
                });
                Route::resource('admin/user', CUser::class);
                Route::resource('admin/status', CStatus::class);
                Route::post('admin/status/update', [CStatus::class, 'update']);
                Route::post('admin/user/update', [CUser::class, 'update']);
                Route::resource('admin/tahun_lulus', CTahun_lulus::class);
                Route::resource('admin/total_lulus', CTotal_lulus::class);
                Route::post('admin/tahun_lulus/update', [CTahun_lulus::class, 'update']);
                Route::resource('admin/prodi', CProdi::class);
                Route::resource('admin/kota', CKota::class);
                Route::resource('admin/provinsi', CProvinsi::class);
                Route::resource('admin/jenis_tempat_kerja', CJenis_tk::class);
                Route::resource('admin/tingkat_tempat_kerja', CTingkat_tk::class);
                Route::resource('admin/jabatan', CJabatan::class);
                Route::resource('admin/sumber_biaya', CSumber_biaya::class);
                Route::resource('admin/sumber_dana', CSumber_dana::class);
                Route::resource('admin/hubungan', CHubungan::class);
                Route::resource('admin/tingkat_pendidikan', CTingkat_pendidikan::class);
                Route::resource('admin/rekap', CRekap::class);
                Route::resource('admin/kepuasan', CKepuasan::class);
                Route::resource('admin/univ', CUniv::class);

                Route::get('admin/report_status', [CReport::class, 'index']);
                Route::post('admin/report_status/hasil', [CReport::class, 'hasilstatus'])->name('hasilstatus');
                Route::get('admin/report_status/hasilget', [CReport::class, 'hasilstatus'])->name('hasilstatusget');

                Route::get('admin/report_masatunggu', [CReport::class, 'masatunggu']);
                Route::get('admin/report_pendapatan', [CReport::class, 'pendapatan']);
                Route::get('admin/report_jtb', [CReport::class, 'jtb']);
                Route::get('admin/report_ttb', [CReport::class, 'ttb']);
                Route::get('admin/report_sdk', [CReport::class, 'sdk']);
                Route::get('admin/report_vertikal', [CReport::class, 'vertikal']);
                Route::get('admin/report_horizontal', [CReport::class, 'horizontal']);
                Route::get('admin/report_ikusatu', [CReport::class, 'ikusatu']);
                Route::get('admin/report_kompetensi', [CReport::class, 'kompetensi']);
                Route::get('admin/report_jumlah_responden', [CReport::class, 'jumlah_responden']);

                Route::get('admin/report_penghasilan', [CReport::class, 'penghasilan']);

                Route::get('admin/akreditasi_emba', [CAkreditasi::class, 'index']);
                Route::post('admin/akreditasi_emba/hasil', [CAkreditasi::class, 'hasilemba'])->name('hasilemba');

                Route::get('admin/akreditasi_banpt', [CAkreditasi::class, 'banpt']);
                Route::get('admin/akreditasi_lamdik', [CAkreditasi::class, 'lamdik']);
                Route::get('admin/akreditasi_laminfokom', [CAkreditasi::class, 'laminfokom']);
                Route::get('admin/akreditasi_lamteknik', [CAkreditasi::class, 'lamteknik']);
                Route::get('admin/akreditasi_lamsama', [CAkreditasi::class, 'lamsama']);

                Route::get('admin/report-survei-pengguna', [SurveiController::class, 'report']);
                Route::post('admin/report_survei/hasil', [SurveiController::class, 'HasilReport']);


                // Route::resource('admin/kuesioner', CKuesioner::class);
            }
        );

        Route::group(
            ['middleware' => ['userRole:3']],
            function () {
                Route::get('fakultas/fdashboard', function () {
                    return view('fakultas/vf_home');
                });

                Route::get('fakultas/freport_status', [CFReport::class, 'index']);
                Route::post('fakultas/freport_status/fhasil', [CFReport::class, 'hasilstatus'])->name('fhasilstatus');
                Route::get('fakultas/freport_status/fhasilget', [CFReport::class, 'hasilstatus'])->name('fhasilstatusget');

                Route::get('fakultas/freport_masatunggu', [CFReport::class, 'masatunggu']);
                Route::get('fakultas/freport_pendapatan', [CFReport::class, 'pendapatan']);
                Route::get('fakultas/freport_jtb', [CFReport::class, 'jtb']);
                Route::get('fakultas/freport_ttb', [CFReport::class, 'ttb']);
                Route::get('fakultas/freport_sdk', [CFReport::class, 'sdk']);
                Route::get('fakultas/freport_vertikal', [CFReport::class, 'vertikal']);
                Route::get('fakultas/freport_horizontal', [CFReport::class, 'horizontal']);
                Route::get('fakultas/freport_ikusatu', [CFReport::class, 'ikusatu']);
                Route::get('fakultas/freport_kompetensi', [CFReport::class, 'kompetensi']);
                Route::get('fakultas/freport_jumlah_responden', [CFReport::class, 'jumlah_responden']);

                Route::get('fakultas/freport_penghasilan', [CFReport::class, 'penghasilan']);
            }
        );

        // Route::get('user/get_data', [CUser::class, 'index'])->name('user.get_data');
        Route::resource('ajax-request', AjaxController::class);
        // Route::get('mahasiswa', function () {
        //     return view('mahasiswa/vm_home');
        // });
        Route::resource('mahasiswa/dashboard', CMahasiswa::class);

        Route::resource('mahasiswa/kuesioner', CKuesioner::class);
        Route::post('mahasiswa/kuesionerp', [CKuesioner::class, 'kuesionerp']);

        // Route::post('ajax-request', AjaxController::class);
    }
);


require __DIR__ . '/auth.php';
