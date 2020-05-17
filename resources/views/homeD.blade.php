@extends('layouts.appD')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profil</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container"> 
                        <div class="form-group">
                            <table class="table table-hover">
                                <tr>
                                    <td> NIK </td>
                                    <td> : </td>
                                    <td> {{Auth::guard('dosen')->user()->nik}} </td>
                                </tr>
                                <tr>
                                    <td> Nama </td>
                                    <td> : </td>
                                    <td> {{Auth::guard('dosen')->user()->name}} </td>
                                </tr>
                                <tr>
                                    <td> Email </td>
                                    <td> : </td>
                                    <td> {{Auth::guard('dosen')->user()->email}} </td>
                                </tr>
                                <tr>
                                    <td> Status </td>
                                    <td> : </td>
                                    @if(Auth::guard('dosen')->user()->koor == 1)
                                    <td> Koordinator </td>
                                    @else
                                    <td> Dosen </td>
                                    @endif
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
               
            </div>
    </div>
</div>
@endsection
