<x-guest-layout>
    <x-auth-card>

        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure>
                            <img src="images/logo-sma.png" style="height: 250px" alt="sing up image" />
                            <h3>Sistem Pendukung Kepututsan Penerimaan Beasiswa Kurang Mampu</h3>

                        </figure>
                    </div>

                    <div class="signin-form">
                        <h2>Sign In</h2>
                        <p>Login menggunakan akun yang sudah didaftarkan oleh pihak sekolah.</p>
                        <br>
                        <p>
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        </p>
                        <form method="POST" action="{{ route('login') }}" class="register-form" id="login-form">
                            @csrf
                            <div class="form-group">
                                <label for="email" :value="__('Email')"><i
                                        class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" type="email" name="email" :value="old('email')" required
                                    autofocus />
                            </div>
                            <div class="form-group">
                                <label for="password" :value="__('Password')"><i class="zmdi zmdi-lock"></i></label>
                                <input id="password" class="block mt-1 w-full" type="password" name="password" required
                                    autocomplete="current-password" />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit"
                                    value="Masuk" />
                            </div>
                        </form>
                    </div>
                </div>
        </section>
    </x-auth-card>
</x-guest-layout>
