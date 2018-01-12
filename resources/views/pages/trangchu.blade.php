
@extends('pages.layout') 

@section('title','Trang chu')

@section('content')
    <h2>Noi dung trang chu</h2>
    <h4>{{Auth::user()->fullname}}</h4>
@endsection
