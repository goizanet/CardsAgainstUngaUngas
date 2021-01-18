@extends('Admin/Parent')

@section('primary-content')
    <!-- Modal ADD-->
    <div class="modal fade" id="addWomanModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addWomanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addWomanModalLabel">Añadir mujer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addWomanAdminForm">
                        @csrf
                        {{--Datos personales de la mujer--}}
                        <h6>Datos personales</h6>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="nombre">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" aria-describedby="apellido">
                            <label for="lore_es">Descripcion en castellano</label>
                            <input type="text" class="form-control" id="lore_es" name="lore_es" aria-describedby="lore_es">
                            <label for="lore_eus">Descripcion en euskera</label>
                            <input type="text" class="form-control" id="lore_eus" name="lore_eus" aria-describedby="lore_eus">
                            <label for="lore_en">Descripcion en ingles</label>
                            <input type="text" class="form-control" id="lore_en" name="lore_en" aria-describedby="lore_en">
                            <label for="zona_geo">Zona geografica</label>
                            <input type="text" class="form-control" id="zona_geo" name="zona_geo" aria-describedby="zona_geo">
                            <label for="ambitos">Ámbitos</label>
                            <select class="form-control" for="ambitos" name="ambitos" id="ambitos">
                            @foreach($fields as $field)
                                <option value="{{$field->id}}">{{$field->nombre}}</option>
                            @endforeach
                            </select>
                            <label for="continente">Continente</label>
                            <select class="form-control" id="continente" name="continente">
                                @foreach($continents as $continent)
                                    <option value="{{$continent->id}}">{{$continent->nombre}}</option>
                                @endforeach
                            </select>
                            <label for="fecha_nac">Fecha de nacimiento</label>
                            <input class="form-control" type="date" id="fecha_nac" name="fecha_nac">
                            <label for="fecha_def">Fecha de muerte</label>
                            <input class="form-control" type="date" id="fecha_def" name="fecha_def">
                            <label for="foto">Foto</label>
                            <input class="form-control" type="file" id="foto" name="foto" accept="image/*">
                        </div>
                        {{--Datos de la mujer para el juego--}}
                        <h6>Datos del juego</h6>
                        <div class="form-group">
                            <label for="dato_uno">Dato 1</label>
                            <input class="form-control" type="text" id="dato_uno">
                            <label for="dato_dos">Dato 2</label>
                            <input class="form-control" type="text" id="dato_dos">
                            <label for="dato_tres">Dato 3</label>
                            <input class="form-control" type="text" id="dato_tres">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="crear">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal EDIT -->
    <div class="modal fade" id="editWomanModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editWomanLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editWomanLabel">Editar ambito</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombreEdit">Nombre</label>
                        <input type="text" class="form-control" id="nombreEdit" required>
                        <input type="hidden" name="idEdit" id="idEdit">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="edit">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 text-center my-2">
        <button class="mt-3 btn btn-success"  data-toggle="modal" data-target="#addWomanModal">Añadir</button>
    </div>
    @foreach($women as $woman)
        <div class="my-4 px-2 card col-12 col-sm-6 col-lg-4">
            <div class="card-body">
                <div class="" style="float: left;">
                    <img src="{{$woman->foto}}">
                </div>
                <div>
                    <h4 class="card-title">{{$woman->nombre}}</h4>
                    <h6 class="card-subtitle">{{$woman->apellido}}</h6>
                </div>
                <button class="mt-3 btn btn-primary"  data-toggle="modal" data-target="#editWomanModal">Editar</button>
                <button class="mt-3 btn btn-danger delete">Eliminar</button>
            </div>
        </div>
    @endforeach
