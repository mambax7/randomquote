<?php namespace Xoopsmodules\randomquote;

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
use Xoopsmodules\randomquote\form;

$moduleDirName = basename(dirname(__DIR__));

$permHelper = new \Xmf\Module\Helper\Permission();

/**
 * Class Quotes
 */
class Quotes extends \XoopsObject
{
    /**
     * Constructor
     *
     * @param null
     */
    public function __construct()
    {
        parent::__construct();
        $this->initVar('id', XOBJ_DTYPE_INT);
        $this->initVar('quote', XOBJ_DTYPE_OTHER);
        $this->initVar('author', XOBJ_DTYPE_TXTBOX);
        $this->initVar('online', XOBJ_DTYPE_INT);
        $this->initVar('created', XOBJ_DTYPE_TIMESTAMP);
        $this->initVar('cid', XOBJ_DTYPE_INT);
    }

    /**
     * Get form
     *
     * @return \Xoopsmodules\randomquote\form\QuotesForm
     */
    public function getForm()
    {
        require_once XOOPS_ROOT_PATH . '/modules/randomquote/class/form/QuotesForm.php';

        $form = new form\QuotesForm($this);
        return $form;
    }

    /**
     * @return array|null
     */
    public function getGroupsRead()
    {
        global $permHelper;
        //return $this->publisher->getHandler('permission')->getGrantedGroupsById('quotes_read', id);
        return $permHelper->getGroupsForItem('sbcolumns_read', $this->getVar('id'));
    }

    /**
     * @return array|null
     */
    public function getGroupsSubmit()
    {
        global $permHelper;
        //        return $this->publisher->getHandler('permission')->getGrantedGroupsById('quotes_submit', id);
        return $permHelper->getGroupsForItem('sbcolumns_submit', $this->getVar('id'));
    }

    /**
     * @return array|null
     */
    public function getGroupsModeration()
    {
        global $permHelper;
        //        return $this->publisher->getHandler('permission')->getGrantedGroupsById('quotes_moderation', id);
        return $permHelper->getGroupsForItem('sbcolumns_moderation', $this->getVar('id'));
    }
}

