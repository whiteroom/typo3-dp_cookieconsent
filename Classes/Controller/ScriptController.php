<?php
/*
 * Copyright (c) 2021.
 *
 * @category   TYPO3
 *
 * @copyright  2021 Dirk Persky (https://github.com/DirkPersky)
 * @author     Dirk Persky <info@dp-wired.de>
 * @license    MIT
 */

namespace DirkPersky\DpCookieconsent\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Service\FlexFormService;

class ScriptController extends ActionController{

    /**
     * @return void
     */
    public function listAction()
    {
        $cObj = $this->configurationManager->getContentObject();
        // parse Flexform
        $flexFormData = GeneralUtility::makeInstance(FlexFormService::class)->convertFlexFormContentToArray($cObj->data['pi_flexform']);
        // remove duplicate Settings
        unset($flexFormData['settings']);
        // add data to view
        $this->view->assign('flexform',$flexFormData);
        $this->view->assign('data', $cObj->data);
    }

    /**
     * @param $content
     * @return void
     */
    public function showAction()
    {
        $cObj = $this->configurationManager->getContentObject();
        // parse Flexform
        $flexFormData = GeneralUtility::makeInstance(FlexFormService::class)->convertFlexFormContentToArray($cObj->data['pi_flexform']);
        // remove duplicate Settings
        unset($flexFormData['settings']);
        // add data to view
        $this->view->assign('flexform',$flexFormData);
        $this->view->assign('data', $cObj->data);
    }
}
