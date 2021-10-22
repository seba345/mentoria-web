@props('actived' => false)

@php

$classes ='block text-left px-3 text-sm leading-3 hover:bg-blue-500 hover:text-white'

if ($active){
    $classes .= ' bg-blue-500 text-white';
}

@endphp


<a {{ $attributes(['class' => $classes])}}>
                        {{ $slot }}
                    </a>