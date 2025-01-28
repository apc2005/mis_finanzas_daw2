<div>
    @if($attributes->has('href'))
        <a href="{{ $attributes->get('href') }}" {{ $attributes->has('class')?$attributes->except('href'):$attributes->except('href')->merge(['class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded inline-block']) }}>
            {{ $slot }}
        </a>
    @elseif($attributes->has('name'))
        <button type="submit" name="{{ $attributes->get('name') }}" {{ $attributes->has('class')?$attributes->except('href'):$attributes->except('name')->merge(['class' => 'bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded']) }}>
            {{ $slot }}
        </button>
    @else
        <button type="button" {{ $attributes->has('class')?$attributes->except('href'):$attributes->merge(['class' => 'bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded']) }}>
            {{ $slot }}
        </button>
    @endif
</div>