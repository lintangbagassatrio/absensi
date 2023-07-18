<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/kelolasiswa', [App\Http\Controllers\kelolasiswaController::class, 'kelolasiswa'])->name('kelola');
Route::post('admin/tambah/siswa', [App\Http\Controllers\kelolasiswaController::class, 'tambah'])->name('tambahsiswa');
Route::get('admin/kelolasiswa/delete/{id}', [App\Http\Controllers\kelolasiswaController::class, 'hapus'])->name('hapussiswa');
Route::get('admin/kelolasiswa/ajax/{id}', [App\Http\Controllers\kelolasiswaController::class, 'getDatasiswa']);
Route::get('admin/kelolasiswa/update', [App\Http\Controllers\kelolasiswaController::class, 'edit'])->name('kelolasiswa.update');

Route::get('admin/kelolapenjadwalan', [App\Http\Controllers\kelolapenjadwalanController::class, 'kelolapenjadwalan'])->name('jadwal');
Route::post('admin/tambah/jadwal', [App\Http\Controllers\kelolapenjadwalanController::class, 'tambah'])->name('tambahpenjadwalan');
Route::get('admin/kelolapenjadwalan/update', [App\Http\Controllers\kelolapenjadwalanController::class, 'edit'])->name('kelolapenjadwalan.update');
Route::get('admin/kelolapenjadwalan/delete/{id}', [App\Http\Controllers\kelolapenjadwalanController::class, 'hapus'])->name('hapuspenjadwalan');
Route::get('admin/kelolapenjadwalan/ajax/{id}', [App\Http\Controllers\kelolapenjadwalanController::class, 'getDatapenjadwalan']);

Route::get('admin/kelolaguru', [App\Http\Controllers\kelolaguruController::class, 'kelolaguru'])->name('guru');
Route::post('admin/tambah/guru', [App\Http\Controllers\kelolaguruController::class, 'tambah'])->name('tambahguru');
Route::get('admin/kelolaguru/update', [App\Http\Controllers\kelolaguruController::class, 'edit'])->name('kelolaguru.update');
Route::get('admin/kelolaguru/delete/{id}', [App\Http\Controllers\kelolaguruController::class, 'hapus'])->name('hapusguru');
Route::get('admin/kelolaguru/ajax/{id}', [App\Http\Controllers\kelolaguruController::class, 'getDataguru']);

Route::get('admin/kelolakelas', [App\Http\Controllers\kelolakelasController::class, 'kelolakelas'])->name('kelas');
Route::post('admin/tambah/kelas', [App\Http\Controllers\kelolakelasController::class, 'tambah'])->name('tambahkelas');
Route::get('admin/kelolakelas/update', [App\Http\Controllers\kelolakelasController::class, 'edit'])->name('kelolakelas.update');
Route::get('admin/kelolakelas/delete/{id}', [App\Http\Controllers\kelolakelasController::class, 'hapus'])->name('hapuskelas');
Route::get('admin/kelolakelas/ajax/{id}', [App\Http\Controllers\kelolaguruController::class, 'getDatakelas']);

Route::get('admin/kelolapelajaran', [App\Http\Controllers\kelolapelajaranController::class, 'kelolapelajaran'])->name('pelajaran');
Route::post('admin/tambah/pelajaran', [App\Http\Controllers\kelolapelajaranController::class, 'tambah'])->name('tambahpelajaran');
Route::get('admin/kelolapelajaran/update', [App\Http\Controllers\kelolapelajaranController::class, 'edit'])->name('kelolapelajaran.update');
Route::get('admin/kelolapelajaran/delete/{id}', [App\Http\Controllers\kelolapelajaranController::class, 'hapus'])->name('hapuspelajaran');
Route::get('admin/kelolapelajaran/ajax/{id}', [App\Http\Controllers\kelolapelajaranController::class, 'getDatapelajaran']);

Route::get('admin/kelolajurusan', [App\Http\Controllers\kelolajurusanController::class, 'kelolajurusan'])->name('jurusan');
Route::post('admin/tambah/jurusan', [App\Http\Controllers\kelolajurusanController::class, 'tambah'])->name('tambahjurusan');
Route::get('admin/kelolajurusan/update', [App\Http\Controllers\kelolajurusanController::class, 'edit'])->name('kelolajurusan.update');
Route::get('admin/kelolajurusan/delete/{id}', [App\Http\Controllers\kelolajurusanController::class, 'hapus'])->name('hapusjurusan');
Route::get('admin/kelolajurusan/ajax/{id}', [App\Http\Controllers\kelolajurusanController::class, 'getDataJurusan']);


