<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.stats
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
use Joomla\Registry\Registry;
// Uncomment the following line to enable debug mode for testing purposes.
// Note: statistics will be sent on every page load
// define('PLG_SYSTEM_TOUR_DEBUG', 1);

/**
 * Statistics system plugin. This sends anonymous data back to the Joomla! Project about the
 * PHP, SQL, Joomla and OS versions
 *
 * @since  3.5
 */
class PlgSystemTour extends JPlugin
{
    /**
     * Listener for the `onBeforeRender` event
     *
     * @return  void
     *
     * @since   3.5
     */
    public function onBeforeRender()
    {
        // Get the application object
        $app = JFactory::getApplication();

        // Run in backend
        if ($app->isAdmin()===true) {
            // Get the input object
            $input = $app->input;
            // Get an instance of the Toolbar
            $toolbar = JToolbar::getInstance('toolbar');
        }
    }
    /**
     * Listener for the `onBeforeCompileHead` event
     *
     * @return  void
     *
     * @since   3.5
     */
    public function onBeforeCompileHead()
    {
        //only going to run these in the backend for now
        $app = JFactory::getApplication();
        if ($app->isAdmin() === true) {
            // Hopscotch Tour File
            JHtml::_('script', JUri::root() . 'media/plg_system_tour/js/hopscotch.js', array('version' => 'auto', 'relative' => true));
            JHtml::_('stylesheet', JUri::root() . 'media/plg_system_tour/css/hopscotch.css', array('version' => 'auto', 'relative' => true));
            //Bootstrap Tour File
            JHtml::_('script', JUri::root() . 'media/plg_system_tour/js/bootstrap-tour.js', array('version' => 'auto', 'relative' => true));
            JHtml::_('stylesheet', JUri::root() . 'media/plg_system_tour/css/bootstrap-tour.css', array('version' => 'auto', 'relative' => true));
            JHtml::_('script', JUri::root() . 'media/plg_system_tour/js/tours.js', array('version' => 'auto', 'relative' => true));
            JHtml::_('script', JUri::root() . 'media/plg_system_tour/js/tours-boot.js', array('version' => 'auto', 'relative' => true));
        }
    }
}