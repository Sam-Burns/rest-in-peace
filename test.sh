#!/bin/bash

clear;
vendor/bin/phpspec run --config tests/phpspec/phpspec.yml;

vendor/bin/phpunit --config tests/phpunit/phpunit.xml;

vendor/bin/behat --config tests/behat/behat.yml --suite all_features;

PROCESS_ID=`php -S localhost:8080 ./src-dev/src/index.php > /dev/null 2>&1 & echo $!`;
vendor/bin/behat --config tests/behat/behat.yml --suite webserver_features;
kill -9 $PROCESS_ID;
