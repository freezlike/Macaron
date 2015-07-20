<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <!-- add "navbar-no-scroll" class to disable the scrolling of the sidebar menu -->
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler hidden-phone">
                </div>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            </li>
            <div class="clear"></div>
            <li <?php echo ($this->params['action'] === 'home' && $this->params['controller'] === 'pages') ? 'class="start active "' : ''; ?>>
                <a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'home')); ?>">
                    <i class="fa fa-home"></i>
                    <span class="title">
                        Dashboard
                    </span>
                    <span <?php echo ($this->params['action'] === 'home' && $this->params['controller'] === 'pages') ? 'class="selected"' : 'arrow'; ?>></span>
                </a>
            </li>
            <?php if ($this->params['controller'] === 'stocks' && $this->params['action'] === 'edit'): ?>
                <li class="start active ">
                <?php elseif ($this->params['controller'] === 'stocks' && $this->params['action'] === 'index'): ?>
                <li class="start active ">
                <?php else: ?>
                <li>
                <?php endif; ?>
                <a href="javascript:;">
                    <i class="fa fa-tags"></i>
                    <span class="title">
                        Gestion Stock
                    </span>
                    <?php if ($this->params['controller'] === 'stocks' && $this->params['action'] === 'edit'): ?>
                        <span class="selected"></span>
                    <?php elseif ($this->params['controller'] === 'stocks' && $this->params['action'] === 'index'): ?>
                        <span class="selected"></span>
                    <?php else: ?>
                        <span class="arrow"></span>
                    <?php endif; ?>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="<?php echo $this->Html->url(array('controller' => 'stocks', 'action' => 'edit')); ?>">
                            <i class="glyphicon glyphicon-plus"></i>
                            Ajouter un Stock
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $this->Html->url(array('controller' => 'stocks', 'action' => 'index')); ?>">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            Liste Stocks
                        </a>
                    </li>
                </ul>
            </li>
            <?php if ($this->params['controller'] === 'products' && $this->params['action'] === 'edit'): ?>
                <li class="start active ">
                <?php elseif ($this->params['controller'] === 'products' && $this->params['action'] === 'index'): ?>
                <li class="start active ">
                <?php elseif ($this->params['controller'] === 'familles' && $this->params['action'] === 'edit'): ?>
                <li class="start active ">
                <?php elseif ($this->params['controller'] === 'familles' && $this->params['action'] === 'index'): ?>
                <li class="start active ">
                <?php else: ?>
                <li>
                <?php endif; ?>
                <a href="javascript:;">
                    <i class="glyphicon glyphicon-shopping-cart"></i>
                    <span class="title">
                        Gestion Produits
                    </span>
                    <?php if ($this->params['controller'] === 'products' && $this->params['action'] === 'edit'): ?>
                        <span class="selected"></span>
                    <?php elseif ($this->params['controller'] === 'products' && $this->params['action'] === 'index'): ?>
                        <span class="selected"></span>
                    <?php elseif ($this->params['controller'] === 'familles' && $this->params['action'] === 'edit'): ?>
                        <span class="selected"></span>
                    <?php elseif ($this->params['controller'] === 'familles' && $this->params['action'] === 'index'): ?>
                        <span class="selected"></span>
                    <?php else: ?>
                        <span class="arrow"></span>
                    <?php endif; ?>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'edit')); ?>">
                            <i class="glyphicon glyphicon-plus"></i>
                            Ajouter un Produit
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'index')); ?>">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            Liste des Produits
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $this->Html->url(array('controller' => 'familles', 'action' => 'edit')); ?>">
                            <i class="glyphicon glyphicon-plus"></i>
                            Ajouter un Famille
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $this->Html->url(array('controller' => 'familles', 'action' => 'index')); ?>">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            Liste des Familles
                        </a>
                    </li>
                </ul>
            </li>
            <?php if ($this->params['controller'] === 'fournisseurs' && $this->params['action'] === 'edit'): ?>
                <li class="start active ">
                <?php elseif ($this->params['controller'] === 'fournisseurs' && $this->params['action'] === 'index'): ?>
                <li class="start active ">
                <?php else: ?>
                <li>
                <?php endif; ?>
                <a href="javascript:;">
                    <i class="fa fa-truck"></i>
                    <span class="title">
                        Gestion Fournisseurs
                    </span>
                    <?php if ($this->params['controller'] === 'fournisseurs' && $this->params['action'] === 'edit'): ?>
                        <span class="selected"></span>
                    <?php elseif ($this->params['controller'] === 'fournisseurs' && $this->params['action'] === 'index'): ?>
                        <span class="selected"></span>
                    <?php else: ?>
                        <span class="arrow"></span>
                    <?php endif; ?>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="<?php echo $this->Html->url(array('controller' => 'fournisseurs', 'action' => 'edit')); ?>">
                            <i class="glyphicon glyphicon-plus"></i>
                            Ajouter un Fournisseur
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $this->Html->url(array('controller' => 'fournisseurs', 'action' => 'index')); ?>">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            Gestion des Fournisseurs
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>