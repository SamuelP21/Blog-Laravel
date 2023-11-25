<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="{{ asset('build/assets/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
<x-dashboard-layout>
    <div class="p-4 md:ml-64">     

        <div class="relative overflow-x-auto  pt-32">
            <form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-6">
                    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{old('name')}}">
                    @error('name')
                        <br>
                        {{$message}}
                        <br>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                    <input type="text" id="slug" name="slug" aria-label="disabled input" 
                            class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            value="{{old('slug')}}" readonly>
                    @error('slug')
                        <br>
                        {{$message}}
                        <br>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoria</label>
                    <select id="countries" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($categories as $category)
                            <option {{ old('category_id') == $category->id ? 'selected' : "" }} value="{{ $category->id }}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <br>
                        {{$message}}
                        <br>
                    @enderror
                </div>
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Etiquetas</label>
                <div class="flex items-center mb-4">

                    @foreach ($tags as $tag)

                        <input id="checkbox-1" type="checkbox" name="tags[]" value="{{$tag->id}}" 
                                class="ml-2 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" 
                                {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                        <label for="checkbox-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$tag->name}} </label>
                    
                    @endforeach
                
                </div>
                <div class="flex items-center mb-4">
                    <input id="country-option-1" type="radio" name="status" value="1" 
                            class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" 
                            {{ old('status', '1') == '1' ? 'checked' : '' }}>
                    <label for="country-option-1" class="block ms-2  text-sm font-medium text-gray-900 dark:text-gray-300">
                      Borrardor
                    </label>
                    <input id="country-option-1" type="radio" name="status" value="2" 
                            class="ml-2 w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600"
                            {{ old('status') == '2' ? 'checked' : '' }}>
                    <label for="country-option-1" class="block ms-2  text-sm font-medium text-gray-900 dark:text-gray-300">
                      Publicado
                    </label>
                  </div>
                
                {{-- archivo --}}
                <div class="flex items-center max-w-lg">
                    <div class="w-1/2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Imagen</label>
                        <img id="picture" class="h-auto max-w-full rounded-lg" src="https://www.tooltyp.com/wp-content/uploads/2014/10/1900x920-8-beneficios-de-usar-imagenes-en-nuestros-sitios-web.jpg" alt="image description">
                    </div>
                    <div class="w-1/2 pl-4">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Subir nueva imagen</label>
                        <input name="file" id="file" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" type="file">
                    </div>
                </div>
                @error('file')
                        <br>
                        {{$message}}
                        <br>
                    @enderror
                {{-- fin archivo --}}
                <div>
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Extracto</label>
                    <textarea name="extract" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="extracto...">{{old('extract')}}</textarea>
                </div>
                <div>
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cuerpo</label>
                    <textarea name="body" id="editor1" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cuerpo...">
                        {{old('body')}}
                    </textarea>
                    
                </div>
            
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
         ClassicEditor.create( document.querySelector( '#editor1' ) )
                    .then( editor => {
                        console.log( editor );
                    } ).catch( error => {
                            console.error( error );
                        } );
    });
    document.getElementById("file").addEventListener('change', cambiarImagen);
           function cambiarImagen(event){
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
           }
</script>