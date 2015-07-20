<!-- BEGIN HEADER -->
<div class="header navbar navbar-fixed-top" style="height: 87px;">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="header-inner">
        <!-- BEGIN LOGO -->
        <a class="navbar-brand" href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'home')); ?>">
            <?php echo $this->Html->image('logo.png', array()); ?>&nbsp;
        </a>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <?php echo $this->Html->image('menu-toggler.png'); ?>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <ul class="nav navbar-nav pull-right">
            <li class="dropdown" id="header_notification_bar">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <?php if (!empty($notifs)): ?>
                        <i class="fa fa-warning"></i>
                        <span class="badge">
                            <?php echo count($notifs); ?>
                        </span>
                    <?php else: ?>
                        <i class="fa fa-thumbs-up"></i>
                        <span class="badge"></span>
                    <?php endif; ?>
                </a>
                <ul class="dropdown-menu extended notification">
                    <li>
                        <p>
                            <?php if (empty($notifs)): ?>
                                <?php echo __("Pas de Notifications en Cours"); ?>
                            <?php else: ?>
                                <?php if (count($notifs) > 1): ?>
                                    <?php echo __("Vous avez ") . count($notifs) . __("Notifications."); ?>
                                <?php else: ?>
                                    <?php echo __("Vous avez une Notification."); ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </p>
                    </li>
                    <li>
                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;">
                            <ul class="dropdown-menu-list scroller" style="height: 250px; overflow: hidden; width: auto;">
                                <?php foreach ($notifs as $notif): ?>
                                    <li>
                                        <a href="<?php echo $this->Html->url(array('controller' => 'notifications', 'action' => 'view', $notif['Notification']['id'])); ?>">
                                            <?php echo ucfirst($notif['Notification']['name']); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 160.25641025641px; background: rgb(187, 187, 187);"></div>
                            <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(234, 234, 234);"></div>
                        </div>
                    </li>
                    <li class="external">
                        <a href="<?php echo $this->Html->url(array('controller' => 'notifications', 'action' => 'index')); ?>">
                            <?php echo __("Voir toutes les notifications"); ?> <i class="m-icon-swapright"></i>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- BEGIN USER LOGIN DROPDOWN -->
            <li class="dropdown user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="padding: 14px 0px 6px 6px;">
                    <i class="glyphicon glyphicon-user"></i>
                    <span class="username">
                        <?php echo ucfirst($this->Session->read('Auth.User.username')); ?>
                    </span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout')); ?>">
                            <i class="fa fa-key"></i> Log Out
                        </a>
                    </li>
                </ul>
            </li>
            <!-- END USER LOGIN DROPDOWN -->

        </ul>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<div class="clear"></div>