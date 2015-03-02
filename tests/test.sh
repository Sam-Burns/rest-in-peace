#!/bin/bash

vendor/bin/phpspec --config tests/phpspec/phpspec.yml
vendor/bin/phpunit run --config tests/phpunit/phpunit.xml
vendor/bin/behat --config tests/behat/behat.yml
