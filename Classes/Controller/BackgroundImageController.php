<?php
namespace Ajado\AjadoRandomBackgrounds\Controller;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Elvis Tavasja <elvis@ajado.com>, Ajado
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * BackgroundImageController
 */
class BackgroundImageController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * backgroundImageRepository
	 *
	 * @var \Ajado\AjadoRandomBackgrounds\Domain\Repository\BackgroundImageRepository
	 * @inject
	 */
	protected $backgroundImageRepository = NULL;

	/**
	 * action index
	 *
	 * @return void
	 */
	public function indexAction() {
		//$session = $GLOBALS["TSFE"]->fe_user->getKey("ses","tx_ajadorandombackgrounds");
		$session = $this->restoreFromSession();
		
		if(!$session){   
			// Session is not set so we are going to set it here..
			$image = $this->backgroundImageRepository->findByRandom();
			//$GLOBALS['TSFE']->fe_user->setKey("ses","tx_ajadorandombackgrounds",$image[0]);
			$this->writeToSession($image[0]);
			$this->view->assign('background', $image[0]);
		}else{
			// Session is set and we are going to get the image from the session variable.
			$this->view->assign('background', $session);
		}	
	}
	
	protected function restoreFromSession() {
		$sessionData = unserialize($GLOBALS['TSFE']->fe_user->getKey('ses', 'tx_ajadorandombackgrounds'));
	
		// if current session is to old invalidate it and return null
		if (mktime() >= $this->getSessionTimeout()) {
			$this->cleanUpSession();
			return null;
		}
		// else set new timeout and return the data...
		$this->setSessionTimeout();
		return $sessionData;
	}
	
	
	protected function writeToSession($object) {
		$sessionData = serialize($object);
		$GLOBALS['TSFE']->fe_user->setKey('ses', 'tx_ajadorandombackgrounds', $sessionData);
		$GLOBALS['TSFE']->fe_user->storeSessionData();
		$this->setSessionTimeout();
		return $this;
	}
	
	protected function cleanUpSession() {
		$GLOBALS['TSFE']->fe_user->setKey('ses', 'tx_ajadorandombackgrounds', NULL);
		$GLOBALS['TSFE']->fe_user->setKey('ses', 'backgroundlifetime', NULL);
		$GLOBALS['TSFE']->fe_user->storeSessionData();
		return $this;
	}
	
	protected function setSessionTimeout() {
		$GLOBALS['TSFE']->fe_user->setKey('ses', 'backgroundlifetime', mktime() + 30 * 3600 * 24);
		$GLOBALS['TSFE']->fe_user->storeSessionData();
		return $this;
	}
	
	protected function getSessionTimeout() {
		return $GLOBALS['TSFE']->fe_user->getKey('ses', 'backgroundlifetime');
	}

}