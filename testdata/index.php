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
use Xoopsmodules\randomquote\common;

require_once __DIR__ . '/../../../mainfile.php';

include __DIR__ . '/../preloads/autoloader.php';

$op = \Xmf\Request::getCmd('op', '');

switch ($op) {
    case 'load':
        loadSampleData();
        break;
}

// XMF TableLoad for SAMPLE data

function loadSampleData()
{
    $moduleDirName = basename(dirname(__DIR__));
    $helper        = randomquote\Helper::getInstance();
    $utility       = new randomquote\Utility();
    $configurator  = new common\Configurator();
    // Load language files
    $helper->loadLanguage('admin');
    $helper->loadLanguage('modinfo');
    $helper->loadLanguage('common');
    $quotesData = \Xmf\Yaml::readWrapped('quotes.yml');
    \Xmf\Database\TableLoad::truncateTable($moduleDirName . '_quotes');
    \Xmf\Database\TableLoad::loadTableFromArray($moduleDirName . '_quotes', $quotesData);

    $categoryData = \Xmf\Yaml::readWrapped('category.yml');
    \Xmf\Database\TableLoad::truncateTable($moduleDirName . '_category');
    \Xmf\Database\TableLoad::loadTableFromArray($moduleDirName . '_category', $categoryData);

    //  ---  COPY test folder files ---------------
    if (count($configurator->copyTestFolders) > 0) {
        //        $file = __DIR__ . '/../testdata/images/';
        foreach (array_keys($configurator->copyTestFolders) as $i) {
            $src  = $configurator->copyTestFolders[$i][0];
            $dest = $configurator->copyTestFolders[$i][1];
            $utility::xcopy($src, $dest);
        }
    }
    redirect_header('../admin/index.php', 1, AM_RANDOMQUOTE_SAMPLEDATA_SUCCESS);
}
