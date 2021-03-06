<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010 Toni Milovan <tmilovan@fwd.hr>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 * Hint: use extdeveval to insert/update function index above.
 */

require_once(PATH_tslib.'class.tslib_pibase.php');


/**
 * Plugin 'Google custom search results' for the 'googlecse' extension.
 *
 * @author	Toni Milovan <tmilovan@fwd.hr>
 * @package	TYPO3
 * @subpackage	tx_googlecse
 */
class tx_googlecse_pi1 extends tslib_pibase {
	var $prefixId      = 'tx_googlecse_pi1';		// Same as class name
	var $scriptRelPath = 'pi1/class.tx_googlecse_pi1.php';	// Path to this script relative to the extension dir.
	var $extKey        = 'googlecse';	// The extension key.

	/**
	 * The main method of the PlugIn
	 *
	 * @param	string		$content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	function main($content, $conf) {
		$this->conf = $conf;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();
		$this->pi_USER_INT_obj = 1;	// Configuring so caching is not expected. This value means that no cHash params are ever set. We do this, because it's a USER_INT object!
		// Get the template
		$this->templateHtml = $this->cObj->fileResource($conf['templateFile']);
		$template = $this->cObj->getSubpart($this->templateCode,'###TEMPLATE###');
		// Extract subparts from the template
		 $subpart = $this->cObj->getSubpart($this->templateHtml, '###TEMPLATE###');
		// Fill marker array
		$markerArray['###GOOGLE_CSE_KEY###'] = $this->conf['googleCSEkey'];
		$markerArray['###GOOGLE_CSE_QUERY###'] = $_POST['tx_indexedsearch']['sword'];
		$markerArray['###GOOGLE_CSE_LANGUAGE###'] = $this->conf['language'];;
		// Create the content by replacing the content markers in the template
		$content = $this->cObj->substituteMarkerArray($subpart, $markerArray);
		return $this->pi_wrapInBaseClass($content);
	}
}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/googlecse/pi1/class.tx_googlecse_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/googlecse/pi1/class.tx_googlecse_pi1.php']);
}

?>