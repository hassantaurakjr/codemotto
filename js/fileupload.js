/*
*   SIMPLE FILE UPLOAD SCRIPT   
*   Requirements: You need a button that will trigger the html tag hidden input type file, 
*   then execute the function that will upload the file to the server.
*/ 

$(document).ready(function() {
    
    var dataFile = null;
    var formData = null;
    var filename = null;

    // Visible button
    $('#browse-file-btn').click(function() {
        $("[name='file']").click();
    });

    // Invisible input 
    $("[name='file']").change(function() {
        datafile = this.files[0];
        var name = datafile.name;
        var size = datafile.size;
        var type = datafile.type;

        if (type != 'image/jpg' && type != 'image/png' && type != 'image/jpeg') {
            $('#file-type-error').removeClass('hide');
            $('#browse-file-btn').addClass('hide');
        }
        else if (size > 51200) {
            $('#file-size-error').removeClass('hide');
            $('#browse-file-btn').addClass('hide');
        }
        else {
            $(this).parent().submit();                
        }
    }); 

    // Form is necessary
    $("[name='file']").parent().on('submit', uploadFile);

    // Upload event 
    function uploadFile(event) {

        // Prevent the default behavior of HTML5 form
        event.preventDefault();

        formData = new FormData($(event.target)[0]);

        $.ajax({
            url: "php/upload_file.php",
            type: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data != "error") {
                    filename = data;
                    var location = 'admin/user-avatar/';
                    $('.register-avatar').attr("src", location + filename);
                    console.log('SUCCESS: avatar preview changed.');
                    storeFileDir(location + filename);
                }
                else {
                    console.log('FAILED: sending file data in the server.');
                }
            }
        }); 
    }

    function storeFileDir(avatar) {

        $.post('php/session_reg2.php',
            {
                avatar: avatar
            },
            function(data, status) {
                var response = String(data);
                if (response != 'error') {
                    console.log('SUCCESS: storing filename in the server.');
                    $('#register2-next-btn').removeClass('disabled');
                }
                else {
                    console.log('FAILED: storing filename in the server.');
                }
            }
        );
    }

});