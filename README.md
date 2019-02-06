# PHP_ADAChecker
Scripts used to scan a site for ADA violations using the achecker API

## Dependencies:

PHP 7.1 *may work with older versions, untested*
CURL

## Installation:

* Clone this repo to a computer that has PHP and Curl Installed

* You are ready to run!

## Usage:

for this script to work properly you must mave a text file of all the URLs you want tested, and easy way to create this list is using something like: [ARCLAB Website Link Analyzer](https://www.arclab.com/en/websitelinkanalyzer/) *the free version works great* to generate a export of urls on your site.

the file should only contain a list of urls one per line e.g.:

![File Format](/doc/csvss.png?raw=true)

once you have a good file of urls place in in the root folder where you cloned the repo and name it **urls.csv**

* open the **runscan.php** in your editor of choice
* notice the variables at the top of the file:
    -  ``$var_api_url`` : the location of the achecker API
    -  ``$var_id`` : your achecker API key
    -  ``$var_uri_file`` : the file to load URIs from

### Get your API key:
* You will need to get an api key from [ACHecker](https://achecker.ca/checker/index.php) by creating a free account
    ![AC Login](/doc/aclogin.png?raw=true)
* Fill in the registration form:
    ![AC Register](/doc/acregister.png?raw=true)
* Once you sign up you can retrieve your API key in the profile page:
![API Key](/doc/apikey.png?raw=true)

* Copy this API key and put it in **runscan.php** and save the file.

## Launching your first scan

* open a terminal or command window and navigate to your repository directory
* type: ``php -v``
    - this should return the php version number if php is installed correctly.
* type: ``php runscan.php > log.txt``
    - this will output everything to log.txt so you can review any errors later
* type ``php -S localhost:9999`` or another available port to start the built in PHP webserver.

Open your web browser and point it to http://localhost:9999 (or whatever port you chose) to view your results.

**Crafted with :heart: in Hernando County, Fl**
