@props(['disabled' => false])


<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge() !!} style="margin-right: 1rem; padding: 0.5rem 1rem; border-radius: 90px; border: none; font-size: 0.875rem; font-weight: 600; background-color: #f7fafc; color: #374151; transition-property: background-color; transition-duration: 150ms;" onmouseover="this.style.backgroundColor = '#d1d5db'" onmouseout="this.style.backgroundColor = '#f7fafc'"/>



