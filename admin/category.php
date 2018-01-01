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

use Xmf\Module\Helper\Permission;
use Xmf\Request;
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
        $adminObject->addItemButton(AM_RANDOMQUOTE_ADD_CATEGORY, 'category.php?op=new', 'add');
        echo $adminObject->displayButton('left');
        $start                   = Request::getInt('start', 0);
        $categoryPaginationLimit = $GLOBALS['xoopsModuleConfig']['userpager'];

        $criteria = new CriteriaCompo();
        $criteria->setSort('id ASC, title');
        $criteria->setOrder('ASC');
        $criteria->setLimit($categoryPaginationLimit);
        $criteria->setStart($start);
        $categoryTempRows  = $categoryHandler->getCount();
        $categoryTempArray = $categoryHandler->getAll($criteria);

        // Display Page Navigation
        if ($categoryTempRows > $categoryPaginationLimit) {
            require_once XOOPS_ROOT_PATH . '/class/pagenav.php';

            $pagenav = new \XoopsPageNav($categoryTempRows, $categoryPaginationLimit, $start, 'start', 'op=list' . '&sort=' . $sort . '&order=' . $order . '');
            $GLOBALS['xoopsTpl']->assign('pagenav', null === $pagenav ? $pagenav->renderNav() : '');
        }

        $GLOBALS['xoopsTpl']->assign('categoryRows', $categoryTempRows);
        $categoryArray = [];

        $criteria = new CriteriaCompo();

        //$criteria->setOrder('DESC');
        $criteria->setSort($sort);
        $criteria->setOrder($order);
        $criteria->setLimit($categoryPaginationLimit);
        $criteria->setStart($start);

        $categoryCount     = $categoryHandler->getCount($criteria);
        $categoryTempArray = $categoryHandler->getAll($criteria);

        //    for ($i = 0; $i < $fieldsCount; ++$i) {
        if ($categoryCount > 0) {
            foreach (array_keys($categoryTempArray) as $i) {


                //        $field = explode(':', $fields[$i]);

                $selectorid = $utility::selectSorting(AM_RANDOMQUOTE_CATEGORY_ID, 'id');
                $GLOBALS['xoopsTpl']->assign('selectorid', $selectorid);
                $categoryArray['id'] = $categoryTempArray[$i]->getVar('id');

                $selectorpid = $utility::selectSorting(AM_RANDOMQUOTE_CATEGORY_PID, 'pid');
                $GLOBALS['xoopsTpl']->assign('selectorpid', $selectorpid);
                $categoryArray['pid'] = $categoryTempArray[$i]->getVar('pid');

                $selectortitle = $utility::selectSorting(AM_RANDOMQUOTE_CATEGORY_TITLE, 'title');
                $GLOBALS['xoopsTpl']->assign('selectortitle', $selectortitle);
                $categoryArray['title'] = $categoryTempArray[$i]->getVar('title');

                $selectordescription = $utility::selectSorting(AM_RANDOMQUOTE_CATEGORY_DESCRIPTION, 'description');
                $GLOBALS['xoopsTpl']->assign('selectordescription', $selectordescription);
                $categoryArray['description'] = $categoryTempArray[$i]->getVar('description');

                $selectorimage = $utility::selectSorting(AM_RANDOMQUOTE_CATEGORY_IMAGE, 'image');
                $GLOBALS['xoopsTpl']->assign('selectorimage', $selectorimage);
                $categoryArray['image'] = "<img src='" . $uploadUrl . $categoryTempArray[$i]->getVar('image') . "' name='" . 'name' . "' id=" . 'id' . " alt='' style='max-width:100px'>";

                $selectorweight = $utility::selectSorting(AM_RANDOMQUOTE_CATEGORY_WEIGHT, 'weight');
                $GLOBALS['xoopsTpl']->assign('selectorweight', $selectorweight);
                $categoryArray['weight'] = $categoryTempArray[$i]->getVar('weight');

                $selectorcolor = $utility::selectSorting(AM_RANDOMQUOTE_CATEGORY_COLOR, 'color');
                $GLOBALS['xoopsTpl']->assign('selectorcolor', $selectorcolor);
                $categoryArray['color'] = $categoryTempArray[$i]->getVar('color');

                $selectoronline = $utility::selectSorting(AM_RANDOMQUOTE_CATEGORY_ONLINE, 'online');
                $GLOBALS['xoopsTpl']->assign('selectoronline', $selectoronline);
                $categoryArray['online']      = $categoryTempArray[$i]->getVar('online');
                $categoryArray['edit_delete'] = "<a href='category.php?op=edit&id=" . $i . "'><img src=" . $pathIcon16 . "/edit.png alt='" . _EDIT . "' title='" . _EDIT . "'></a>
               <a href='category.php?op=delete&id=" . $i . "'><img src=" . $pathIcon16 . "/delete.png alt='" . _DELETE . "' title='" . _DELETE . "'></a>
               <a href='category.php?op=clone&id=" . $i . "'><img src=" . $pathIcon16 . "/editcopy.png alt='" . _CLONE . "' title='" . _CLONE . "'></a>";

                $GLOBALS['xoopsTpl']->append_by_ref('categoryArrays', $categoryArray);
                unset($categoryArray);
            }
            unset($categoryTempArray);
            // Display Navigation
            if ($categoryCount > $categoryPaginationLimit) {
                require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
                $pagenav = new \XoopsPageNav($categoryCount, $categoryPaginationLimit, $start, 'start', 'op=list' . '&sort=' . $sort . '&order=' . $order . '');
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
            }

            echo $GLOBALS['xoopsTpl']->fetch(XOOPS_ROOT_PATH . '/modules/' . $GLOBALS['xoopsModule']->getVar('dirname') . '/templates/admin/randomquote_admin_category.tpl');
        }

        break;

    case 'new':
        $adminObject->addItemButton(AM_RANDOMQUOTE_CATEGORY_LIST, 'category.php', 'list');
        echo $adminObject->displayButton('left');

        $categoryObject = $categoryHandler->create();
        $form           = $categoryObject->getForm();
        $form->display();
        break;

    case 'save':
        if (!$GLOBALS['xoopsSecurity']->check()) {
            redirect_header('category.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if (0 != Request::getInt('id', 0)) {
            $categoryObject = $categoryHandler->get(Request::getInt('id', 0));
        } else {
            $categoryObject = $categoryHandler->create();
        }
        // Form save fields
        $categoryObject->setVar('pid', Request::getVar('pid', ''));
        $categoryObject->setVar('title', Request::getVar('title', ''));
        $categoryObject->setVar('description', Request::getText('description', ''));

        require_once XOOPS_ROOT_PATH . '/class/uploader.php';
        $uploadDir = XOOPS_UPLOAD_PATH . '/randomquote/images/';
        $uploader  = new \XoopsMediaUploader($uploadDir, xoops_getModuleOption('mimetypes', 'randomquote'), xoops_getModuleOption('maxsize', 'randomquote'), null, null);
        if ($uploader->fetchMedia(Request::getArray('xoops_upload_file', '', 'POST')[0])) {
            $uploader->setPrefix('image_');
            $uploader->fetchMedia(Request::getArray('xoops_upload_file', '', 'POST')[0]);
            if (!$uploader->upload()) {
                $errors = $uploader->getErrors();
                redirect_header('javascript:history.go(-1)', 3, $errors);
            } else {
                $categoryObject->setVar('image', $uploader->getSavedFileName());
            }
        } else {
            $categoryObject->setVar('image', Request::getVar('image', ''));
        }

        $categoryObject->setVar('weight', Request::getVar('weight', ''));
        $categoryObject->setVar('color', Request::getVar('color', ''));
        $categoryObject->setVar('online', ((1 == Request::getInt('online', 0)) ? '1' : '0'));
        //Permissions
        //===============================================================

        $mid = $GLOBALS['xoopsModule']->mid();
        /** @var XoopsGroupPermHandler $gpermHandler */
        $gpermHandler = xoops_getHandler('groupperm');
        $id           = Request::getInt('id', 0);

        /**
         * @param $myArray
         * @param $permissionGroup
         * @param $id
         * @param $gpermHandler
         * @param $permissionName
         * @param $mid
         */
        function setPermissions($myArray, $permissionGroup, $id, $gpermHandler, $permissionName, $mid)
        {
            $permissionArray = $myArray;
            if ($id > 0) {
                $sql = 'DELETE FROM `' . $GLOBALS['xoopsDB']->prefix('group_permission') . "` WHERE `gperm_name` = '" . $permissionName . "' AND `gperm_itemid`= $id;";
                $GLOBALS['xoopsDB']->query($sql);
            }
            //admin
            $gperm = $gpermHandler->create();
            $gperm->setVar('gperm_groupid', XOOPS_GROUP_ADMIN);
            $gperm->setVar('gperm_name', $permissionName);
            $gperm->setVar('gperm_modid', $mid);
            $gperm->setVar('gperm_itemid', $id);
            $gpermHandler->insert($gperm);
            unset($gperm);
            //non-Admin groups
            if (is_array($permissionArray)) {
                foreach ($permissionArray as $key => $cat_groupperm) {
                    if ($cat_groupperm > 0) {
                        $gperm = $gpermHandler->create();
                        $gperm->setVar('gperm_groupid', $cat_groupperm);
                        $gperm->setVar('gperm_name', $permissionName);
                        $gperm->setVar('gperm_modid', $mid);
                        $gperm->setVar('gperm_itemid', $id);
                        $gpermHandler->insert($gperm);
                        unset($gperm);
                    }
                }
            } elseif ($permissionArray > 0) {
                $gperm = $gpermHandler->create();
                $gperm->setVar('gperm_groupid', $permissionArray);
                $gperm->setVar('gperm_name', $permissionName);
                $gperm->setVar('gperm_modid', $mid);
                $gperm->setVar('gperm_itemid', $id);
                $gpermHandler->insert($gperm);
                unset($gperm);
            }
        }

        //setPermissions for View items
        $permissionGroup   = 'groupsRead';
        $permissionName    = 'randomquote_view';
        $permissionArray   = Request::getArray($permissionGroup, '');
        $permissionArray[] = XOOPS_GROUP_ADMIN;
        //setPermissions($permissionArray, $permissionGroup, $id, $gpermHandler, $permissionName, $mid);
        $permHelper->savePermissionForItem($permissionName, $id, $permissionArray);

        //setPermissions for Submit items
        $permissionGroup   = 'groupsSubmit';
        $permissionName    = 'randomquote_submit';
        $permissionArray   = Request::getArray($permissionGroup, '');
        $permissionArray[] = XOOPS_GROUP_ADMIN;
        //setPermissions($permissionArray, $permissionGroup, $id, $gpermHandler, $permissionName, $mid);
        $permHelper->savePermissionForItem($permissionName, $id, $permissionArray);

        //setPermissions for Approve items
        $permissionGroup   = 'groupsModeration';
        $permissionName    = 'randomquote_approve';
        $permissionArray   = Request::getArray($permissionGroup, '');
        $permissionArray[] = XOOPS_GROUP_ADMIN;
        //setPermissions($permissionArray, $permissionGroup, $id, $gpermHandler, $permissionName, $mid);
        $permHelper->savePermissionForItem($permissionName, $id, $permissionArray);

        if ($categoryHandler->insert($categoryObject)) {
            redirect_header('category.php?op=list', 2, AM_RANDOMQUOTE_FORMOK);
        }

        echo $categoryObject->getHtmlErrors();
        $form = $categoryObject->getForm();
        $form->display();
        break;

    case 'edit':
        $adminObject->addItemButton(AM_RANDOMQUOTE_ADD_CATEGORY, 'category.php?op=new', 'add');
        $adminObject->addItemButton(AM_RANDOMQUOTE_CATEGORY_LIST, 'category.php', 'list');
        echo $adminObject->displayButton('left');
        $categoryObject = $categoryHandler->get(Request::getString('id', ''));
        $form           = $categoryObject->getForm();
        $form->display();
        break;

    case 'delete':
        $categoryObject = $categoryHandler->get(Request::getString('id', ''));
        if (1 == Request::getInt('ok', 0)) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                redirect_header('category.php', 3, implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($categoryHandler->delete($categoryObject)) {
                redirect_header('category.php', 3, AM_RANDOMQUOTE_FORMDELOK);
            } else {
                echo $categoryObject->getHtmlErrors();
            }
        } else {
            xoops_confirm(['ok' => 1, 'id' => Request::getString('id', ''), 'op' => 'delete'], Request::getCmd('REQUEST_URI', '', 'SERVER'), sprintf(AM_RANDOMQUOTE_FORMSUREDEL, $categoryObject->getVar('title')));
        }
        break;

    case 'clone':

        $id_field = Request::getString('id', '');

        if ($utility::cloneRecord('randomquote_category', 'id', $id_field)) {
            redirect_header('category.php', 3, AM_RANDOMQUOTE_CLONED_OK);
        } else {
            redirect_header('category.php', 3, AM_RANDOMQUOTE_CLONED_FAILED);
        }

        break;
}
require_once __DIR__ . '/admin_footer.php';
