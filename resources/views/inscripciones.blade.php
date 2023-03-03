<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free-Fire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/web/css/estilos.css')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">



</head>

<body>
    <header>
        <nav class="navbar">
            <div class="nav_logo "> <a href="/"> TORNEOS <img src="/web/imagenes/toppng.com-freefire-sticker-garena-free-fire-logo-833x242.png" alt=""></a></div>
            <div class="nav_items" id="_items">
                 <a href="/informacion"> INFORMACIÓN</a>
                 
                 <a href="" class="activarA"> INSCRIPCIONES</a>
            </div>
            <div class="nav_toggle" id="_toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
       </nav>


    </header>
    <main>
        <section class="espacio">

        </section>


        <section id="inscripciones" class="inscripcion">
            <div class="row">

                <div class="col-2">

                </div>

                <div class="col-8 text-center  centrar">



                </div>
                <div class="col-2"></div>

            </div>
        </section>

        <section class="formulario">
            <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
            <input type="hidden" id="id" name="id" class="form-control" value="<?php if (isset($cla)) {
                                                                                          echo $cla[0]->id;
                                                                                    } ?>" required>

                <div class="row">
                    <div class="col-12 text-center textoLlamativo">
                        <h2>BIENVENIDOS A LA BATALLA</h2>
                    </div>

                    <div class="col-md-4 col-12 p-5  ">
                        <H2>DATOS DEL LIDER DEL GRUPO</H2>
                        <div>


                            <label for="" class="form-control">Nombre del lider del grupo</label>
                            <input type="text" id="txtNombreLider" name="txtNombreLider" class="form-control" required>
                        </div>
                        <div>
                            <label for="" class="form-control">Número de telefono </label>
                            <input type=" text" name="txtNumeroLider" class="form-control" required>
                        </div>
                        <div>
                            <label for="" class="form-control">NOMBRE DE LA ESCUADRA </label>
                            <input type=" text" name="txtNombreEscuadra" class="form-control" required>
                        </div>
                        <DIV> <label for="" class="form-control"> LOGO DE LA ESCUADRA(Fondo blaco)</label>
                            <input type="file" name="archivo" id="" class="form-control" required>
                        </DIV>

                    </div>



                    <div class="col-md-4 col-12 p-5">
                        <H2>PRIMER INTEGRANTE</H2>

                        <div>
                            <label for="" class="form-control"> NOMBRE EN EL JUEGO</label>
                            <input type="text" class="form-control" name="txtJuego1"  required>
                        </div>
                        <div>

                            <label for="" class="form-control"> NOMBRE PERSONAL</label>
                            <input type="text" class="form-control" name="txtNombre1" required>
                        </div>
                        <div>

                            <label for="" class="form-control"> FOTO DEL INTEGRANTE(Fondo negro)</label>
                            <input type="file" name="imagen1" id="" class="form-control" required>


                        </div>

                    </div>
                    <div class="col-md-4 col-12  p-5 ">
                        <H2>SEGUNDO INTEGRANTE</H2>
                        <div>

                            <label for="" class="form-control"> NOMBRE EN EL JUEGO</label>
                            <input type="text" class="form-control"  name="txtJuego2" required>
                        </div>
                        <div>


                            <label for="" class="form-control"> NOMBRE PERSONAL</label>
                            <input type="text" class="form-control" name="txtNombre2" required>
                        </div>
                        <div>

                            <label for="" class="form-control"> FOTO DEL INTEGRANTE(Fondo
                                negro)</label>
                            <input type="file" name="imagen2" id="" class="form-control" required>



                        </div>
                    </div>
                    <div class="col-md-4 col-12  p-5 ">
                        <H2>TERCER INTEGRANTE</H2>
                        <div>

                            <label for="" class="form-control"> NOMBRE EN EL JUEGO</label>
                            <input type="text" class="form-control" name="txtJuego3" required>
                        </div>
                        <div>


                            <label for="" class="form-control"> NOMBRE PERSONAL</label>
                            <input type="text" class="form-control" name="txtNombre3" required>
                        </div>
                        <div>

                            <label for="" class="form-control"> FOTO DEL
                                INTEGRANTE(Fondo negro)</label>
                            <input type="file" name="imagen3" id="" class="form-control" required>


                        </div>

                    </div>
                    <div class="col-md-4 col-12  p-5 ">

                        <H2>CUARTO INTEGRANTE</H2>
                        <div>

                            <label for="" class="form-control"> NOMBRE EN EL
                                JUEGO</label>
                            <input type="text" class="form-control"  name="txtJuego4" required>
                        </div>
                        <div>

                            <label for="" class="form-control"> NOMBRE
                                PERSONAL</label>
                            <input type="text" class="form-control" name="txtNombre4" required>

                        </div>
                        <div>

                            <label for="" class="form-control"> FOTO DEL
                                INTEGRANTE(Fondo negro)</label>
                            <input type="file" name="imagen4" id="" class="form-control" required>
                        </div>




                    </div>
                    <div class="col-md-4 col-12  p-5 ">
                        <H2> INTEGRANTE SUPLENTE</H2>
                        <div>

                            <label for="" class="form-control"> NOMBRE
                                EN EL JUEGO</label>
                            <input type="text" class="form-control"  name="txtJuego5" required>
                        </div>

                        <div>

                            <label for=" class="form-control"> NOMBRE
                                PERSONAL</label>
                            <input type="text" class="form-control" name="txtNombre5" required>
                        </div>

                        <div>

                            <label for="" class="form-control"> FOTO DEL
                                INTEGRANTE(Fondo negro)</label>
                            <input type="file" name="imagen5" id="" class="form-control" required>


                        </div>
                    </div>

                    <div class="col-12  text-center  inscribir m-5">
                        <button type="submit" class="btn">INSCRIBIR</button>
                    </div>

                </div>
            </form>



        </section>
    </main>
 











</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>

<script src="{{asset('/web/js/index.js')}}"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


<script>
    AOS.init({
        duration: 3000
    });
</script>

</html>