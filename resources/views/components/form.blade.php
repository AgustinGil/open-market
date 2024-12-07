<form {{ $attributes(["class" => "max-w-2xl mx-auto min-y-4xl space-y-6", "method" => "GET"]) }}>
    @if ($attributes->get('method', 'GET') !== 'GET')
    @csrf
    @method($attributes->get('method'))
    @endif

    {{ $slot }}
</form>