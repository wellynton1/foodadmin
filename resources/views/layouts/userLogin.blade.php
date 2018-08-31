<li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
        <span>{{Auth::user()->perfil()->perfil->nome}}(Alterar)</span>
    </a>
    @if(count(Auth::user()->perfisAtivos)>0)

        <ul class="dropdown-menu">
            <li>
                <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
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
    @endif

</li>

<li class="dropdown dropdown-user dropdown-dark">
    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
        {{Html::image('img/avatar.png')}}
        <span class="username username-hide-mobile">{{Auth::user()->nome}}</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-default">

        {{-- <li class="divider"> </li> --}}
        {{--<li>--}}
        {{--<a href="{{route('senha.mudar.get')}}">--}}
        {{--<i class="icon-lock"></i> Alterar Senha </a>--}}
        {{--</li>--}}
        <li>
            <a href="{{route('logout.get')}}">
                <i class="icon-key"></i> Sair </a>
        </li>
    </ul>
</li>
