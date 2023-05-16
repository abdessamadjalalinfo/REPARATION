@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Administrador</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <div class="row">
                        <div class="col">
                            <a type="button" class="btn btn-primary"><i class="fa-solid fa-screwdriver-wrench"></i>Reparaciones</a>
                        </div>
                        <div class="col">
                            <a type="button" class="btn btn-primary"><i class="fa-solid fa-users"></i>Clientes</a>
                        </div>
                        <div class="col">
                            <a type="button" class="btn btn-primary"><i class="fa-solid fa-cash-register"></i>Ventas</a>
                        </div>
                        <div class="col">
                            <a type="button" class="btn btn-primary"><i class="fa-solid fa-gear"></i>Configuration</a>
                        </div>


                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
