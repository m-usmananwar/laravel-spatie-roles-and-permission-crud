<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="block p-6 rounded-lg shadow-lg bg-white max-w-md">
            <form method="POST" action="{{ route('post.update', $post->id) }}">
                @csrf @method('put')
                <div class="form-group mb-6">
                    <input type="text" name="name"
                        class="form-control block
                  w-full
                  px-3
                  py-1.5
                  text-base
                  font-normal
                  text-gray-700
                  bg-white bg-clip-padding
                  border border-solid border-gray-300
                  rounded
                  transition
                  ease-in-out
                  m-0
                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleInput7" placeholder="Name" value="{{ $post->name }}">
                </div>
                <div class="form-group mb-6">
                    <textarea
                        class="
                  form-control
                  block
                  w-full
                  px-3
                  py-1.5
                  text-base
                  font-normal
                  text-gray-700
                  bg-white bg-clip-padding
                  border border-solid border-gray-300
                  rounded
                  transition
                  ease-in-out
                  m-0
                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                "
                        id="exampleFormControlTextarea13" rows="3" placeholder="Content" name="content">{{ $post->content }}</textarea>
                </div>
                <button type="submit"
                    class="
                w-full
                px-6
                py-2.5
                bg-gray-900
                text-white
                font-medium
                text-xs
                leading-tight
                uppercase
                rounded
                shadow-md
                transition
                duration-150
                ease-in-out">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>
