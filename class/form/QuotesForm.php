<?php namespace Xoopsmodules\randomquote\form;

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

require_once __DIR__ . '/../../include/common.php';

$moduleDirName = basename(dirname(dirname(__DIR__)));
$helper        = randomquote\Helper::getInstance();
$permHelper    = new \Xmf\Module\Helper\Permission();

xoops_load('XoopsFormLoader');

/**
 * Class QuotesForm
 */
class QuotesForm extends \XoopsThemeForm
{
    public $targetObject;

    /**
     * Constructor
     *
     * @param $target
     */
    public function __construct($target)
    {
        global $helper;
        $this->targetObject = $target;

        $title = $this->targetObject->isNew() ? sprintf(AM_RANDOMQUOTE_QUOTES_ADD) : sprintf(AM_RANDOMQUOTE_QUOTES_EDIT);
        parent::__construct($title, 'form', xoops_getenv('PHP_SELF'), 'post', true);
        $this->setExtra('enctype="multipart/form-data"');

        //include ID field, it's needed so the module knows if it is a new form or an edited form

        $hidden = new \XoopsFormHidden('id', $this->targetObject->getVar('id'));
        $this->addElement($hidden);
        unset($hidden);

        // Id
        $this->addElement(new \XoopsFormLabel(AM_RANDOMQUOTE_QUOTES_ID, $this->targetObject->getVar('id'), 'id'));
        // Quote
        if (class_exists('XoopsFormEditor')) {
            $editorOptions           = [];
            $editorOptions['name']   = 'quote';
            $editorOptions['value']  = $this->targetObject->getVar('quote', 'e');
            $editorOptions['rows']   = 5;
            $editorOptions['cols']   = 40;
            $editorOptions['width']  = '100%';
            $editorOptions['height'] = '400px';
            //$editorOptions['editor'] = xoops_getModuleOption('randomquote_editor', 'randomquote');
            //$this->addElement( new \XoopsFormEditor(AM_RANDOMQUOTE_QUOTES_QUOTE, 'quote', $editorOptions), false  );
            if ($helper->isUserAdmin()) {
                $descEditor = new \XoopsFormEditor(AM_RANDOMQUOTE_QUOTES_QUOTE, $helper->getConfig('randomquoteEditorAdmin'), $editorOptions, $nohtml = false, $onfailure = 'textarea');
            } else {
                $descEditor = new \XoopsFormEditor(AM_RANDOMQUOTE_QUOTES_QUOTE, $helper->getConfig('randomquoteEditorUser'), $editorOptions, $nohtml = false, $onfailure = 'textarea');
            }
        } else {
            $descEditor = new \XoopsFormDhtmlTextArea(AM_RANDOMQUOTE_QUOTES_QUOTE, 'description', $this->targetObject->getVar('description', 'e'), '100%', '100%');
        }
        $this->addElement($descEditor);
        // Author
        $this->addElement(new \XoopsFormText(AM_RANDOMQUOTE_QUOTES_AUTHOR, 'author', 50, 255, $this->targetObject->getVar('author')), false);
        // Online
        $this->addElement(new \XoopsFormText(AM_RANDOMQUOTE_QUOTES_ONLINE, 'online', 50, 255, $this->targetObject->getVar('online')), false);
        // Created
        $this->addElement(new \XoopsFormTextDateSelect(AM_RANDOMQUOTE_QUOTES_CREATED, 'created', '', strtotime($this->targetObject->getVar('created'))));
        // Cid
        //$categoryHandler = xoops_getModuleHandler('category', 'randomquote');        
        $db = \XoopsDatabaseFactory::getDatabaseConnection();
        /** @var \XoopsPersistableObjectHandler $categoryHandler */
        $categoryHandler = new randomquote\CategoryHandler($db);

        $category_id_select = new \XoopsFormSelect(AM_RANDOMQUOTE_QUOTES_CID, 'cid', $this->targetObject->getVar('cid'));
        $category_id_select->addOptionArray($categoryHandler->getList());
        $this->addElement($category_id_select, false);

        $this->addElement(new \XoopsFormHidden('op', 'save'));
        $this->addElement(new \XoopsFormButton('', 'submit', _SUBMIT, 'submit'));
    }
}
