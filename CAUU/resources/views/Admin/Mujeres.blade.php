@extends('Admin/Parent')

@section('primary-content')
    @foreach($women as $woman)
        <div class="my-4 px-2 card col-12 col-sm-6 col-lg-4">
            <div class="card-body">
                <h4 class="card-title">{{$woman->nombre}}</h4>
                <h6 class="card-subtitle">{{$woman->apellido}}</h6>
                <h6 class="card-subtitle">{{$woman->fecha_nacimiento}}</h6>
                <h6 class="card-subtitle">{{$woman->fecha_muerte}}</h6>
                <h6 class="card-subtitle">{{$woman->lore_eus}}</h6>
                <h6 class="card-subtitle">{{$woman->lore_es}}</h6>
                <h6 class="card-subtitle">{{$woman->lore_en}}</h6>
                <h6 class="card-subtitle">{{$woman->zona_geografica}}</h6>
                <h6 class="card-subtitle">{{$woman->foto}}</h6>
                <button class="mt-3 btn btn-primary"  data-toggle="modal" data-target="#editAdminModal">Editar</button>
                <button class="mt-3 btn btn-danger delete">Eliminar</button>
            </div>
        </div>
    @endforeach
@endsection
