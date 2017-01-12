$(document).ready(function() {
    
    initializeSession();
    
    function initializeSession() {
        
        $.post('php/session_init.php',
            {
                // none
            },
            function(data, status) {
                var response = String(data);
                if (response != 'error') {
                    console.log('Session variables is initialized to null');
                }
                else {
                    console.log('Something wrong in initializing session variables.');
                }
            }
        );
    }
    
});