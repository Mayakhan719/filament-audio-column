# Filament Audio Column

A Filament Table Column for playing audio files.

## Installation

You can install the package via composer:

```bash
composer require mayakhan719/filament-audio-column
```

## Usage

```php
use Mayakhan719\Tables\Columns\AudioColumn;

public static function table(Table $table): Table
{
    return $table
        ->columns([
            AudioColumn::make('audio'),
        ]);
}
```

You can also customize the column:

```php
use Maya\Tables\Columns\AudioColumn;

public static function table(Table $table): Table
{
    return $table
        ->columns([
            AudioColumn::make('audio')
                ->label('Podcast Episode')
                ->native(true) // ->native(false) use Player.style Audio Player 
                
        ]);
}
```

## Screenshots

![Screenshot of the audio column](https://raw.githubusercontent.com/Mayakhan719/filament-audio-column/main/pic/screenshot.png)

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review our [security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Lars Klopstra](https://github.com/pxlrbt)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
