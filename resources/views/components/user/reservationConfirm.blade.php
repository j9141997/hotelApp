<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body confirm-body">
          <div class="heading">
            {{ $heading }}
          </div>
          <div class="form-group row register-group">
            <label for="reservation-hotel">宿泊先</label>
            <div class="col-md-6">
                {{ $reservation->plan->hotel->name }}
            </div>
          </div>
          <div class="form-group row register-group">
            <label for="reservation-plan">宿泊プラン</label>
            <div class="col-md-6">
                {{ $reservation->plan->name }}
            </div>
          </div>
          <div class="form-group row register-group">
            <label for="reservation-checkin">チェックイン</label>
            <div class="col-md-6">
                {{ $reservation->checkin_day }}
            </div>
          </div>
          <div class="form-group row register-group">
            <label for="reservation-plan">チェックアウト</label>
            <div class="col-md-6">
                {{ $reservation->checkout_day }}
            </div>
          </div>
          <div class="form-group row register-group">
            <label for="reservation-plan">部屋数</label>
            <div class="col-md-6">
                {{ $reservation->count }}室
            </div>
          </div>
          {{ $form }}
        </div>
      </div>
    </div>
  </div>
</div>