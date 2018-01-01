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

$GLOBALS['xoopsOption']['template_main'] = 'randomquote_index.tpl';
require_once __DIR__ . '/header.php';
require_once XOOPS_ROOT_PATH . '/header.php';
//require_once __DIR__ . '/include/config.php';
// Define Stylesheet
//$xoTheme->addStylesheet($stylesheet);
// keywords
$utility::meta_keywords(xoops_getModuleOption('keywords', $moduleDirName));
// description
$utility::meta_description(MD_RANDOMQUOTE_DESC);
//
$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', RANDOMQUOTE_URL . '/index.php');
$GLOBALS['xoopsTpl']->assign('randomquote_url', RANDOMQUOTE_URL);
$GLOBALS['xoopsTpl']->assign('adv', xoops_getModuleOption('advertise', $moduleDirName));
//
$GLOBALS['xoopsTpl']->assign('bookmarks', xoops_getModuleOption('bookmarks', $moduleDirName));
$GLOBALS['xoopsTpl']->assign('fbcomments', xoops_getModuleOption('fbcomments', $moduleDirName));
//
$GLOBALS['xoopsTpl']->assign('admin', MD_RANDOMQUOTE_ADMIN);
//$GLOBALS['xoopsTpl']->assign('copyright', $copyright);
//
require_once XOOPS_ROOT_PATH . '/footer.php';
