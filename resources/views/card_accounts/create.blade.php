@extends('layouts.base')

@section('content')
    <div>
        <div>
            <form action="/cardAccounts" method="post">
                @csrf
                <P>choose a card</P>
                @foreach($cards as $card)
                    <select name="cardId">
                        <option value="{{ $card->id()->value() }}">{{ $card->cardName()->value() }}</option>
                    </select>
                @endforeach

                <p>CardAccountId</p>
                <input type="text" name="cardAccountId">

                <p>CardAccountPassword</p>
                <input type="password" name="cardAccountPassword">

                <button type="submit">send</button>
            </form>
        </div>
    </div>
@endsection

@section('js')
@endsection