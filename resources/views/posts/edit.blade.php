@extends('layouts.app')
@section('content')
<div id="app">
    <editpost
    :post="{{$post}}">
    </editpost>
</div>
@endsection