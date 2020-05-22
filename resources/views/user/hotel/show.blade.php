@extends('layouts.user.app')
@section('content')
    <article>
      <div class="mx-5">
        <div class="container mx-5">
          <h2 class="ml-5 minititle3">宿の詳細</h2>
            <section>
              <div class="row ml-5 item-container">
                <div class="col-md-3"><img src="https://fotopus.com/neko/images/top/neko_magazine04.jpg" alt="" class="ml-5"></div>
                  <div class="col-md-9 detail">
                    <div class="under">
                      <div class="mx-2 ditail2">
                        <span class="title">吉田旅館</span>
                        <span class="hoteltype">旅館</span>
                      </div>
                    </div>
                    <P class="mx-2">123-4444<br>
                      東京都千代田区1－1<br>
                      チェックイン　15：00　チェックアウト　10：00
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </section>

      <div class="mx-5">
        <div class="container mx-5 mb-4">
            <h2 class="ml-5 minititle3">plan_name</h2>
              <section>
                <div class="under ml-5"></div>
                  <div class="ml-5 text-right">
                    <span class="mr-5 font1">料金　￥16,000</span>
                    <span class="mr-2 font1">残り3部屋</span>
                    <span class=""><input type="submit" class="button1" value="予約する" onclick="location.href='/'"></span>
                </div>
              </section>
            </div>
          </div>


          <div class="mx-5">
            <div class="container mx-5">
              <section class="row">
                <div class="col-md-2 minititle1 text-center ml-5">口コミ</div>
              </section>

              <section>
                <div class="row ml-5 item-container">
                  <div class="mx-4 py-4">
                    <p>testtesttesttesttesttesttesttesttesttesttesttesttest</p>
                  </div>
                </div>
              </section>
            </div>
          </div>

      <div class="mx-5">
        <div class="container mx-5">
          <section class="row">
            <div class="col-md-2 minititle1 text-center ml-5">口コミの投稿</div>
              <div class="container mx-5">
                  <textarea  name="review" cols="150" rows="5" maxlength="250" class="review-textarea"></textarea>
                  <div class="text-right">
                  <button class="button1" type="submit">投稿する</button>
                </div>
              </div>
            </div>
          </div>
      </section>
    </article>
  @endsection
