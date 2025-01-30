@if (Auth::check())
    <div class="hidden sm:flex sm:items-center sm:ms-6">
        <button class="px-3 py-2 border rounded-md">
            {{ Auth::user()->name }}
        </button>

        <!-- Enllaç per a verificar correu electrònic -->
        <a href="{{ route('verification.notice') }}" class="btn btn-primary ms-2">
            {{ __('Verify Email') }}
        </a>

        <!-- Enllaç per a verificar correu electrònic amb id i hash -->
        <a href="{{ route('verification.verify', ['id' => Auth::user()->id, 'hash' => sha1(Auth::user()->email)]) }}" class="btn btn-primary ms-2">
            {{ __('Verify Email with ID and Hash') }}
        </a>

        <!-- Formulari per a enviar notificació de verificació de correu electrònic -->
        <form method="POST" action="{{ route('verification.send') }}" class="ms-2">
            @csrf
            <button type="submit" class="btn btn-primary">
                {{ __('Send Verification Email') }}
            </button>
        </form>

        <!-- Enllaç per a confirmar contrasenya -->
        <a href="{{ route('password.confirm') }}" class="btn btn-primary ms-2">
            {{ __('Confirm Password') }}
        </a>

        <!-- Formulari de logout -->
        <form method="POST" action="{{ route('logout') }}" class="ms-2">
            @csrf
            <button type="submit" class="btn btn-danger">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
@else
    <div class="hidden sm:flex sm:items-center sm:ms-6">
        <a href="{{ route('login') }}" class="btn btn-primary">
            {{ __('Login') }}
        </a>
    </div>
@endif
