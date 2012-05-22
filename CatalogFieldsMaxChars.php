<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2010 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Tim Gatzky 2012 
 * @author     Tim Gatzky <info@tim-gatzky.de>
 * @package    Catalog 
 * @license    LGPL 
 * @filesource
 */


class CatalogFieldsMaxChars extends Backend
{
	/**
	 * Trim the field value if longer than the max. chars. setting for this field
	 * @param object DataContainer
	 * @return string
	 */
	public function setMaxChars($varValue, DataContainer $dc)
	{
		$maxChars = $this->getMaxCharsSetting($dc->activeRecord->pid, $dc->field);
		
		if(strlen($varValue) > $maxChars && $maxChars > 0)
		{
			$varValue = substr($varValue, 0, $maxChars);
		}
		
		return $varValue;
	}

	/**
	 * Get the max chars setting for a field
	 * @param string
	 * @return string
	 */
	private function getMaxCharsSetting($intCatalog, $strColName)
	{
		$objField = $this->Database->prepare("SELECT maxChars FROM tl_catalog_fields WHERE pid=? AND colName=?")
						->execute($intCatalog, $strColName);
		
		if(!$objField->numRows)
		{
			return '';
		}
		return $objField->maxChars;
	}


}

?>