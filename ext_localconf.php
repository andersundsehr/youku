<?php

use ChristianEssl\Youku\Resource\OnlineMedia\Helpers\YoukuHelper;
use ChristianEssl\Youku\Resource\Rendering\YoukuRenderer;
use TYPO3\CMS\Core\Resource\Rendering\RendererRegistry;
use TYPO3\CMS\Core\Utility\GeneralUtility;

defined('TYPO3') || die('Access denied.');

call_user_func(
    function () {
        // Register file extension "youku"
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['mediafile_ext'] .= ',youku';

        // Register the online media helper
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['fal']['onlineMediaHelpers']['youku']
            = YoukuHelper::class;

        // Register the mime type
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['FileInfo']['fileExtensionToMimeType']['youku'] = 'video/youku';

        // Register the renderer for the frontend
        $rendererRegistry = GeneralUtility::makeInstance(RendererRegistry::class);
        $rendererRegistry->registerRendererClass(YoukuRenderer::class);
    }
);
