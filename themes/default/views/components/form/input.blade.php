@props(['name', 'label' => null, 'required' => false, 'divClass' => null, 'placeholder' => null, 'id' => null, 'type' => null, 'hideRequiredIndicator' => false, 'noDirty' => false])
<fieldset class="flex flex-col relative mt-3 w-full {{ $divClass ?? '' }}">
    @if ($label)
        <legend>
            <label for="{{ $name }}"
                class="text-sm text-primary-100 absolute -translate-y-1/2 start-1 ml-1 bg-primary-800 px-2 rounded-md">
                {{ $label }}
                @if ($required && !$hideRequiredIndicator)
                    <span class="text-red-500">*</span>
                @endif
            </label>
        </legend>
    @endif
    <input type="{{ $type ?? 'text' }}" id="{{ $id ?? $name }}" name="{{ $name }}"
        class="block w-full text-sm text-primary-100 bg-primary-800 border-2 border-primary-700 rounded-md outline-none focus:outline-none focus:border-secondary transition-all duration-300 ease-in-out @if ($type !== 'color') px-2.5 py-2.5 @endif"
        placeholder="{{ $placeholder ?? ($label ?? '') }}"
        @if (!$noDirty && isset($attributes['wire:model'])) wire:dirty.class="!border-yellow-600" @endif
        {{ $attributes->only(['wire:model', 'required', 'value', 'wire:dirty.class', 'wire:model.live']) }} @required($required) />
    @error($name)
        <p class="text-red-500 text-xs">{{ $message }}</p>
    @enderror
</fieldset>
