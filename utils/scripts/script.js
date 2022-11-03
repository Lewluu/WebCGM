/// <reference path="../../typings/globals/jquery/index.d.ts" />

$(document).ready(function(){
    // login form submit
    $(".login-form").submit(function(e){
        // prevent refreshing the page
        e.preventDefault();

        var form_data = $(this).serializeArray();
        
        $.ajax({
            type: "POST",
            url: '../app/login.php',
            data: form_data,
            success: function(data){
                $(".login-status").html("<p>" + data + "</p>");
            },
            error: function(req){
                alert("Login failed, " + req.responseText + "!");
            }
        });
    });

    // register form submit
    $(".register-form").submit(function(e){
        e.preventDefault()
    })
});

