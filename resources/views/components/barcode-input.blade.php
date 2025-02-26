<!-- Include the ZXing Library and your custom barcode scanner script -->
<script src="{{ asset('vendor/barcode-field/zxing.min.js') }}"></script>
<script src="{{ asset('vendor/barcode-field/barcode-scanner.js') }}"></script>

<div xmlns:x-filament="http://www.w3.org/1999/html">
    <div class="grid gap-y-2">
        <div class="flex gap-x-3 justify-between items-center">
            <label for="{{ $getStatePath() }}" class="inline-flex gap-x-3 items-center fi-fo-field-wrp-label">
                <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                    {{ $getLabel() ?? 'Barcode'}}
                    @if($isRequired())
                        <sup class="font-medium text-danger-600 dark:text-danger-400">*</sup>
                    @endif
                </span>
            </label>
        </div>        
        <x-filament::input.wrapper class="relative">
            <x-filament::input
                type="text"
                wire:model="{{$getStatePath()}}"           
                required="{{$isRequired()}}"
            />
            <!-- Trigger Button for Filament Modal -->
            <button type="button" onclick="openScannerModal('{{ $getStatePath() }}')" class="absolute inset-y-0 right-0 flex items-center pr-3 focus:outline-none" aria-label="Scan Barcode" style="right: 8px">                
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 dark:text-gray-200" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M3 4h2v16H3V4zm4 0h2v16H7V4zm4 0h2v16h-2V4zm4 0h2v16h-2V4zm4 0h2v16h-2V4z"/>
                </svg>
            </button>
        </x-filament::input.wrapper>    
    </div>

    <!-- Filament Modal for Barcode Scanner -->
    <x-filament::modal id="barcode-scanner-modal">
        <x-slot name="header">
            <h2 class="text-lg font-semibold">
                Scan Barcode
            </h2>
        </x-slot>

        <div class="p-4">
            <div id="scanner-container">
                <video id="scanner" autoplay class="rounded-lg shadow" style="display: none;"></video>
                <div class="overlay">
                    <div class="scan-area"></div>
                </div>
            </div>
        </div>

        <x-slot name="footer">
            <x-filament::button onclick="closeScannerModal()" color="danger">
                Close
            </x-filament::button>
        </x-slot>
    </x-filament::modal>
</div>
