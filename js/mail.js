
$(document).ready(function(){
    $("input[type=submit]").click(function(event){
        event.preventDefault();
        var name =$("#name").val();
        var email=$("#email").val();
        var subject=$("#subject").val();
        var message=$("#message").val();

        $.post("php/mail.php",{
            name:name,
            email:email,
            subject:subject,
            message:message

        }, function(respuesta){
            $("#info").text(respuesta);

        });
    });


});