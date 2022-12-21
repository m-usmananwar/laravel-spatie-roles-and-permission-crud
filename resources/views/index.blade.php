<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="w-10/12 sm:px-6 lg:px-8">
            @can('create-post')
                <a href="{{ route('post.create') }}"
                    class="border border-solid border-black px-2 py-1 bg-gray-900 text-white rounded-md cursor-pointer">Create
                    New</a>
            @endcan
            <div class="flex flex-col">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="w-full">
                            <thead class="bg-white border-b">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Id
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Name
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Content
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $post->id }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $post->name }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $post->content }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            @can('view-post')
                                                <a href="{{ route('post.show', $post->id) }}"
                                                    class="border border-solid border-black px-2 py-1 bg-gray-900 text-white rounded-md cursor-pointer">Show</a>
                                            @endcan
                                            @can('update-post')
                                                <a href="{{ route('post.edit', $post->id) }}"
                                                    class="border border-solid border-black px-2 py-1 bg-gray-900 text-white rounded-md cursor-pointer">Edit</a>
                                            @endcan
                                            @can('delete-post')
                                                <form method="POST" action="{{ route('post.destroy', $post->id) }}"
                                                    class="inline">
                                                    @csrf @method('Delete')
                                                    <button type="submit"
                                                        class="border border-solid border-black px-2 py-1 bg-gray-900 text-white rounded-md cursor-pointer ml-2">Delete</button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
