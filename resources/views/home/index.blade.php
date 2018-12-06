@extends('layouts.base')

@section('content')
    <section>
        <h2>CardLog</h2>
        <div>
            @foreach($cards as $card)
                <button class="js-button button" type="button" value="{{ $card->id()->value() }}">{{ $card->cardName()->value() }}</button>
            @endforeach
        </div>
        
        <canvas id="js-pieChart"></canvas>

        <div>
            <a href="">add card account</a>
            <a href="">past card logs</a>
        </div>
    </section>
@endsection

@section('js')
    <script src="../js/home.js"></script>
@endsection