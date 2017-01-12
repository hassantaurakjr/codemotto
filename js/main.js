$(document).ready(function() {
    
    // Side Nav Toggle Menu
    $('.side-nav-list li').click(function() {
        $('.side-nav-list li').removeClass('active');
        $(this).addClass('active');
    });
    
    
    /* LOGIN ACTIONS ----------------------------------------------------------------------------------*/
    
    $("[name='login-username']").focusin(function() {
        $('#login-username-label').removeClass('is-invalid-label');
        $("#login-username-error").removeClass('is-visible');
        $("#login-username-error2").removeClass('is-visible');
    });
    
    $("[name='login-username']").focusout(function() {
        var username = $("[name='login-username']").val();
        if (username == null || username == "") {
            $('#login-username-label').addClass('is-invalid-label');
            $("[name='login-username']").addClass('is-invalid-input');
            $('#login-username-error').addClass('is-visible');
        }
        else {
            $('#login-username-label').removeClass('is-invalid-label');
            $("[name='login-username']").removeClass('is-invalid-input');
            $('#login-username-error').removeClass('is-visible');
        }
    });
    
    $("[name='login-password']").focusin(function() {
        $('#login-password-label').removeClass('is-invalid-label');
        $('#login-password-error').removeClass('is-visible');
        $('#login-password-error2').removeClass('is-visible');
        
    });
    
    $("[name='login-password']").focusout(function() {
        var password = $("[name='login-password']").val();
        if (password == null || password == "") {
            $('#login-password-label').addClass('is-invalid-label');
            $("[name='login-password']").addClass('is-invalid-input');
            $('#login-password-error').addClass('is-visible');
        }
        else {
            $('#login-password-label').removeClass('is-invalid-label');
            $("[name='login-password']").removeClass('is-invalid-input');
            $('#login-password-error').removeClass('is-visible');
        }
    });
    
    $('#login-btn').click(function() {
        var username = $("[name='login-username']").val();
        var password = $("[name='login-password']").val();
        $.post('php/check_account.php',
            {
                username: username,
                password: password
            },
            function(data, status) {
                var response = Number(data);
                if (response == -1) {
                    $('#login-username-label').addClass('is-invalid-label');
                    $("[name='login-username']").addClass('is-invalid-input');
                    $('#login-username-error2').addClass('is-visible');
                }
                else if (response == 0) {
                    $('#login-password-label').addClass('is-invalid-label');
                    $("[name='login-password']").addClass('is-invalid-input');
                    $('#login-password-error2').addClass('is-visible');
                }
                else {
                    $.post('php/session_ids.php',
                        {
                            trigger_function: 'set_account_id',
                            selected_id: response
                        },
                        function(data, status) {
                            if (Number(data) > 0) {
                                window.location.assign('discussion.html');
                            }
                            else {
                                console.log('FAILED: storing account id in the server');
                            }
                        }
                    );
                }
            }
        );
    });
    
    
    /* REGISTER ACTIONS -------------------------------------------------------------------------------*/
    
    // Register Global Variables
    
    var email = null;
    var username = null;
    var password = null;
    var confirm = null;
    var gender = "unspecified";
    
    // Register Page Functions
    
    $("[name='email']").focusin(function() {
        $('#register-email-label').removeClass("is-invalid-label");
        $('#register-email-error').removeClass('is-visible');
    });
    
    $("[name='username']").focusin(function() {
        $('#register-username-label').removeClass('is-invalid-label');
        $('#register-username-error').removeClass('is-visible');
        email = $("[name='email']").val();
        if (email == null || email == "") {
            $('#register-email-label').addClass("is-invalid-label");
            $("[name='email']").addClass('is-invalid-input');
            $('#register-email-error').addClass('is-visible');
        }
        else {
            $('#register-email-label').removeClass("is-invalid-label");
            $("[name='email']").removeClass('is-invalid-input');
            $('#register-email-error').removeClass('is-visible');
        }
    });
    
    $("[name='password']").focusin(function() {
        $('#register-password-label').removeClass('is-invalid-label');
        $('#register-password-error').removeClass('is-visible');
        username = $("[name='username']").val();
        if (username == null || username == "") {
            $('#register-username-label').addClass("is-invalid-label");
            $("[name='username']").addClass('is-invalid-input');
            $('#register-username-error').addClass('is-visible');
        }
        else {
            $('#register-username-label').removeClass("is-invalid-label");
            $("[name='username']").removeClass('is-invalid-input');
            $('#register-username-error').removeClass('is-visible');
        }
    });
    
    $("[name='confirm']").focusin(function() {
        $('#register-confirm-label').removeClass('is-invalid-label');
        $('#register-confirm-error').removeClass('is-visible');
        password = $("[name='password']").val();
        if (password == null || password == "") {
            $('#register-password-label').addClass("is-invalid-label");
            $("[name='password']").addClass('is-invalid-input');
            $('#register-password-error').addClass('is-visible');
        }
        else {
            $('#register-password-label').removeClass("is-invalid-label");
            $("[name='password']").removeClass('is-invalid-input');
            $('#register-password-error').removeClass('is-visible');                     
        }                          
    });
    
    $("[name='confirm']").focusout(function() {
        password = $("[name='password']").val();
        confirm = $("[name='confirm']").val();
        if (password != confirm) {
            $('#register-confirm-label').addClass("is-invalid-label");
            $("[name='confirm']").addClass('is-invalid-input');
            $('#register-confirm-error').addClass('is-visible');
        }
        else {
            $('#register-confirm-label').removeClass("is-invalid-label");
            $("[name='confirm']").removeClass('is-invalid-input');
            $('#register-confirm-error').removeClass('is-visible');
        }
    });
    
    $(".gender-list .gender-item .gender-label input").focusin(function() {
        $('.gender-list .gender-item .gender-label input').attr("checked", false);
        $(this).attr("checked", true);
        gender = $(this).val();
    });
    
    $('#register-submit-btn').click(function() {
        if ($('#register-submit-btn').hasClass('disabled') == false) {
            alert(email);
            if (email == null || email == "") {
                $('#register-email-label').addClass("is-invalid-label");
                $("[name='email']").addClass('is-invalid-input');
                $('#register-email-error').addClass('is-visible');
            }
            else if (username == null || username == "") {
                $('#register-username-label').addClass("is-invalid-label");
                $("[name='username']").addClass('is-invalid-input');
                $('#register-username-error').addClass('is-visible');
            }
            else if (password == null || password == "") {
                $('#register-password-label').addClass("is-invalid-label");
                $("[name='password']").addClass('is-invalid-input');
                $('#register-password-error').addClass('is-visible');
            }
            else if (confirm == null || confirm == "") {
                $('#register-confirm-label').addClass("is-invalid-label");
                $("[name='confirm']").addClass('is-invalid-input');
                $('#register-confirm-error').addClass('is-visible');
            }
            else if (password != confirm) {
                $('#register-confirm-label').addClass("is-invalid-label");
                $("[name='confirm']").addClass('is-invalid-input');
                $('#register-confirm-error').addClass('is-visible');
            }
            else {
                /*
                    Things need to be done before changing location:
                    * create a function that will check if the email is in correct format.
                    * create a funciton that will check password characters and strength.
                */
                
                $.post('php/session_reg.php',
                    {
                        new_email: email,
                        new_username: username,
                        new_password: password,
                        new_gender: gender
                    },
                    function(data, status) {
                        //alert(data);
//                        var response = String(data);
//                        if (response != 'error') {
//                            console.log('SUCCESS: sending partial registration to the server.');
//                            window.location.assign('register2.html');       
//                        }
//                        else {
//                            console.log('FAILED: sending partial registration to the server.');
//                        }
                    }
                );  
            }
        }
        else {
            console.log('Button is disabled: Do nothing!');
        }
    });
    
    // Register2 Page Functions
    
    $('#register2-next-btn').click(function() {
        if ($(this).hasClass('disabled') == false) {
            $.post('php/insert_account.php',
                {
                    //none    
                },
                function(data, status) {
                    var response = Number(data);
                    if (response > 0) {
                        console.log('SUCCESS: inserting new account in the database.');
                        window.location.assign('login.html');
                    }
                    else {
                        console.log('FAILED: inserting new account in the database.');
                    }
                }  
            );  
        }
        else {
            console.log('Button is disabled. Do nothing.')
        }
    });
    
    $('#file-type-error-close-btn').click(function() {
        $('#file-type-error').addClass('hide');
        $('#browse-file-btn').removeClass('hide');
    });

    $('#file-size-error-close-btn').click(function() {
        $('#file-size-error').addClass('hide');
        $('#browse-file-btn').removeClass('hide');
    });
    
    // Register3 Page Functions
    
    $('.confirmation-code input').focusin(function() {
        $('#create-account').removeClass('disabled');
    });
    
    $('#create-account').click(function() {
        if ($(this).hasClass('disabled') == false) {
            if ($('.confirmation-code input').val() == null || $('.confirmation-code input').val() == "") {
                $('#confirmation-null-error').removeClass('hide');
            }
            else if ($('.confirmation-code input').val() != 'codego143') {
                $('#confirmation-wrong-error').removeClass('hide'); 
            }
            else {
                
                $.post('php/insert_account.php',
                    {
                        //none    
                    },
                    function(data, status) {
                        var response = Number(data);
                        if (response > 0) {
                            console.log('SUCCESS: inserting new account in the database.');
                            window.location.assign('login.html');
                        }
                        else {
                            console.log('FAILED: inserting new account in the database.');
                        }
                    }  
                );
            }
        }
        else {
            console.log('Button is disabled. Do nothing.')
        }
    });
    
    $('#confirmation-null-close-btn').click(function() {
        $('#confirmation-null-error').addClass('hide');
    });
    
    $('#confirmation-wrong-close-btn').click(function() {
        $('#confirmation-wrong-error').addClass('hide');
    });
    
    
    
});