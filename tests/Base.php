<?php

namespace tests;

use PHPUnit\Framework\TestCase;

/**
 * Class BasePTest
 * @package tests
 */
class Base extends TestCase
{
    /**
     * 为了避免yaf扩展对工程的影响
     * 需要关闭yaf扩展
     */
    public function setUp()
    {
        $this->assertFalse(extension_loaded("yaf"));
    }
}
