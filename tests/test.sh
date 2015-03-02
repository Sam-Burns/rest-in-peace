#!/bin/bash

clear;
vendor/bin/phpspec run --config tests/phpspec/phpspec.yml;
vendor/bin/phpunit --config tests/phpunit/phpunit.xml;
vendor/bin/behat --config tests/behat/behat.yml;
