
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create post') }}
        </h2>
    </x-slot>
        <form method="POST" action="{{ route('update.post', ['id' => $post->id]) }}">
            @method('PUT')
            @csrf

            <!-- Title -->
            <div>
                <x-label for="title" :value="__('Title')" />

                <x-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ $post->title }}"  autofocus />
                @error('title')
                <div class="alert alert-danger">
                    <ul>
                        <li>{{ $message }}</li>
                    </ul>
                </div>
                @enderror
            </div>

            <!-- Body -->
            <div class="mt-4">
                <x-label for="body" :value="__('Content')" />

                <x-input id="body" class="block mt-1 w-full" type="text" name="body" value="{{ $post->text }}"  />
                @error('body')
                <div class="alert alert-danger">
                    <ul>
                        <li>{{ $message }}</li>
                    </ul>
                </div>
                @enderror
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Update post') }}
                </x-button>
            </div>
        </form>
</x-app-layout>
