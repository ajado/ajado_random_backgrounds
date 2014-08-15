<?php
namespace Ajado\AjadoRandomBackgrounds\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Elvis Tavasja <elvis@ajado.com>, Ajado
 *  			
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
 * Test case for class Ajado\AjadoRandomBackgrounds\Controller\BackgroundImageController.
 *
 * @author Elvis Tavasja <elvis@ajado.com>
 */
class BackgroundImageControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \Ajado\AjadoRandomBackgrounds\Controller\BackgroundImageController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('Ajado\\AjadoRandomBackgrounds\\Controller\\BackgroundImageController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

}
