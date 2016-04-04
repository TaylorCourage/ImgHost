# Meme Machine

## Current Version: v0.3.0-beta

## Overview

The Meme Machine is a semi-private repository of memes that can be easily searched, indexed, and accessed anywhere at any time. Content is not limited to memes, either. Reaction images and gifs, cancerous stuff, friends/members-related stuff, fails, replies, anything, really. It's mostly here for organization and access. This is the source code.

## Features

Meme Machine is able to take in images up to 75MiB in size, and stores some basic metadata in a SQL database.

When a user uploads a meme, they are able to specify a name/description of the meme, as well as a category to help easily organize the memes.

Users are then able to browse the memes using the categories, and in future versions will be able to search memes by their name/description.

## Changelog

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

## Cloning and Running

Clone the repository to a directory on your website. Change the appropriate files so that your database is being accessed with your credentials. Make a folder called "uploads" or change the code to suit your needs

