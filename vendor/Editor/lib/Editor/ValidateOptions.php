<?php

/**
 * DataTables PHP libraries.
 *
 * PHP libraries for DataTables and DataTables Editor.
 *
 * @author    SpryMedia
 * @copyright 2012-2014 SpryMedia ( http://sprymedia.co.uk )
 * @license   http://editor.datatables.net/license DataTables Editor
 *
 * @see       http://editor.datatables.net
 */

namespace DataTables\Editor;

use DataTables\Ext;

/**
 * Common validation options that can be specified for all validation methods.
 */
class ValidateOptions extends Ext
{
	private $_empty = true;
	private $_message = 'Input not valid';
	private $_optional = true;

	public function __construct($opts = null)
	{
		if ($opts) {
			if (isset($opts['empty'])) {
				$this->allowEmpty($opts['empty']);
			}
			if (isset($opts['message'])) {
				$this->message($opts['message']);
			}
			if (isset($opts['optional'])) {
				$this->optional($opts['optional']);
			}
		}
	}

	/**
	 * Get / set the error message to use if validation fails.
	 *
	 * @param string $msg Error message to use. If not given, the currently
	 *                    set message will be returned.
	 *
	 * @return ($msg is null ? string : $this)
	 */
	public function message($msg = null)
	{
		if ($msg === null) {
			return $this->_message;
		}

		$this->_message = $msg;

		return $this;
	}

	/**
	 * Get / set the field empty option.
	 *
	 * @param bool $empty `false` if the field is not allowed to be
	 *                    empty. `true` if it can be.
	 *
	 * @return ($empty is null ? bool : $this)
	 */
	public function allowEmpty($empty = null)
	{
		if ($empty === null) {
			return $this->_empty;
		}

		$this->_empty = $empty;

		return $this;
	}

	/**
	 * Get / set the field optional option.
	 *
	 * @param bool $optional `false` if the field does not need to be
	 *                       submitted. `true` if it must be.
	 *
	 * @return ($optional is null ? bool : $this)
	 */
	public function optional($optional = null)
	{
		if ($optional === null) {
			return $this->_optional;
		}

		$this->_optional = $optional;

		return $this;
	}

	/**
	 * @internal
	 */
	public static function select($user)
	{
		if ($user) {
			return $user;
		}

		return new ValidateOptions();
	}
}
