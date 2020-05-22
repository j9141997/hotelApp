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
                      <label for="" class="data-title">宿泊先</label>
                      <p>{{ $user->name }}</p>
                    </div>
                    <div class="confirm-title">
                      <label for="" class="data-title">宿泊プラン</label>
                      <p>{{ $user->postal }}</p>
                    </div>
                    <div class="confirm-title">
                      <label for="" class="data-title">チェックイン</label>
                      <p>{{ $user->address }}</p>
                    </div>
                    <div class="confirm-title">
                      <label for="" class="data-title">チェックアウト</label>
                      <p>{{ $user->tel }}</p>
                    </div>
                    <div class="confirm-title">
                      <label for="" class="data-title">部屋数</label>
                      <p>{{ $user->email }}</p>
                    </div>
                  {{ $form }}
              </div>
          </div>
      </div>
  </div>
</div>