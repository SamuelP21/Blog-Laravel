<x-app-layout>
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="text-4xl font-bold text-white">{{$post->name}}</h1>
        <div class="text-lg text-yellow-100 mb-2">
            {{$post->extract}}
        </div>
        <div class="grid lg:grid-cols-3 gap-6">
            {{-- contenido principal --}}
            <div class="lg:col-span-2">
                <figure>
                    @if ($post->image)
                        <img class="w-full h-80 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">
                    @endif
                </figure>
                <div class="text-base text-yellow-100 mb-2 mt-4">
                    {!!$post->body!!}
                </div>

            </div >
            {{-- contenido relacionado --}}
            <aside>
                <h1 class="text-2xl font-bold text-yellow-100 mb-4">mas en {{$post->category->name}}</h1>

                <ul>
                    @foreach ($similares as $similar)
                        <li class=" mb-4">
                            <a class="flex" href="{{route('posts.show', $similar)}}">
                                @if ($similar->image)
                                    <img class="w-36 h-20 object-cover object-center" src="{{Storage::url($similar->image->url)}}" alt="">
                                @endif
                                <span class="ml-2 text-green-500">{{$similar->name}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>

        </div>
    </div>
</x-app-layout>