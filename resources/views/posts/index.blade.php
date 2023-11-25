<x-app-layout>
    
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 py-8">
        {{-- div para mostrar los posts en este caso de 8 en 8 --}}
        <div class="grid lg:grid-cols-3 gap-6 md:grid-cols-2">

            @foreach ($posts as $post)
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif" 
                    style="background-image: url(@if($post->image) {{Storage::url($post->image->url)}} @endif)">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <div>
                            @foreach ( $post->tags  as $tag)
                                <a href="" class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full">{{$tag->name}}</a>
                            @endforeach
                        </div>
                        <h1 class="text-xl text-white leading-8 font-bold">
                            <a href="{{route('posts.show', $post)}}">
                                {{ $post->name }}
                            </a>
                        </h1>
                    </div>
                </article>
            @endforeach

        </div>

        {{-- paginacion --}}
        <div class="mt-4">
            {{$posts->links()}}
        </div>

    </div>

</x-app-layout>