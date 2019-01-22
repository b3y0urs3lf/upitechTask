<?php

namespace Page\UpiTech;

use AcceptanceTester;

abstract class BasePage
{
    /**
     * @var AcceptanceTester
     */
    protected $tester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->tester = $I;
    }
}