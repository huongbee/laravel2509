<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Header</h1>

@yield('content')

@yield('content-2')

<?php 

if(1<2) echo 'Dung';
else echo "sai";
?>

@if(1<2) 
    <h3>dung</h3>
@else 
    sai 
@endif

<?php
$arr = ['php', 'html', 'css'];
?>

@if(!empty($arr))
    @foreach($arr as $mang)
        {{$mang}}
    @endforeach
@else 
    Mang rong
@endif

@forelse($arr as $mang)
    {{$mang}}
@empty Mảng rỗng
@endforelse

<h1>Footer</h1>
</body>
</html>