@props(['heading' => null, 'home' => false, 'about' => false, 'contact' => false])

<x-head/>
<x-nav/>

@if ($heading)
    <x-banner :heading="$heading" :home="$home" :about="$about" :contact="$contact"/>
@endif

{{ $slot }}

<x-footer/>
