<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1"
     m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
    <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
        <li class="m-menu__item " aria-haspopup="true">
            <a href="" class="m-menu__link ">
                <i class="m-menu__link-icon flaticon-line-graph"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
											<span class="m-menu__link-text">Home</span>

                    </span>
                </span>
            </a>
        </li>
        <li class="m-menu__section ">
            <h4 class="m-menu__section-text">Menu</h4>
            <i class="m-menu__section-icon flaticon-more-v3"></i>
        </li>
        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
            <a href="javascript:;" class="m-menu__link m-menu__toggle">
                <i class="m-menu__link-icon flaticon-share"></i>
                <span class="m-menu__link-text">Auxiliares</span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu ">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item " aria-haspopup="true">
                        <a href="{{route('enterprise.typemenu.list.get')}}" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">Tipo de Cardápio</span>
                        </a>
                    </li>

                    <li class="m-menu__item " aria-haspopup="true">
                        <a href="{{route('enterprise.accompanying.list.get')}}" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">Acompanhamentos</span>
                        </a>
                    </li>
                    <li class="m-menu__item " aria-haspopup="true">
                        <a href="{{route('enterprise.protein.list.get')}}" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">Proteínas</span>
                        </a>
                    </li>

                    <li class="m-menu__item " aria-haspopup="true">
                        <a href="{{route('enterprise.feedstock.list.get')}}" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">Insumo</span>
                        </a>
                    </li>
                    <li class="m-menu__item " aria-haspopup="true">
                        <a href="{{route('enterprise.supplier.list.get')}}" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">Fornecedor</span>
                        </a>
                    </li>
                    <li class="m-menu__item " aria-haspopup="true">
                        <a href="{{route('enterprise.brand.list.get')}}" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">Marca</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="m-menu__item " aria-haspopup="true">
            <a href="{{route('enterprise.customer.list.get')}}" class="m-menu__link ">
                <i class="m-menu__link-icon flaticon-users"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">Clientes</span>
                    </span>
                </span>
            </a>
        </li>
        <li class="m-menu__item " aria-haspopup="true">
            <a href="{{route('enterprise.menu.list.get')}}" class="m-menu__link ">
                <i class="m-menu__link-icon flaticon-menu-1"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">Cardápio</span>
                    </span>
                </span>
            </a>
        </li>
        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
            <a href="javascript:;" class="m-menu__link m-menu__toggle">
                <i class="m-menu__link-icon flaticon-cart"></i>
                <span class="m-menu__link-text">Pedidos</span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu ">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item " aria-haspopup="true">
                        <a href="{{route('enterprise.order.create.get')}}" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">Novo Pedido</span>
                        </a>
                    </li>
                    <li class="m-menu__item " aria-haspopup="true">
                        <a href="{{route('enterprise.order.list.get')}}" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">Pedidos Realizados</span>
                        </a>
                    </li>

                </ul>
            </div>
        </li>
        {{--<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">--}}
            {{--<a href="javascript:;" class="m-menu__link m-menu__toggle">--}}
                {{--<i class="m-menu__link-icon flaticon-business"></i>--}}
                {{--<span class="m-menu__link-text">Compras</span>--}}
                {{--<i class="m-menu__ver-arrow la la-angle-right"></i>--}}
            {{--</a>--}}
            {{--<div class="m-menu__submenu ">--}}
                {{--<span class="m-menu__arrow"></span>--}}
                {{--<ul class="m-menu__subnav">--}}
                    {{--<li class="m-menu__item " aria-haspopup="true">--}}
                        {{--<a href="{{route('enterprise.typemenu.list.get')}}" class="m-menu__link ">--}}
                            {{--<i class="m-menu__link-bullet m-menu__link-bullet--dot">--}}
                                {{--<span></span>--}}
                            {{--</i>--}}
                            {{--<span class="m-menu__link-text">Nova compra</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="m-menu__item " aria-haspopup="true">--}}
                        {{--<a href="{{route('enterprise.menu.list.get')}}" class="m-menu__link ">--}}
                            {{--<i class="m-menu__link-bullet m-menu__link-bullet--dot">--}}
                                {{--<span></span>--}}
                            {{--</i>--}}
                            {{--<span class="m-menu__link-text">Compras Realizadas</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}

                {{--</ul>--}}
            {{--</div>--}}
        {{--</li>--}}
        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
            <a href="javascript:;" class="m-menu__link m-menu__toggle">
                <i class="m-menu__link-icon flaticon-line-graph"></i>
                <span class="m-menu__link-text">Relatórios</span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu ">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item " aria-haspopup="true">
                        <a href="{{route('enterprise.reports.sale.todo.get')}}" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">Compras a fazer</span>
                        </a>
                    </li>


                </ul>
            </div>
        </li>

    </ul>
</div>