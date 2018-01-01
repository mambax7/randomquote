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
use Xmf\Module\Helper\Permission;
use Xoopsmodules\randomquote;
use Xoopsmodules\randomquote\common;

require_once __DIR__ . '/admin_header.php';
xoops_cp_header();
//It recovered the value of argument op in URL$
$op    = Request::getString('op', 'list');
$order = Request::getString('order', 'desc');
$sort  = Request::getString('sort', '');

$adminObject->displayNavigation(basename(__FILE__));
/** @var Permission $permHelper */
$permHelper = new \Xmf\Module\Helper\Permission();
$uploadDir  = XOOPS_UPLOAD_PATH . '/randomquote/images/';
$uploadUrl  = XOOPS_UPLOAD_URL . '/randomquote/images/';

switch ($op) {
    case 'list':
    default:
        $adminObject->addItemButton(AM_RANDOMQUOTE_ADD_QUOTES, 'quotes.php?op=new', 'add');
        echo $adminObject->displayButton('left');
        $start                 = Request::getInt('start', 0);
        $quotesPaginationLimit = $GLOBALS['xoopsModuleConfig']['userpager'];

        $criteria = new CriteriaCompo();
        $criteria->setSort('id ASC, quote');
        $criteria->setOrder('ASC');
        $criteria->setLimit($quotesPaginationLimit);
        $criteria->setStart($start);
        $quotesTempRows  = $quotesHandler->getCount();
        $quotesTempArray = $quotesHandler->getAll($criteria);

        // Display Page Navigation
        if ($quotesTempRows > $quotesPaginationLimit) {
            require_once XOOPS_ROOT_PATH . '/class/pagenav.php';

            $pagenav = new \XoopsPageNav($quotesTempRows, $quotesPaginationLimit, $start, 'start', 'op=list' . '&sort=' . $sort . '&order=' . $order . '');
            $GLOBALS['xoopsTpl']->assign('pagenav', null === $pagenav ? $pagenav->renderNav() : '');
        }

        $GLOBALS['xoopsTpl']->assign('quotesRows', $quotesTempRows);
        $quotesArray = [];

        $criteria = new CriteriaCompo();

        //$criteria->setOrder('DESC');
        $criteria->setSort($sort);
        $criteria->setOrder($order);
        $criteria->setLimit($quotesPaginationLimit);
        $criteria->setStart($start);

        $quotesCount     = $quotesHandler->getCount($criteria);
        $quotesTempArray = $quotesHandler->getAll($criteria);

        //    for ($i = 0; $i < $fieldsCount; ++$i) {
        if ($quotesCount > 0) {
            foreach (array_keys($quotesTempArray) as $i) {


                //        $field = explode(':', $fields[$i]);

                $selectorid = $utility::selectSorting(AM_RANDOMQUOTE_QUOTES_ID, 'id');
                $GLOBALS['xoopsTpl']->assign('selectorid', $selectorid);
                $quotesArray['id'] = $quotesTempArray[$i]->getVar('id');

                $selectorquote = $utility::selectSorting(AM_RANDOMQUOTE_QUOTES_QUOTE, 'quote');
                $GLOBALS['xoopsTpl']->assign('selectorquote', $selectorquote);
                $quotesArray['quote'] = $quotesTempArray[$i]->getVar('quote');

                $selectorauthor = $utility::selectSorting(AM_RANDOMQUOTE_QUOTES_AUTHOR, 'author');
                $GLOBALS['xoopsTpl']->assign('selectorauthor', $selectorauthor);
                $quotesArray['author'] = $quotesTempArray[$i]->getVar('author');

                $selectoronline = $utility::selectSorting(AM_RANDOMQUOTE_QUOTES_ONLINE, 'online');
                $GLOBALS['xoopsTpl']->assign('selectoronline', $selectoronline);
                $quotesArray['online'] = $quotesTempArray[$i]->getVar('online');

                $selectorcreated = $utility::selectSorting(AM_RANDOMQUOTE_QUOTES_CREATED, 'created');
                $GLOBALS['xoopsTpl']->assign('selectorcreated', $selectorcreated);
                $quotesArray['created'] = date(_SHORTDATESTRING, strtotime($quotesTempArray[$i]->getVar('created')));

                $selectorcid = $utility::selectSorting(AM_RANDOMQUOTE_QUOTES_CID, 'cid');
                $GLOBALS['xoopsTpl']->assign('selectorcid', $selectorcid);
                $quotesArray['cid']         = $categoryHandler->get($quotesTempArray[$i]->getVar('cid'))->getVar('title');
                $quotesArray['edit_delete'] = "<a href='quotes.php?op=edit&id=" . $i . "'><img src=" . $pathIcon16 . "/edit.png alt='" . _EDIT . "' title='" . _EDIT . "'></a>
               <a href='quotes.php?op=delete&id=" . $i . "'><img src=" . $pathIcon16 . "/delete.png alt='" . _DELETE . "' title='" . _DELETE . "'></a>
               <a href='quotes.php?op=clone&id=" . $i . "'><img src=" . $pathIcon16 . "/editcopy.png alt='" . _CLONE . "' title='" . _CLONE . "'></a>";

                $GLOBALS['xoopsTpl']->append_by_ref('quotesArrays', $quotesArray);
                unset($quotesArray);
            }
            unset($quotesTempArray);
            // Display Navigation
            if ($quotesCount > $quotesPaginationLimit) {
                require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
                $pagenav = new \XoopsPageNav($quotesCount, $quotesPaginationLimit, $start, 'start', 'op=list' . '&sort=' . $sort . '&order=' . $order . '');
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
            }

            echo $GLOBALS['xoopsTpl']->fetch(XOOPS_ROOT_PATH . '/modules/' . $GLOBALS['xoopsModule']->getVar('dirname') . '/templates/admin/randomquote_admin_quotes.tpl');
        }

        break;

    case 'new':
        $adminObject->addItemButton(AM_RANDOMQUOTE_QUOTES_LIST, 'quotes.php', 'list');
        echo $adminObject->displayButton('left');

        $quotesObject = $quotesHandler->create();
        $form         = $quotesObject->getForm();
        $form->display();
        break;

    case 'save':
        if (!$GLOBALS['xoopsSecurity']->check()) {
            redirect_header('quotes.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if (0 != Request::getInt('id', 0)) {
            $quotesObject = $quotesHandler->get(Request::getInt('id', 0));
        } else {
            $quotesObject = $quotesHandler->create();
        }
        // Form save fields
        $quotesObject->setVar('quote', Request::getText('quote', ''));
        $quotesObject->setVar('author', Request::getVar('author', ''));
        $quotesObject->setVar('online', Request::getVar('online', ''));
        $quotesObject->setVar('created', $_REQUEST['created']);
        $quotesObject->setVar('cid', Request::getVar('cid', ''));
        if ($quotesHandler->insert($quotesObject)) {
            redirect_header('quotes.php?op=list', 2, AM_RANDOMQUOTE_FORMOK);
        }

        echo $quotesObject->getHtmlErrors();
        $form = $quotesObject->getForm();
        $form->display();
        break;

    case 'edit':
        $adminObject->addItemButton(AM_RANDOMQUOTE_ADD_QUOTES, 'quotes.php?op=new', 'add');
        $adminObject->addItemButton(AM_RANDOMQUOTE_QUOTES_LIST, 'quotes.php', 'list');
        echo $adminObject->displayButton('left');
        $quotesObject = $quotesHandler->get(Request::getString('id', ''));
        $form         = $quotesObject->getForm();
        $form->display();
        break;

    case 'delete':
        $quotesObject = $quotesHandler->get(Request::getString('id', ''));
        if (1 == Request::getInt('ok', 0)) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                redirect_header('quotes.php', 3, implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($quotesHandler->delete($quotesObject)) {
                redirect_header('quotes.php', 3, AM_RANDOMQUOTE_FORMDELOK);
            } else {
                echo $quotesObject->getHtmlErrors();
            }
        } else {
            xoops_confirm(['ok' => 1, 'id' => Request::getString('id', ''), 'op' => 'delete'], Request::getCmd('REQUEST_URI', '', 'SERVER'), sprintf(AM_RANDOMQUOTE_FORMSUREDEL, $quotesObject->getVar('quote')));
        }
        break;

    case 'clone':

        $id_field = Request::getString('id', '');

        if ($utility::cloneRecord('randomquote_quotes', 'id', $id_field)) {
            redirect_header('quotes.php', 3, AM_RANDOMQUOTE_CLONED_OK);
        } else {
            redirect_header('quotes.php', 3, AM_RANDOMQUOTE_CLONED_FAILED);
        }

        break;
}
require_once __DIR__ . '/admin_footer.php';
