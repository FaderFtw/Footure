@props(['id', 'class' => '', 'name' => '', 'disabled' => false])

@php
    $attributes = $attributes->class([
        'form-select block w-full mt-2',
        'focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md',
        'disabled opacity-50 cursor-not-allowed' => $disabled,
    ])->merge([
        'id' => $id,
        'name' => $name,
        'disabled' => $disabled,
    ]);
@endphp

<select {{ $attributes }}>
    {{ $slot }}
</select>
