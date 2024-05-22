<div id="$id" {{ $attributes->merge(['class' => "alert alert-$type"]) }}>
    {{ $slot }}
    {{ $context }}
</div>
