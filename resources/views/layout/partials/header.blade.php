<header>
    <h1>{{ __('general.app_title') }}</h1>
</header>

<form method="POST" action="{{ route('locale.update') }}" style="display:inline;">
    @csrf
    <select name="locale" onchange="this.form.submit()">
        @foreach(config('app.supported_locales') as $locale)
            <option value="{{ $locale }}" @selected(app()->getLocale() === $locale)>{{ strtoupper($locale) }}</option>
        @endforeach
    </select>
</form>

@auth
    <a href="{{ route('logout') }}">{{ __('general.logout') }}</a>
@else
    <a href="{{ route('login.form') }}">{{ __('general.login') }}</a>
    <a href="{{ route('signup.form') }}">{{ __('general.register') }}</a>
@endauth
<a href="{{ route('index') }}">{{ __('general.home') }}</a>
<a href="{{ route('materials.index') }}">{{ __('general.materials') }}</a>
<a href="{{ route('budgets.index') }}">{{ __('general.budgets') }}</a>
<a href="{{ route('users.index') }}">{{ __('general.users') }}</a>
<a href="{{ route('tasks.index') }}">{{ __('general.tasks') }}</a>
<a href="{{ route('messages.index') }}">{{ __('general.messages') }}</a>

