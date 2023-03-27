<x-app-layout>

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
            <div class="w-auto flex flex-col items-baseline">
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
