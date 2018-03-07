<?php

$I = new WebGuy($scenario);
$I->wantTo('See included tests');
$I->sendGET('');
$I->see('Include Ok');
$I->see('Include Fail');


$I->wantTo('run a included test');
$I->sendGET('run/unit/'. md5('unit' . 'IncludeOk'));
$I->seeResponseContainsJson(array(
    'run'     => true,
    'passed'  => true,
    'state'   => 'passed',
    'message' => NULL,
));

$I = new WebGuy($scenario);
$I->wantTo('run a included failing test');
$I->sendGET('run/unit/'. md5('unit'.'IncludeFail'));
$I->seeResponseContainsJson(array(
    'run'     => true,
    'passed'  => false,
    'state'   => 'failed',
));
