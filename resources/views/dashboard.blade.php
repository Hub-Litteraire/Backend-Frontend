<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<div style="width: 99%" class="ml-2 my-5 relative overflow-x-hidden sm:rounded-lg">
    <p class="ml-3 max-w-2xl mb-6 font-bold text-black lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Books</p>
    <!-- drawer init and show -->
    <div>         
        <x-primary-button class="ml-3 mb-2" type="button" data-drawer-target="drawer-contact-book" data-drawer-show="drawer-contact-book" aria-controls="drawer-contact-book">
          {{ __('Add a Book') }}
        </x-primary-button>
      </div>
      <!-- drawer component -->
    <div style="top : 64px;" id="drawer-contact-book" class="fixed left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-contact-label">
        <h5 id="drawer-label" class="inline-flex items-center mb-6 text-base font-semibold text-gray-500 uppercase dark:text-gray-400"><svg class="w-5 h-5 mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>Literary Hub</h5>
        <button type="button" data-drawer-hide="drawer-contact-book" aria-controls="drawer-contact-book" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          <span class="sr-only">Close menu</span>
        </button>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
          <div class="max-w-xl">
              @include('books.partials.create-book-form')
          </div>
      </div>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-blue-50 dark:bg-blue-700 dark:text-blue-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    @sortablelink('id')
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('book_title')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('book_description')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('book_author')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('book_cover')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('category_id')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Archived
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('created_at')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @if($books->count())
        
                    @foreach($books as $key => $book)
        
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $book->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $book->book_title }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $book->book_description }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $book->book_author }}
                            </td>
                            <td class="px-6 py-4">
                                <abbr title="click To read the book">
                            <a href="{{ $book->book_pdf }}" target="_blank">
                                <img src="{{ $book->book_cover }}" alt="">
                            </a></abbr>
                            </td>
                            <td class="px-6 py-4">
                                {{ $book->category_id }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($book->archived == 0)
                                    Not Archived
                                @else
                                    Archived  
                                @endif
                            </td>
                            </td>
                            <td class="px-6 py-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi quod repellat voluptates necessitatibus dignissimos ab qui officia. Placeat reiciendis voluptatum ut quidem perferendis nobis harum? Perferendis quam sed laboriosam similique!
                                {{ $book->created_at->format('Y-m-d') }}
                            </td>        
                            <td class="px-6 py-4 text-right">
                                <a href="/books/{{ $book->id }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit Or Delete</a>
                            </td>
                        </tr>
        
                    @endforeach
        
                @endif
        </tbody>
    </table>
        {!! $books->appends(\Request::except('page'))->render() !!}
</div>
<div style="width: 99%" class="ml-2 my-5 relative overflow-x-hidden shadow-md sm:rounded-lg">
    <p class="ml-3 max-w-2xl mb-6 font-bold text-black lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Categories</p>
    <!-- drawer init and show -->
    <div>         
        <x-primary-button class="ml-3 mb-2" type="button" data-drawer-target="drawer-contact-category" data-drawer-show="drawer-contact-category" aria-controls="drawer-contact-category">
          {{ __('Add a category') }}
        </x-primary-button>
      </div>
      <!-- drawer component -->
    <div style="top : 64px;" id="drawer-contact-category" class="fixed left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-contact-label">
        <h5 id="drawer-label" class="inline-flex items-center mb-6 text-base font-semibold text-gray-500 uppercase dark:text-gray-400"><svg class="w-5 h-5 mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>Literary Hub</h5>
        <button type="button" data-drawer-hide="drawer-contact-category" aria-controls="drawer-contact-category" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          <span class="sr-only">Close menu</span>
        </button>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
          <div class="max-w-xl">
              @include('categories.partials.create-category-form')
          </div>
      </div>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-blue-50 dark:bg-blue-700 dark:text-blue-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    @sortablelink('id')
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('category_name')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('created_at')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @if($Categories->count())
        
                    @foreach($Categories as $key => $Category)
        
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $Category->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $Category->category_name }}
                            </td> 
                            <td class="px-6 py-4">
                                {{ $Category->created_at->format('Y-m-d') }}
                            </td>  
                            <td class="px-6 py-4 text-right">
                                <a href="/categories/{{ $Category->id }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit Or Delete</a>
                            </td>      
                        </tr>
        
                    @endforeach
        
            @endif
        </tbody>
    </table>
        {!! $Categories->appends(\Request::except('page'))->render() !!}
</div>
<div style="width: 99%" class="ml-2 my-5 relative overflow-x-hidden shadow-md sm:rounded-lg">
    <p class="ml-3 max-w-2xl mb-6 font-bold text-black lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Groups</p>
    <!-- drawer init and show -->
    <div>
                        
        <x-primary-button class="ml-3 mb-2" type="button" data-drawer-target="drawer-contact" data-drawer-show="drawer-contact" aria-controls="drawer-contact">
          {{ __('create group') }}
        </x-primary-button>
      </div>
      <!-- drawer component -->
      <div style="top : 64px;" id="drawer-contact" class="fixed left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-contact-label">
        <h5 id="drawer-label" class="inline-flex items-center mb-6 text-base font-semibold text-gray-500 uppercase dark:text-gray-400"><svg class="w-5 h-5 mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>Literary Hub</h5>
        <button type="button" data-drawer-hide="drawer-contact" aria-controls="drawer-contact" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          <span class="sr-only">Close menu</span>
        </button>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
          <div class="max-w-xl">
              @include('groups.partials.create-group-information-form')
          </div>
      </div>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-blue-50 dark:bg-blue-700 dark:text-blue-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    @sortablelink('id')
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('group_name')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        group_members
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('created_by')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('book')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        @sortablelink('created_at')
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @if($Groups->count())
        
                    @foreach($Groups as $key => $Group)
        
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $Group->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $Group->group_name }}
                            </td>
                            <td class="px-6 py-4 flex flex-col">
                                @foreach ($Group->users as $member)
                                    <span>>{{ $member->name }}</span>
                                @endforeach
                            </td>
                            <td class="px-6 py-4">
                                {{ $Group->user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $Group->book->book_title }}
                            </td>
                            </td>
                            <td class="px-6 py-4">
                                {{ $Group->created_at->format('Y-m-d') }}
                            </td>        
                            <td class="px-6 py-4 text-right">
                                <a href="/groups/{{ $Group->id }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit Or Delete</a>
                            </td>
                        </tr>
        
                    @endforeach
        
                @endif
        </tbody>
    </table>
        {!! $Groups->appends(\Request::except('page'))->render() !!}
</div>
</x-app-layout>
