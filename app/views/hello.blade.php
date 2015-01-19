<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Traducted</title>
</head>
<body>
	{{ Form::open(array('route' => 'traducir','id' => 'formulario','role'=>'form','class'=>'form-horizontal mt10')) }}
	<input type="text" name="texto" id="texto">
	{{ Form::close() }}
</body>
</html>
