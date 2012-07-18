# JetPay-PHP

PHP 5.3+ library for interacting with JetPay XML API. Sponsored by [AllPlayers.com](https://www.allplayers.com).

[![Build Status](https://secure.travis-ci.org/AllPlayers/JetPay-PHP.png)](http://travis-ci.org/AllPlayers/JetPay-PHP)

## Installation
Use [Composer](http://getcomposer.org/).  In your composer.json:

    {
      "require": {
        "AllPlayers/JetPay": "*"
      }
    }

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
    bin/behat features/certification_credit.feature
