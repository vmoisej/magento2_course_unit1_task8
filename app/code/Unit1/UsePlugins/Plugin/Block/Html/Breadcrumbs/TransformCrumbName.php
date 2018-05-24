<?php

namespace Unit1\UsePlugins\Plugin\Block\Html\Breadcrumbs;

//use \Magento\Theme\Block\Html\Breadcrumbs;

class TransformCrumbName
{
    /**
     * Initialize dependencies.
     *
     */
    /*public function __construct(
    ) { } */

    /**
     * Get Crumb Name type string
     *
     * @return string
     */
    public function beforeAddCrumb(
        \Magento\Theme\Block\Html\Breadcrumbs $subject,
        $crumbName,
        $crumbInfo
    ) {
        return $crumbName . '(!)';
    }
}