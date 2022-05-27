<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/logo-small.png">
            </div>
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            {{ __('ANSEZ') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'dashboard') }}">
                    <i class="fa-solid fa-house"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'user' || $elementActive == 'profile' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="{{ $elementActive == 'user' || $elementActive == 'profile' ? 'true' : 'false' }}" href="#laravelExamples"
                class="{{ $elementActive == 'user' || $elementActive == 'profile' ? '' : 'collapsed' }}">
                    <i class="fa-solid fa-users"></i>
                    <p>Usuarios<b class="caret"></b>
                    </p>
                </a>
                <div class="{{ $elementActive == 'user' || $elementActive == 'profile' ? 'show' : '' }} collapse" id="laravelExamples">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'profile' ? 'active' : '' }}">
                            <a href="{{ route('profile.edit') }}">
                                <span class="sidebar-mini-icon">{{ __('P') }}</span>
                                <span class="sidebar-normal">{{ __('Mi perfil') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'user' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'user') }}">
                                <span class="sidebar-mini-icon">{{ __('AU') }}</span>
                                <span class="sidebar-normal">{{ __('Administar usuarios') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="{{ $elementActive == 'notifications' ? 'active' : '' }}">
                <a href="{{ route('doctor.index', 'doctors') }}">
                    <i class="fa-solid fa-user-doctor"></i>
                    <p>Doctores</p>
                </a>
            </li>

            <li class="{{ $elementActive == 'map' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'map') }}">
                    <i class="fa-solid fa-file-waveform"></i>
                    <p>{{ __('Citas') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'esp' ? 'active' : '' }}">
                <a href="{{ route('especialidad.index', 'esp') }}">
                    <i class="nc-icon nc-badge"></i>
                    <p>{{ __('Especialidades') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
