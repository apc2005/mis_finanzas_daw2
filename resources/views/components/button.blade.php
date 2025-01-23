
@foreach($nombreEnlace as $key => $value)
    @if($key === 'enlace')
        <a href="{{ $value }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Enviar a enlace
        </a>
    @elseif ($key === 'nombre')
        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Add Income
        </button>
    @endif
@endforeach
