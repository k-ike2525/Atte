@extends('layouts.app')

@section('content')
<div class="contact-form_content">
<div class="contact-form_heading">
<h1>ログイン</h1>
<form class="form" method="POST" action="{{ route('login') }}">
@csrf

                        <!--//メールアドレス//-->
                        <div class="form_group">
                            <div class="form_input--text">
                                <input id="email" type="email" class="" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="メールアドレス" autofocus>

                                <!--バリデーション機能を実装したら記述します。-->
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!---//パスワード//--->
                        <div class="form_group">
                            <div class="form_input--text">
                                <input id="password" type="password" class="" name="password" required autocomplete="current-password" placeholder="パスワード">

                                <!--バリデーション機能を実装したら記述します。-->
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form_group">
                            <div class="">
                                <button type="submit" class="btn_login">
                                    {{ __('ログイン') }}
                                </button>


<div class="contact-form_under">
<h3>アカウントをお持ちでない方はこちらから</h3>
<a href="{{ url('register') }}">会員登録</a>
</div>


                            </div>
                        </div>
                    </form>
                </div>
</div>
</div>

    <!-- footer -->
    <footer>
      Atte, inc.
    </footer>

@endsection
