<!DOCTYPE html>
<html>
<head>
 <title>Lihat Data</title>
</head>
<body>
@foreach($liat as $li)
 <li>{{ $li->name }}</li>
 @endforeach 
</body>
</html>