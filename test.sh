#!/bin/bash

clear;

echo -e '\n\n###############';
echo '### PHPSPEC ###';
echo -e '###############\n\n';
vendor/bin/phpspec run --config tests/phpspec/phpspec.yml;

echo -e '\n\n###############';
echo '### PHPUNIT ###';
echo -e '###############\n\n';
vendor/bin/phpunit --config tests/phpunit/phpunit.xml;

echo -e '\n\n#################';
echo '### BEHAT CLI ###';
echo -e '#################\n\n';
vendor/bin/behat --config tests/behat/behat.yml --suite all_features;

echo -e '\n\n#######################';
echo '### BEHAT WEBSERVER ###';
echo -e '#######################\n\n';
PHP_VERSION_HAS_SERVER=`php -r 'echo version_compare(PHP_VERSION, "5.4.0") >= 0;'`;
if [ $PHP_VERSION_HAS_SERVER ] ;
    then
        PROCESS_ID=`php -S localhost:8080 ./src-dev/src/index.php > /dev/null & echo $!`;
        vendor/bin/behat --config tests/behat/behat.yml --suite webserver_features;
        kill -9 $PROCESS_ID;
    else
        echo -e 'ONLY RUNS WITH PHP5.4+\n\n';
fi ;
echo -e '\n';
