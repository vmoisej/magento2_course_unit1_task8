<?php

namespace Unit1\UsePlugins\Plugin\Block\Html\Footer;

//use \Magento\Theme\Block\Html\Footer;

class ChangeCopyright
{
    /**
     * Initialize dependencies.
     *
     */
    /*public function __construct(
    ) { } */

    /**
     * Get Copyright type string
     *
     * @return string
     */
    public function afterGetCopyright( \Magento\Theme\Block\Html\Footer $subject, $result )
    {
        return 'Customized copyright!';
    }
}