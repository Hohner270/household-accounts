@extends('layouts.base')

@section('head')
    <title>Sign In</title>
@endsection

@section('content')
    <div>
        <form action="/signIn" method="post">
            @csrf
            <p>EmailAddress</p>
            <input type="text" name="email">
            {{ $errors->first('email') }}
            {{ session('accountNotFound') }}
            <p>Password</p>
            <input type="password" name="password">
            {{ $errors->first('password') }}
            <button type="submit">send</button>
        </form>
    </div>
@endsection