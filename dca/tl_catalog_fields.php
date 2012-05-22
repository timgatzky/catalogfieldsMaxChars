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
 * @copyright  CyberSpectrum and others, see CONTRIBUTORS, Tim Gatzky
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de> and others, see CONTRIBUTORS, Tim Gatzky <info@tim-gatzky.de>
 * @package    Catalog 
 * @license    LGPL 
 */

/**
 * Palettes
 */

$GLOBALS['TL_DCA']['tl_catalog_fields']['palettes']['default'] = str_replace
(
	'uniqueItem',
	'uniqueItem,maxChars',
	$GLOBALS['TL_DCA']['tl_catalog_fields']['palettes']['default']
);

$GLOBALS['TL_DCA']['tl_catalog_fields']['palettes']['text'] = str_replace
(
	'uniqueItem',
	'uniqueItem,maxChars',
	$GLOBALS['TL_DCA']['tl_catalog_fields']['palettes']['text']
);

$GLOBALS['TL_DCA']['tl_catalog_fields']['palettes']['longtext'] = str_replace
(
	'rte',
	'rte,maxChars',
	$GLOBALS['TL_DCA']['tl_catalog_fields']['palettes']['longtext']
);


/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_catalog_fields']['fields']['maxChars'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_catalog_fields']['maxChars'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'save_callback'			=> array(array('tl_catalog_fields_catalogfieldsMaxChars','resetValue')),
	'eval'                    => array('rgxp'=>'digit', 'nospace'=>true, 'tl_class'=>'w50')
);




class tl_catalog_fields_catalogfieldsMaxChars extends Backend
{
	/**
	 * Allow positive values only
	 */
	public function resetValue($varValue, DataContainer $dc)
	{
		if($varValue < 0)
		{
			//$varValue = 0;
			$varValue *= -1;
		}
		return $varValue;
	}
}


?>