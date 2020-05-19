<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header confirm-header">
                {{ $section_title }}
              </div>
              <div class="card-body confirm-body">
                  <div class="confirm-section">
                    <div class="confirm-title">
                      <label for="" class="data-title">名前</label>
                      <p>{{ $user->name }}</p>
                    </div>
                    <div class="confirm-title">
                      <label for="" class="data-title">郵便番号</label>
                      <p>{{ $user->postal }}</p>
                    </div>
                    <div class="confirm-title">
                      <label for="" class="data-title">住所</label>
                      <p>{{ $user->address }}</p>
                    </div>
                    <div class="confirm-title">
                      <label for="" class="data-title">電話番号</label>
                      <p>{{ $user->tel }}</p>
                    </div>
                    <div class="confirm-title">
                      <label for="" class="data-title">メールアドレス</label>
                      <p>{{ $user->email }}</p>
                    </div>
                    <div class="confirm-title">
                      <label for="" class="data-title">生年月日</label>
                      <p>{{ $user->birthday }}</p>
                    </div>
                  </div>

                  {{ $form }}
              </div>
          </div>
      </div>
  </div>
</div>