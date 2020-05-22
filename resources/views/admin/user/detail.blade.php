{{-- @extends('layouts.admin.app')
     admin用のフッターができたら上のやつに戻す --}}
@extends('layouts.admin.app')

@section('content')
  <div class="user-detail-content">
    <div id="user-detail-subtitle">会員情報詳細</div>
    <div class="user-detail-table">
      <table rules="rows">
        <tr><th></th><td></td></tr>
        <tr><th>お名前</th><td>{{$item->name}}</td></tr>
        <tr><th>郵便番号</th><td>{{'〒' . substr($item->postal, 0, 3) . '-' . substr($item->postal, 3)}}</td></tr>
        <tr><th>住所</th><td>{{$item->address}}</td></tr>
        <tr><th>電話番号</th><td>{{substr($item->tel, 0, 3) . '-' . substr($item->tel, 3, 4) . '-' . substr($item->tel, 7)}}</td></tr>
        <tr><th>メールアドレス</th><td>{{$item->email}}</td></tr>
        <tr><th>誕生日</th><td>{{date('Y年m月d日', strtotime($item->birthday))}}</td></tr>
        <tr><th></th><td></td></tr>
      </table>
    </div>
    <div class="user-detail-btn">
      <input type="submit" id="user-detail-btn-destroy" onclick="location.href='{{$item->id}}/destroy/confirm'" value="退会">
    <input type="submit" id="user-detail-btn-edit" onclick="location.href='{{$item->id}}/edit'" value="変更">
    </div>
  </div>
@endsection
