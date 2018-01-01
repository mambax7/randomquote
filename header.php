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

use Xmf\Language;
use Xoopsmodules\randomquote;

require_once dirname(dirname(__DIR__)) . '/mainfile.php';
require_once XOOPS_ROOT_PATH . '/header.php';
require_once __DIR__ . '/include/common.php';

$moduleDirName = basename(__DIR__);

/** @var randomquote\Helper $helper */
$helper  = randomquote\Helper::getInstance();
$utility = new randomquote\Utility();

$quotesHandler = new randomquote\QuotesHandler($GLOBALS['xoopsDB']);
/** @var \XoopsPersistableObjectHandler $categoryHandler */
$categoryHandler = new randomquote\CategoryHandler($GLOBALS['xoopsDB']);

$quotesPaginationLimit = $GLOBALS['xoopsModuleConfig']['userpager'];

$modulePath = XOOPS_ROOT_PATH . '/modules/' . $moduleDirName;
//require_once __DIR__ . '/include/config.php';
//require_once __DIR__ . '/class/utility.php';

//$myts = \MyTextSanitizer::getInstance();
//$stylesheet = "modules/{$moduleDirName}/assets/css/style.css";
//if (file_exists($GLOBALS['xoops']->path($stylesheet))) {
//    $GLOBALS['xoTheme']->addStylesheet($GLOBALS['xoops']->url("www/{$stylesheet}"));
//}
//handlers
///** @var \XoopsPersistableObjectHandler $quotesHandler */
//$quotesHandler  = new randomquote\QuotesHandler($GLOBALS['xoopsDB']);
///** @var \XoopsPersistableObjectHandler $categoryHandler */
//$categoryHandler  = new randomquote\CategoryHandler($GLOBALS['xoopsDB']);

// Load language files
$helper->loadLanguage('modinfo');
$helper->loadLanguage('main');
