<?php

$I = new WebGuy($scenario);
$I->wantTo('See included tests');
$I->sendGET('/');
$I->see('IncludedTest');
