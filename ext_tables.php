<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Ramdonbackgrounds',
	'Random Backgrounds'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Ajado Random Backgrounds');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ajadorandombackgrounds_domain_model_backgroundimage', 'EXT:ajado_random_backgrounds/Resources/Private/Language/locallang_csh_tx_ajadorandombackgrounds_domain_model_backgroundimage.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ajadorandombackgrounds_domain_model_backgroundimage');
$GLOBALS['TCA']['tx_ajadorandombackgrounds_domain_model_backgroundimage'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ajado_random_backgrounds/Resources/Private/Language/locallang_db.xlf:tx_ajadorandombackgrounds_domain_model_backgroundimage',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,image,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/BackgroundImage.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ajadorandombackgrounds_domain_model_backgroundimage.gif'
	),
);
