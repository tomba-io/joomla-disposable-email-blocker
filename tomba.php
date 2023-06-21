<?php
defined('_JEXEC') or die;

/**
 * Tomba Plugin.
 */
class plgContentTomba extends JPlugin
{

	/**
	 * Constructor.
	 *
	 * @param	object	&$subject	The object to observe
	 * @param	array	$config		An optional associative array of configuration settings.
	 */
	public function __construct(&$subject, $config)
	{
		parent::__construct($subject, $config);
	}


	/**
	 * Displays the disposable email blocker when viewing an content  is displayed before the content.
	 *
	 * @see https://docs.joomla.org/Plugin/Events/Content#onContentBeforeDisplay
	 * @return	string	HTML string containing code for the disposable email blocker.
	 */
	public function onContentBeforeDisplay($context, &$row, &$params, $page = 0)
	{
		return $this->Tomba();
	}


	/**
	 * Displays the disposable email blocker when viewing an content  is displayed after the content.
	 *
	 * @see https://docs.joomla.org/Plugin/Events/Content#onContentAfterDisplay
	 * @return	string	HTML string containing code for the disposable email blocker.
	 */
	public function onContentAfterDisplay($context, &$row, &$params, $page = 0)
	{
		return $this->Tomba();
	}
	public function onContentPrepareForm($form, $data)
	{
		return $this->Tomba();
	}

	/**
	 * Displays the disposable email blocker.
	 *
	 * @return	string	HTML string containing code for the disposable email blocker.
	 */
	private function Tomba()
	{

		JFactory::getDocument()->addScript('https://cdn.jsdelivr.net/npm/disposable-email-blocker/disposable-email-blocker.min.js');

		$message_disposable = $this->params->get('message_disposable');
		$webmail_message = $this->params->get('webmail_message');
		$webmail_block = $this->params->get('webmail_block');

		JFactory::getDocument()->addScriptDeclaration('
		const defaults = { disposable: { message: "' . $message_disposable . '", }, webmail: { message: "' . $webmail_message . '", block: "' . $webmail_block . '", }};
		new Disposable.Blocker(defaults);
		');
	}
}
