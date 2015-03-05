#!/bin/bash

clear;

echo '### PHPSPEC ###';
vendor/bin/phpspec run --config tests/phpspec/phpspec.yml;

echo '### PHPUNIT ###';
vendor/bin/phpunit --config tests/phpunit/phpunit.xml;

echo '### BEHAT BUSINESS LOGIC ###';
vendor/bin/behat --config tests/behat/behat.yml --suite all_features;

echo '### BEHAT UI ###';
PROCESS_ID=`php -S localhost:8080 ./src-dev/src/index.php > /dev/null & echo $!`;
vendor/bin/behat --config tests/behat/behat.yml --suite webserver_features;
kill -9 $PROCESS_ID;
