<x-dashboard-layout>
   
    <div class="p-4 md:ml-64">     

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg pt-32">
            <a href="{{route('admin.category.create')}}">
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Crear</button>
            </a>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        {{-- <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th> --}}
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <div   {{-- x-data="{selectedCategory: null }" --}}>
                        @foreach ($categories as $category)                    
                    
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$category->id}}
                            </th>
                            <td class="px-6 py-4">
                                {{$category->name}}
                            </td>
                            
                            <td class="px-6 py-4 text-right flex justify-end">
                                <a href="{{route('admin.category.edit', $category)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit /</a>
                                <form action="{{route('admin.category.destroy', $category)}}" method="post" class="ml-2"> 
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('admin.category.destroy', $category)}}" class="font-medium text-red-600 dark:text-red-500 hover:underline" onclick="event.preventDefault(); this.closest('form').submit();"> delete</a>
                                </form>
                            </td>
                            
                        </tr>
                    
                        @endforeach
                        {{-- modal edit --}}
                        <!-- Modal toggle -->
    
      
                    
                       
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Magic Mouse 2
                        </th>
                        <td class="px-6 py-4">
                            Black
                        </td>
                    
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    
    </div>  
    
</x-dashboard-layout>