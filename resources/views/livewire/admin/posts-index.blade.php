<div class="p-4 md:ml-64">     

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg pt-32">
        <a href="{{route('admin.post.create')}}">
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Crear</button>
        </a>
        {{-- status --}}
        <div class="flex items-center mb-4">
            <input id="country-option-1" type="radio" name="countries" value="" 
                class="ml-4 w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" 
                wire:model.lazy="radioStatus"
            >
            <label for="country-option-1" class="block ms-2  text-sm font-medium text-gray-900 dark:text-gray-300">
              Todos
            </label>
            <input id="country-option-1" type="radio" name="countries" value="1" 
                class=" ml-4 w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" 
                wire:model.lazy="radioStatus"
            >
            <label for="country-option-1" class="block ms-2  text-sm font-medium text-gray-900 dark:text-gray-300">
              Borrador
            </label>
            <input id="country-option-1" type="radio" name="countries" value="2" 
                class="ml-4 w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" 
                wire:model.lazy="radioStatus"
            >
            <label for="country-option-1" class="block ms-2  text-sm font-medium text-gray-900 dark:text-gray-300">
              Publicado
            </label>
          </div>
        {{-- buscador --}}
         {{-- {{$radioStatus}} --}}
        <div class="mb-6">
            {{-- <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label> --}}
            <input wire:model.lazy="search" type="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search posts by title...">
        </div>
        {{-- fin buscador --}}
        @if ($posts->count())
            
        
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            name
                        </th>
                        <th scope="col" class="px-6 py-3">
                        slug
                        </th>
                        <th scope="col" class="px-6 py-3">
                            status
                        </th>
                        {{--<th scope="col" class="px-6 py-3">
                            Price
                        </th> --}}
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <div   {{-- x-data="{selectedCategory: null }" --}}>
                        @foreach ($posts as $post)                    
                    
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$post->name}}
                            </th>
                            <td class="px-6 py-4">
                                {{$post->slug}}
                            </td>
                            <td class="px-6 py-4">
                                {{$post->status}}
                            </td>
                            
                            <td class="px-6 py-4 text-right flex justify-end">
                                <a href="{{route('admin.post.edit', $post)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit /</a>
                                <form action="{{route('admin.post.destroy', $post)}}" method="post" class="ml-2"> 
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('admin.post.destroy', $post)}}" class="font-medium text-red-600 dark:text-red-500 hover:underline" onclick="event.preventDefault(); this.closest('form').submit();"> delete</a>
                                </form>
                            </td>
                            
                        </tr>
                    
                        @endforeach
                </tbody>
            </table>
            {{-- paginacion --}}
            <div class="mt-4">
                {{$posts->links()}}
            </div>
        @else
            <strong class="text-bold dark:text-white ">No hay ningun registro...</strong>
        @endif
        
    </div>

</div>  
