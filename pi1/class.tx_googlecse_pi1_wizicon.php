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




/**
 * Class that adds the wizard icon.
 *
 * @author	Toni Milovan <tmilovan@fwd.hr>
 * @author  Todd Hossack <todd@tiraki.com> (Maintainance updates)
 * @package	TYPO3
 * @subpackage	tx_googlecse
 */
class tx_googlecse_pi1_wizicon {

					/**
					 * Processing the wizard items array
					 *
					 * @param	array		$wizardItems: The wizard items
					 * @return	Modified array with wizard items
					 */
					function proc($wizardItems)	{
						global $LANG;

						$LL = $this->includeLocalLang();

						$wizardItems['plugins_tx_googlecse_pi1'] = array(
							'icon'=>TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('googlecse').'pi1/ce_wiz.gif',
							'title'=>$LANG->getLLL('pi1_title',$LL),
							'description'=>$LANG->getLLL('pi1_plus_wiz_description',$LL),
							'params'=>'&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=googlecse_pi1'
						);

						return $wizardItems;
					}

					/**
					 * Reads the [extDir]/locallang.xml and returns the $LOCAL_LANG array found in that file.
					 *
					 * @return	The array with language labels
					 */
					function includeLocalLang()	{
						$llFile = TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('googlecse').'locallang.xml';
						$version = class_exists('TYPO3\CMS\Core\Utility\VersionNumberUtility::')
							? TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(TYPO3_version)
							: TYPO3\CMS\Core\Utility\GeneralUtility::int_from_ver(TYPO3_version);
						if($version >= 4007000) {
							$localizationParser = TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Core\Localization\Parser\LocallangXmlParser');
							$LOCAL_LANG = $localizationParser->getParsedData($llFile, $GLOBALS['LANG']->lang);
						} else {
							$LOCAL_LANG = TYPO3\CMS\Core\Utility\GeneralUtility::readLLXMLfile($llFile, $GLOBALS['LANG']->lang);
						}
						return $LOCAL_LANG;
					}
				}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/googlecse/pi1/class.tx_googlecse_pi1_wizicon.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/googlecse/pi1/class.tx_googlecse_pi1_wizicon.php']);
}

?>