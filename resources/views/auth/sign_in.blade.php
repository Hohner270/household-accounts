@extends('layouts.base')

@section('head')
    <title>Sign In</title>
@endsection

@section('content')
    <div>
        <form action="/signIn" method="post">
            <p>AccountName</p>
            <input type="text" name="account_name">
            <p>Password</p>
            <input type="password" name="password">
        </form>
    </div>
@endsection