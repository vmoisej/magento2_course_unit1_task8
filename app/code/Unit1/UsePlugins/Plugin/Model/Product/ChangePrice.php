<?php

namespace Unit1\UsePlugins\Plugin\Model\Product;

class ChangePrice
{
    /**
     * Initialize dependencies.
     *
     */
    /*public function __construct(
    ) { } */

    /**
     * Get product price type float
     *
     * @return float
     */
    public function afterGetPrice(
        \Magento\Catalog\Model\Product $subject,
        $result
    ) {
        // I don't know what I have to do with price.
        // I can add 0.99 for example
        $result += 0.99;

        return $result;
    }
}