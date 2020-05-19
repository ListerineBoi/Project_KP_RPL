@extends('layouts.appD')

@section('content')
<div class="container">
<!-- breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"> Jadwal Ujian </li>
  </ol>
</nav>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> <strong> Jadwal Ujian KP </strong> </div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif 

                    <div class="container">
                        <table class="table table-hover" style="text-align: center;">
                            <tr>
                                <th> No </th>
                                <th> NIM </th>
                                <th> Nama </th>
                                <th> Tgl Ujian </th>
                                <th> Ruangan </th>
                                <th> Judul </th>
                            <tr>
                            @foreach($Vmjadwal as $row)
                            <tr>
                                <td> {{$loop->iteration}} </td>
                                <td> {{$row['nim']}} </td>
                                <td> {{$row['mhs']}} </td>
                                <td> {{$row['tanggal']}} </td>
                                <td> {{$row['ruang']}} </td>
                                <td> {{DB::table('kp')->where('id_kp', $row['id_kp'])->value('judul')}} </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div> <br>

            <button class="btn btn-success"> <a style="color:white;text-decoration: none;" href="{{ route('homeD') }}"> BACK </a> </button>

        </div>


    </div>
</div>

@endsection