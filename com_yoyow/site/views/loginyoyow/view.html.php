<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 8/10/18
 * Time: 13:13
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * HTML View class for the HelloWorld Component
 *
 * @since  0.0.1
 */
class YoyowViewLoginYoyow extends JViewLegacy
{
    /**
     * Display the Hello World view
     *
     * @param   string $tpl The name of the template file to parse; automatically searches through the template paths.
     *
     * @return  void
     */
    function display($tpl = null)
    {
        $this->addMap();
        parent::display($tpl);
    }

    function addMap(){
        $document = JFactory::getDocument();

        // everything's dependent upon JQuery
        JHtml::_('jquery.framework');


        // ... and our own JS and CSS
//        $document->addStyleSheet(JURI::root() . "media/com_yoyow/css/openstreetmap.css");

        // get the data to pass to our JS code
        $params = $this->get("mapParams");
        $document->addScriptOptions('params', $params);
    }
}