<section>
    <header class="flex items-center">
        <div>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('group Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your group information") }}
        </p>
    </div>
    </header>

    <form method="post" action="{{ route('groups.update', [$group->id] ) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="group_name" :value="__('group name')" />
            <x-text-input id="group_name" name="group_name" type="text" class="mt-1 block w-full" :value="old('group_name', $group->group_name)" required autofocus autocomplete="group_name" />
            <x-input-error class="mt-2" :messages="$errors->get('group_name')" />
        </div>
        <div>
            <x-input-label for="created_by" :value="__('created by')" />
            <select class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="created_by">
                <option value="">Choose a user</option>
                @foreach($users as $key => $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach            
            </select>            <x-input-error class="mt-2" :messages="$errors->get('created_by')" />
        </div>
        <div>
            <x-input-label for="book_id" :value="__('book id')" />
            <select class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="book_id" id="book_id">
                <option value="">Choose a book</option>
                @foreach($books as $key => $book)
                @if ($book->archived == 0)
                    <option value="{{ $book->id }}">{{ $book->book_title }}</option>
                @endif    
                @endforeach
            </select>            
            <x-input-error class="mt-2" :messages="$errors->get('book_id')" />

                <x-input-label for="member" :value="__('Members')" />
                <select class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="member1">
                    @if (Auth::user()->name == 'admin')
                        <option value="">Choose a user</option>
                        @foreach($users as $key => $user)
                            @if (($user->id != Auth::user()->id) && ($user->name != 'admin'))
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                        @endforeach
                    @else
                        <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
                    @endif
                </select>
                <select class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="member2">
                    <option value="">Choose a user</option>
                    @foreach($users as $key => $user)
                        @if (($user->id != Auth::user()->id) && ($user->name != 'admin'))
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                    @endforeach            
                </select>
                <select class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="member3">
                    <option value="">Choose a user</option>
                    @foreach($users as $key => $user)
                        @if (($user->id != Auth::user()->id) && ($user->name != 'admin'))
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                    @endforeach            
                </select>
                <select class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="member4">
                    <option value="">Choose a user</option>
                    @foreach($users as $key => $user)
                        @if (($user->id != Auth::user()->id) && ($user->name != 'admin'))
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                    @endforeach            
                </select>
                <select class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="member5">
                    <option value="">Choose a user</option>
                    @foreach($users as $key => $user)
                        @if (($user->id != Auth::user()->id) && ($user->name != 'admin'))
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                    @endforeach            
                </select>    
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'groups-updated')
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
