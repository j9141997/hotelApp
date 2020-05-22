@extends('layouts.admin.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/admin/plan">
                        @csrf
                        @method('POST')
                        <div class="heading">
                            <h1>宿泊プラン登録</h1>
                            <p>
                                以下の項目はすべて<span>必須</span>となります。<br>
                                入力が終わりましたら、「登録する」ボタンを押してください。
                            </p>
　　　　　　　　　　　　　　　@if(count($errors) > 0)
    　　　　　　　　　　　　　　<p><span>入力に問題があります。再入力してください。</span></p>
  　　　　　　　　　　　　　　@endif
                        </div>
                        <div class="form-group row register-group">
                            <label for="hotel_id" class="">宿名</label>

                            <div class="col-md-6">
                                <select id="hotel_id" class="form-control @error('hotel_id') is-invalid @enderror" name="hotel_id"  value="{{ old('$plan->hotel_id') }}" required>
                                  <option value="0">選択して下さい</option>
                                  @foreach($hotels as $hotel)
                                    <option value="{{$hotel->id}}">{{$hotel->name}}</option>
                                  @endforeach
                                </select>
                                <p>※登録したい宿が存在しない場合は、<a href="/admin/hotel/create">こちら</a>。</p>


                                @error('hotel_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row register-group">
                            <label for="name" class="">プラン名</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('$plan->name') }}" required autocomplete="name" placeholder="例）日帰りプラン">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row register-group">
                            <label for="price" class="">金額</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('$plan->price') }}" required >

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row register-group">
                            <label for="room" class="">部屋数</label>

                            <div class="col-md-6">
                                <input id="room" type="number" class="form-control @error('room') is-invalid @enderror" name="room" value="{{ old('$plan->room') }}" required>

                                @error('room')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <button type="submit" class="complete-btn">
                                {{ __('登録する') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
