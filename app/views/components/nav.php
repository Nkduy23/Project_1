<?php

function renderMenu($menuTree, $parent_id = NULL, $isMobile = false)
{
    if (!isset($menuTree[$parent_id])) {
        return;
    }

    if ($isMobile) {
        echo '<div class="nav-mobile__list">';
        echo '<ul class="nav__list">';
    } else {
        echo '<div class="nav__sub-wrap flex justify-center">';
    }

    foreach ($menuTree[$parent_id] as $menu) {
        if ($isMobile) {
            echo '<li class="nav__item">';
            echo '<a href="' . $menu['link'] . '" class="nav__link">' . $menu['title'] . '</a>';
        } else {
            echo '<ul class="nav__sub" role="menuitem">';
            echo '<li class="nav__sub-title">' . $menu['title'] . '</li>';
        }

        // Render các mục con
        if ($isMobile) {
            if (isset($menuTree[$menu['id']])) {
                echo '<ul class="nav__sub">';
                renderMenuItems($menuTree, $menu['id'], $isMobile);
                echo '</ul>';
            }
        } else {
            renderMenuItems($menuTree, $menu['id'], $isMobile);
        }

        if ($isMobile) {
            echo '</li>';
        } else {
            echo '</ul>';
        }
    }

    if ($isMobile) {
        echo '</ul>';
        echo '</div>';
    } else {
        echo '</div>';
    }
}

function renderMenuItems($menuTree, $parent_id, $isMobile = false)
{
    if (!isset($menuTree[$parent_id])) {
        return;
    }

    foreach ($menuTree[$parent_id] as $menu) {
        if ($isMobile) {
            echo '<li class="nav__item-sub"><a href="' . $menu['link'] . '" class="nav__link-sub">' . $menu['title'] . '</a></li>';
        } else {
            echo '<li><a class="nav__link-sub" href="' . $menu['link'] . '">' . $menu['title'] . '</a></li>';
        }
    }
}
?>

<!-- Desktop Menu -->
<div class="container-fluid-nav">
    <div class="container-nav">
        <nav class="nav-desktop">
            <ul class="nav__list flex-between flex-wrap">
                <?php
                foreach ($menuTree[NULL] as $parentMenu) {
                    echo '<li class="nav__item" aria-haspopup="true" role="menu">';
                    echo '<a class="nav__link" href="' . $parentMenu['link'] . '">' . $parentMenu['title'] . '</a>';
                    renderMenu($menuTree, $parentMenu['id'], false); // false để render desktop
                    echo '</li>';
                }
                ?>
            </ul>
        </nav>
    </div>
</div>

<!-- Mobile Menu -->
<div class="wrapper">
    <nav class="nav-mobile">
        <div class="nav-mobile__title">
            <span>Menu</span>
        </div>
        <?php
        foreach ($menuTree[NULL] as $parentMenu) {
            echo '<div class="nav-mobile__list">';
            echo '<ul class="nav__list">';
            echo '<li class="nav__item">';
            echo '<a href="' . $parentMenu['link'] . '" class="nav__link">' . $parentMenu['title'] . '</a>';
            renderMenu($menuTree, $parentMenu['id'], true); // true để render mobile
            echo '</li>';
            echo '</ul>';
            echo '<div class="nav__dropdown"><i class="fa-solid fa-chevron-right"></i></div>';
            echo '</div>';
        }
        ?>
    </nav>
</div>