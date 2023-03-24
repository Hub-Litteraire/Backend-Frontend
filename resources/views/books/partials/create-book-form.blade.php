<section>
    <header class="flex items-center">
        <div>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Create A new book') }}
        </h2>
        
    </div>
    </header>

    <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="book_title" :value="__('book title')" />
            <x-text-input id="book_title" class="block mt-1 w-full" type="text" name="book_title" :value="old('book_title')" required autofocus autocomplete="book_title" />
            <x-input-error :messages="$errors->get('book_title')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="book_description" :value="__('book description')" />
            <x-text-input id="book_description" name="book_description" type="text" class="mt-1 block w-full" :value="old('book_description')" required autofocus autocomplete="book_description" />
            <x-input-error class="mt-2" :messages="$errors->get('book_description')" />
        </div>
        <div>
            <x-input-label for="book_author" :value="__('book author')" />
            <x-text-input id="book_author" name="book_author" type="text" class="mt-1 block w-full" :value="old('book_author')" required autofocus autocomplete="book_author" />
            <x-input-error class="mt-2" :messages="$errors->get('book_author')" />
        </div>
        <div>
            <x-input-label for="category_id" :value="__('category')" />
            <select class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="category_id" id="category_id">
                <option value="">Choose a category</option>
                @foreach($Categories as $key => $category)
                    <option value="{{ $category->id }}">{{ $category->id }}-{{ $category->category_name }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
        </div>
        <div>
            <x-input-label for="book_cover" :value="__('book cover')" />
            <x-text-input id="image" name="file" type="file" class="mt-1 block w-full" required />
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>
        <div>
            <x-input-label for="book_pdf" :value="__('book pdf')" />
            <x-text-input id="pdf" name="file2" type="file" class="mt-1 block w-full" required />
        </div>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4 mb-10">
                {{ __('Add') }}
            </x-primary-button>
        </div>
    </form>
</section>
