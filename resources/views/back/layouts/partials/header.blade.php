<div class="container">
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a href="{{config('app.url')}}" class="nav-link">{{__('Strona główna')}}</a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.{module}.index', ['module' => 'users'])}}" class="nav-link">{{_('Użytkownicy')}}</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">{{_('Memy')}}</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">{{_('Wyloguj się')}}</a>
        </li>
    </ul>
</div>
