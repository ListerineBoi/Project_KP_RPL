@extends('layouts.app')

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
                        <table class="table table-hover">
                            <tr>
                                <th> No </th>
                                <th> NIM </th>
                                <th> Nama </th>
                                <th> Tgl Ujian </th>
                                <th> Ruangan </th>
                                <th> Dosen Pendamping </th>
                                <th> Dosen Penguji </th>
                            <tr>
                            <tr>
                            @foreach($Vmjadwal as $row)
                                <td> {{$loop->iteration}} </td>
                                <td> {{$row['nim']}} </td>
                                <td> {{$row['mhs']}} </td>
                                <td> {{$row['tanggal']}} </td>
                                <td> {{$row['ruang']}} </td>
                                <td> {{DB::table('dosen')->where('id', $row['pendamping'])->value('name')}} </td>
                                <td> {{DB::table('dosen')->where('id', $row['penguji'])->value('name')}} </td>
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