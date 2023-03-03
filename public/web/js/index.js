$(document).ready(function () {
    $('#mapas .category[category="1"]').addClass('activar')
    $('.mapa[category="2"]').hide();
    $('.mapa[category="3"]').hide();
    $('.mapa[category="4"]').hide();





    $('.category').click(function () {
        var lugar = $(this).attr('category');


        $('.category').removeClass('activar');
        $(this).addClass('activar');

        $('.mapa').css('opacity', '0');


        function eliminar() {
            $('.mapa').hide();

        } setTimeout(eliminar, 400);


        function mostrar() {
            $('.mapa[category="' + lugar + '"]').show();
            $('.mapa[category="' + lugar + '"]').css('opacity', '1');
        } setTimeout(mostrar, 400);
    })


    $('.mas').hide();
    $('.btnMostrar').click(function () {


        $('.mas').show();

        $('.btnMostrar').hide();



    });


})

_toggle.onclick = () =>{
    _items.classList.toggle("open")
    _toggle.classList.toggle("close")
}