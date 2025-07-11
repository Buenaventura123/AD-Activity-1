<?php
function getNavbar($activePage)
{
    $pages = [
        'Home' => '/',
        'Tools' => '/page/tools/index.php',
        'Minerals' => '/page/minerals/index.php',
        'Transport' => '/page/transport/index.php',
        'Add to Cart' => '/page/addtocart/index.php',
        'Add Stock' => '/page/addstock/index.php'
    ];

    $html = '<div class="navbar">';
    foreach ($pages as $name => $link) {
        $isActive = $name === $activePage ? 'active' : '';
        $html .= "<a href=\"$link\" class=\"$isActive\">$name</a>";
    }
    $html .= '</div>';

    return $html;
}
?>