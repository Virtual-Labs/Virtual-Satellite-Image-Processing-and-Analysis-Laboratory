<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script type="text/javascript">
	$(function(){
    $('#groups').on('change', function(){
        var val = $(this).val();
        var sub = $('#sub_groups');
        $('option', sub).filter(function(){
            if (
                 $(this).attr('data-group') === val 
              || $(this).attr('data-group') === 'SHOW'
            ) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
    $('#groups').trigger('change');
});
</script>

<script type="text/javascript">
	$(function(){
    $('#groups').on('change', function(){
        var val = $(this).val();
        var sub = $('#sub_groups1');
        $('option', sub).filter(function(){
            if (
                 $(this).attr('data-group') === val 
              || $(this).attr('data-group') === 'SHOW'
            ) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
    $('#groups').trigger('change');
});
</script>
</head>
<body>
<select id="groups">
    <option value='America'>America</option>
    <option value='Europe'>Europe</option>
    <option value='Asia'>Asia</option>
<select>
    
<select id="sub_groups">
    <option data-group='SHOW' value='0'>-- Select --</option>
    <option data-group='America' value='Argentina'>Argentina</option>
    <option data-group='America' value='Brazil'>Brazil</option>
    <option data-group='America' value='Chile'>Chile</option>
    <option data-group='Europe' value='Italy'>Italy</option>
    <option data-group='Europe' value='France'>France</option>
    <option data-group='Europe' value='Spain'>Spain</option>
    <option data-group='Asia' value='China'>China</option>
    <option data-group='Asia' value='Japan'>Japan</option>
<select>

<select id="sub_groups1">
    <option data-group='SHOW' value='0'>-- Select --</option>
    <option data-group='America' value='Argentina'>Argentina</option>
    <option data-group='America' value='Brazil'>Brazil</option>
    <option data-group='America' value='Chile'>Chile</option>
    <option data-group='Europe' value='Italy'>Italy</option>
    <option data-group='Europe' value='France'>France</option>
    <option data-group='Europe' value='Spain'>Spain</option>
    <option data-group='Asia' value='China'>China</option>
    <option data-group='Asia' value='Japan'>Japan</option>
<select>
</body>
</html>