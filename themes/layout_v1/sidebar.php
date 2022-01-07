<div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="navigation-header" style="margin-top: 10px;"><span>Seção Home</span><i data-feather="more-horizontal"></i>
                <li class="nav-item <?=($menu === 'painel') ? 'active' : '';?>" >
                    <a class="d-flex align-items-center" href="<?=url('')?>">
                        <i data-feather="layout"></i>
                        <span class="menu-title text-truncate">Painel</span>
                    </a>
                </li>

                <li class=" navigation-header"><span>Seção Genérica</span><i data-feather="more-horizontal"></i>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="shopping-cart"></i><span class="menu-title text-truncate">Menu</span></a>
                    <ul class="menu-content">
                        <li class="has-sub" style=""><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Second Level">Menu Item</span></a>
                            <ul class="menu-content">
                                <li class="<?=($menu === 'boletosGerados') ? 'active' : '';?>">
                                    <a class="d-flex align-items-center <?=($menu === 'boletosGerados') ? 'active' : '';?>" href="<?=url('vendas/boleto_gerados');?>"
                                       data-toggle="tooltip" data-placement="right" title="" data-original-title="Boletos Gerados">
                                        <i data-feather="circle"></i>
                                        <span class="menu-item text-truncate" data-i18n="Third Level">
                                            Sub Menu Item
                                        </span>
                                    </a>
                                </li>
                                <li class="<?=($menu === 'boletosAprovados') ? 'active' : '';?>">
                                    <a class="d-flex align-items-center <?=($menu === 'boletosAprovados') ? 'active' : '';?>" href="<?=url('vendas/boleto_aprovados');?>"
                                       data-toggle="tooltip" data-placement="right" title="" data-original-title="Boletos Aprovados">
                                        <i data-feather="circle"></i>
                                        <span class="menu-item text-truncate" data-i18n="Third Level">
                                            Sub Menu Item
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>



                <li class=" navigation-header"><span>Seção Genérica</span><i data-feather="more-horizontal"></i>
                </li>

                <li class=" nav-item <?=($menu === 'leads') ? 'active' : '';?>">
                    <a class="d-flex align-items-center" href="<?=url('leads');?>">
                        <i data-feather="user"></i>
                        <span class="menu-title text-truncate">Menu Item</span>
                    </a>
                </li>

                <li class=" navigation-header"><span>Seção Genérica</span><i data-feather="more-horizontal"></i>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-plus"></i><span class="menu-title text-truncate">Menu</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href=""><i data-feather="circle"></i><span class="menu-item">Menu Item</span></a>
                        </li>
                    </ul>
                </li>

                <li class=" navigation-header"><span>Seção Perfil</span><i data-feather="more-horizontal"></i>
                </li>

                <li class="nav-item <?=($menu === 'conta') ? 'active' : '';?>">
                    <a class="d-flex align-items-center" href="<?=url('conta');?>">
                        <i data-feather="settings"></i>
                        <span class="menu-item">Minha Conta</span>
                    </a>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="<?=url('sair')?>"><i data-feather="log-out"></i><span class="menu-title text-truncate">Sair do sistema</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->