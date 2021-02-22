@extends('Admin/Parent')

@section('primary-content')
    <!-- Panel de administrador inicio -->
    <h1 style="padding-left: 2em;">Bienvenido administrador</h1>

    <!-- Video explicatorio para el administrador -->
    <!-- Indice del video para administradores OCULTO?? -->
{{--Video tutorial--}}
    <video width="320" height="240">
        <source src="../../assets/tutorial.mp4" type="video/mp4">
    </video>
    <!-- ScrollSpy con la transcripción del video -->
    <div id="adminExplanationScrollSpy" class="container">
        <div class="row">
        <nav id="adminTutorial" class="navbar navbar-light bg-light col-sm-3">
            <a class="navbar-brand" href="#">Panel administrador</a>
            <nav class="nav nav-pills flex-column">
                <a class="nav-link" href="#item-1">Mujeres</a>
                    <nav class="nav nav-pills flex-column">
                        <a class="nav-link ml-3 my-1" href="#item-1-1">Añadir</a>
                        <a class="nav-link ml-3 my-1" href="#item-1-2">Editar</a>
                        <a class="nav-link ml-3 my-1" href="#item-1-3">Eliminar</a>
                    </nav>
                <a class="nav-link" href="#item-2">Ámbitos</a>
                    <nav class="nav nav-pills flex-column">
                        <a class="nav-link ml-3 my-1" href="#item-2-1">Añadir</a>
                        <a class="nav-link ml-3 my-1" href="#item-2-2">Editar</a>
                        <a class="nav-link ml-3 my-1" href="#item-2-3">Eliminar</a>
                    </nav>
                <a class="nav-link" href="#item-2">Usuarios</a>
                    <nav class="nav nav-pills flex-column">
                        <a class="nav-link ml-3 my-1" href="#item-3-1">Añadir</a>
                        <a class="nav-link ml-3 my-1" href="#item-3-2">Editar</a>
                        <a class="nav-link ml-3 my-1" href="#item-3-3">Eliminar</a>
                    </nav>
                <a class="nav-link" href="#item-3">Logout</a>
            </nav>
            </nav>

            <div data-spy="scroll" data-target="#adminTutorial" data-offset="0" class="col-sm-9 m-auto p-4 border border-primary" style="background-color: #DFEAF1;height: 35em; overflow-y: scroll;">
            <h3 id="item-1">Mujeres</h3>
            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;En esta pantalla gestionaremos los datos de las mujeres de la base de datos.</p>
                <h5 id="item-1-1">&nbsp;&nbsp;Añadir</h5>
                <article>
                    <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;Cuando hagamos click en el botón 'añadir' que
                    encontraremos al comienzo de la lista, se nos abrirá una ventana emergente
                    con un formulario para poder completar los datos de la mujer a añadir. Cada
                    vez que queramos añadir una nueva mujer a la página, tendremos que hacerlo
                    una a cada vez.</p>
                    <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;Podemos contemplar que el formulario se divide en
                    dos secciones: "Datos personales" y "Datos del juego":</p>
                    <p class="text-justify"><b>&nbsp;&nbsp;Datos personales:</b></p>
                        <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;Estos serán los datos que los jugadores podrán
                        ver en la sección "Colección" de nuestro juego una vez que las hayan
                        desbloqueado.</p>
                    <p class="text-justify"><b>&nbsp;&nbsp;Datos del juego:</b></p>
                        <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;Estos serán los datos con la que los jugadores
                        jugarán. Son datos pequeños, sencillos de aprender.</p>
                    <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;Una vez pulsemos el botón de guardar esperaremos a
                    que la nueva mujer se haya guardado en nuestra base de datos y... ¡LISTO!
                    ¡Hemos añadido una mujer nueva a nuestro juego!</p>
                </article>
                <h5 id="item-1-2">&nbsp;&nbsp;Editar</h5>
                    <article>
                        <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;Cuando hagamos click en el botón 'editar' (que
                        encontraremos en cada una de las mujeres de la lista) se nos abrirá una
                        ventana emergente similar a la de añadir mujer para poder corregir o cambiar
                        los datos de la mujer a editar. Cada vez que queramos editar una mujer de la
                        página, tendremos que hacerlo una a cada vez.</p>
                        <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;Podemos contemplar que el formulario se divide en
                        dos secciones: "Datos personales" y "Datos del juego", tal y como el de añadir
                        mujer:</p>
                        <p class="text-justify"><b>&nbsp;&nbsp;Datos personales:</b></p>
                            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;Estos serán los datos que los jugadores podrán
                            ver en la sección "Colección" de nuestro juego una vez que las hayan
                            desbloqueado.</p>
                        <p class="text-justify"><b>&nbsp;&nbsp;Datos del juego:</b></p>
                            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;Estos serán los datos con la que los jugadores
                            jugarán. Son datos pequeños, sencillos de aprender.</p>
                        <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;Una vez pulsemos el botón de guardar esperaremos a
                        que la mujer se haya editado en nuestra base de datos y... ¡LISTO!
                        ¡Hemos editado una mujer de nuestro juego!</p>
                    </article>
                <h5 id="item-1-3">&nbsp;&nbsp;Eliminar</h5>
                    <article>
                        <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;Cuando hagamos click en el botón 'borrar' (que
                        encontraremos en cada una de las mujeres de la lista) se nos abrirá una
                        ventana emergente de confirmación de eliminación de la mujer. Si aceptamos
                        la mujer será eliminada totalmente de la base de datos y será irreversible.</p>
                    </article>
            <hr>
            <h3 id="item-2">Ámbitos</h3>
            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;En esta pantalla gestionaremos los ámbitos de estudio de la base de datos.</p>
            <h5 id="item-2-1">&nbsp;&nbsp;Añadir</h5>
                <article>
                    <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;Cuando hagamos click en el botón 'añadir' que
                    encontraremos al comienzo de la lista se nos abrirá una ventana emergente
                    con un formulario para poder añadir un ámbito de estudio nuevo. Cada vez que queramos
                    añadir un ámbito nuevo a la página, tendremos que hacerlo una a cada vez.</p>
                    <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;Con añadir el nombre del ámbito nos es suficiente.</p>
                    <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;Una vez pulsemos el botón de guardar esperaremos a
                    que el nuevo ámbito se haya guardado en nuestra base de datos y... ¡LISTO!
                    ¡Hemos añadido un ámbito nuevo a nuestro juego!</p>
                </article>
                <h5 id="item-2-2">&nbsp;&nbsp;Editar</h5>
                    <article>
                        <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;Cuando hagamos click en el botón 'editar' (que
                        encontraremos en cada uno de los ámbitos de la lista) se nos abrirá una
                        ventana emergente similar a la de añadir ámbito para poder corregir o cambiar
                        el nombre de éste. Cada vez que queramos editar un ámbito de la
                        página, tendremos que hacerlo una a cada vez.</p>
                        <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;Una vez pulsemos el botón de guardar esperaremos a
                        que el ámbito se haya editado en nuestra base de datos y... ¡LISTO!
                        ¡Hemos editado un ámbito de nuestro juego!</p>
                    </article>
                <h5 id="item-2-3">&nbsp;&nbsp;Eliminar</h5>
                    <article>
                        <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;Cuando hagamos click en el botón 'borrar' (que
                        encontraremos en cada uno de los ámbitos de la lista) se nos abrirá una
                        ventana emergente de confirmación de eliminación del ámbito. Si aceptamos
                        el ámbito será eliminado totalmente de la base de datos y será irreversible.</p>
                    </article>
            <hr>
            <h3 id="item-3">Usuarios</h3>
            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;En esta pantalla gestionaremos los usuarios de la base de datos. Tanto usuarios
            como administradores</p>
                <h5 id="item-3-1">&nbsp;&nbsp;Añadir</h5>
                    <article>
                        <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;Cuando hagamos click en el botón 'añadir' que
                        encontraremos al comienzo de la lista se nos abrirá una ventana emergente
                        con un formulario para poder completar los datos del nuevo administrador a
                        añadir. Cada vez que queramos añadir un nuevo administrador a la página,
                        tendremos que hacerlo uno a cada vez.</p>
                        <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;Estos serán los datos que el nuevo administrador
                        utilizará para gestionar nuestro juego.</p>
                        <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;Una vez pulsemos el botón de guardar esperaremos a
                        que el nuevo administrador se haya guardado en nuestra base de datos y... ¡LISTO!
                        ¡Hemos añadido un nuevo administrador a nuestro juego!</p>
                    </article>
                <h5 id="item-3-2">&nbsp;&nbsp;Editar</h5>
                    <article>
                        <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;Cuando hagamos click en el botón 'editar' (que
                        encontraremos en cada uno de los administradores la lista) se nos abrirá una
                        ventana emergente similar a la de añadir administrador pero solo con la contraseña
                        para poder cambiarla los datos del administrador a editar. Cada vez que queramos
                        editar un administrador de la página, tendremos que hacerlo una a cada vez.</p>
                        <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;Una vez pulsemos el botón de guardar esperaremos a
                        que el administrador se haya editado en nuestra base de datos y... ¡LISTO!
                        ¡Hemos editado un administrador de nuestra página!</p>
                    </article>
                <h5 id="item-3-3">&nbsp;&nbsp;Eliminar</h5>
                    <article>
                        <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;Cuando hagamos click en el botón 'borrar' (que
                        encontraremos en cada uno de los administradores de la lista) se nos abrirá una
                        ventana emergente de confirmación de eliminación del administrador. Si aceptamos
                        el administrador será eliminado totalmente de la base de datos y será irreversible.</p>
                    </article>
            <hr>
            <h3 id="item-3">Logout</h3>
                <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;Cuando hacemos click en el botón de 'Logout' cerraremos sesión.</p>
        </div>
    </div>

@endsection
