@extends('Admin/Parent')

@section('primary-content')
    <!-- Modal ADD-->
    <div class="modal fade" id="addUserModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Añadir administrador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addUserAdminForm">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" aria-describedby="nombre">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="emailAdd" aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="password1">Password</label>
                            <input type="password" class="form-control" id="passwordAdd1">
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                La contraseña tiene que tener 8 caracteres de longitud, numeros y letras minusculas y mayusculas.
                            </small>
                        </div>

                        <div class="form-group">
                            <label for="password2">Password</label>
                            <input type="password" class="form-control" id="passwordAdd2">
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                La contraseña tiene que tener 8 caracteres de longitud, numeros y letras minusculas y mayusculas.
                            </small>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="crear">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal EDIT-->
    <div class="modal fade" id="editAdminModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAdminModalLabel">Editar administrador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6 id="nombre" class="my-2 text-center"></h6>

                    <div class="form-group">
                        <label for="password1">Password</label>
                        <input type="password" class="form-control" id="passwordEdit1" required>
                    </div>

                    <div class="form-group">
                        <label for="password2">Password</label>
                        <input type="password" class="form-control" id="passwordEdit2" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="edit">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 text-center my-2">
        <button class="mt-3 btn btn-success"  data-toggle="modal" data-target="#addUserModal">Añadir</button>
    </div>
    <div class="row users">
        @foreach($users as $user)
            <div class="my-4 px-2 card col-12 col-sm-6 col-lg-4">
                <div class="card-body">
                    <h4 class="card-title">{{$user->name}}</h4>
                    <h6 class="card-subtitle">{{$user->email}}</h6>
                    <button class="mt-3 btn btn-primary"  data-toggle="modal" data-target="#editAdminModal">Editar</button>
                    <button class="mt-3 btn btn-danger delete">Eliminar</button>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('custom-js')
    <script>
        $('#editAdminModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var modal = $(this)
            modal.find('#nombre').text(button.siblings('h6').text())
        })

        $('#editAdminModal').on('hidden.bs.modal', function (e) {
            $('#passwordEdit1').val('');
            $('#passwordEdit2').val('');
        })

        $('#addUserModal').on('hidden.bs.modal', function (e) {
            $('#nombre').val('');
            $('#emailAdd').val('')
            $('#passwordAdd1').val('')
            $('#passwordAdd2').val('')
        })

        $('#crear').on('click', function (event) {
            const nombre = $('#nombre').val();
            const email = $('#emailAdd').val();
            const password1 = $('#passwordAdd1').val();
            const password2 = $('#passwordAdd2').val();

            if (nombre.trim() === '' || email.trim() === '') {
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
            else if (!validatePassword(password1, password2)) {
                return false;
            }

            let btn = $(this);
            $(btn).text('');
            $(btn).append(
                `<span class='loading spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>
                <span class='loading sr-only'>Loading...</span>`
            )

            $.ajax({
                type: "POST",
                url: "/admin/addUserAdmin",
                data: {"_token": "{{ csrf_token() }}" ,name: nombre, email: email, password: password1},
                dataType: "JSON",
                success: function (response) {
                    $.confirm({
                        title: 'Usuario creado',
                        type: 'green',
                        content: 'Se añadio con exito!',
                        autoClose: 'ok|1000',
                        buttons: {
                            ok: function () {
                                $(btn).find(".loading").remove();
                                $(btn).text('Guardar');

                                $('#addUserModal').modal('hide')
                                //Crear card item dinamicamente
                                $('.users').append(
                                    `<div class="my-4 px-2 card col-12 col-sm-6 col-lg-4">
                                        <div class="card-body">
                                            <h4 class="card-title">${nombre}</h4>
                                            <h6 class="card-subtitle">${email}</h6>
                                            <button class="mt-3 btn btn-primary"  data-toggle="modal" data-target="#editAdminModal">Editar</button>
                                            <button class="mt-3 btn btn-danger delete">Eliminar</button>
                                        </div>
                                    </div>`).fadeIn('slow');
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
            let password1 = $('#passwordEdit1').val();
            let password2 = $('#passwordEdit2').val();
            let email = $('#editAdminModal').find('#nombre').text()

            if (!validatePassword(password1, password2)) {
                return false
            }

            let btn = $(this);
            $(btn).text('');
            $(btn).append(
                `<span class='loading spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>
                <span class='loading sr-only'>Loading...</span>`
            )

            $.ajax({
                type: "PUT",
                url: "/admin/editUserAdmin",
                data: {"_token": "{{ csrf_token() }}", email: email, password: password1},
                dataType: "JSON",
                success: function (response) {
                    $(btn).find(".loading").remove();
                    $(btn).text('Guardar');

                    $.confirm({
                        title: 'Actualizado',
                        type: 'green',
                        content: 'Se actualizo con exito!',
                        autoClose: 'ok|1000',
                        buttons: {
                            ok: function () {
                                $('#editAdminModal').modal('hide')
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

        $('.users').on('click', '.delete', function () {
            let button = $(this)

            $.confirm({
                title: 'Eliminar usuario administrador ?',
                content: 'Esta seguro de eliminar un usuario administrador',
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
                            const email = button.siblings('h6').text()

                            $.ajax({
                                type: "DELETE",
                                url: "/admin/deleteUserAdmin",
                                data: {"_token": "{{ csrf_token() }}", email: email},
                                dataType: "JSON",
                                success: function (response) {
                                    $.confirm({
                                        title: 'Usuario eliminado',
                                        type: 'green',
                                        content: 'Se elimino con exito!',
                                        autoClose: 'ok|1000',
                                        buttons: {
                                            ok: function () {
                                                //Eliminar card dinamicamente
                                                $(button).parent().parent().fadeOut();
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

        function validatePassword (password1, password2) {
            let mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})")
            let validation = true;

            if (password1 !== password2 || !mediumRegex.test(password1)) {
                validation = false;
                $.confirm({
                    title: 'ERROR',
                    content: 'Las contraseñas no coinciden o no cumplen con el criterio.',
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        close: function () {
                        }
                    }
                });
            }

            return validation;
        }
    </script>
@endsection


