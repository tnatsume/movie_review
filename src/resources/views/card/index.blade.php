@extends('layouts.app')


@section('content')
<div class="namecard">
        <p class="name">
            <span>名前</span>
            <input type="text" name="personal_name" id="personal_name">
        </p>
        <span class="phonetic">
            <span>名前 仮名</span>
            <input type="text"name="personal_name_kana" id=personal_name_kana"">
        </span>

        <span class="phonetic">
            <span>名前 英語</span>
            <input type="text"name="personal_name_en" id="personal_name_en">
        </span>

        <img src="cat.png" alt="ねこちゃん">

        <button id="card_create_button">送信</button>
    </div>
@endsection