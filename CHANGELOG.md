
# Change Log

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).

## 0.1.0 - 2017-09-27

### Added

- Country class, the base class used by all countries
- CountryFactory
- Support for countries in North America
- Classes for United States, Canada, and Mexico to include phone number and postal code validation
- Add PHPunit tests for the above classes
- Data file with ISO Country data
- Interfaces
  * Phone Number
  * Postal Code
  * Subdivision: for retrieving list of U.S. States, and Canadian Provinces
- Traits
  * North American Phone Number
  * ZipCode

### Updated

- README.md
- composer.json
- composer.lock


## 0.0.0 - 2017-02-16

Initial Commit of the Project. Uses skeleton code provided by my 
[skeleton project](https://github.com/andrewwoods/skeleton). This project 
is being written to be published on packagist.org, so it can be pulled in 
to your projects via Composer. 

### Added

- CHANGELOG.md
- LICENSE.txt to display the MIT license
- README.md
- composer.json to be setup for Packagist 
- generate-phpdoc
- phpdoc.dist.xml
- phpdocs/
- phpunit.xml
- src/
- tests/
- tests-bootstrap.php


