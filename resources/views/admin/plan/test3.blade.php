{{-- @extends('layouts.admin.app')
     admin用のフッターができたら上のやつに戻す --}}
@extends('layouts.user.app')

@section('content')
  @if(count($errors) > 0)
    <ul>
      @foreach($errors->all as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  @endif


  <form action="/admin/plan/{{$form->id}}" method="post">
    <table>
      @csrf
      @method('delete')


      <tr>
        <th>hotel_id</th>
        <td>{{$form->hotel_id}}</td>
      </tr>


      <tr>
        <th>name</th>
        <td>{{$form->name}}</td>
      </tr>


      <tr>
        <th>price</th>
        <td>{{$form->price}}</td>
      </tr>


      <tr>
        <th>room</th>
        <td>{{$form->room}}</td>
      </tr>


    </table>
    <input type="submit" value="submit">
  </form>
@endsection
