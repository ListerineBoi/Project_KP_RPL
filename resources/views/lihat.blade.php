@extends('layouts.appD')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
                <iframe src="storage/{{$from}}/{{$doc}}" frameborder="1" style="width:1200px; height:1000px;"></iframe>
        </div>
        @if($from=='Sk')
        <button class="btn btn-success"> <a style="color:white;text-decoration: none;" href="{{ route('verifikasi_sk') }}"> BACK </a> </button>
        @elseif($from=='Kp')
        <button class="btn btn-success"> <a style="color:white;text-decoration: none;" href="{{ route('verifikasi') }}"> BACK </a> </button>
        @else
        <button class="btn btn-success"> <a style="color:white;text-decoration: none;" href="{{ route('verifikasi_prakp') }}"> BACK </a> </button>
        @endif
    </div>
</div>
@endsection
