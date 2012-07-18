# JetPay-PHP

PHP 5.3+ library for interacting with JetPay XML API.

## Development

    < Clone this repo and `cd` into it. >
    wget -nc http://getcomposer.org/composer.phar
    php -d detect_unicode=0 composer.phar install  --dev

## Feature tests

    bin/behat

## Unit tests

 - PHPUnit - TODO

## JetPay Certification
Generate a CSV file of prescribed test cases for JetPay.

    git clone git@github.com:AllPlayers/JetPay-PHP.git
    cd JetPay-PHP
    wget -nc http://getcomposer.org/composer.phar
    php -d detect_unicode=0 composer.phar install --dev
    bin/behat features/standard_sales.feature
