# PHP_ADAChecker
Scripts used to scan a site for ADA violations using the achecker API

## Dependencies:

PHP 7.1 *may work with older versions, untested*
Composer
CURL

## Installation:

* Clone this repo to a computer that has PHP, Composer and Curl Installed
* From a Command Prompt/Terminal execute:
    - ``Composer Install``
* You are ready to run!

## Usage:

for this script to work properly you must mave a text file of all the URLs you want tested, and easy way to create this list is using something like: [ARCLAB Website Link Analyzer](https://www.arclab.com/en/websitelinkanalyzer/) *the free version works great* to generate a export of urls on your site.

the file should only contain a list of urls one per line e.g.:

![File Format](/doc/csvss.png")
