@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">KELOLA DATA GURU</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="card card-defauld">
            <div class="card-bady">
                <div class="navbar-menu-wrappr d-blok align-item-center justify-content-between mb-3">
                    <p class="mb-0"></p>
                    <div class="ml-3 mt-3">
                       
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Tambah 
                        </button>
                    </div>
                </div>
                <table id="table-data" class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>NO</th>
                            <th>Nama Guru</th>
                            <th>Tempat Tanggal Lahir</th>
                            <th>NIP</th>
                            <th>NUPTK</th>
                            <th>Nomor NRG</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Pendidikan Terakhir</th>
                            <th>Jabatan</th>
                            <th>Mata Pelajaran</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $no=1; @endphp
                    @foreach($guru as $gurus)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$gurus->nama_guru}}</td>
                        <td>{{$gurus->ttl}}</td>
                        <td>{{$gurus->nip}}</td>
                        <td>{{$gurus->nuptk}}</td>
                        <td>{{$gurus->nomor_nrg}}</td>
                        <td>{{$gurus->jenis_kelamin}}</td>
                        <td>{{$gurus->agama}}</td>
                        <td>{{$gurus->pendidikan_terakhir}}</td>
                        <td>{{$gurus->jabatan}}</td>
                        <td>{{$gurus->mata_pelajaran}}</td>
                        <td>
                            <div class="text-center">
                                <button type="button"  id="btn-edit-gurus" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editgurusModal" data-id="{{ $gurus->id }}">EDIT</button>
                         
                                <a class="btn btn-sm btn-danger btn-rounded" href="/admin/kelolaguru/delete/{{$gurus->id}}">HAPUS</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div> 
     </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">TAMBAH DATA GURU</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <form class="forms-sample" method="post" action="{{ route('tambahguru')}}" enctype="multipart/form-data">
       @csrf
        <div class="form-group">
            <label for="nama_guru">NAMA GURU</label>
            <input type="text" class="form-control"name="nama_guru" id="nama_guru" required/>
        </div>
        <div class="form-group">
            <label for="ttl">TEMPAT TANGGAL LAHIR</label>
            <input type="date" class="form-control"name="ttl" id="ttl" required/>
        </div>
        <div class="form-group">
            <label for="nip">NIP</label>
            <input type="text" class="form-control"name="nip" id="nip" required/>
        </div>
        <div class="form-group">
            <label for="nuptk">NUPTK</label>
            <input type="text" class="form-control"name="nuptk" id="nuptk" required/>
        </div>
        <div class="form-group">
            <label for="nomor_nrg">NOMOR NRG</label>
            <input type="text" class="form-control"name="nomor_nrg" id="nomor_nrg" required/>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">JENIS KELAMIN</label>
            <input type="text" class="form-control"name="jenis_kelamin" id="jenis_kelamin" required/>
        </div>
        <div class="form-group">
            <label for="agama">AGAMA</label>
            <input type="text" class="form-control"name="agama" id="agama" required/>
        </div>
        <div class="form-group">
            <label for="pendidikan_terakhir">PENDIDIKAN TRAKHIR</label>
            <input type="text" class="form-control"name="pendidikan_terakhir" id="pendidikan_terakhir" required/>
        </div>
        <div class="form-group">
            <label for="jabatan">JABATAN</label>
            <input type="text" class="form-control"name="jabatan" id="jabatan" required/>
        </div>
        <div class="form-group">
            <label for="mata_pelajaran">MATA PELAJARAN</label>
            <input type="text" class="form-control"name="mata_pelajaran" id="mata_pelajaran" required/>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">SIMPAN</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editgurusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">EDIT DATA SISWA</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <form method="get" action="{{ route('kelolaguru.update')}}" enctype="multipart/form-data">
                        @csrf
                        <!-- @method('PATCH') -->
                         <div class="form-group">
                             <label for="nama_guru">NAMA GURU</label>
                             <input type="text" class="form-control"name="nama_guru" id="edit-nama_guru" required/>
                         </div>
                         <div class="form-group">
                             <label for="ttl">TEMPAT TANGGAL LAHIR</label>
                             <input type="date" class="form-control"name="ttl" id="edit-ttl" required/>
                         </div>
                        <div class="form-group">
                             <label for="nip">NIP</label>
                             <input type="text" class="form-control"name="nip" id="edit-nip" required/>
                       </div>
                       <div class="form-group">
                            <label for="nuptk">NUPTK</label>
                            <input type="text" class="form-control"name="nuptk" id="edit-nuptk" required/>
                         </div>
                         <div class="form-group">
                             <label for="nomor_nrg">NOMOR NRG</label>
                             <input type="text" class="form-control"name="nomor_nrg" id="edit-nomor_nrg" required/>
                         </div>
                         <div class="form-group">
                             <label for="jenis_kelamin">JENIS KELAMIN</label>
                             <input type="text" class="form-control"name="jenis_kelamin" id="edit-jenis_kelamin" required/>
                          </div>
                        <div class="form-group">
                             <label for="agama">AGAMA</label>
                             <input type="text" class="form-control"name="agama" id="edit-agama" required/>
                         </div>
                         <div class="form-group">
                             <label for="pendidikan_terakhir">PENDIDIKAN TRAKHIR</label>
                             <input type="text" class="form-control"name="pendidikan_terakhir" id="edit-pendidikan_terakhir" required/>
                          </div>
                        <div class="form-group">
                            <label for="jabatan">JABATAN</label>
                            <input type="text" class="form-control"name="jabatan" id="edit-jabatan" required/>
                          </div>
                         <div class="form-group">
                             <label for="mata_pelajaran">MATA PELAJARAN</label>
                         <input type="text" class="form-control"name="mata_pelajaran" id="edit-mata_pelajaran" required/>
                         </div>
                    </div>
                         <div class="modal-footer justify-content-center">
                            <input type="text" name="id" id="edit-id"/>
                              <button type="button" class="btn btn-secondary btn-rounded" data-bs-dismiss="modal">Batal</button>
                              <button type="submit" class="btn btn-primary btn-rounded">Simpan</button>
                         </div>
                    </form>
               </div>
          </div>
     </div>
