<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create Todo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('todo.store') }}">
                    @csrf

                    <!-- Input Title -->
                    <div class="mb-6">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input 
                            id="title" 
                            name="title" 
                            type="text" 
                            class="block w-full mt-1" 
                            required 
                            autofocus 
                            autocomplete="title"
                            value="{{ old('title') }}"
                        />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>

                    <!-- Input Category -->
                    <div class="mb-6">
                        <x-input-label for="category_id" :value="__('Category')" />
                        <select 
                            id="category_id" 
                            name="category_id" 
                            class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                            required
                        >
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                    </div>

                    <!-- Buttons -->
                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>

                        @if (class_exists('App\View\Components\CancelButton'))
                            <x-cancel-button href="{{ route('todo.index') }}" />
                        @else
                            <a href="{{ route('todo.index') }}" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest
                                text-gray-700 uppercase transition duration-150 ease-in-out
                                bg-white border border-gray-300 rounded-md shadow-sm dark:bg-gray-800
                                dark:border-gray-500 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700
                                focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800
                                disabled:opacity-25">{{ __('Cancel') }}</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
