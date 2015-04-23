#!/bin/bash

clear;
./vendor/bin/phpunit --config tests/phpunit/phpunit-travis.xml;
./vendor/bin/phpspec run --config tests/phpspec/phpspec-travis.yml --no-interaction;
./vendor/bin/behat --config tests/behat/behat.yml --suite inline;
