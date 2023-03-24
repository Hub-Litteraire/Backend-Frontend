<x-app-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">Welcome to Literary Hub</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">an online community for book lovers.</p>
                    <a href="/galery" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                    Get started
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>
    </section>
    <div class="py-5 flex justify-center flex-wrap">
        <div class="pt-5 w-full flex justify-center">
            <p class="max-w-2xl mb-6 font-bold text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Some of our Books</p>
        </div>
        @if($books->count())

            @foreach($books as $key => $book)
            @if ($book->archived == 0)

      <a href="/galery">
        <div
          style="max-height : 238px"
          class="overflow-y-clip mx-3 my-2 flex flex-col rounded-lg bg-white shadow-lg dark:bg-neutral-700 md:max-w-xl md:flex-row transform transition duration-500 hover:scale-105 hover:shadow-2xl">
          <img
            class="h-96 w-full rounded-t-lg object-cover md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
            src="{{ $book->book_cover }}"
            alt="" />
          <div class="flex flex-col justify-start p-6 overflow-y-auto">
            <div class="w-20 flex flex-col items-baseline">
            <h5
              class="mb-2 text-xl font-medium text-neutral-800 dark:text-neutral-50">
              {{ $book->book_title }}
            </h5>
            </div>
            <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
              {{ $book->book_description }}
            </p>
            <p class="text-xs text-neutral-500 dark:text-neutral-300">
              {{ $book->book_author }}
            </p>
          </div>
        </div>
      </a>
      @endif
        @endforeach

        @endif
      </div>
</x-app-layout>
