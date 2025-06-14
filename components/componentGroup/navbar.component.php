<?php
function getNavbar($activePage)
{
    $pages = [
        'Home' => '/',
        'Tools' => '../../page/tools/index.php',
        'Minerals' => '#',
        'Job' => '#',
        'Transport' => '#'
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