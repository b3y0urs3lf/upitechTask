<?php

namespace Page\UpiTech;

use \AcceptanceTester;

class opusOnlineCest
{
    public function overviewBlockTest(AcceptanceTester $I)
    {
        $searchPage = new googleSearchPage($I);
        $resultPage = new googleResultPage($I);

        $searchData = json_decode(
            file_get_contents(__DIR__. '/fixtures/opusOnline.json'),
            true
        );

        $I->wantTo('Step 1 - Open Google search engine and search for Opus online');
        $searchPage->googleSearch($searchData["searchPage"]);

        $I->wantTo('Step 2 - Check search results');
        $resultPage->googleResult($searchData["resultPage"]);

        $I->wantTo('Step 3 - Open company page and check slogan');
        $I->click("{$resultPage->companyBlockDiv}//a[@href='{$searchData['resultPage']['companyWebPage']}']");
        $I->canSee($searchData['companyPage']['slogan']);
    }
}

?>