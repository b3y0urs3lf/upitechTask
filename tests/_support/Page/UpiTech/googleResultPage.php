<?php

namespace Page\UpiTech;

class googleResultPage extends BasePage
{
    public $companyBlockDiv = "//div[contains(@class,'knowledge-panel')]";
    public $companyName = "//div[@role='heading']/div/span";
    public $companyAddress = "//a[text()='Address']/ancestor::div/span";
    public $companyPhone = "//a[text()='Phone']/ancestor::div//span";

    public function googleResult($resultPage){
        $I = $this->tester;

        $I->waitForElementVisible($this->companyBlockDiv);
        $I->seeElement($this->companyName ."[text()='{$resultPage['heading']}']");
        $I->seeElement($this->companyAddress ."[text()='{$resultPage['fullAddress']}']");
        $I->seeElement($this->companyPhone ."[text()='{$resultPage['phone']}']");
        $I->seeElement("{$this->companyBlockDiv}//a[@href='{$resultPage['companyWebPage']}']");
    }
}