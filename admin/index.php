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

use Xmf\Request;
use Xoopsmodules\randomquote;
use Xoopsmodules\randomquote\common;

require_once __DIR__ . '/admin_header.php';
xoops_cp_header();

//count "total Quotes"
/** @var XoopsPersistableObjectHandler $quotesHandler */
$totalQuotes = $quotesHandler->getCount();
//count "total Category"
/** @var XoopsPersistableObjectHandler $categoryHandler */
$totalCategory = $categoryHandler->getCount();
// InfoBox Statistics
$adminObject->addInfoBox(AM_RANDOMQUOTE_STATISTICS);

// InfoBox quotes
$adminObject->addInfoBoxLine(sprintf(AM_RANDOMQUOTE_THEREARE_QUOTE, $totalQuotes));

// InfoBox category
$adminObject->addInfoBoxLine(sprintf(AM_RANDOMQUOTE_THEREARE_CATEGORY, $totalCategory));
// Render Index
$adminObject->displayNavigation(basename(__FILE__));

//------------- Test Data ----------------------------

if ($helper->getConfig('displaySampleButton')) {
    xoops_loadLanguage('admin/modulesadmin', 'system');
    require_once __DIR__ . '/../testdata/index.php';
    $adminObject->addItemButton(_AM_SYSTEM_MODULES_INSTALL_TESTDATA, '__DIR__ . /../../testdata/index.php?op=load', 'add');
    $adminObject->displayButton('left', '');
}

require_once __DIR__ . '/../testdata/index.php';
$adminObject->addItemButton(AM_RANDOMQUOTE_ADD_SAMPLEDATA, '__DIR__ . /../../testdata/index.php?op=load', 'add');
$adminObject->displayButton('left', '');

//------------- End Test Data ----------------------------

$adminObject->displayIndex();

echo $utility::getServerStats();

//codeDump(__FILE__);
require_once __DIR__ . '/admin_footer.php';
