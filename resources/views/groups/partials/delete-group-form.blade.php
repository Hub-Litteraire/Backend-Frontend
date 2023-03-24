<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete group') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your group is deleted, all of its resources and data will be permanently deleted. Before deleting your group, please download any data or information that you wish to retain.') }}
        </p>
    </header>
    <form method="post" action="{{ route('groups.destroy' , [$group->id]) }}">
        @csrf
        @method('delete')
        <div class="flex justify-start">
            <x-danger-button>
                {{ __('Delete group') }}
            </x-danger-button>
        </div>
    </form>
</section>
