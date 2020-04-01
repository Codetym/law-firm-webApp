$(document).ready(function() {
    $('#broshForm').submit(function(e) {
        removeFeedback();
        let errors = validateForm();
        if(errors == '') {
            return true;
        } 
        else{
            provideFeedback(errors);
            e.preventDefault();
            return false;
        }
        
    });
    
    function validateForm() {
        let errorFields = new Array();
        
        //check if required fields have content...
        if($('#name').val() == "") {
            errorFields.push('name');
        }
        
        if($('#email').val() == "") {
            errorFields.push('email');
        }
        
        if($('#phone').val() == "") {
            errorFields.push('phone');
        }
        
        if($('#msg').val() == "") {
            errorFields.push('msg');
        }
        
        if($('#password').val() == "") {
            errorFields.push('msg');
        }
            
        
        return errorFields;
    
    }
    
    function provideFeedback(incomingErrors) {
        for (var i = 0; i < incomingErrors.length; i++) {
            $('#' + incomingErrors[i]).addClass('errorClass');
            $('#' + incomingErrors[i] + 'Error').removeClass('errorFeedback');
        }
        
        $('#errorDiv').html('Errors Encountered!');
    }
    
    function removeFeedback() {
        $('#errorDiv').html('');
        $('input').each(function() {
            $(this).removeClass('errorClass');
        });
        
        $('.errorSpan').each(function() {
           $(this).addClass('errorFeedback'); 
        });
    }
    
});