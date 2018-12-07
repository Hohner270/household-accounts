@extends('layouts.base')

@section('content')
    <section>
        <h2>CardLog</h2>
        <div>
            @foreach($cards as $card)
                <button id="js-button" class="button" type="button" value="{{ $card->id()->value() }}">{{ $card->cardName()->value() }}</button>
            @endforeach
        </div>
        
        <div>
            <canvas id="js-pieChart"></canvas>
            <div id="js-totalPayment"></div>
            <div>
                <button id="js-updateButton" class="button">Update</button>
            </div>
        </div>


    </section>
@endsection

@section('js')
    <script src="../js/home.js"></script>
@endsection