</div>

<div class="modal fade " id="LihatData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">TAMBAH KELAS</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="navbar-menu-wrappr d-flex align-item-center justify-content-between mb-3">
                <p class="mb-0"></p>
                <div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah
                    </button>
                </div>
            </div>
                    
            <table id="table-data" class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>NOMOR INDUK</th>
                         <th>NISN</th>
                        <th>NAMA SISWA</th>
                        <th>KELAS</th>
                        <th>JURUSAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <button class="btn btn-warning">Lihat</button>
                        </td>
                    </tr>
                </tbody>
            </table>
      </div>
    </div>
  </div>
</div>
 @stop

 @section('js')
 <script>
     $(function(){
          $(document).on('click','#btn-edit-gurus', function(){

               let id = $(this).data('id'); 

               $.ajax({ 
                    type: "get",
                    url: "{{url('/admin/kelolaguru/ajax')}}/"+id,
                    dataType: 'json',
                    success: function(res){
                         $('#edit-nama_guru').val(res.nama_guru);
                         $('#edit-ttl').val(res.ttl);
                         $('#edit-nip').val(res.nip);
                         $('#edit-nuptk').val(res.nuptk);
                         $('#edit-nomor_nrg').val(res.nomor_nrg);
                         $('#edit-jenis_kelamin').val(res.jenis_kelamin);
                         $('#edit-agama').val(res.agama);
                         $('#edit-pendidikan_terakhir').val(res.pendidikan_terakhir);
                         $('#edit-jabatan').val(res.jabatan);
                         $('#edit-mata_pelajaran').val(res.mata_pelajaran);
                         $('#edit-id').val(res.id);
                    },
               });
          });
     });
    

     function deleteConfirmation(npm, nama) {
            swal.fire({
                title: "Hapus",
                type: 'warning',
                text: "Apakah anda yakin akan menghapus data Siswa dengan Nama " + nama +"?!",
                showCancelButton: !0,
                confirmButtonText: "Ya lakukan",
                cancelButtonText: "Tidak, batalkan!",
                reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        url: "gurus/delete/"+ npm,
                        data: {_token: CSRF_TOKEN},
                        datatype: 'JSON',
                        success: function (results) {
                            if (results.success === true) {
                                swal.fire("Done!", results.message, "success");
                                // REFRESH PAGE AFTER 2
                                setTimeout(function(){
                                    location.reload();
                                },1000);
                            } else {
                                swal.fire("Error!", results.message, "error");
                            }
                        }
                    });
                } else {
                    e.dismiss;
                }
            }, function (dismiss) {
                return false;
            })
        }


     </script>

@stop
