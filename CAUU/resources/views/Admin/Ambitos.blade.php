@extends('Admin/Parent')

@section('primary-content')
    <!-- Modal ADD-->
    <div class="modal fade" id="addFieldModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addFieldModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addFieldModalLabel">Añadir ambito</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addFieldAdminForm">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" aria-describedby="nombre">
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

    <!-- Modal EDIT-->
    <div class="modal fade" id="editFieldModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editFieldLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFieldLabel">Editar ambito</h5>
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
        <button class="mt-3 btn btn-success"  data-toggle="modal" data-target="#addFieldModal">Añadir</button>
    </div>
    <div class="row ambitos">
        @foreach($fields as $field)
            <div class="my-4 px-2 card col-12 col-sm-6 col-lg-4">
                <div class="card-body">
                    <h4 class="card-title">{{$field->nombre}}</h4>
                    <button class="mt-3 btn btn-primary"  data-toggle="modal" data-target="#editFieldModal">Editar</button>
                    <button class="mt-3 btn btn-danger delete">Eliminar</button>
                    <input type="hidden" value="{{$field->id}}" name="id">
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('custom-js')
    <script>
        $('#editFieldModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var modal = $(this)

            modal.find('#nombreEdit').val(button.siblings('h4').text())
            modal.find('#idEdit').val(button.siblings('input[name="id"]').val())
        })

        $('#editFieldModal').on('hidden.bs.modal', function (e) {
            $('#nombreEdit').val('');
            $('#idEdit').val('');
        })

        $('#addFieldModal').on('hidden.bs.modal', function (e) {
            $('#nombre').val('');
        })

        $('#crear').on('click', function (event) {
            const nombre = $('#nombre').val();
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
                url: "/admin/addAmbito",
                data: {"_token": "{{ csrf_token() }}" , nombre: nombre},
                dataType: "JSON",
                success: function (response) {
                    $(btn).find(".loading").remove();
                    $(btn).text('Guardar');

                    $.confirm({
                        title: 'Ambito creado',
                        type: 'green',
                        content: 'Se añadio con exito!',
                        autoClose: 'ok|1000',
                        buttons: {
                            ok: function () {
                                $('#addFieldModal').modal('hide')

                                //Add card dinamyc
                                $('.ambitos').append(
                                    `<div class="my-4 px-2 card col-12 col-sm-6 col-lg-4">
                                        <div class="card-body">
                                            <h4 class="card-title">${nombre}</h4>
                                            <button class="mt-3 btn btn-primary"  data-toggle="modal" data-target="#editFieldModal">Editar</button>
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
                url: "/admin/editAmbito",
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
                                $('#editFieldModal').modal('hide')
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

        $('.ambitos').on('click', '.delete', function () {
            let button = $(this)

            $.confirm({
                title: 'Eliminar ambito ?',
                content: 'Esta seguro de eliminar este ambito ?',
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


