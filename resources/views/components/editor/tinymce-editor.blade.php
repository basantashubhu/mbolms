<textarea
    class="w-full px-3 py-2 mb-3 {{ $errors->has($attributes['name']) ? 'border-red-500' : '' }} text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
    name="{{ $attributes['name'] }}" >{!!  $attributes['content'] !!}</textarea>
@error($attributes['name'])
    <p class="text-xs italic text-red-500">{{ $errors->first($attributes['name']) }}</p>
@enderror
