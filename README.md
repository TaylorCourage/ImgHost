# ImgHost

## Current Version: v0.4.0-beta

## Overview

ImgHost is a self-hosted image hosting software. Upload your images and share them with the world!

## Features

ImgHost is designed to be fully configurable for the ultimate photo sharing experience. User-configurable options range from changing the allowed file size (dependant on your web server), to how files are named and stored, layouts and fonts, to mundane things like table names in your databases.

Many features are planned, so stay tuned!

## Installation

ImgHost is designed to be as plug-and-play as possible. You will need a:

- Webserver, that supports
- PHP, coupled with
- MySQL or MariaDB

You will also want to configure your server to allow for larger file uploads.

First you will want to either clone this repo, or download the zip (and unzip it to) a directory that your web server software has full read/write access to. 

Next you need to edit `config/db_config.php` and add your SQL credentials.

Then you need to navigate to `http://imghost.local/config/` (or your custom domain) to finish setup. Simply change the available options based on your preferences and click `Setup server`, once complete you will be redirected to the home page where your server should be ready to use. The same web page can be used later to change settings.


## Changelog

### v0.5.0-alpha - Dec 17, 2023

- Big changes to configuration system - values are stored to MySQL and read from there as well
- Overhauled system settings page - settings are now configurable while the server is running
- Slightly altered the default background to be more aesthetically pleasing
- Decided to change to 'alpha' status to more accurately reflect the state of this program - while I strive to make it work as best as possible, it is easy to overlook things that seem like basic features. For example there is a settings page with no password protection.

### v0.4.0-beta - Dec 16, 2023

- Full re-factor to convert the old "Meme Machine" to a general-purpose, plug-and-play image hosting software.
- Removed categories, removed names. These will come back as configurable options.
- Added user-configurable CSS for some pizzazz.
- Added private toggle, to prevent images from being shown in the public gallery.
- Photos are given a completely random 6-byte ID instead of storing full file names.

### v0.3.6-beta - April 7, 2016

- Fixed critical issue where searches wouldn't work
- Added fancy new details section on landing page

### v0.3.5-beta - April 7, 2016

- Categories are now a drop-down box rather than an incoherent table
- More categories added (Laugh/Laughing, Fite Me, Spongebob, Racist)

### v0.3.0-beta - April 4, 2016

- Added "Search" function
- More categories added

### v0.2 BETA - April 2, 2016

- Second release
  - Project now open source!
	
- Added "Browse"
  - Ability to browse all memes
  - Ability to browse memes by category

### v0.1 Pre-BETA - April 1, 2016

- Initial Release
    
- Added "Upload"
  - Ability to upload images up to 75MiB
  - Ability to specify a name/description of meme
  - Ablilty to select a category
