
# World

**Make it simple to work with locations and data about the world**

It should be easy to do things like get a list of US States, Canadian
Provinces, and to determine if a postal code or phone number is valid.
Some countries don't use postal codes at all, phone numbers have different
criteria across countries. This library aims to make things a little easier.

For every country object, you can access the following information:

* Common Name
* Official Name
* ISO 3166-1 alpha 2 code (e.g. US for United States)
* ISO 3166-2 alpha 3 code (e.g. USA for United States)
* ISO 4127 Currency code (e.g. USD for United States Dollars)
* The Continent

The available **interfaces** are:

* PhoneNumberInterface - provide phone number validation method signatures
* PostalCodeInterface  - provide postal code validation method signatures
* SubdivisionInterface - provide a subdivision list, e.g. provinces in Canada

The available **traits** are:

* NorthAmericanPhoneNumber
* ZipCode

## Version

The current version is 0.1.0. This project uses [semantic versioning](http://semver.org).

## License

This is licensed under the [MIT License](https://opensource.org/licenses/MIT).

## Currently Supported Countries

### North America

The countries have additional phone number and postal code validation methods

  - United States
  - Canada
  - Mexico

The countries have basic Country support

  - Anguilla
  - Antigua and Barbuda
  - Aruba
  - Bahamas
  - Barbados
  - Belize
  - Bermuda
  - British Virgin Islands
  - Caribbean Netherlands
  - Cayman Islands
  - Costa Rica
  - Cuba
  - Curaçao
  - Dominica
  - Dominican Republic
  - El Salvador
  - Greenland
  - Grenada
  - Guadeloupe
  - Guatemala
  - Haiti
  - Honduras
  - Jamaica
  - Martinique
  - Montserrat
  - Nicaragua
  - Panama
  - Puerto Rico
  - Sint Maarten
  - St. Barthélemy
  - St. Kitts and Nevis
  - St. Lucia
  - St. Martin
  - St. Pierre and Miquelon
  - St. Vincent and Grenadines
  - Trinidad and Tobago
  - Turks and Caicos Islands
  - U.S. Virgin Islands

## Upcoming Countries

* **South America**

  - todo

* **Europe**

  - todo

* **Asia**

  - todo

* **Africa**

  - todo

* **Oceania**

  - todo

* **Antarctica**

  - todo


## Example Code

```php
require "vendor/autoload.php";

$countryFactory = new \Awoods\World\CountryFactory();

$countries = $countryFactory->getAllCountries();

foreach ($countries AS $code => $name) {
    echo "\n";
    echo "{$code} is the code for {$name}\n";

    $country = $countryFactory->create($code);

    echo "The official name for {$name} is '{$country->getFullName()}'\n";
    echo "Here is a list of it's localities:\n";

    foreach ($country->getLocalityList() AS $localityCode => $localityName) {

        echo "* {$localityName} ({$localityCode})\n";
    }
}
echo "\n";
```

## Ideas for sections/pages

* Traits
  - NorthAmericanPhoneNumber
* Interfaces
  - Country
* Features
* Language Translations

  These 5 languages plus English should cover most developers in the world

  - Spanish
  - French
  - Hindi
  - Chinese (Mandarin)
  - Arabic

* Frequently Asked Questions (FAQ)
* Screenshots
* Submit Issues



## Credits and Acknowledgments

* Project Creator:  [Andrew Woods](http://andrewwoods.net)


