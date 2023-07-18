@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-4">
            <div class="card bg-secondary">
                <div class="card-body">
                    <div class="row d-flex justify-content-between">
                        <p class="mt-50">KELOLA DATA SISWA</p>
                        <div></div>
                        <img src="{{asset('assets/icon-1.png')}}" class="img img-contain" style="object-fit: contain; margin-left: 110px; margin-top: -20px;"   height="60" width="60">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card bg-success">
            <div class="card-body">
                    <div class="row d-flex justify-content-between">
                        <p class="mt-50">KELOLA PENJADWALAN</p>
                        <img src="{{asset('assets/icon3.png')}}" class="img img-contain" style="object-fit: contain; margin-left: 110px; margin-top: -20px;" height="60" width="60">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card bg-danger">
            <div class="card-body">
                    <div class="row d-flex justify-content-between">
                        <p class="mt-50">KELOLA DATA GURU</p>
                        <div></div>
                        <img src="{{asset('assets/icon5.png')}}" class="img img-contain" style="object-fit: contain; margin-left: 110px; margin-top: -20px;"  height="60" width="60">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card bg-warning">
            <div class="card-body">
                    <div class="row d-flex justify-content-between">
                        <p class="mt-50">KELOLA DATA KELAS</p>
                        <div></div>
                        <img src="{{asset('assets/icon5.png')}}" class="img img-contain" style="object-fit: contain; margin-left: 110px; margin-top: -20px;"   height="60" width="60">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card bg-info">
            <div class="card-body">
                    <div class="row d-flex justify-content-between">
                        <p class="mt-50 ">KELOLA MATA PELAJARAN</p>
                        <div></div>
                        <img src="{{asset('assets/icon6.png')}}" class="img img-contain" style="object-fit: contain; margin-left: 110px; margin-top: -20px;"   height="60" width="60">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card  bg-primary">
            <div class="card-body">
                    <div class="row d-flex justify-content-between">
                        <p class="mt-50">KELOLA JURUSAN</p>
                        <div></div>
                        <img src="{{asset('assets/icon8.png')}}" class="img img-contain" style="object-fit: contain; margin-left: 110px; margin-top: -20px;"  height="60" width="60">
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

