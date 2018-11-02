@extends('layouts.base')

@section('head')
    <title>Sign Up</title>
@endsection

@section('content')
    <div>
        <div>
            <form action="/signUp" method="post">
                @csrf
                <P>AccountName</P>
                <input type="text" name="account_name">
                {{ $errors->first('account_name') }}

                <p>AccountEmail</p>
                <input type="email" name="email">
                {{ $errors->first('email') }}

                <p>AccountPassword</p>
                <input type="password" name="password">
                {{ $errors->first('password') }}

                <p>AccountPasswordConfirm</p>
                <input type="password" name="password_confirmation">
                {{ $errors->first('password_confirmation') }}

                <button type="submit">send</button>
            </form>
        </div>
    </div>
@endsection