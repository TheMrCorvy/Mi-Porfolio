/*************************************variables*************************************/
var shinji;

if (!window.matchMedia("(max-width: 500px)").matches) 
{
    $("#eva01").hide();

    shinji = true;
        
    $(window).scroll(function()
    {
        fuzetsu.slideUp();
        summon.val(MostrarForm);
        Unlimited.slideUp();
    });

}else{
    shinji = false;
}

var subir = $(".volver-arriba");

var summon = $("#summon");

var emiya = $("#emiya");

var fuzetsu = $(".fuzetsu");

var Unlimited = $(".Unlimited");

var MostrarForm = "Mostrar Formularios";

var OcultarForm = "Ocultar Formularios";

var EnviarDatos = "Enviando Datos...";

var cancelar = "Cancelar cuenta";

$("#RealReg").hide();

$("#FakeLog").hide();

fuzetsu.hide();

Unlimited.hide();

subir.hide();

$(document).ready(function()
{
/*************************************section1*************************************/
    $("#datos").mouseover(function()
    {
        $('.background').toggleClass("blur");

        $(this).toggleClass("blur");
    });

    $("#datos").mouseout(function()
    {
        $(this).toggleClass("blur");

        $('.background').toggleClass("blur");
    });
    
/*************************************login form*************************************/

    summon.click(function()
    {
        fuzetsu.slideToggle(450);

        if (summon.val() == MostrarForm || summon.val() == EnviarDatos) 
        {
            summon.val(OcultarForm);
        }else{
            summon.val(MostrarForm);
        }
    });

    emiya.click(function()
    {
        Unlimited.slideToggle(450);

        if (emiya.val() == cancelar || emiya.val() == EnviarDatos) 
        {
            emiya.val(OcultarForm);
        }else{
            emiya.val(MostrarForm);
        }
    });

    $("#LoginForm").submit(function(formLogin) 
        {
            fuzetsu.slideToggle(450);

            summon.val(EnviarDatos);

            summon.click(function()
            {
                summon.val(OcultarForm);
             });
        
            setTimeout(function()
            {
                summon.val(MostrarForm);
            }, 3000);
    });

    $("#SignUpForm").submit(function(formLogin) 
        {
            fuzetsu.slideToggle(450);

            summon.val(EnviarDatos);

            summon.click(function()
            {
                summon.val(OcultarForm);
            });

            setTimeout(function(){
                summon.val(MostrarForm);
            }, 3000);
        });

    $("#foreigner").click(function()
    {
        $("#FakeReg").hide();

        $("#RealReg").show();

        $("#LogEmail, #LogPass").val("");

        $("#RealLog").hide();

        $("#FakeLog").show();
    });

    $("#alterego").click(function()
    {
        $("#FakeLog").hide();

        $("#RealLog").show();

        $("#RegEmail, #RegPass").val("");

        $("#RealReg").hide();

        $("#FakeReg").show();
    });

/*************************************seccion descargas*************************************/
    function desplegar()
    {
        $("#eva01").slideDown();

        console.log("Patrón genético azul!! es un ángel!");
        console.log("Despluieguen la unidad 01 de inmediato!");

        $(".sombra").css({
                    "box-shadow":"0 -3px 5px 1px rgba(66,66,66,0.6)"
        });
    }
    
    var PosicionInicial = $('#section4').offset().top;
    
    var AlturaPantalla = $(window).height();
    
    var MitadDePantalla = 0.5;
    
    var PuntoDeActivacion = PosicionInicial - (AlturaPantalla * MitadDePantalla);
    
    var ScrollMaximo = $('body').height() - AlturaPantalla - 5;

    $(window).on('scroll', function() 
    {
        var PosicionEnY = window.pageYOffset;

        var EstaEnPantalla = PosicionEnY > PuntoDeActivacion;

        if(EstaEnPantalla && shinji) 
        {
            shinji = false;

            desplegar();
        }

    });
    
/*************************************volver arriba*************************************/

    subir.click(function(e)
    {
        e.preventDefault();

        $("html, body").animate({scrollTop: 0}, 375);
    });

    $(window).scroll(function()
    {
       if ($(this).scrollTop() < 100) 
       {
        subir.css({"bottom": "-10rem"});

       }else{

        subir.show().css({"bottom": "1rem"});
       }
    });

/*************************************topnav scroll*************************************/

    $("#CasterGil").click(function() 
    {
        $("body,html").animate(
        {
            scrollTop: $("#section2").offset().top
        },800);
    });

    $("#Ishtar").click(function() 
    {
        if (!shinji) 
        {
            $("body,html").animate(
            {
                scrollTop: $("#eva01").offset().top
            },1600);

        }else{
            $("body,html").animate(
            {
                scrollTop: $("#section4").offset().top
            },1600);
        }
    
    });

    $("#EreshChan").click(function() 
    {
        if (!shinji) 
        {
            $("body,html").animate(
            {
                scrollTop: $("#section5").offset().top
            },1600);

        }else
        {
            shinji = false;

            $("body,html").animate(
            {
                scrollTop: $("#section5").offset().top
            },1600);

            setTimeout(function()
            {
                shinji = true;
            }, 1700);
            //el set timeout es para que la animacion pueda scrollear hasta llegar a su seccion sin q 
            //se abra la seccion de descargas, y tiene que ser si o si mayor tiempo que el tiempo de scroll
        }
    
    });

});//document.ready