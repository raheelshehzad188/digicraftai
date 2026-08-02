<x-filament-panels::page>
    <form wire:submit="save">
        {{ $this->form }}

        <div class="mt-6 flex flex-wrap gap-3">
            <x-filament::button type="submit">
                Save settings
            </x-filament::button>

            <x-filament::button
                color="gray"
                type="button"
                wire:click="resetToDefaults"
                wire:confirm="Reset all site settings to the original template defaults? This cannot be undone."
            >
                Reset to defaults
            </x-filament::button>
        </div>
    </form>
</x-filament-panels::page>
