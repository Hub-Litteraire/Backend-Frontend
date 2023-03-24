<section>
    <header class="flex items-center">
        <div>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Create A new group') }}
        </h2>
        
    </div>
    </header>

    <form method="POST" action="{{ route('groups.store') }}">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="group_name" :value="__('group name')" />
            <x-text-input id="group_name" class="block mt-1 w-full" type="text" name="group_name" :value="old('group_name')" required autofocus autocomplete="group_name" />
            <x-input-error :messages="$errors->get('group_name')" class="mt-2" />
        </div>

        <!-- created_by -->
        <div class="mt-4">
            <x-input-label for="book_id" :value="__('book')" />
            <select class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="book_id" id="book_id" required>
                <option value="">Choose a book</option>
                @foreach($books as $key => $book)
                @if ($book->archived == 0)
                    <option value="{{ $book->id }}">{{ $book->book_title }}</option>
                @endif    
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('book_id')" class="mt-2" />

            <x-input-label for="member" :value="__('Members')" />
            <select class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="member1">
                @if (Auth::user()->hasRole('Admin'))
                    <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
                    @foreach($users as $key => $user)
                        @if (($user->id != Auth::user()->id) && (!$user->hasRole('Admin')))
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                    @endforeach
                @else
                    <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }} (You)</option>
                @endif
            </select>
            <select class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="member2">
                <option value="">Choose a user</option>
                @foreach($users as $key => $user)
                    @if (($user->id != Auth::user()->id) && (!$user->hasRole('Admin')))
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                @endforeach            
            </select>
            <select class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="member3">
                <option value="">Choose a user</option>
                @foreach($users as $key => $user)
                    @if (($user->id != Auth::user()->id) && (!$user->hasRole('Admin')))
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                @endforeach            
            </select>
            <select class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="member4">
                <option value="">Choose a user</option>
                @foreach($users as $key => $user)
                    @if (($user->id != Auth::user()->id) && (!$user->hasRole('Admin')))
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                @endforeach            
            </select>
            <select class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="member5">
                <option value="">Choose a user</option>
                @foreach($users as $key => $user)
                    @if (($user->id != Auth::user()->id) && (!$user->hasRole('Admin')))
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                @endforeach            
            </select>
            <x-input-error :messages="$errors->get('id')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4 mb-10">
                {{ __('Add') }}
            </x-primary-button>
        </div>
    </form>
</section>
