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



</head>

<body id="index">
    <header>
        <nav class="navbar">
            <div class="nav_logo"> <a href="/"> TORNEOS <img src="/web/imagenes/toppng.com-freefire-sticker-garena-free-fire-logo-833x242.png" alt=""></a></div>
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
        <section class="espacio">

        </section>


        <section class="jugadores">
            <div class="row">

                <div class="col-12 text-center">

                    <h2>Nombre del Grupo</h2>
                </div>
                <div class="col-2 icono">
                    <!--<img src="imagenes/toppng.com-free-fire-alok-character-550x800.png" alt="">-->
                </div>


                <div class=" col-8">

                    <div class="row">

                        @foreach($aJugadores as $key=> $juga)
                        <div class="col-md-4 col-12 p-2">
                            <div class="jugador shadow ">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <img src="/files/{{$juga[0]->imagen}}" alt="" >
                                    </div>
                                    <div class="col-md-6 col-12 text-center ">
                                        <div class="p-2">


                                            <h3>{{$juga[0]->nombreJuego}}
                                            </h3>
                                            <h4>{{$juga[0]->nombreReal}}</h4>
                                            <?php if($key>=4){  ?>
                                                <p>SUPLENTE</p>
                                           <?php }else{?>
                                           <p>TITULAR</p>
                                           <?php }?>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                      

                    </div>


                </div>
                <div class="col-2 icono">
                    <!-- <img src="imagenes/toppng.com-free-fire-alvaro-man-character-550x800.png" alt="">-->
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
        duration: 3000
    });
</script>

</html>