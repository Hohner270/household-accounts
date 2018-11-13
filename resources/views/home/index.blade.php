@extends('layouts.base')

@section('content')
    <div>CardLog</div>
    <div>
        <button class="js-button button" type="button" value="エポス">epos</button>
        {{-- <button type="button">三井</button> --}}
        {{-- <button type="button">オリコ</button> --}}
    </div>
    <tr>									
        <th>種別（ショッピング、キャッシング、その他）</th>
        <th>ご利用年月日</th>
        <th>ご利用場所</th>
        <th>ご利用内容</th>
        <th>ご利用金額</th>
        <th>お支払金額（キャッシングでは利息を含みます）</th>
        <th>支払区分</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
@endsection

@section('js')
    <script>
        const cardButton = document.getElementByClassName('js-button');
        cardButton.addEventListener('click');
    </script>
@endsection