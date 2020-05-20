@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
                <iframe src="storage/Skdoc/{{$doc}}" frameborder="1" style="width:1200px; height:1000px;"></iframe>
        </div>
        <button class="btn btn-success"> <a style="color:white;text-decoration: none;" href="{{ route('sk') }}"> BACK </a> </button>
        
    </div>
</div>
@endsection
