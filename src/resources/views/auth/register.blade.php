@extends('layouts.app')

@section('content')
<div class="contact-form__content">
<div class="contact-form__heading">
<h2>会員登録</h2>
<form class="form" method="POST" action="{{ route('register') }}">
@csrf
                            <!--//名前//-->
                            <div class="form__group">
                                <div class="form__input--text" >
                                  <input id="name" type="text" class="" name="name"  required autocomplete="name" placeholder="名前">
                                </div>
                                <div class="form__error">
            @error('name')
            {{ $message }}
            @enderror
                                </div>
                            </div>

                            <!--//メールアドレス//-->
                            <div class="form__group">
                                <div class="form__input--text" >
                                  <input id="email" type="email" class="" name="email"  required autocomplete="email" placeholder="メールアドレス">
                                </div>
                                <div class="form__error">
            @error('email')
            {{ $message }}
            @enderror
                                </div>
                            </div>

                            <!---//パスワード//--->
                            <div class="form__group">
                                <div class="form__input--text" >
                                <input id="password" type="password" class="" name="password" required autocomplete="new-password" placeholder="パスワード">
                                </div>
                                <div class="form__error">
            @error('password')
            {{ $message }}
            @enderror
                                </div>
                            </div>

                            <!---//パスワード（確認用）//--->
                            <div class="form__group">
                                <div class="form__input--text" >
                                <input id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password" placeholder="確認用パスワード">
                                </div>
                                <div class="form__error">
            @error('password')
            {{ $message }}
            @enderror
                                </div>
                            </div>

                        <div class="form__group">
                                <div class="form__input--text" >
                                <button type="submit" class="submit">
                                    {{ __('会員登録') }}
                                </button>
                            </div>
                        </div>
</form>

<div class="contact-form__under">
<h3>アカウントをお持ちの方はこちらから</h3>
<a href="{{ url('login') }}">ログイン</a>
</div>

</div>
</div>

<!-- footer -->
<footer>
Atte, inc.
</footer>

@endsection
