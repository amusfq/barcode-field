<?php

namespace DesignTheBox\BarcodeField;

use Filament\Forms\Components\Field; // Correct import for BarcodeInput
use Spatie\LaravelPackageTools\Package; // Import Field from Filament
use Spatie\LaravelPackageTools\PackageServiceProvider;
use VendorName\Skeleton\Forms\Components\BarcodeInput;

use function App\Filament\Plugins\BarcodeScannerField\config_path;

class FilamentBarcodeScannerFieldServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-barcode-field';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasConfigFile();
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/filament-barcode-field.php' => config_path('filament-barcode-field.php'),
        ], 'config');

        // Register the BarcodeInput component as a macro on the Field class
        Field::macro('barcodeInput', function () {
            return new BarcodeInput; // Create an instance of BarcodeInput
        });
    }
}
