<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between text-xl font-semibold mx-5 text-gray-800 dark:text-gray-200 leading-tight">
            <div>
                <button>Home</button>
            </div>
            <div class="flex gap-5">
                <h1>
                    <a class="underline underline-offset-4 text-blue-600" href={{ url('/dashboard') }}>All</a>
                </h1>
                <h1>
                    <a href={{ url('/dashboard/mypost') }}>My Post</a>
                </h1>
            </div>
            <div>
                <a href={{ route('post.index') }}
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                    Post</a>
            </div>
        </div>

    </x-slot>
    <div class="flex flex-col justify-center">
    <div class="flex mx-20 mt-10 flex-wrap gap-5 justify-around">
        @if ($posts)
            @foreach ($posts as $post)
                    <div
                    class=" overflow-auto flex flex-col w-96 h-56  p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400 mb-2">{{ $post->description }}</p>
                    @if($post->user->name ==Auth::user()->name)                    
                    <div class="flex justify-end gap-4 mt-auto">
                        <a href={{ url('/post', $post->id) }}
                    class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-3 py-2 text-center dark:bg-blue-500 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Edit</a>
                    <a href={{ url('/post/delete', $post->id) }}
                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-3 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-blue-800">
                    Delete</a>
                    
                    </div>
                    @endif
                </div>
            @endforeach
        @endif
    </div>
    <div class="mt-10 flex  justify-center">
        {{ $posts->links()}}
    </div>
</div>
</x-app-layout>
