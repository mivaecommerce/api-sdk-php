# Miva Merchant API SDK for PHP

This php library wraps the Miva Merchant JSON API introduced in 
Miva Merchant 9.12. It allows you to quickly integrate your PHP
applications with a Miva Merchant store to fetch, create, and update
store data.

For api documentation visit [https://docs.miva.com/json-api](https://docs.miva.com/json-api).

# Requirements

- Miva Merchant 10.+
- PHP 7.4+, Suggested 8.x
- Composer

**For Miva Merchant 9.x, use the 1.x release**
**For older PHP support use any release prior to 2.3.0**

# Installation

To install the SDK simply add it to your project with composer:

    composer require mivaecommerce/api-sdk-php

Or manually add it to your `composer.json` file:

    "require": {
        "mivaecommerce/api-sdk-php" : "2.*@stable"
    }

Then run `composer update`

# Getting Started

For usage see the examples provided in the `examples/` directory. 

#  SSH Private Key Authentication

## Compatible Private Key Formats

- PKCS#1 PEM
- PKCS#8 PEM

When specifying the key to use within the `SSHClient` or `SSHPrivateKeyAuthenticator`, specify the full path to your private key file.

## Converting from an OpenSSH Private Key

If your private key is in OpenSSH format (starts with `-----BEGIN OPENSSH PRIVATE KEY-----`) then you will need to convert it.

Create a copy of your key preserving permissions:

    cp -p /path/to/private/key/id_rsa /path/to/private/key/id_rsa.pem

Convert in place to the proper format:

    ssh-keygen -p -m PEM -f /path/to/private/key/id_rsa.pem

# SSH Agent Authentication

## Compatible Public Key Formats

Your public key must be in the OpenSSH Public Key format. The default public key format is usually the correct type if you generated your key using `ssh-keygen`.

See https://tools.ietf.org/html/rfc4253#section-6.6 for format.

A quick way to get the correct format if you have the key associated with your local SSH agent is to run the command `ssh-add -L` and copying the corresponding key.

# High Precision Pricing & Weight

Miva Merchant 10.11 introduced high precision pricing and weight, allowing many price and weight fields to have up to 7 decimal places. If your store requires this, it is suggested that you install either the decimal or bcmath extension.

## Decimal Extension

This is the recommended extension if you require high precision. When installed, all high precision fields will be created as \Decimal\Decimal instances. You can perform arithmetic on these values as you would a native float type.

For more information see https://github.com/php-decimal/ext-decimal

## BCMath Extension

If you prefer to use the bcmath extension then install or enable it in your php configuration and run all your arithmetic through bcmath functions.
[
](https://github.com/php-decimal/ext-decimal)For more information see https://www.php.net/manual/en/book.bc.php



# License

This library is licensed under the `Miva SDK License Agreement`.

See the `LICENSE` file for more information.