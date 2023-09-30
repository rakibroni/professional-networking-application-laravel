
<div>
  <div id="jobs_login" class="container" style="margin-top: 5%;">
    <div class="row" style="max-width: 1158px !important;">
      <div class="row">

        <div class="col-8 col-md-4" style="text-align: center;margin:auto"><img style="margin:auto;width:200px"
            src="/images/schrift.svg"></div>
      </div>
      <div class="row">

        <div class="col-8 col-md-4 mt-3 mb-2 "
          style="text-align: center;margin:auto;letter-spacing: 0.025em;color:#23180C">
          Wir verbinden passgenau Talente mit Arbeitsgebern!</div>
      </div>

      <div style="margin: auto;" class=" mb-3 mt-4 col-md-4  px-3 px-md-4 pb-4 pt-md-4 pt-3  shadowloginpage">

        <div id="login_section">
          @auth
            Authentifiziert
          @endauth
          <h4 class="my-3 LoginTextInnerBox1 " style="font-weight: 500;">Login</h4>

          <div id="login_error" class="text-danger my-3">

          </div>




          <div class="mb-3">
            <label for="lastname" class="form-label">E-Mail</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
              value="{{ old('email') }}">

            <div class="text-danger" id="email_error"> </div>
          </div>

          <div class="mb-0">
            <label for="password" class="form-label">Passwort</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
              name="password">

            <div class="text-danger" id="password_error"></div>
          </div>
          <style>
            .forgot-password:hover {
              text-decoration: underline;
              cursor: pointer;
            }

          </style>
          <div class="mb-2 mt-1 text-primary forgot-password invisible" onclick="prepareForgotPasswordMail()"
            style="font-size: 14px">Passwort vergessen?</div>


          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
            <label class="form-check-label" for="exampleCheck1">Eingeloggt bleiben</label>
          </div>
          <button id="login_btn" onclick="jobsLogin()" type="submit" style="height: 38px !important"
            class="mt-4 btn w-100 btn-primary LoginButtonInnerBox1 jobs-bg">
            <div id="login_btn_spinner" class="d-none spinner-border text-primary cura-spinner" role="status">
              <span class="visually-hidden">Loading...</span>
            </div><span id="login_btn_text">Einloggen</span>
          </button>
          <div class="row">

          </div>

        </div>


        {{-- <div id="reset_password_section" class="d-none">
        <div class="d-flex justify-content-between">
          <div><img class="me-2  back-button " style="margin-top: 3px" onclick="backToLogin()"
              src="{{ asset('images/back.svg') }}" alt="" style="height: 20px; width: 20px">
          </div>
          <div class="fw-600">Passwort zurücksetzen</div>
          <img class="invisible me-2 back-button " onclick="backToLogin()" src="{{ asset('images/back.svg') }}"
            alt="" style="height: 20px; width: 20px">
        </div>
        <h4 class="my-3 text-center" style="font-weight: 500;"> </h4>
        <div class="text-secondary h6 mb-2 unselectable" style="font-weight: 400">
          Gib deine E-Mail-Adresse an, klicke auf
          "E-Mail erhalten"
          und wir schicken dir einen Link, über den du dein Passwort zurücksetzen kannst.
        </div>

        @if (session('status'))
          <div class="text-danger my-3">
            {{ session('status') }}
          </div>
        @endif

        @csrf
        <div class="mb-3">
          <div id="send_section">
            <label for="lastname" class="form-label">E-Mail</label>
            <input type="email" name="email" class="form-control" id="reset_mail" value="{{ old('email') }}">


            <div id="reset_email_error" class="text-danger"></div>

            <button onclick="sendResetPasswordMail()"
              class="mt-3 w-100 btn btn-primary LoginButtonInnerBox1 jobs-bg">E-Mail
              erhalten</button>
          </div>
          <div id="success_section">
            <div class="text-center mt-5" id="success_section_text">
              <img class="my-2" src="{{ asset('images/CheckOrange.svg') }}" alt="">
              <div> Wir haben eine E-mail an <span id="sent_to_email" class="fw-600"></span> gesendet. </div>

            </div>
          </div>
        </div>

      </div>


      <div id="set_new_password_section" class="d-none">
        <h4 class="my-3 LoginTextInnerBox1 " style="font-weight: 500;">Passwort zurücksetzen</h4>

        <div class="mb-3">
          <label for="lastname" class="form-label">Passwort</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror"
            autocomplete="new-password" id="new_password">


          <div class="text-danger d-none" id="new_password_error">.</div>

        </div>

        <div class="mb-0">
          <label for="password" class="form-label">Passwortbestätigung</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation"
            name="password">



          <div class="text-danger d-none" id="password_confirmation_error">.</div>

        </div>
        <style>
          .forgot-password:hover {
            text-decoration: underline;
            cursor: pointer;
          }

        </style>

        <button id="save_password_btn" onclick="saveNewPassword()" type="submit"
          class="mt-4 btn w-100  btn-warning LoginButtonInnerBox1">
          <div id="save_password_btn_spinner" class="d-none spinner-border text-primary cura-spinner" role="status">
            <span class="visually-hidden">Loading...</span>
          </div><span id="save_password_btn_text">Speichern</span>
        </button>
        <div class="row">

        </div>

      </div>

      <div id="password_change_success" class="">
        <div class=" text-center mt-3"
        id="password_change_success_inner">
        Passwort erfolgreich geändert! <img class="ms-2" src="{{ asset('images/CheckOrange.svg') }}"
          style="width: 15px; height: 15px" alt="">
      </div>
      <div class="text-center">
        <div class="pointer-on-hover underline-on-hover text-primary p-3" onclick="backToLoginFromPasswordChange()">
          Zurück zum Login</div>
      </div> --}}
      </div>
    </div>
  </div>
</div>
