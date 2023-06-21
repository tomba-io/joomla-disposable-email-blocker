<?php

/**
 * @license		GNU General Public License version 2
 */

defined('_JEXEC') or die;

class JFormFieldAbout extends JFormField
{
	protected $type = 'About';
	/**
	 * Method to get the field options.
	 *
	 * @return  array  The field option objects.
	 */
	protected function getInput()
	{
		// HTML
		$html[] = '<div class="row-fluid">';
		$html[] = '  <div class="span8">';
		$html[] = '    ' . JText::_('PLG_CONTENT_TOMBA_ABOUT_DESC');
		$html[] = '  </div>';
		$html[] = '</div>';

		return implode("\n", $html);
	}
}
