<?php
/**
 *
 * phpBB Modders Menu extension for the phpBB Forum Software package
 *
 * @copyright (c) 2024, phpBB Modders, https://www.phpbbmodders.com/
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace phpbbmodders\menu;

/**
 * phpBB Modders Menu extension base
 *
 * Handles the switch from the old "modders/menu" package name.
 */
class ext extends \phpbb\extension\base
{
	/** Package name this extension used before the phpbbmodders vendor rename */
	const OLD_EXT_NAME = 'modders/menu';

	/**
	 * Refuse to enable below the minimum phpBB and PHP versions.
	 *
	 * Refuse to enable while the old copy is still enabled, otherwise both
	 * would add the menu to every page.
	 *
	 * @return bool|string|array True if enableable, otherwise a reason string or array of reasons
	 */
	public function is_enableable()
	{
		if (!$this->check_phpbb_version() || !$this->check_php_version())
		{
			$language = $this->container->get('language');
			$language->add_lang('install_menu', 'phpbbmodders/menu');

			return $language->lang('MENU_NOT_ENABLEABLE');
		}

		$ext_manager = $this->container->get('ext.manager');

		if ($ext_manager->is_enabled(self::OLD_EXT_NAME))
		{
			return ['Disable the old "' . self::OLD_EXT_NAME . '" extension first.'];
		}

		return true;
	}

	/**
	 * Require phpBB 3.3.19
	 *
	 * @return bool
	 */
	public function check_phpbb_version()
	{
		return phpbb_version_compare(PHPBB_VERSION, '3.3.19', '>=');
	}

	/**
	 * Require PHP 7.4
	 *
	 * @return bool
	 */
	public function check_php_version()
	{
		return PHP_VERSION_ID >= 70400;
	}

	/**
	 * Remove the disabled old "modders/menu" record so it doesn't linger in
	 * the extension list after the rename, then enable as usual.
	 *
	 * @param mixed $old_state State returned by previous call of this method
	 * @return bool|string
	 */
	public function enable_step($old_state)
	{
		if ($old_state === false)
		{
			$db = $this->container->get('dbal.conn');
			$ext_table = $this->container->getParameter('core.table_prefix') . 'ext';

			$db->sql_query('DELETE FROM ' . $ext_table . "
				WHERE ext_name = '" . $db->sql_escape(self::OLD_EXT_NAME) . "'
					AND ext_active = 0");
		}

		return parent::enable_step($old_state);
	}
}
