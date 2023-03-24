<section>
    <header class="flex items-center">
        <div>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('book Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your book information") }}
        </p>
    </div>
    </header>

    <form method="post" action="{{ route('books.update', [$book->id] ) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="book_title" :value="__('book title')" />
            <x-text-input id="book_title" name="book_title" type="text" class="mt-1 block w-full" :value="old('book_title', $book->book_title)" required autofocus autocomplete="book_title" />
            <x-input-error class="mt-2" :messages="$errors->get('book_title')" />
        </div>
        <div>
            <x-input-label for="book_description" :value="__('book description')" />
            <x-text-input id="book_description" name="book_description" type="text" class="mt-1 block w-full" :value="old('book_description', $book->book_description)" required autofocus autocomplete="book_description" />
            <x-input-error class="mt-2" :messages="$errors->get('book_description')" />
        </div>
        <div>
            <x-input-label for="book_author" :value="__('book author')" />
            <x-text-input id="book_author" name="book_author" type="text" class="mt-1 block w-full" :value="old('book_author', $book->book_author)" required autofocus autocomplete="book_author" />
            <x-input-error class="mt-2" :messages="$errors->get('book_author')" />
        </div>
        <div>
            <x-input-label for="category_id" :value="__('category')" />
            <select class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="category_id" id="category_id">
                <option value="{{$book->category_id}}">{{ $book->category->category_name }}</option>
                @foreach($categories as $key => $category)
                    @if ($book->category_id != $category->id)
                        <option value="{{ $category->id }}">{{ $category->id }}-{{ $category->category_name }}</option>
                    @endif
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
        </div>
        <div>
            <x-input-label for="archived" :value="__('add to archive?')" />
            <select class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="archived" id="archived">
                <option value="{{$book->archived}}">
                @if ($book->archived == 0)
                    no
                @else
                    yes
                @endif
            </option>
            @if ($book->archived != 0)
                <option value="0">no</option>
            @endif    
            @if ($book->archived == 0)
                <option value="1">yes</option>
            @endif 
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('archived')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'books-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
