/// <reference path="../../typings/globals/jquery/index.d.ts" />

$(document).ready(function(){
    // login form manager
    $(".login-form").submit(function(){
        var values = $(this).serializeArray();
        var user = values[0].value;
        var password = values[1].value;
        
        $.ajax({

        });
    });
});

