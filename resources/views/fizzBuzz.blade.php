@extends('layouts.app')

@section('content')
    <form method="get" style="margin: 20px 0">
        <input id="fizzBuzzNumber" name="fizzBuzzNumber" type="string"><br>
        <input type="submit" value="Submit">
    </form>

    {{ $fizzBuzz }}
    <hr>
    <a href="{{ route('persons.index') }}" class="btn btn-primary">Persons</a>
@endsection
