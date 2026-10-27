# Faker PHP: Belarusian (be_BY) locale

Belarusian locale for [xefi/faker-php](https://github.com/xefi/faker-php). All data is in Belarusian (Cyrillic, official orthography).

## Installation

```bash
composer require --dev xefi/faker-php-locales-be-by
```

The service provider is discovered automatically through Composer.

## Usage

```php
$faker = new Xefi\Faker\Faker('be_BY');

$faker->name(gender: 'F');   // Кацярына Шыманская
$faker->fullAddress();       // вул. Янкі Купалы, 28, 220030, Мінск
$faker->company();           // ТАА «Мінскбудсэрвіс»
$faker->unp();               // 292113015
$faker->iban();              // BY60XEPB01979826101994987820
$faker->colorName();         // Індыга
$faker->sentences(1);        // Наша кампанія прапаноўвае кліентам якасныя паслугі...
```

Generators without a `be_BY` variant fall back to the default locale.

## What is included

| Extension | Methods |
|---|---|
| Address | `region`, `city`, `postcode`, `houseNumber`, `streetName`, `streetAddress`, `fullAddress` |
| Colors | `safeColorName`, `colorName` |
| Company | `company`, `unp` (payer account number with a valid check digit) |
| Financial | `iban` (28 characters, BY format) |
| Person | `name`, `firstName`, `lastName`, `title` |
| Text | `words`, `sentences`, `paragraphs` |

Belarusian surnames often change with gender (Кавалёў, Кавалёва; Жылінскі, Жылінская). `name()` and `lastName()` always return the form that matches the gender.

## Contributing

1. Fork the repository and create a branch from `main`.
2. Add an extension under `src/Extensions/` and register it in `FakerBeByServiceProvider::boot()`.
3. Add a test under `tests/Unit/`.
4. Run the suite with `vendor/bin/phpunit` (or `docker compose run php vendor/bin/phpunit`).
5. Open a pull request against `main`.

## License

MIT
