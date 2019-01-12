
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body> 
<div class="container">
  <h1>Bootstrap Popover - Live Email Validation</h1>
  <form class="form-horizontal col-sm-8">
    <div class="form-group"><label>Name</label><input type="text" class="form-control name"></div>
    <div class="form-group has-error"><label>E-Mail</label><input type="text" class="form-control email" data-placement="top" data-trigger="manual" data-content="Must be a valid e-mail address (user@gmail.com)"></div>
    <div class="form-group"><button type="submit" class="btn btn-default">Submit</button></div>
  </form>
  
</div>
</body>
</html>

<script>
$.fn.goValidate = function() {
    var $form = this,
        $inputs = $form.find('input:text, input:password');
  
    var validators = {
        email: {
            regex: /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/
        }
    };
    var validate = function(klass, value) {
        var isValid = true,
            error = '';
            
        if (!value && /required/.test(klass)) {
            error = 'This field is required';
            isValid = false;
        } else {
            klass = klass.split(/\s/);
            $.each(klass, function(i, k){
                if (validators[k]) {
                    if (value && !validators[k].regex.test(value)) {
                        isValid = false;
                        error = validators[k].error;
                    }
                }
            });
        }
        return {
            isValid: isValid,
            error: error
        }
    };
    var showError = function($input) {
        var klass = $input.attr('class'),
            value = $input.val(),
            test = validate(klass, value);
      
        $input.removeClass('invalid');
        
        if (!test.isValid) {
            $input.addClass('invalid');
            if(typeof $input.data("shown") == "undefined" || $input.data("shown") == false){
               $input.popover('show');
            }
            
        }
      	else {
        	$input.popover('hide');
            $input.parent().removeClass('has-error').addClass('has-success');
      	}
    };
   
    $inputs.keyup(function() {
        showError($(this));
    });
  
    $inputs.on('shown.bs.popover', function () {
  		$(this).data("shown",true);
	});
  
    $inputs.on('hidden.bs.popover', function () {
  		$(this).data("shown",false);
	});
  
    $form.submit(function(e) {
      
        $inputs.each(function() {
          if ($(this).is('.required')) {
            //showError($(this)); /* rem comment to enable initial display of validation rules */
          }
    	});
      
      
        if ($form.find('input.invalid').length) {
            e.preventDefault();
            alert('The form does not validate!');
        }
    });
    return this;
};



$('form').goValidate();
</script>