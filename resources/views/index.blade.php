<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free-Fire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('web/css/estilos.css')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">



</head>

<body id="index">
    <header>


        <nav class="navbar">
            <div class="nav_logo"> <a href="#"> TORNEOS <img src="/web/imagenes/toppng.com-freefire-sticker-garena-free-fire-logo-833x242.png" alt=""></a></div>
            <div class="nav_items" id="_items">
                <a href="/informacion"> INFORMACIÓN</a>

                <a href="/inscripciones"> INSCRIPCIONES</a>
            </div>
            <div class="nav_toggle" id="_toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>

    </header>
    <main>

        <section class="info pt-5">
            <div class="row ">
                <div class="col-12 espacio">

                </div>

                <div class="col-12 derecha">

                    <h2>TORNEOS FREE FIRE 2023</h2><br>

                </div>

                <div class="col-12 pb-5  text-center">
                    <div class="row  contenedorImg">
                        <div class="col-3 derecha">
                            <img src="/web/imagenes/toppng.com-free-fire-wukong-man-character-550x800.png" alt="">

                        </div>


                        <div class="col-6 pt-5 inscripcion ">
                            <div class=" text-center">
                                <h3>ÚNETE AL CAMPO DE BATALLA</h3>
                                <P>INSCRIPCIONES ABIERTAS PARA 24 ESCUDRAS</P>
                            </div>
                            <a href="inscripciones">INSCRIBETE</a>
                        </div>

                        <div class="col-3  ">
                            <img src="/web/imagenes/toppng.com-free-fire-alok-character-550x800.png" alt="">


                        </div>

                    </div>

                </div>
            </div>

        </section>


        <section id="mapas" data-aos="fade-right">


            <div class="row">



                <div class="col-md-6 col-12 pt-5 color text-center">
                    <h2>INFORMACION PRINCIPAL</h2>

                    <p>12 escuadras sera el minimo para empezar el torneo</p>
                    <p>Un jugador de suplente en caso de que hallan problemas con algún participante</p>
                   
                    <p>Se escogera un mapa aleateorio para cada partida</p>
                    <p>La inscripción por escuadra tienes un costo de $20.000 pesos colombianos</p>

                </div>


                <div class="col-md-6 col-12  pt-5 color text-center">
                    <h2>PREMIOS</h2>

                    <p>Primer lugar: $100.000</p>
                    <p>Segundo lugar: $50.000</p>
                </div>



                <div class="col-12 text-center pt-5 p-3">
                    <h2>MAPAS DE BATALLA</h2>
                </div>
                <div class="row" id="omapas" data-aos="fade-right">
                    <div class="col-12">
                        <ul>
                            <li><a href="#omapas" class="category" category="1">BERMUDA</a></li>

                            <li><a href="#omapas" class="category" category="3">PURGATORIO</a></li>
                            <li><a href="#omapas" class="category" category="4">KALAHRAI</a></li>
                        </ul>
                    </div>
                    <div class="col-12 omapas">
                        <div class="mapa" category="1">
                            <img src="/web/imagenes/bermuda.jpg">
                        </div>



                        <div class="mapa" category="3">
                            <img src="/web/imagenes/purgatorio.jpg">
                        </div>
                        <div class="mapa" category="4">
                            <img src="/web/imagenes/kalahari.jpg">
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-12  text-center inscripcion">


                <a href="/informacion">+INFORMACION</a>

            </div>
        </section>

        <section class="grupos" id="mostrar">


            <div class="row">
                <div class="col-12 text-center P-4">
                    <h2>GRUPOS INSCRITOS</h2>
                </div>
                @foreach($escuadra as $key=>$escu)



                <div class="col-md-3 col-6  p-3    <?php if ($key >= 4) {
                                                        echo "mas";
                                                    } ?>">
                    <div class="row">
                        <div class="col-12 caja shadow">
                            <a href="grupo/{{$escu->id}}">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <img src="/files/{{$escu->imagen}}" alt="">
                                    </div>
                                    <div class="col-12 text-center">
                                        <h2>{{$escu->nombre}}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach




                <div class="col-12 text-center p-4 r inscripcion">


                    <a href="#mostrar" class="btnMostrar">MAS GRUPOS</a>


                </div>



            </div>
        </section>


        <section class="clasificacion">

            <div class="row">
                <div class="col-12 text-center">
                    <h2>Clasificación</h2>
                </div>

                <div class="col-12 p-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>POS</th>
                                <th>EQUIPO</th>
                                <th></th>
                                <th>KILL</th>
                                <th>BOOYAHS</th>
                                <th>PUNTOS</th>


                            </tr>


                        </thead>
                        <tbody>
                            @foreach($clasificacion as $key=> $cla)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td><img src="/files/{{$cla->imagen}}" alt=""></td>
                                <td>{{$cla->nombre}}</td>

                                <td>{{$cla->kills}}</td>
                                <td>{{$cla->boyahs}}</td>
                                <td>{{$cla->puntos}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>

            </div>


        </section>

    </main>
    <footer class="text-center">

<p class="p-small">Copyright © 2023 Estiven Carvajal Rojas </p>

</footer>











</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

<script src="{{asset('web/js/index.js')}}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


<script>
    AOS.init({
        duration: 2000
    });
</script>




</html>