<div class="page-header-top">
    <div class="container-fluid">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="{{route('index.get')}}">
                {{Html::image('img/tjal_logo_menubar.png')}}
            </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler"></a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            @if(Auth::check())
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">

                            <span class="username username-hide-mobile">{{Auth::user()->perfil()->perfil->nome}}  (Alterar)</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>Perfis</h3>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                    @foreach (Auth::user()->perfisAtivos as $perfis)

                                        <li>
                                            <a href="{{route('alterar.perfil.get', $perfis->id)}}">
                                                <span class="from"> {{$perfis->perfil->nome}} </span>
                                            </a>

                                        </li>

                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="droddown dropdown-separator">
                        <span class="separator"></span>
                    </li>
                    <li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            {{Auth::user()->lotacao->local->nome}} (Alterar)
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>
                                    <span class="bold">Lotações disponíveis</span></h3>
                                {{--<a href="page_user_profile_1.html">view all</a>--}}
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                    @foreach (Auth::user()->locaisAtivos as $local)

                                        <li>
                                            <a href="{{route('alterar.local.get', $local->id)}}">
                                                <span class="from"> {{$local->local->nome}} </span>
                                            </a>

                                        </li>

                                    @endforeach

                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="droddown dropdown-separator">
                        <span class="separator"></span>
                    </li>
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            {{Html::image('img/avatar.png')}}
                            <span class="username username-hide-mobile">{{Auth::user()->nome}}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">

                            <li>
                                {{--<a href="{{url()->route('alterarSenha.get')}}">--}}
                                {{--<i class="icon-key"></i> Alterar Senha </a>--}}
                            </li>
                            <li>
                                <a href="{{route('logout.get')}}">
                                    <i class="icon-key"></i> Sair </a>
                            </li>
                            {{--<li>--}}
                                {{--<a href="{{url()->route('alterar.senha.get')}}">--}}
                                    {{--<i class="icon-refresh"></i> Alterar Senha </a>--}}
                            {{--</li>--}}
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
            @endif
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
</div>
