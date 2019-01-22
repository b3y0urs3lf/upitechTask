<?php

namespace Page\UpiTech;

class googleSearchPage extends BasePage
{
    public $searchInput = "//input[@title='Search']";

    public function googleSearch($searchPage){
        $I = $this->tester;
        $I->amOnUrl($searchPage["link"]);
        $I->fillField($this->searchInput,$searchPage["searchValue"]);
        $I->pressKey($this->searchInput,\Facebook\WebDriver\WebDriverKeys::ENTER);
    }
}