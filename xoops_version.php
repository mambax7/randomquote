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
$moduleDirName = basename(__DIR__);

$modversion = [
    'version'             => 2.2,
    'module_status'       => 'Beta 1',
    'release_date'        => '2018/01/01',
    'name'                => MI_RANDOMQUOTE_NAME,
    'description'         => MI_RANDOMQUOTE_DESC,
    'release'             => '2018-01-01',
    'author'              => 'XOOPS Development Team',
    'author_mail'         => 'name@site.com',
    'author_website_url'  => 'https://xoops.org',
    'author_website_name' => 'XOOPS Project',
    'credits'             => 'XOOPS Development Team',
    //    'license' => 'GPL 2.0 or later',
    'help'                => 'page=help',
    'license'             => 'GPL 2.0 or later',
    'license_url'         => 'www.gnu.org/licenses/gpl-2.0.html',

    'release_info' => 'release_info',
    'release_file' => XOOPS_URL . "/modules/{$moduleDirName}/docs/release_info file",

    'manual'              => 'Installation.txt',
    'manual_file'         => XOOPS_URL . "/modules/{$moduleDirName}/docs/link to manual file",
    'min_php'             => '5.5',
    'min_xoops'           => '2.5.9',
    'min_admin'           => '1.2',
    'min_db'              => ['mysql' => '5.5'],
    'image'               => 'assets/images/logoModule.png',
    'dirname'             => $moduleDirName,
    'modicons16'          => 'assets/images/icons/16',
    'modicons32'          => 'assets/images/icons/32',
    //About
    'demo_site_url'       => 'https://xoops.org',
    'demo_site_name'      => 'XOOPS Demo Site',
    'support_url'         => 'https://xoops.org/modules/newbb',
    'support_name'        => 'Support Forum',
    'module_website_url'  => 'www.xoops.org',
    'module_website_name' => 'XOOPS Project',
    // Admin system menu
    'system_menu'         => 1,
    // Admin things
    'hasAdmin'            => 1,
    'adminindex'          => 'admin/index.php',
    'adminmenu'           => 'admin/menu.php',
    // Menu
    'hasMain'             => 1,
    // Scripts to run upon installation or update
    'onInstall'           => 'include/oninstall.php',
    'onUpdate'            => 'include/onupdate.php',
    'onUninstall'         => 'include/onuninstall.php',
    // ------------------- Mysql -----------------------------
    'sqlfile'             => ['mysql' => 'sql/mysql.sql'],
    // ------------------- Tables ----------------------------
    'tables'              => [
        $moduleDirName . '_' . 'quotes',
        $moduleDirName . '_' . 'category',
    ],
];
// ------------------- Search -----------------------------//
$modversion['hasSearch']      = 1;
$modversion['search']['file'] = 'include/search.inc.php';
$modversion['search']['func'] = 'randomquote_search';
//  ------------------- Comments -----------------------------//
$modversion['hasComments']          = 1;
$modversion['comments']['itemName'] = 'com_id';
$modversion['comments']['pageName'] = 'comments.php';
// Comment callback functions
$modversion['comments']['callbackFile']        = 'include/comment_functions.php';
$modversion['comments']['callback']['approve'] = 'randomquote_com_approve';
$modversion['comments']['callback']['update']  = 'randomquote_com_update';
//  ------------------- Templates -----------------------------//
$modversion['templates'][] = ['file' => 'randomquote_header.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'randomquote_index.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'randomquote_quotes.tpl', 'description' => ''];

