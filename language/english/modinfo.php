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
// Admin
define('MI_RANDOMQUOTE_NAME', 'Randomquote');
define('MI_RANDOMQUOTE_DESC', '&lt;p&gt;This module is for doing following...&lt;/p&gt;');
//Menu
define('MI_RANDOMQUOTE_ADMENU1', 'Home');
define('MI_RANDOMQUOTE_ADMENU2', 'Quote');
define('MI_RANDOMQUOTE_ADMENU3', 'Category');
define('MI_RANDOMQUOTE_ADMENU4', 'Permissions');
define('MI_RANDOMQUOTE_ADMENU5', 'About');
//Blocks
define('MI_RANDOMQUOTE_QUOTES_BLOCK', 'Quotes block');
define('MI_RANDOMQUOTE_CATEGORY_BLOCK', 'Category block');
//Config
define('MI_RANDOMQUOTE_EDITOR_ADMIN', 'Editor: Admin');
define('MI_RANDOMQUOTE_EDITOR_ADMIN_DESC', 'Select the Editor to use by the Admin');
define('MI_RANDOMQUOTE_EDITOR_USER', 'Editor: User');
define('MI_RANDOMQUOTE_EDITOR_USER_DESC', 'Select the Editor to use by the User');
define('MI_RANDOMQUOTE_KEYWORDS', 'Keywords');
define('MI_RANDOMQUOTE_KEYWORDS_DESC', 'Insert here the keywords (separate by comma)');
define('MI_RANDOMQUOTE_ADMINPAGER', 'Admin: records / page');
define('MI_RANDOMQUOTE_ADMINPAGER_DESC', 'Admin: # of records shown per page');
define('MI_RANDOMQUOTE_USERPAGER', 'User: records / page');
define('MI_RANDOMQUOTE_USERPAGER_DESC', 'User: # of records shown per page');
define('MI_RANDOMQUOTE_MAXSIZE', 'Max size');
define('MI_RANDOMQUOTE_MAXSIZE_DESC', 'Set a number of max size uploads file in byte');
define('MI_RANDOMQUOTE_MIMETYPES', 'Mime Types');
define('MI_RANDOMQUOTE_MIMETYPES_DESC', 'Set the mime types selected');
define('MI_RANDOMQUOTE_IDPAYPAL', 'Paypal ID');
define('MI_RANDOMQUOTE_IDPAYPAL_DESC', 'Insert here your PayPal ID for donactions.');
define('MI_RANDOMQUOTE_ADVERTISE', 'Advertisement Code');
define('MI_RANDOMQUOTE_ADVERTISE_DESC', 'Insert here the advertisement code');
define('MI_RANDOMQUOTE_BOOKMARKS', 'Social Bookmarks');
define('MI_RANDOMQUOTE_BOOKMARKS_DESC', 'Show Social Bookmarks in the form');
define('MI_RANDOMQUOTE_FBCOMMENTS', 'Facebook comments');
define('MI_RANDOMQUOTE_FBCOMMENTS_DESC', 'Allow Facebook comments in the form');
// Notifications
define('MI_RANDOMQUOTE_GLOBAL_NOTIFY', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_GLOBAL_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_CATEGORY_NOTIFY', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_CATEGORY_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_FILE_NOTIFY', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_FILE_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_GLOBAL_NEWCATEGORY_NOTIFY', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_GLOBAL_NEWCATEGORY_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_GLOBAL_NEWCATEGORY_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_GLOBAL_NEWCATEGORY_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_GLOBAL_FILEMODIFY_NOTIFY', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_GLOBAL_FILEMODIFY_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_GLOBAL_FILEMODIFY_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_GLOBAL_FILEMODIFY_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_GLOBAL_FILEBROKEN_NOTIFY', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_GLOBAL_FILEBROKEN_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_GLOBAL_FILEBROKEN_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_GLOBAL_FILEBROKEN_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_GLOBAL_FILESUBMIT_NOTIFY', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_GLOBAL_FILESUBMIT_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_GLOBAL_FILESUBMIT_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_GLOBAL_FILESUBMIT_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_GLOBAL_NEWFILE_NOTIFY', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_GLOBAL_NEWFILE_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_GLOBAL_NEWFILE_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_GLOBAL_NEWFILE_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_CATEGORY_FILESUBMIT_NOTIFY', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_CATEGORY_FILESUBMIT_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_CATEGORY_FILESUBMIT_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_CATEGORY_FILESUBMIT_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_CATEGORY_NEWFILE_NOTIFY', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_CATEGORY_NEWFILE_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_CATEGORY_NEWFILE_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_CATEGORY_NEWFILE_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_FILE_APPROVE_NOTIFY', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_FILE_APPROVE_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_FILE_APPROVE_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_RANDOMQUOTE_FILE_APPROVE_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');

// Help
define('MI_RANDOMQUOTE_DIRNAME', basename(dirname(dirname(__DIR__))));
define('MI_RANDOMQUOTE_HELP_HEADER', __DIR__ . '/help/helpheader.tpl');
define('MI_RANDOMQUOTE_BACK_2_ADMIN', 'Back to Administration of ');
define('MI_RANDOMQUOTE_OVERVIEW', 'Overview');
// The name of this module
//define('MI_RANDOMQUOTE_NAME', 'YYYYY Module Name');

//define('MI_RANDOMQUOTE_HELP_DIR', __DIR__);

//help multi-page
define('MI_RANDOMQUOTE_DISCLAIMER', 'Disclaimer');
define('MI_RANDOMQUOTE_LICENSE', 'License');
define('MI_RANDOMQUOTE_SUPPORT', 'Support');
//define('MI_RANDOMQUOTE_REQUIREMENTS', 'Requirements');
//define('MI_RANDOMQUOTE_CREDITS', 'Credits');
//define('MI_RANDOMQUOTE_HOWTO', 'How To');
//define('MI_RANDOMQUOTE_UPDATE', 'Update');
//define('MI_RANDOMQUOTE_INSTALL', 'Install');
//define('MI_RANDOMQUOTE_HISTORY', 'History');
//define('MI_RANDOMQUOTE_HELP1', 'YYYYY');
//define('MI_RANDOMQUOTE_HELP2', 'YYYYY');
//define('MI_RANDOMQUOTE_HELP3', 'YYYYY');
//define('MI_RANDOMQUOTE_HELP4', 'YYYYY');
//define('MI_RANDOMQUOTE_HELP5', 'YYYYY');
//define('MI_RANDOMQUOTE_HELP6', 'YYYYY');

// Permissions Groups
define('MI_RANDOMQUOTE_GROUPS', 'Groups access');
define('MI_RANDOMQUOTE_GROUPS_DESC', 'Select general access permission for groups.');
define('MI_RANDOMQUOTE_ADMINGROUPS', 'Admin Group Permissions');
define('MI_RANDOMQUOTE_ADMINGROUPS_DESC', 'Which groups have access to tools and permissions page');

//Blocks
define('_MI_RANDOMQUOTE_QUOTES_BLOCK_RECENT', 'Recent Quotes');
define('_MI_RANDOMQUOTE_QUOTES_BLOCK_DAY', "Today's Quote");
define('_MI_RANDOMQUOTE_QUOTES_BLOCK_RANDOM', 'Random Quote');
define('_MI_RANDOMQUOTE_QUOTES_BLOCK_RECENT_DESC', '');
define('_MI_RANDOMQUOTE_QUOTES_BLOCK_DAY_DESC', '');
define('_MI_RANDOMQUOTE_QUOTES_BLOCK_RANDOM_DESC', '');