@endsection
@section('custom-js')
    <script>
        $('#editWomanModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var modal = $(this)

            modal.find('#nombreEdit').val(button.siblings('h4').text())
            modal.find('#idEdit').val(button.siblings('input[name="id"]').val())
        })

        $('#editWomanModal').on('hidden.bs.modal', function (e) {
            $('#nombreEdit').val('');
            $('#idEdit').val('');
        })

        $('#addWomanModal').on('hidden.bs.modal', function (e) {
            $('#nombre').val('');
        })

        $('#crear').on('click', function (event) {
            const nombre = $('#nombre').val();
            const apellido = $('#apellido').val();
            const fecha_nac = $('#fecha_nac').val();
            const fecha_def = $('#fecha_def').val();
            const lore_es = $('#lore_es').val();
            const lore_eus = $('#lore_eus').val();
            const lore_en = $('#lore_en').val();
            const zona_geo = $('#zona_geo').val();
            const ambito_id = $('#ambitos').val();
            const continente_id = $('#continente').val();
            const foto = $('#foto').val();

            let btn = $(this);

            if (nombre.trim() === '') {
                $.confirm({
                    title: 'ERROR',
                    content: 'Uno o mas campos estan vacios o no conciden con el formato',
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        close: function () {
                        }
                    }
                });

                return false;
            }

            $(btn).text('');
            $(btn).append(
                `<span class='loading spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>
                <span class='loading sr-only'>Loading...</span>`
            )

            $.ajax({
                type: "POST",
                url: "/admin/addMujer",
                data: {"_token": "{{ csrf_token() }}" ,
                    nombre: nombre,
                    apellido: apellido,
                    fecha_nac: fecha_nac,
                    fecha_def: fecha_def,
                    lore_es: lore_es,
                    lore_eus: lore_eus,
                    lore_en: lore_en,
                    zona_geo: zona_geo,
                    ambito_id: ambito_id,
                    continente_id: continente_id,
                    foto: foto
                },
                dataType: "JSON",
                success: function (response) {
                    $(btn).find(".loading").remove();
                    $(btn).text('Guardar');

                    $.confirm({
                        title: 'Mujer creada',
                        type: 'green',
                        content: 'Se añadio con exito!',
                        autoClose: 'ok|1000',
                        buttons: {
                            ok: function () {
                                $('#addWomanModal').modal('hide')

                                //Add card dinamyc
                                $('.women').append(
                                    `<div class="my-4 px-2 card col-12 col-sm-6 col-lg-4">
                                        <div class="card-body">
                                            <h4 class="card-title">${nombre}</h4>
                                            <button class="mt-3 btn btn-primary"  data-toggle="modal" data-target="#editWomanModal">Editar</button>
                                            <button class="mt-3 btn btn-danger delete">Eliminar</button>
                                            <input type="hidden" value="${response.id}" name="id">
                                        </div>
                                    </div>`
                                ).fadeIn();
                            }
                        }
                    });
                },
                error: function (error) {
                    $(btn).find(".loading").remove();
                    $(btn).text('Guardar');
                    console.log(error);
                    errorGenAlert();
                }
            })
        })

        $('#edit').on('click', function (event) {
            let nombre = $('#nombreEdit').val();
            let id  = $("#idEdit").val();
            let btn = $(this);

            $(btn).text('');
            $(btn).append(
                `<span class='loading spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>
                <span class='loading sr-only'>Loading...</span>`
            )

            $.ajax({
                type: "PUT",
                url: "/admin/editMujer",
                data: {"_token": "{{ csrf_token() }}", nombre : nombre, id:id},
                dataType: "JSON",
                success: function (response) {
                    $(btn).find(".loading").remove();
                    $(btn).text('Guardar');
                    $(`input[value="${id}"]`).siblings('h4').text(nombre);

                    $.confirm({
                        title: 'Actualizado',
                        type: 'green',
                        content: 'Se actualizo con exito!',
                        autoClose: 'ok|1000',
                        buttons: {
                            ok: function () {
                                $('#editWoman' + 'Modal').modal('hide')
                            }
                        }
                    });
                },
                error: function (error) {
                    $(btn).find(".loading").remove();
                    $(btn).text('Guardar');
                    console.log(error);
                    errorGenAlert();
                }
            })
        })

        $('.women').on('click', '.delete', function () {
            let button = $(this)

            $.confirm({
                title: 'Eliminar esta mujer?',
                content: 'Esta seguro de eliminar esta mujer?',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    Yes: {
                        text: 'Si',
                        btnClass: 'btn-red',
                        action: function () {
                            $(button).text('');
                            $(button).append(
                                `<span class='loading spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>
                                 <span class='loading sr-only'>Loading...</span>`
                            )

                            const id = $(button).siblings('input').val()

                            $.ajax({
                                type: "DELETE",
                                url: "/admin/deleteAmbito",
                                data: {"_token": "{{ csrf_token() }}", id: id},
                                dataType: "JSON",
                                success: function (response) {
                                    $(button).parent().parent().fadeOut();

                                    $.confirm({
                                        title: 'Usuario eliminado',
                                        type: 'green',
                                        content: 'Se elimino con exito!',
                                        autoClose: 'ok|1000',
                                        buttons: {
                                            ok: function () {
                                            }
                                        }
                                    });
                                },
                                error: function (error) {
                                    $(button).find(".loading").remove();
                                    $(button).text('Eliminar');
                                    console.log(error);
                                    errorGenAlert();
                                }
                            })
                        }
                    },
                    close: function () {
                    }
                }
            });
        })
    </script>
@endsection

