$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var promin = {
    firstName: "John",
    lastName: "Doe",
    register: function() {
        console.log("Promin.Register")
        var email = $('#email_register').val();
        var pass = $('#pass').val();
        if (!$('#aviso').prop("checked")) {
            alert("Debe Aceptar los Terminos Y condiciones");
            return false;
        }
        $.ajax({
            method: "POST",
            url: "/register",
            data: {
                email: email,
                password: pass
            },
            success: function(data) {
                console.log("success");
                window.location.href = "/mi-cuenta";
            },
            error: function(data) {
                console.log("error");
                // Log in the console
                var errors = data.responseJSON;
                console.log(errors);
                var errorsHtml = '<div class="alert alert-danger"><ul>';
                $.each(errors, function(key, value) {
                    errorsHtml += '<li>' + value + '</li>';
                });
                errorsHtml += '</ul></di>';
                $('#form-errors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form  
            }
        });
    },
    login: function() {
        console.log("Promin.Login")
        var email = $('#email_login').val();
        var pass = $('#login-password').val();
        $.ajax({
            method: "POST",
            url: "/login",
            data: {
                email: email,
                password: pass
            },
            success: function(data) {
                console.log("success");
                window.location.href = "/mi-cuenta";
            },
            error: function(data) {
                console.log("error");
                // Log in the console
                var errors = data.responseJSON;
                console.log(errors);
                var errorsHtml = '<div class="alert alert-danger"><ul>';
                $.each(errors, function(key, value) {
                    errorsHtml += '<li>' + value + '</li>';
                });
                errorsHtml += '</ul></di>';
                $('#form-errors-login').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form  
            }
        });
    },
    edit_profile: function() {
        console.log("Promin.edit_profile");

        var picture = $('#picture').val();
        var name = $('#name').val();
        var last_name = $('#last_name').val();
        var telephone = $('#telephone').val();
        var password = $('#password').val();
        var password_2 = $('#password_2').val();

        if (password == password_2) {

        } else {
            alert("La contraseña debe ser iguales.");
            return false;
        }

        $.ajax({
            method: "POST",
            url: "/update/edit_profile",
            data: {
                name: name,
                last_name: last_name,
                password: password,
                password_2: password_2,
                telephone: telephone,
                picture: picture
            },
            success: function(data) {
                console.log("success");
                
                //window.location.href="/mi-cuenta";
            },
            error: function(data) {
                console.log("error");
                // Log in the console
                var errors = data.responseJSON;
                console.log(errors);
                var errorsHtml = '<div class="alert alert-danger"><ul>';
                $.each(errors, function(key, value) {
                    errorsHtml += '<li>' + value + '</li>';
                });
                errorsHtml += '</ul></di>';
                $('#form-errors-edir-perfil').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            }
        });
    },
    readURL: function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#profileImg').attr('src', e.target.result);
                $("#picture").val(e.target.result);

            };

            reader.readAsDataURL(input.files[0]);
        }
    }
}

$(document).ready(function() {
    $('#sendFormCreate').on('click', function(event) {
        event.preventDefault();
        promin.register();
    });

    $('#sendFormLogin').on('click', function(event) {
        event.preventDefault();
        promin.login();
    });

    $('#saveFormProfile').on('click', function(event) {
        event.preventDefault();
        promin.edit_profile();
    });

});