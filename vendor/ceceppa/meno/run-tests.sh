#!/bin/bash
TEST_DB_HOST=127.0.0.1
TEST_DB_PORT=3306
TEST_DB_USER=phpunit
TEST_DB_PASSWORD=password

WP_VERSION=latest

TEST_DB_NAME=phpunit

mysqladmin -h $TEST_DB_HOST -P $TEST_DB_PORT --user="$TEST_DB_USER" --password="$TEST_DB_PASSWORD" -f drop $TEST_DB_NAME
./tests/bin/install-wp-tests.sh $TEST_DB_NAME $TEST_DB_USER $TEST_DB_PASSWORD $TEST_DB_HOST:$TEST_DB_PORT $WP_VERSION

composer run phpunit

