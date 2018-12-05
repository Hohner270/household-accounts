@extends('layouts.base')

@section('content')
    <section>
        <h2>CardLog</h2>
        <div>
            @foreach($cards as $card)
                <button class="js-button button" type="button" value="{{ $card->id()->value() }}">{{ $card->cardName()->value() }}</button>
            @endforeach
        </div>

        <table border="1">
            <h2>Current Month Card Logs</h2>
            <thead>
                <th>種別</th>
                <th>ご利用年月日</th>
                <th>ご利用場所</th>
                <th>ご利用内容</th>
                <th>ご利用金額</th>
                <th>お支払金額（キャッシングでは利息を含みます）</th>
                <th>支払区分</th>
            </thead>
            <tbody>
                <div>{{ $currentMonthCardLogs->total() . '円' }}</div>
                @foreach($currentMonthCardLogs->collect() as $cardlog)
                    <tr>
                        <td>{{ $cardlog->storeName()->value() }}</td>
                        <td>{{ $cardlog->usedDate()->value() }}</td>
                        <td>{{ $cardlog->usedPlace()->value() }}</td>
                        <td>{{ $cardlog->usedContent()->value() }}</td>
                        <td>{{ $cardlog->usedPrice()->value() }}</td>
                        <td>{{ $cardlog->payment()->value() }}</td>
                        <td>{{ $cardlog->paymentTimes()->value() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <table border="1">
            <h2>Next Month Card Logs</h2>
            <div>
                <button>update</button>
            </div>
            <thead>
                <th>種別</th>
                <th>ご利用年月日</th>
                <th>ご利用場所</th>
                <th>ご利用内容</th>
                <th>ご利用金額</th>
                <th>お支払金額（キャッシングでは利息を含みます）</th>
                <th>支払区分</th>
            </thead>
            <tbody>
                <div>{{ $nextMonthCardLogs->total() . '円' }}</div>
                @foreach($nextMonthCardLogs->collect() as $cardlog)
                    <tr>
                        <td>{{ $cardlog->storeName()->value() }}</td>
                        <td>{{ $cardlog->usedDate()->value() }}</td>
                        <td>{{ $cardlog->usedPlace()->value() }}</td>
                        <td>{{ $cardlog->usedContent()->value() }}</td>
                        <td>{{ $cardlog->usedPrice()->value() }}</td>
                        <td>{{ $cardlog->payment()->value() }}</td>
                        <td>{{ $cardlog->paymentTimes()->value() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            <a href="">add card account</a>
            <a href="">past card logs</a>
        </div>
    </section>
@endsection

@section('js')
    <script>
        button = document.getElementByClassName('js-button');
        button.addEventListener('click');
    </script>
@endsection