$modversion['templates'][] = ['file' => 'randomquote_quotes_list.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'randomquote_category.tpl', 'description' => ''];

$modversion['templates'][] = ['file' => 'randomquote_category_list.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'randomquote_footer.tpl', 'description' => ''];

$modversion['templates'][] = ['file' => 'admin/randomquote_admin_about.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'admin/randomquote_admin_help.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'admin/randomquote_admin_category.tpl', 'description' => ''];

// ------------------- Help files ------------------- //
$modversion['helpsection'] = [
    ['name' => MI_RANDOMQUOTE_OVERVIEW, 'link' => 'page=help'],
    ['name' => MI_RANDOMQUOTE_DISCLAIMER, 'link' => 'page=disclaimer'],
    ['name' => MI_RANDOMQUOTE_LICENSE, 'link' => 'page=license'],
    ['name' => MI_RANDOMQUOTE_SUPPORT, 'link' => 'page=support'],
];

// ------------------- Blocks -----------------------------//
$modversion['blocks'][] = [
    'file'        => 'quotes.php',
    'name'        => MI_RANDOMQUOTE_QUOTES_BLOCK,
    'description' => '',
    'show_func'   => 'showRandomquoteQuotes',
    'edit_func'   => 'editRandomquoteQuotes',
    'options'     => '|5|25|0',
    'template'    => 'randomquote_quotes_block.tpl'
];

$modversion['blocks'][] = [
    'file'        => 'category.php',
    'name'        => MI_RANDOMQUOTE_CATEGORY_BLOCK,
    'description' => '',
    'show_func'   => 'showRandomquoteCategory',
    'edit_func'   => 'editRandomquoteCategory',
    'options'     => '|5|25|0',
    'template'    => 'randomquote_category_block.tpl'
];

// ------------------- Blocks ------------------- //
$modversion['blocks'] = [
    [
        'file'        => 'views.php',
        'name'        => _MI_RANDOMQUOTE_QUOTES_BLOCK_RECENT,
        'description' => _MI_RANDOMQUOTE_QUOTES_BLOCK_RECENT_DESC,
        'show_func'   => 'showRandomquoteBlockViews',
        'edit_func'   => 'editRandomquoteBlockViews',
        'options'     => 'recent|5|100|0',
        'template'    => $moduleDirName . '_quotes_block_recent.tpl'
    ],

    [
        'file'        => 'views.php',
        'name'        => _MI_RANDOMQUOTE_QUOTES_BLOCK_DAY,
        'description' => _MI_RANDOMQUOTE_QUOTES_BLOCK_DAY_DESC,
        'show_func'   => 'showRandomquoteBlockViews',
        'edit_func'   => 'editRandomquoteBlockViews',
        'options'     => 'day|5|100|0',
        'template'    => $moduleDirName . '_quotes_block_day.tpl'
    ],

    [
        'file'        => 'views.php',
        'name'        => _MI_RANDOMQUOTE_QUOTES_BLOCK_RANDOM,
        'description' => _MI_RANDOMQUOTE_QUOTES_BLOCK_RANDOM_DESC,
        'show_func'   => 'showRandomquoteBlockViews',
        'edit_func'   => 'editRandomquoteBlockViews',
        'options'     => 'random|5|100|0',
        'template'    => $moduleDirName . '_quotes_block_random.tpl'
    ],

    [
        'file'        => 'quotes.php',
        'name'        => MI_RANDOMQUOTE_QUOTES_BLOCK,
        'description' => '',
        'show_func'   => 'showRandomquoteQuotes',
        'edit_func'   => 'editRandomquoteQuotes',
        'options'     => '|5|100|0',
        'template'    => $moduleDirName . '_quotes_block.tpl'
    ],

    [
        'file'        => 'category.php',
        'name'        => MI_RANDOMQUOTE_CATEGORY_BLOCK,
        'description' => '',
        'show_func'   => 'showRandomquoteCategory',
        'edit_func'   => 'editRandomquoteCategory',
        'options'     => '|5|100|0',
        'template'    => $moduleDirName . '_category_block.tpl'
    ]

];

// ------------------- Config Options -----------------------------//
xoops_load('xoopseditorhandler');
$editorHandler          = \XoopsEditorHandler::getInstance();
$modversion['config'][] = [
    'name'        => 'randomquoteEditorAdmin',
    'title'       => 'MI_RANDOMQUOTE_EDITOR_ADMIN',
    'description' => 'MI_RANDOMQUOTE_EDITOR_DESC_ADMIN',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'options'     => array_flip($editorHandler->getList()),
    'default'     => 'tinymce'
];

$modversion['config'][] = [
    'name'        => 'randomquoteEditorUser',
    'title'       => 'MI_RANDOMQUOTE_EDITOR_USER',
    'description' => 'MI_RANDOMQUOTE_EDITOR_DESC_USER',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'options'     => array_flip($editorHandler->getList()),
    'default'     => 'dhtmltextarea'
];

// -------------- Get groups --------------
/** @var XoopsMemberHandler $memberHandler */
$memberHandler = xoops_getHandler('member');
$xoopsGroups   = $memberHandler->getGroupList();
foreach ($xoopsGroups as $key => $group) {
    $groups[$group] = $key;
}
$modversion['config'][] = [
    'name'        => 'groups',
    'title'       => 'MI_RANDOMQUOTE_GROUPS',
    'description' => 'MI_RANDOMQUOTE_GROUPS_DESC',
    'formtype'    => 'select_multi',
    'valuetype'   => 'array',
    'options'     => $groups,
    'default'     => $groups
];

// -------------- Get Admin groups --------------
$criteria = new CriteriaCompo ();
$criteria->add(new Criteria ('group_type', 'Admin'));
/** @var XoopsMemberHandler $memberHandler */
$memberHandler    = xoops_getHandler('member');
$adminXoopsGroups = $memberHandler->getGroupList($criteria);
foreach ($adminXoopsGroups as $key => $adminGroup) {
    $admin_groups[$adminGroup] = $key;
}
$modversion['config'][] = [
    'name'        => 'admin_groups',
    'title'       => 'MI_RANDOMQUOTE_ADMINGROUPS',
    'description' => 'MI_RANDOMQUOTE_ADMINGROUPS_DESC',
    'formtype'    => 'select_multi',
    'valuetype'   => 'array',
    'options'     => $admin_groups,
    'default'     => $admin_groups
];

$modversion['config'][] = [
    'name'        => 'keywords',
    'title'       => 'MI_RANDOMQUOTE_KEYWORDS',
    'description' => 'MI_RANDOMQUOTE_KEYWORDS_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => 'randomquote,quotes, category'
];

// --------------Uploads : maxsize of image --------------
$modversion['config'][] = [
    'name'        => 'maxsize',
    'title'       => 'MI_RANDOMQUOTE_MAXSIZE',
    'description' => 'MI_RANDOMQUOTE_MAXSIZE_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 5000000
];

// --------------Uploads : mimetypes of image --------------
$modversion['config'][] = [
    'name'        => 'mimetypes',
    'title'       => 'MI_RANDOMQUOTE_MIMETYPES',
    'description' => 'MI_RANDOMQUOTE_MIMETYPES_DESC',
    'formtype'    => 'select_multi',
    'valuetype'   => 'array',
    'default'     => ['image/gif', 'image/jpeg', 'image/png'],
    'options'     => [
        'bmp'   => 'image/bmp',
        'gif'   => 'image/gif',
        'pjpeg' => 'image/pjpeg',
        'jpeg'  => 'image/jpeg',
        'jpg'   => 'image/jpg',
        'jpe'   => 'image/jpe',
        'png'   => 'image/png'
    ]
];

$modversion['config'][] = [
    'name'        => 'adminpager',
    'title'       => 'MI_RANDOMQUOTE_ADMINPAGER',
    'description' => 'MI_RANDOMQUOTE_ADMINPAGER_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 10
];

$modversion['config'][] = [
    'name'        => 'userpager',
    'title'       => 'MI_RANDOMQUOTE_USERPAGER',
    'description' => 'MI_RANDOMQUOTE_USERPAGER_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 10
];

$modversion['config'][] = [
    'name'        => 'advertise',
    'title'       => 'MI_RANDOMQUOTE_ADVERTISE',
    'description' => 'MI_RANDOMQUOTE_ADVERTISE_DESC',
    'formtype'    => 'textarea',
    'valuetype'   => 'text',
    'default'     => ''
];

$modversion['config'][] = [
    'name'        => 'bookmarks',
    'title'       => 'MI_RANDOMQUOTE_BOOKMARKS',
    'description' => 'MI_RANDOMQUOTE_BOOKMARKS_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0
];

$modversion['config'][] = [
    'name'        => 'fbcomments',
    'title'       => 'MI_RANDOMQUOTE_FBCOMMENTS',
    'description' => 'MI_RANDOMQUOTE_FBCOMMENTS_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0
];

// -------------- Notifications randomquote --------------
$modversion['hasNotification']             = 1;
$modversion['notification']['lookup_file'] = 'include/notification.inc.php';
$modversion['notification']['lookup_func'] = 'randomquote_notify_iteminfo';

$modversion['notification']['category'][] = [
    'name'           => 'global',
    'title'          => MI_RANDOMQUOTE_GLOBAL_NOTIFY,
    'description'    => MI_RANDOMQUOTE_GLOBAL_NOTIFY_DESC,
    'subscribe_from' => ['index.php', 'viewcat.php', 'singlefile.php']
];

$modversion['notification']['category'][] = [
    'name'           => 'category',
    'title'          => MI_RANDOMQUOTE_CATEGORY_NOTIFY,
    'description'    => MI_RANDOMQUOTE_CATEGORY_NOTIFY_DESC,
    'subscribe_from' => ['viewcat.php', 'singlefile.php'],
    'item_name'      => 'cid',
    'allow_bookmark' => 1
];

$modversion['notification']['category'][] = [
    'name'           => 'file',
    'title'          => MI_RANDOMQUOTE_FILE_NOTIFY,
    'description'    => MI_RANDOMQUOTE_FILE_NOTIFY_DESC,
    'subscribe_from' => 'singlefile.php',
    'item_name'      => 'lid',
    'allow_bookmark' => 1
];

$modversion['notification']['event'][] = [
    'name'          => 'new_category',
    'category'      => 'global',
    'title'         => MI_RANDOMQUOTE_GLOBAL_NEWCATEGORY_NOTIFY,
    'caption'       => MI_RANDOMQUOTE_GLOBAL_NEWCATEGORY_NOTIFY_CAPTION,
    'description'   => MI_RANDOMQUOTE_GLOBAL_NEWCATEGORY_NOTIFY_DESC,
    'mail_template' => 'global_newcategory_notify',
    'mail_subject'  => MI_RANDOMQUOTE_GLOBAL_NEWCATEGORY_NOTIFY_SUBJECT
];

$modversion['notification']['event'][] = [
    'name'          => 'file_modify',
    'category'      => 'global',
    'admin_only'    => 1,
    'title'         => MI_RANDOMQUOTE_GLOBAL_FILEMODIFY_NOTIFY,
    'caption'       => MI_RANDOMQUOTE_GLOBAL_FILEMODIFY_NOTIFY_CAPTION,
    'description'   => MI_RANDOMQUOTE_GLOBAL_FILEMODIFY_NOTIFY_DESC,
    'mail_template' => 'global_filemodify_notify',
    'mail_subject'  => MI_RANDOMQUOTE_GLOBAL_FILEMODIFY_NOTIFY_SUBJECT
];

$modversion['notification']['event'][] = [
    'name'          => 'file_broken',
    'category'      => 'global',
    'admin_only'    => 1,
    'title'         => MI_RANDOMQUOTE_GLOBAL_FILEBROKEN_NOTIFY,
    'caption'       => MI_RANDOMQUOTE_GLOBAL_FILEBROKEN_NOTIFY_CAPTION,
    'description'   => MI_RANDOMQUOTE_GLOBAL_FILEBROKEN_NOTIFY_DESC,
    'mail_template' => 'global_filebroken_notify',
    'mail_subject'  => MI_RANDOMQUOTE_GLOBAL_FILEBROKEN_NOTIFY_SUBJECT
];

$modversion['notification']['event'][] = [
    'name'          => 'file_submit',
    'category'      => 'global',
    'admin_only'    => 1,
    'title'         => MI_RANDOMQUOTE_GLOBAL_FILESUBMIT_NOTIFY,
    'caption'       => MI_RANDOMQUOTE_GLOBAL_FILESUBMIT_NOTIFY_CAPTION,
    'description'   => MI_RANDOMQUOTE_GLOBAL_FILESUBMIT_NOTIFY_DESC,
    'mail_template' => 'global_filesubmit_notify',
    'mail_subject'  => MI_RANDOMQUOTE_GLOBAL_FILESUBMIT_NOTIFY_SUBJECT
];

$modversion['notification']['event'][] = [
    'name'          => 'new_file',
    'category'      => 'global',
    'title'         => MI_RANDOMQUOTE_GLOBAL_NEWFILE_NOTIFY,
    'caption'       => MI_RANDOMQUOTE_GLOBAL_NEWFILE_NOTIFY_CAPTION,
    'description'   => MI_RANDOMQUOTE_GLOBAL_NEWFILE_NOTIFY_DESC,
    'mail_template' => 'global_newfile_notify',
    'mail_subject'  => MI_RANDOMQUOTE_GLOBAL_NEWFILE_NOTIFY_SUBJECT
];

$modversion['notification']['event'][] = [
    'name'          => 'file_submit',
    'category'      => 'category',
    'admin_only'    => 1,
    'title'         => MI_RANDOMQUOTE_CATEGORY_FILESUBMIT_NOTIFY,
    'caption'       => MI_RANDOMQUOTE_CATEGORY_FILESUBMIT_NOTIFY_CAPTION,
    'description'   => MI_RANDOMQUOTE_CATEGORY_FILESUBMIT_NOTIFY_DESC,
    'mail_template' => 'category_filesubmit_notify',
    'mail_subject'  => MI_RANDOMQUOTE_CATEGORY_FILESUBMIT_NOTIFY_SUBJECT
];

$modversion['notification']['event'][] = [
    'name'          => 'new_file',
    'category'      => 'category',
    'title'         => MI_RANDOMQUOTE_CATEGORY_NEWFILE_NOTIFY,
    'caption'       => MI_RANDOMQUOTE_CATEGORY_NEWFILE_NOTIFY_CAPTION,
    'description'   => MI_RANDOMQUOTE_CATEGORY_NEWFILE_NOTIFY_DESC,
    'mail_template' => 'category_newfile_notify',
    'mail_subject'  => MI_RANDOMQUOTE_CATEGORY_NEWFILE_NOTIFY_SUBJECT
];

$modversion['notification']['event'][] = [
    'name'          => 'approve',
    'category'      => 'file',
    'admin_only'    => 1,
    'title'         => MI_RANDOMQUOTE_FILE_APPROVE_NOTIFY,
    'caption'       => MI_RANDOMQUOTE_FILE_APPROVE_NOTIFY_CAPTION,
    'description'   => MI_RANDOMQUOTE_FILE_APPROVE_NOTIFY_DESC,
    'mail_template' => 'file_approve_notify',
    'mail_subject'  => MI_RANDOMQUOTE_FILE_APPROVE_NOTIFY_SUBJECT
];
