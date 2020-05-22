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


  <form action="/admin/hotel/{{$form->id}}" method="post">
    <table>
      @csrf
      @method('delete')


      <tr>
        <th>name</th>
        <td>{{$form->name}}</td>
      </tr>


      <tr>
        <th>type_id</th>
        <td>{{$form->type_id}}</td>
      </tr>


      <tr>
        <th>postal</th>
        <td>{{$form->postal}}</td>
      </tr>


      <tr>
        <th>address</th>
        <td>{{$form->address}}</td>
      </tr>


      <tr>
        <th>checkin_time</th>
        <td>{{substr($form->checkin_time, 0, 5)}}</td>
      </tr>


      <tr>
        <th>checkout_time</th>
        <td>{{substr($form->checkout_time, 0, 5)}}</td>
      </tr>


      <tr>
        <th>image</th>
        <td>{{$form->image}}</td>
      </tr>


    </table>
    <input type="submit" value="submit">
  </form>
@endsection
