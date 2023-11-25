<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="{{ asset('build/assets/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
<x-dashboard-layout>
    {{-- "id": 1,
        "name": "voluptatem",
        "slug": "voluptatem", --}}
    <div class="p-4 md:ml-64">     

        <div class="relative overflow-x-auto  pt-32">
            <form action="{{route('admin.category.update', $category)}}" method="POST">
                @csrf
                @method('put')
                <div class="mb-6">
                    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{old('name', $category->name)}}">
                    @error('name')
                        <br>
                        {{$message}}
                        <br>
                    @enderror
                </div>
                <input type="text" id="slug" name="slug" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{old('slug', $category->slug)}}" readonly>
                
                
                @error('slug')
                        <br>
                        {{$message}}
                        <br>
                    @enderror
                <button type="submit" class="text-white mt-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
            </form>
        </div>
    </div>

</x-dashboard-layout>

<script type="module">
    $(document).ready(function () {
        $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        console.log('jQuery y jQuery.stringToSlug están listos y funcionando.');
    });
</script>

