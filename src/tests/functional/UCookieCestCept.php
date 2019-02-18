<?php
$I = new FunctionalTester ( $scenario );
$I->wantTo ( 'perform actions and see result' );
$I->amOnPage ( "/TestUCookieController/index" );
$I->canSeeInSource ( "cookie" );
$I->amOnPage ( "/TestUCookieController/testUser" );
$I->canSeeInSource ( "test-user" );
$I->amOnPage ( "/TestUCookieController/testNotExists" );
$I->canSeeInSource ( "not-exists" );
$I->amOnPage ( "/TestUCookieController/testOther" );
$I->canSeeInSource ( "pwd" );
$I->amOnPage ( "/TestUCookieController/delete" );
$I->canSeeInSource ( "deleted" );
$I->amOnPage ( "/TestUCookieController/testDeleted" );
$I->canSeeInSource ( "no-user" );
$I->amOnPage ( "/TestUCookieController/deleteAll" );
$I->canSeeInSource ( "deleteds" );
$I->amOnPage ( "/TestUCookieController/testAllDeleted" );
$I->canSeeInSource ( "no:no" );