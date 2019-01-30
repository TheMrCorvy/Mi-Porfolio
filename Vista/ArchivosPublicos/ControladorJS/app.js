$(document).ready(function() 
{
    $("#LoginForm").submit(function(formLogin) 
    {
        $(this).attr("diasbled","disabled");
        formLogin.preventDefault();

        var email = $('#LogEmail').val();
        var pass  = $('#LogPass').val();

        if( ValidarForm(email, pass) )
        {
            $.ajax(
            {
                type: 'POST',
                url: 'http://localhost/Pagina2/?proyecto=login/Login',//esto va a ir a app.php
                datatype: 'html',
                async : true,
                data: 
                {
                    action: 'Login',
                    email : email,
                    pass : pass,
                },
                success : function(Data)
                {
                    var data = JSON.parse(Data);
                    if(data.cod_mensaje == -1)
                    {
                        console.log(data.mensaje);
                        location.replace('index.php');
                    }else{
                        alert(data.mensaje);
                        location.reload();
                    }
                },

                error : function()
                {
                    console.log("Error. Human is dead, mismatch.");
                },

                complete : function()
                {
                    console.log("Time leap machine has been used.");
                }
            });
        }
    });//submit login

    $("#SignUpForm").submit(function(formRegistro) 
    {
        $(this).attr("diasbled","disabled");
        formRegistro.preventDefault();
        
        var email    = $('#RegEmail').val();
        var pass     = $('#RegPass').val();

        if( ValidarForm(email, pass) )
        {
            $.ajax(
            {
                type: 'POST',
                url: 'http://localhost/Pagina2/?proyecto=login/Registro',
                datatype: 'html',
                async : true,
                data: 
                {
                    action: 'Registro',
                    email : email,
                    pass : pass,
                },
                success : function(Data)
                {
                    var data = JSON.parse(Data);
                    if(data.cod_mensaje == -1)
                    {
                        console.log(data.mensaje);
                        location.replace('index.php');
                    }else{
                        alert(data.mensaje);
                        location.reload();
                    }
                },

                error : function()
                {
                    console.log("Error. Human is dead, mismatch.");
                },

                complete : function ()
                {
                    console.log("Time leap machine has been used.");
                }
            });
        }
    });//submit registro

    $("#Works").submit(function(borrar) 
    {
        $(this).attr("diasbled","disabled");
        borrar.preventDefault();
        
        var email = $('#RealityMarble').val();

        if( email.length > 2 )
        {
            $.ajax(
            {
                type: 'POST',
                url: 'http://localhost/Pagina2/?proyecto=login/Borrar',
                datatype: 'html',
                async : true,
                data: 
                {
                    action: 'Borrar',
                    email : email
                },
                success : function(Data)
                {
                    var data = JSON.parse(Data);
                    if(data.cod_mensaje == -1)
                    {
                        alert(data.mensaje);
                        location.replace('index.php');
                    }else{
                        alert(data.mensaje);
                        location.reload();
                    }
                },

                error : function()
                {
                    console.log("Error. Human is dead, mismatch.");
                },

                complete : function ()
                {
                    console.log("Time leap machine has been used.");
                }
            });
        }
    });//submit borrar

    function ValidarForm(email, pass)
    {
        var response = true;

        if(email.length < 2){
            response = false;
            alert('El email está incompleto');
        }

        if(pass.length < 2){
            response = false;
            alert('El pass está incompleto');
        }

        return response;
    }

});//document ready

function logout()
{
    $.ajax(
    {
        type: 'POST',
        url: 'http://localhost/Pagina2/?proyecto=login/Logout',
        datatype: 'html',
        async : true,
        data: {
            action: 'Logout',
        },
        
        success : function(Data)
        {
            var data = JSON.parse(Data);
            if(data.cod_mensaje == -1)
            {
                console.log(data.mensaje);
                location.reload();
            }else{
                alert(data.mensaje);
                location.reload();
            }
        },

        error : function()
        {
            console.log("Error. Human is dead, mismatch.");
        },

        complete : function ()
        {
            console.log("Time leap machine has been used.");
        }
    });
}
