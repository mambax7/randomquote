<?php
/*
 You may not change or alter any portion of this comment or credits of
 supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit
 authors.

 This program is distributed in the hope that it will be useful, but
 WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * Module: RandomQuote
 *
 * @category        Module
 * @package         randomquote
 * @author          XOOPS Module Development Team
 * @author          Mamba
 * @copyright       {@link https://xoops.org 2001-2016 XOOPS Project}
 * @license         {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @link            https://xoops.org XOOPS
 * @since           2.00
 */

use Xoopsmodules\randomquote;

$moduleDirName = basename(dirname(__DIR__));
require_once $GLOBALS['xoops']->path("/modules/{$moduleDirName}/class/Constants.php");
//require_once XOOPS_ROOT_PATH . '/modules/' . $moduleDirName . '/class/Utility.php';

/**
 *
 * Show a random quote in a block
 *
 * @param array    {
 * @param string   [0] block type
 * @param int      [1] number of quotes to display
 *                 }
 *
 * @return array {
 *                 array {
 * @param string   [quote]
 * @param string   [author]
 */

function showRandomquoteBlockViews($options)
{
    $moduleDirName = basename(dirname(__DIR__));
    //    require_once XOOPS_ROOT_PATH . '/modules/randomquote/class/quotes.php';
    $utility = new randomquote\Utility();

    $quotes       = [];
    $type_block   = $options[0];
    $nb_quotes    = $options[1];
    $length_title = (int)$options[2];

    $quotesHandler = new randomquote\QuotesHandler($GLOBALS['xoopsDB']);
    $criteria      = new CriteriaCompo();
    array_shift($options);
    array_shift($options);
    array_shift($options);

    switch ($type_block) {
        // for block: quotes recent
        case 'recent':
            $criteria->add(new Criteria('online', 1));
            //            $criteria->setSort("quotes_date_created");
            $criteria->setSort('id');
            $criteria->setOrder('DESC');
            break;
        // for block: quotes today's
        case 'day':
            $criteria->add(new Criteria('online', 1));
            //            $criteria->add(new Criteria("quotes_date_created", strtotime(date("Y/m/d")), ">="));
            //            $criteria->add(new Criteria("quotes_date_created", strtotime(date("Y/m/d")) + 86400, "<="));
            //            $criteria->setSort("quotes_date_created");
            $criteria->setOrder('ASC');
            $criteria->setSort('RAND()');
            break;
        // for block: quotes random
        case 'random':
            $criteria->add(new Criteria('online', 1));
            $criteria->setSort('RAND()');
            break;
    }

    $criteria->setLimit($nb_quotes);
    $quoteObjsArray = $quotesHandler->getAll($criteria);
    foreach ($quoteObjsArray as $thisQuote) {
        if ($length_title > 0) {
            //            $short_quote = xoops_substr($thisQuote->getVar('quote'), 0, $length_title, $trimmarker = '...');
            $short_quote = $utility::truncateHtml($thisQuote->getVar('quote'), $length_title, $ending = '...', $exact = false, $considerHtml = true);
        } else {
            $short_quote = $thisQuote->getVar('quote');
        }
        $quotes[] = [
            'quote'  => $short_quote,
            'author' => $thisQuote->getVar('author')
        ];
    }

    return $quotes;
}

/**
 * @param array $options Preferences config array
 *
 * @return string HTML form to edit module options
 */
function editRandomquoteBlockViews($options)
{
    $quotes_arr = [];
    $form       = ''
                  . _MB_RANDOMQUOTE_QUOTES_DISPLAY
                  . "\n"
                  . "<input type='hidden' name='options[0]' value='{$options[0]}'>\n"
                  . "<input type='text' name='options[1]' value='{$options[1]}' size='3' maxlength='4'>&nbsp;<br>\n"
                  . ''
                  . _MB_RANDOMQUOTE_QUOTES_SHORTEN
                  . " <input type='text' name='options[2]' value='{$options[2]}' size='3' maxlength='5'' min='0'>"
                  . _MB_RANDOMQUOTE_QUOTES_CHARACTERS
                  . '<br><br>';

    //    $form .= '' . _MB_XNEWSLETTER_LETTER_TITLELENGTH
    //             . " : <input name=\"options[2]\" size=\"5\" maxlength=\"255\" value=\"" . $options[2] . "\" type=\"text\"><br><br>";

    array_shift($options);
    array_shift($options);
    array_shift($options);

    return $form;
}
