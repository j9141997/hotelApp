{{-- @extends('layouts.admin.app')
     admin用のフッターができたら上のやつに戻す --}}
@extends('layouts.user.app')

@section('content')
  <form action="/admin/hotel" method="post" enctype="multipart/form-data">
    <table>
      @csrf


      <tr>
        <th>name</th>
        <td><input type="text" name="name"></td>
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
        <td><input type="text" name="type_id"></td>
      </tr>


      <tr>
        <th>postal</th>
        <td><input type="text" name="postal"></td>
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
        <td><input type="text" name="address"></td>
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
        <td><input type="time" name="checkin_time"></td>
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
        <td><input type="time" name="checkout_time"></td>
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
        <td><input type="file" name="image"></td>
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
@endsection
