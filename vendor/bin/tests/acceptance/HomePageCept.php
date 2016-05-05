<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('verify the homepage');
$I->amOnPage('/');
$I->see('Home');
$I->click('Login');
$I->amOnPage('/login');
/*$I->see('Please');
$I->fillField('Username', 'david');
$I->fillField('Password', '1234');
$I->click('login');
$I->see('(Admin Page)');*/
//http://phptest.club/t/need-help-to-setting-up-codeception-in-phpstorm-for-custom-php-project/426