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

$GLOBALS['xoopsOption']['template_main'] = 'randomquote_quotes_list.tpl';
require_once __DIR__ . '/header.php';
//require_once __DIR__ . '/include/common.php';

$start = Request::getInt('start', 0);
$criteria = new CriteriaCompo();

$criteria->setOrder('DESC');
$criteria->setLimit($quotesPaginationLimit);
$criteria->setStart($start);

$quotesCount = $quotesHandler->getCount($criteria);
$quotesArray = $quotesHandler->getAll($criteria);
if ($quotesCount > 0) {
    foreach (array_keys($quotesArray) as $i) {
        $quotes['id']      = $quotesArray[$i]->getVar('id');
        $quotes['quote']   = $quotesArray[$i]->getVar('quote');
        $quotes['author']  = $quotesArray[$i]->getVar('author');
        $quotes['online']  = $quotesArray[$i]->getVar('online');
        $quotes['created'] = date(_SHORTDATESTRING, strtotime($quotesArray[$i]->getVar('created')));

        $quotes['cid'] = $categoryHandler->get($quotesArray[$i]->getVar('cid'))->getVar('title');
        $GLOBALS['xoopsTpl']->append('quotes', $quotes);
        $keywords[] = $quotesArray[$i]->getVar('quote');
        unset($quotes);
    }
    // Display Navigation
    if ($quotesCount > $quotesPaginationLimit) {
        require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
        $pagenav = new \XoopsPageNav($quotesCount, $quotesPaginationLimit, $start, 'start');
        $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
    }
}
//keywords
if (isset($keywords)) {
    $utility::meta_keywords(xoops_getModuleOption('keywords', $moduleDirName) . ', ' . implode(', ', $keywords));
}
//description
$utility::meta_description(MD_RANDOMQUOTE_QUOTES_DESC);
//
$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', RANDOMQUOTE_URL . '/quotes.php');
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
