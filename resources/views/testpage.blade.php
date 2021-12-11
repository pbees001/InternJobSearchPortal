@extends('layouts.guest')

@section('content')
    <?php
        $res = $_GET["skill"];
        echo $res;
    ?>

@endsection
