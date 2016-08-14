<?php

    $admin_url  = get_admin_url( null, 'admin.php?page=ais-themes-options' );

    $menu_items = array(
        'basic'     => array(
            'link'  => 'ais-theme-options-basic',
            'label' => 'Basic',
        ),
        'partner'   => array(
            'link'  => 'ais-theme-options-partner',
            'label' => 'Partner',
        ),
        'stats'   => array(
            'link'  => 'ais-theme-options-stats',
            'label' => 'Stats',
        ),
        'othersairport'   => array(
            'link'  => 'ais-theme-options-othersairport',
            'label' => 'Others Airport',
        ),
    );

    $active     = ( isset( $_GET['page'] ) && ! empty( $_GET['page'] ) ) ?
                    $_GET['page'] : 'ais-theme-options-basic';

?>
<div class="ais-settings-menu-area">
    <ul class="ais-settings-menu">
        <?php
            foreach ( $menu_items as $menu_item => $item ) :
                $activated = ( $active == $item['link'] ) ? 'active' : null;
        ?>
        <li class="ais-settings-item <?php echo $activated; ?>">
            <a href="<?php echo $admin_url . '&page=' . $item['link']; ?>">
               <?php echo $item['label']; ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>