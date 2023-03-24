<section>
    <header class="flex items-center">
        <div>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Create A new category') }}
        </h2>
        
    </div>
    </header>

    <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="category_name" :value="__('category name')" />
            <x-text-input id="category_name" class="block mt-1 w-full" type="text" name="category_name" :value="old('category_name')" required autofocus autocomplete="category_name" />
            <x-input-error :messages="$errors->get('category_name')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4 mb-10">
                {{ __('Add') }}
            </x-primary-button>
        </div>
    </form>
</section>
