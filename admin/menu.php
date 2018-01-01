<?php

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * Module: randomquote
 *
 * @category        Module
 * @package         randomquote
 * @author          XOOPS Development Team <name@site.com> - <https://xoops.org>
 * @copyright       {@link https://xoops.org/ XOOPS Project}
 * @license         GPL 2.0 or later
 * @link            https://xoops.org/
 * @since           1.0.0
 */

use Xoopsmodules\randomquote;

include __DIR__ . '/../preloads/autoloader.php';

$helper = randomquote\Helper::getInstance();

// get path to icons
$pathIcon32    = \Xmf\Module\Admin::menuIconPath('');
$pathModIcon32 = $helper->getModule()->getInfo('modicons32');
$adminObject   = \Xmf\Module\Admin::getInstance();

$adminmenu[] = [
    'title' => MI_RANDOMQUOTE_ADMENU1,
    'link'  => 'admin/index.php',
    'icon'  => "{$pathIcon32}/home.png"
];

$adminmenu[] = [
    'title' => MI_RANDOMQUOTE_ADMENU2,
    'link'  => 'admin/quotes.php',
    'icon'  => "{$pathIcon32}/insert_table_row.png"
];

$adminmenu[] = [
    'title' => MI_RANDOMQUOTE_ADMENU3,
    'link'  => 'admin/category.php',
    'icon'  => "{$pathIcon32}/category.png"
];

$adminmenu[] = [
    'title' => MI_RANDOMQUOTE_ADMENU4,
    'link'  => 'admin/permissions.php',
    'icon'  => "{$pathIcon32}/permissions.png"
];

$adminmenu[] = [
    'title' => MI_RANDOMQUOTE_ADMENU5,
    'link'  => 'admin/about.php',
    'icon'  => "{$pathIcon32}/about.png"
];
