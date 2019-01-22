Automation test work
=======

Automation test work, for upitech. 
Using Codeception - BDD-styled PHP testing framework. More info about framework can be found here - https://codeception.com/ . 

## Getting Started

These instructions will get you a copy of the project 
up and running on your local machine for testing purposes. 

### Prerequisites

Download and install following:

  1. Install **php** - http://www.php.net/
  2. Install **composer** (Dependency Manager for PHP) - https://getcomposer.org/ 
  3. In order to run Selenium Server install **Java** - https://www.java.com
  4. Download latest **Selenium Standalone Server** - https://www.seleniumhq.org/download/
  5. Download latest **ChromeDriver** - https://sites.google.com/a/chromium.org/chromedriver/downloads
  6. Download latest **GeckoDriver** - https://github.com/mozilla/geckodriver/releases 

Next steps that you need to do before run test:
    
   1. From terminal go to project folder.
   2. From terminal run `composer install` ,this should add all needed dependencies to the project.
   3. Open with any coding editor file `RemoteWebDriver.php`, which should be located in project directory `vendor/facebook/webdriver/lib/Remote`
   4. On lines 190 and 210 from change variable: `$raw_element['ELEMENT']` 
   , to this: `$raw_element['ELEMENT'] ?? $raw_element[\key($raw_element)]` 
   as in given example `https://github.com/facebook/php-webdriver/pull/575/commits/0357dc2497e0611accd46748cf0ee6120127cce6`
   (**Mozilla firefox geckodriver fix**), dont forget to save it. 
   This is needed in order to make test work with **firefox**, more details can be found here - https://github.com/facebook/php-webdriver/issues/469
   5. Put **ChromeDriver**, **GeckoDriver** and **Selenium Standalone Server** in project folder
   
### Running the tests

How to run the automation test:

   1. Form terminal go to directory where **Selenium Standalone Server** 
   located, and start it like this
   `java -jar selenium-server-standalone-3.14.59.jar` 
   2. From different terminal go to project directory 
   and start test `vendor/bin/codecept run --env chrome --env firefox --debug --html`


### Result

Test doing following:
 1. User navigates to www.google.com website
 2. User types „Opus Online“ into searchbox
 3. Press Enter button
 4. Waits until Opus Online company overview block being displayed on the right.
 5. Checks that Block has correct:
    1. Company name
    2. Address
    3. Phone number
    4. Website button
 6. Click on Website button
 7. Checks that slogan present in opened company website

Test developed in a way that it should have:

   1. Multiple browsers support, can be specified by 
   `--env chrome` or/and `--env firefox`
   2. Page Object Pattern
   3. Readable test report, can be specified by `--html`. 
   When test will finish its execution, 
   then report can be found here `tests/_output/report.html`
   
Test missing:
  1. Tests missing parallel execution. It can be achieved by using docker solution,
   as described here - https://codeception.com/docs/12-ParallelExecution.
   Another option would be to use service as - https://www.browserstack.com/automate/codeception.
   
### Test files location

Test itself located `tests/acceptance/UpiTech/opusOnlineCest.php` 
, classes that extend it located `tests/_support/Page/UpiTech`. 
Configuration file located `tests/acceptance.suite.yml`.
