
# World

**Make it simple to work with locations and data about the world**

It should be easy to do things like get a list of US States, Canadian
Provinces, and to determine if a postal code or phone number is valid.
Some countries don't use postal codes at all, phone numbers have different
criteria across countries. This library aims to make things a little easier.


## Version

The current version is 0.1.0. This project uses [semantic versioning](http://semver.org).

## License

This is licensed under the [MIT License](https://opensource.org/licenses/MIT).

## Currently Supported Countries

* **North America**
  - Anguilla
  - Antigua & Barbuda
  - Aruba
  - Bahamas
  - Barbados
  - Belize
  - Bermuda
  - British Virgin Islands
  - Canada
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
  - Mexico
  - Montserrat
  - Nicaragua
  - Panama
  - Puerto Rico
  - Sint Maarten
  - St. Barthélemy
  - St. Kitts & Nevis
  - St. Lucia
  - St. Martin
  - St. Pierre & Miquelon
  - St. Vincent & Grenadines
  - Trinidad & Tobago
  - Turks & Caicos Islands
  - U.S. Virgin Islands
  - United States

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
require "../vendor/autoload.php";

$countryFactory = new \Awoods\World\CountryFactory();

$countries = $countryFactory->getList();

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


