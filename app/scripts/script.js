/// <reference path="../../typings/globals/jquery/index.d.ts" />

$(document).ready(function(){
    // login form submit
    $(".login-form").submit(function(e){
        // prevent refreshing the page
        e.preventDefault();

        var form_data = $(this).serializeArray();
        $.ajax({
            type: "POST",
            url: '../src/login.php',
            data: form_data,
            success: function(data){
                var html_text = data;
                html_text = html_text.substring(1, html_text.length -1);
            
                $(".login-status").html("<p>" + html_text + "</p>");
            },
            error: function(req){
                alert("Login failed, " + req.responseText + "!");
            }
        });
    });

    // register form submit
    $(".register-form").submit(function(e){
        // prevent refreshing page
        e.preventDefault();

        var form_data = $(this).serializeArray();
        $.ajax({
            type: "POST",
            url: '../src/register.php',
            data: form_data,
            success: function(data){
                var html_text = data;
                // html_text = html_text.substring(1, html_text.length -1);
                
                $(".register-status").html("<p>" + html_text + "</p>");
            },
            error: function(req){
                alert("Registration failed!");
            }
        });
    });

    // register from login
    $(".register-from-login").click(function(e){
        e.preventDefault()

        window.location.replace("register.html");
    })
});

