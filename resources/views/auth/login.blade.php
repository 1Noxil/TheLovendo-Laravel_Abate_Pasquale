<x-layouts.main>



    <!-- start login section -->

    <section class="login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                    <div class="form-head">
                        <h4 class="title">Login</h4>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" type="email">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" type="password">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="check-and-pass">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-check">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <a href="{{ route('password.request') }}" class="lost-pass">Password
                                            dimenticata?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="button">
                                <button type="submit" class="btn">Accedi</button>
                            </div>
                            <div class="alt-option">
                                <span>Oppure</span>
                            </div>
                            <div class="socila-login">
                                <ul>
                                    <li><a href="{{ route('social.redirect', ['social' => 'google']) }}" class="google"><i
                                                class="lni lni-google"></i>Accedi con Google</a></li>
                                </ul>
                            </div>
                            <p class="outer-link">Non hai un account? <a href="{{ route('register') }}">Registrati
                                    ora</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end login section -->




</x-layouts.main>
