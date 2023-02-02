@extends('layout')

@section('form')
<form method="POST" action="/profile">
    @csrf
    ...
</form>
@endsection
