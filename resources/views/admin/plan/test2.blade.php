{{-- @extends('layouts.admin.app')
     admin用のフッターができたら上のやつに戻す --}}
@extends('layouts.user.app')

@section('content')
  <form action="/admin/plan/{{$form->id}}" method="post">
    <table>
      @csrf
      @method('patch')


      <tr>
        <th>hotel_id</th>
        <td><input type="text" name="hotel_id" value="{{$form->hotel_id}}"></td>
      </tr>
      <tr>
        <th></th>
        <td>
          @error('hotel_id')
            {{$message}}
          @enderror
        </td>
      </tr>


      <tr>
        <th>name</th>
        <td><input type="text" name="name" value="{{$form->name}}"></td>
      </tr>
      <tr>
        <th></th>
        <td>
          @error('name')
            {{$message}}
          @enderror
        </td>
      </tr>


      <tr>
        <th>price</th>
        <td><input type="text" name="price" value="{{$form->price}}"></td>
      </tr>
      <tr>
        <th></th>
        <td>
          @error('price')
            {{$message}}
          @enderror
        </td>
      </tr>


      <tr>
        <th>room</th>
        <td><input type="text" name="room" value="{{$form->room}}"></td>
      </tr>
      <tr>
        <th></th>
        <td>
          @error('room')
            {{$message}}
          @enderror
        </td>
      </tr>


    </table>
    <input type="submit" value="submit">
  </form>
@endsection
