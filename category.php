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

$GLOBALS['xoopsOption']['template_main'] = 'randomquote_category_list.tpl';
require_once __DIR__ . '/header.php';
$start = Request::getInt('start', 0);
$categoryPaginationLimit = $GLOBALS['xoopsModuleConfig']['userpager'];

$criteria = new CriteriaCompo();

$criteria->setOrder('DESC');
$criteria->setLimit($categoryPaginationLimit);
$criteria->setStart($start);

$categoryCount = $categoryHandler->getCount($criteria);
$categoryArray = $categoryHandler->getAll($criteria);
if ($categoryCount > 0) {
    foreach (array_keys($categoryArray) as $i) {
        $category['id']          = $categoryArray[$i]->getVar('id');
        $category['pid']         = $categoryArray[$i]->getVar('pid');
        $category['title']       = $categoryArray[$i]->getVar('title');
        $category['description'] = $categoryArray[$i]->getVar('description');
        $category['image']       = $categoryArray[$i]->getVar('image');
        $category['weight']      = $categoryArray[$i]->getVar('weight');
        $category['color']       = $categoryArray[$i]->getVar('color');
        $category['online']      = $categoryArray[$i]->getVar('online');
        $GLOBALS['xoopsTpl']->append('category', $category);
        $keywords[] = $categoryArray[$i]->getVar('title');
        unset($category);
    }
    // Display Navigation
    if ($categoryCount > $categoryPaginationLimit) {
        require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
        $pagenav = new \XoopsPageNav($categoryCount, $categoryPaginationLimit, $start, 'start');
        $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
    }
}
//keywords
if (isset($keywords)) {
    $utility::meta_keywords(xoops_getModuleOption('keywords', $moduleDirName) . ', ' . implode(', ', $keywords));
}
//description
$utility::meta_description(MD_RANDOMQUOTE_CATEGORY_DESC);
//
$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', RANDOMQUOTE_URL . '/category.php');
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
