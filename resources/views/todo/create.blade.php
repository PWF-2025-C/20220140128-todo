<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('todo.store') }}">
                    @csrf
                    <div class="mb-6">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">
                            Title
                        </label>
                        <input 
                             type="text" 
                             name="title"
                             class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                             placeholder="Input Todo Title" 
                             required
                         >
                    </div>
                    <div class="mb-6">
                            <x-input-label for="category_id" :value="__('Category')" />
                            <x-select id="category_id" name="category_id" class="block w-full mt-1">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                                @endforeach
                            </x-select>
                            <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                        </div>
                    <div class="flex items-center gap-2">
                        <<button 
                             type="submit"
                             class="px-4 py-2 bg-white hover:bg-gray-100 text-gray-800 font-medium rounded-lg shadow-sm border border-gray-300 dark:border-gray-600 transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800"
                         >
                            Save
                        </button>
                        <a 
                             href="{{ route('todo.index') }}"
                               class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:text-gray-300 dark:border-gray-500 dark:hover:bg-gray-700 dark:hover:text-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25">
                                {{ __('Cancel') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>