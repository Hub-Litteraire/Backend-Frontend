<section>
    <header class="flex items-center">
        <div>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('category Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your category information") }}
        </p>
    </div>
    </header>

    <form method="post" action="{{ route('categories.update', [$category->id] ) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div>
            <x-input-label for="category_name" :value="__('category name')" />
            <x-text-input id="category_name" name="category_name" type="text" class="mt-1 block w-full" :value="old('category_name', $category->category_name)" required autofocus autocomplete="category_name" />
            <x-input-error class="mt-2" :messages="$errors->get('category_name')" />
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'categories-updated')
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
