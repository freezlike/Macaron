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
            
            <?php if ($this->params['controller'] === 'users' && $this->params['action'] === 'editc'): ?>
                <li class="start active ">
                <?php elseif ($this->params['controller'] === 'users' && $this->params['action'] === 'indexc'): ?>
                <li class="start active ">
                <?php else: ?>
                <li>
                <?php endif; ?>
                <a href="javascript:;">
                    <i class="fa fa-group"></i>
                    <span class="title">
                        Gestion Clients
                    </span>
                    <?php if ($this->params['controller'] === 'users' && $this->params['action'] === 'editc'): ?>
                        <span class="selected"></span>
                    <?php elseif ($this->params['controller'] === 'users' && $this->params['action'] === 'indexc'): ?>
                        <span class="selected"></span>
                    <?php else: ?>
                        <span class="arrow"></span>
                    <?php endif; ?>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'editc')); ?>">
                            <i class="glyphicon glyphicon-plus"></i>
                            Ajouter un Client
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'indexc')); ?>">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            Liste des Clients
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
                    <i class="glyphicon glyphicon-bullhorn"></i>
                    <span class="title">
                        Gestion Commandes
                    </span>
                    <?php if ($this->params['controller'] === 'commandes' && $this->params['action'] === 'edit'): ?>
                        <span class="selected"></span>
                    <?php elseif ($this->params['controller'] === 'commandes' && $this->params['action'] === 'index'): ?>
                        <span class="selected"></span>
                    <?php elseif ($this->params['controller'] === 'commandes' && $this->params['action'] === 'bl'): ?>
                        <span class="selected"></span>
                    <?php else: ?>
                        <span class="arrow"></span>
                    <?php endif; ?>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="<?php echo $this->Html->url(array('controller' => 'commandes', 'action' => 'edit')); ?>">
                            <i class="glyphicon glyphicon-plus"></i>
                            Générer une Commande
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $this->Html->url(array('controller' => 'commandes', 'action' => 'index')); ?>">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            Liste des Commandes(Attentes)
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $this->Html->url(array('controller' => 'commandes', 'action' => 'bl')); ?>">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            Liste des Livraisons
                        </a>
                    </li>
                </ul>
            </li>
            <?php if ($this->params['controller'] === 'factures' && $this->params['action'] === 'add'): ?>
                <li class="start active ">
                <?php elseif ($this->params['controller'] === 'factures' && $this->params['action'] === 'index'): ?>
                <li class="start active ">
                <?php elseif ($this->params['controller'] === 'factures' && $this->params['action'] === 'journa'): ?>
                <li class="start active ">
                <?php else: ?>
                <li>
                <?php endif; ?>
                <a href="javascript:;">
                    <i class="glyphicon glyphicon-credit-card"></i>
                    <span class="title">
                        Gestion Factures
                    </span>
                    <?php if ($this->params['controller'] === 'factures' && $this->params['action'] === 'edit'): ?>
                        <span class="selected"></span>
                    <?php elseif ($this->params['controller'] === 'factures' && $this->params['action'] === 'index'): ?>
                        <span class="selected"></span>
                    <?php elseif ($this->params['controller'] === 'factures' && $this->params['action'] === 'journa'): ?>
                        <span class="selected"></span>
                    <?php else: ?>
                        <span class="arrow"></span>
                    <?php endif; ?>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="<?php echo $this->Html->url(array('controller' => 'factures', 'action' => 'add')); ?>">
                            <i class="glyphicon glyphicon-plus"></i>
                            Ajouter une Facture
                        </a>
                    </li>
                    <li>
                        <?php $date = date('Y-m-d', time()); ?>
                        <a href="<?php echo $this->Html->url(array('controller' => 'factures', 'action' => 'journa', $date)); ?>">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            Facture Journalière
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $this->Html->url(array('controller' => 'factures', 'action' => 'index')); ?>">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            Liste des Factures
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>