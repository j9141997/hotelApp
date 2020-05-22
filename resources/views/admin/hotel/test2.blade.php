{{-- @extends('layouts.admin.app')
     admin用のフッターができたら上のやつに戻す --}}
@extends('layouts.user.app')

@section('content')
  <form action="/admin/hotel/{{$form->id}}" method="post" enctype="multipart/form-data">
    <table>
      @csrf
      @method('patch')


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
        <th>type_id</th>
        <td><input type="text" name="type_id" value="{{$form->type_id}}"></td>
      </tr>
      <tr>
        <th></th>
        <td>
          @error('type_id')
            {{$message}}
          @enderror
        </td>
      </tr>


      <tr>
        <th>postal</th>
        <td><input type="text" name="postal" value="{{$form->postal}}"></td>
      </tr>
      <tr>
        <th></th>
        <td>
          @error('postal')
            {{$message}}
          @enderror
        </td>
      </tr>


      <tr>
        <th>address</th>
        <td><input type="text" name="address" value="{{$form->address}}"></td>
      </tr>
      <tr>
        <th></th>
        <td>
          @error('address')
            {{$message}}
          @enderror
        </td>
      </tr>


      <tr>
        <th>checkin_time</th>
        <td><input type="time" name="checkin_time" value="{{substr($form->checkin_time, 0, 5)}}"></td>
      </tr>
      <tr>
        <th></th>
        <td>
          @error('checkin_time')
            {{$message}}
          @enderror
        </td>
      </tr>


      <tr>
        <th>checkout_time</th>
        <td><input type="time" name="checkout_time" value="{{substr($form->checkout_time, 0, 5)}}"></td>
      </tr>
      <tr>
        <th></th>
        <td>
          @error('checkout_time')
            {{$message}}
          @enderror
        </td>
      </tr>


      <tr>
        <th>image</th>
        <td><input type="file" name="image" value="{{$form->image}}"></td>
      </tr>
      <tr>
        <th></th>
        <td>
          @error('image')
            {{$message}}
          @enderror
        </td>
      </tr>


    </table>
    <input type="submit" value="submit">
  </form>

  <img src="/storage/{{$form->image}}">

@endsection
