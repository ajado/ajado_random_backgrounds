<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ajado.' . $_EXTKEY,
	'Ramdonbackgrounds',
	array(
		'BackgroundImage' => 'index',
		
	),
	// non-cacheable actions
	array(
		'BackgroundImage' => '',
		
	)
);


