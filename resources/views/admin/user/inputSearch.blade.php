@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/admin/user/search/result">　{{--検索結果のページに送る--}}
                        @csrf
                        @method('POST')
                        <div class="heading">
                            <h1>会員検索</h1>
                            <p>
                                以下の項目は<span>必須</span>となります。<br>
                                入力が終わりましたら、「検索する」ボタンを押してください。
                            </p>
　　　　　　　　　　　　　　　@if(count($errors) > 0)
    　　　　　　　　　　　　　　<p><span>入力に問題があります。再入力してください。</span></p>
  　　　　　　　　　　　　　　@endif
                        </div>
                        <div class="form-group row register-group">
                            <label for="input" class="">氏名</label>

                            <div class="col-md-6">
                                <input id="input" type="text" class="form-control @error('input') is-invalid @enderror" name="input" value="{{old('input')}}" required autocomplete="input" placeholder="例）吉田純基" autofocus>

                                @error('input')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <button type="submit" class="search-btn">
                                {{ __('検索する') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
