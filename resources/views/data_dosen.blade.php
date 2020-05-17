<!DOCTYPE html>
<html>
<head>
    <title> </title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">  
            <div class="card">

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            </div>
                        @endif

                        @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                            </ul>
                            </div>
                        @endif

                        <form method="post" action="{{route('Cdata_dosen')}}">
                        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                        <input type="hidden" name="id" value="{{Auth::guard('dosen')->user()->id}}">
                            <div class="form-group">
                                <label for="formGroupExampleInput">NIK</label>
                                <input type="text" class="form-control" name="nik">
                            </div>
                    
                            <div class="form-group">
                                <label for="formGroupExampleInput">Status</label>
                                <select class="form-control" name="status">
                                    <option value="0"> Dosen </option>
                                    <option value="1"> Koordinator </option>
                                </select>
                            </div>

                    
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>