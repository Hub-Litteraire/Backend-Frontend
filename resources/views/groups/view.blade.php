<x-app-layout>
      <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">Welcome to Literary Hub</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">an online community for book lovers.</p>
                <a href="#" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                    Get started
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="../build/assets/books.png" alt="mockup">
            </div>                
        </div>
    </section>
            @if ($errors->any())
              <div id="alert-2" class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                  please choose every user once.
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                  <span class="sr-only">Close</span>
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
              </div>
            @endif
      <div class="pt-20 pb-4">
        
            <div class="flex flex-row justify-between bg-grey-100">
            <div style="max-height: 700px" class="flex flex-col w-2/5 border-r-2 overflow-y-scroll">     
                      <!-- drawer init and show -->
                      <div class="text-center">
                        
                        <x-primary-button class="ml-4" type="button" data-drawer-target="drawer-contact" data-drawer-show="drawer-contact" aria-controls="drawer-contact">
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
              @if (isset($all))
                @foreach ($all as $alls)
                  @if (isset($alls->users))
                    <?php $pass1 = -1;?>
                      @for ($i=0 ; $i < count($alls->users) ; $i++)
                        @if ($alls->users[$i]->id == Auth::user()->id || Auth::user()->hasRole('Admin'))
                          <?php $pass1 = $i; ?>
                        @endif
                      @endfor
                  @if ($pass1 != -1)
                    <div class="flex flex-row py-4 px-2 justify-center items-center border-b-2">
                        <div class="w-1/4">
                          <div
                              class="h-12 w-12 p-2 text-4xl bg-yellow-500 rounded-full text-white font-bold flex  items-start justify-center">
                              📖
                          </div>  
                        </div>
                        <div class="w-full">
                            <button>
                                    <div class="ml-2 text-sm text-black font-semibold">{{ $alls->group_name }}</div>
                                </button><br>
                                @if ( $alls->user->id == Auth::user()->id)
                                  <span class="ml-2 text-gray-500 text-sm">created by You </span><br>
                                @else
                                  <span class="ml-2 text-gray-500 text-sm">created by: {{ $alls->user->name }}</span><br>
                                @endif
                        </div>
                        <a href="/group/{{ $alls->id }}"><button>
                            <svg class=" w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="grey"
                                class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm4.28 10.28a.75.75 0 000-1.06l-3-3a.75.75 0 10-1.06 1.06l1.72 1.72H8.25a.75.75 0 000 1.5h5.69l-1.72 1.72a.75.75 0 101.06 1.06l3-3z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button></a>
                    </div>
                    @endif
                  @endif
                @endforeach
                @endif
                @if ($pass1 == -1)
                <div class="flex justify-center items-center pt-20">
                  <h1 class="text-lg text-gray-600">You don't have any group</h1>
                </div>
                  
                @endif
            </div>
            
            <div class="w-full px-5 flex flex-col justify-between">
                    <div class="max-w-2xl w-full mx-auto px-4 pt-5">
                        <div class="flex justify-between items-center mb-6">
                          @if (isset($groups))
                            <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussions ({{count($groups->comments)}})</h2>
                          @else
                          <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussions (0)</h2>
                        @endif
                      </div>
                      <?php $pass2 = -1; ?>
                      @if (isset($groups))
                        @for ($i=0 ; $i < count($groups->users) ; $i++)
                                    @if ($groups->users[$i]->id == Auth::user()->id || Auth::user()->hasRole('Admin'))
                                      <?php $pass2 = $i; ?>
                                    @endif
                        @endfor
                      @endif
                      <form method="post" action="{{ route('comments.store') }}" class="mb-6">
                        @csrf
                        @method('post')
                          <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                              <label for="comment_content" class="sr-only">Your comment</label>
                              <textarea id="comment_content" name="comment_content" rows="6"
                                  class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                  placeholder="Write a comment..." required></textarea>
                                  @if (isset($groups))
                                  <input class="hidden" type="number" name="group_id" value="{{ $groups->id }}">
                                  @endif
                                  <input class="hidden" type="text" name="pg" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                          </div>
                          @if ($pass2 != -1)
                            <button type="submit"
                              class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                              Post comment
                            </button>
                            @else
                            <button disabled
                              class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-400 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-400">
                              Post comment
                            </button>
                          @endif

                      </form>
                      <div>
                    @if (isset($groups))
                      @foreach($groups->comments as $key => $comment) 
                      <article class="p-6 mb-6 text-base bg-white rounded-lg dark:bg-gray-900">
                          <footer class="flex justify-between items-center mb-2">
                              <div class="flex items-center">
                                  <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white"><img
                                          class="mr-2 w-10 h-10 rounded-full"
                                          src="../build/assets/user.png"
                                          alt="Michael Gough">{{ $comment->user->name }}</p>
                                  <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                          title="February 8th, 2022">{{ $comment->created_at->format('Y-m-d') }}</time></p>
                              </div>
                              <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment{{$comment->id}}"
                                  class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                  type="button">
                                  <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                      xmlns="http://www.w3.org/2000/svg">
                                      <path
                                          d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                      </path>
                                  </svg>
                                  <span class="sr-only">Comment settings</span>
                              </button>
                              <!-- Dropdown menu -->
                              <div id="dropdownComment{{$comment->id}}"
                                  class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                  <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                      aria-labelledby="dropdownMenuIconHorizontalButton">
                                      <li>
                                        <form method="post" action="{{ route('comments.destroy' , [$comment->id]) }}">
                                          @csrf
                                          @method('delete')
                                          <div>
                                            @if($comment->user->name == Auth::user()->name || Auth::user()->hasRole('Admin'))
                                              <button type="submit" class="w-full block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</button> 
                                            @else
                                              <button disabled type="submit" class="w-full block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">nothing to do</button> 
                                            @endif
                                          </div>
                                      </form>
                                          
                                      </li>
                                  </ul>
                              </div>
                          </footer>
                          <p class="text-gray-500 dark:text-gray-400">{{ $comment->comment_content }}</p>
                          
                      </article>
                      @endforeach
                    @endif  
          @if (isset($groups))
                      <div id="tooltip-bottom{{$groups->id}}" role="tooltip" style="z-index: 1000" class="absolute z-50 invisible flex flex-col px-3 py-2 text-sm font-small text-black bg-white rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        @foreach($groups->book->likes as $key => $user) <div>{{ $user->name }}</div> @endforeach
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <div id="dtooltip-bottom{{$groups->id}}" role="tooltip" style="z-index: 1000" class="absolute z-50 invisible flex flex-col px-3 py-2 text-sm font-small text-black bg-white rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                      @foreach($groups->book->dislikes as $key => $user) <div>{{ $user->name }}</div> @endforeach
                      <div class="tooltip-arrow" data-popper-arrow></div>
                  </div>
          @endif        
                    </div>
                </div>
            </div>
            <!-- end message -->
            @if ($pass2 != -1)
            <div class="w-2/5 border-l-2 px-5">
                <div class="flex flex-col">
                    <div class="font-semibold text-xl text-cyan-400 py-4">
                    </div>
                    <abbr title="click To read the book">
                      <a href="{{ $groups->book->book_pdf }}" target="_blank">
                          <img src="{{ $groups->book->book_cover }}" class="object-cover rounded-xl h-64" alt="">
                      </a></abbr>
                    <div class="font-semibold text-gray-800 py-4">{{ $groups->book->book_title }}</div>
                    <div class="font-light text-black">
                        {{ $groups->book->book_description }}
                    </div>
                    <div class="mt-3 font-bold text-black mem">
                      Members : 
                      <span class="font-light">You</span>
                      @foreach ($groups->users as $member)
                      @if ($member->id != Auth::user()->id)
                        <span class="font-light">, {{ $member->name }}</span>
                      @endif
                      @endforeach
                    </div>
                    <div class="flex">
                    <div class="mt-3 flex space-x-1 items-center">
                      @if (isset($groups->book->likes[0]))
                      @foreach($groups->book->likes as $key => $user)
                      <?php 
                          if($user->id == Auth::user()->id){
                            $pass = 1;
                          }
                      ?>
                        @endforeach
                          @if ($pass == 1)
                          <form method="post" action="{{ route('likes.destroy' , [$groups->book->id]) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="relative">
                              <img width="30px" src="../build/assets/heart_full.png" alt="heart">
                            </button>
                        </form>
                      @else
                        <form class="relative" method="post" action="{{ route('likes.store') }}">
                          @csrf
                          @method('post')
                            <div class="hidden">
                                    <input class="hidden" type="number" name="book_id" value="{{ $groups->book->id }}">
                                    <input class="hidden" type="text" name="pg" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                            </div>
                            <button type="submit">
                                <img width="30px" src="../build/assets/heart.png" alt="heart">
                            </button>
                        </form>
                      @endif
                        @else
                          <form class="relative" method="post" action="{{ route('likes.store') }}">
                            @csrf
                            @method('post')
                              <div class="hidden">
                                      <input class="hidden" type="number" name="book_id" value="{{ $groups->book->id }}">
                                      <input class="hidden" type="text" name="pg" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                              </div>
                              <button type="submit">
                                  <img width="30px" src="../build/assets/heart.png" alt="heart">
                              </button>
                          </form>
                            
                          @endif
                          <span class="self-center" data-tooltip-target="tooltip-bottom{{$groups->id}}" data-tooltip-placement="bottom" type="button">{{ count($groups->book->likes) }}</span>
                      </div>
                      <div class="mt-3 ml-1 flex space-x-1 items-center">
                        @if (isset($groups->book->dislikes[0]))
                        @foreach($groups->book->dislikes as $key => $user)
                        <?php 
                            if($user->id == Auth::user()->id){
                              $pass = 1;
                            }
                        ?>
                          @endforeach
                            @if ($pass == 1)
                            <form method="post" action="{{ route('dislikes.destroy' , [$groups->book->id]) }}">
                              @csrf
                              @method('delete')
                              <button type="submit" class="relative">
                                <img width="33px" src="../build/assets/broken-heart-full.png" alt="heart">
                              </button>
                          </form>
                            
                        @else
                          <form class="relative" method="post" action="{{ route('dislikes.store') }}">
                            @csrf
                            @method('post')
                              <div class="hidden">
                                      <input class="hidden" type="number" name="book_id" value="{{ $groups->book->id }}">
                                      <input class="hidden" type="text" name="pg" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                              </div>
                              <button type="submit">
                                  <img width="33px" src="../build/assets/broken-heart.png" alt="broken-heart">
                              </button>
                          </form>
                        @endif
                          @else
                            <form class="relative" method="post" action="{{ route('dislikes.store') }}">
                              @csrf
                              @method('post')
                                <div class="hidden">
                                        <input class="hidden" type="number" name="book_id" value="{{ $groups->book->id }}">
                                        <input class="hidden" type="text" name="pg" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                                </div>
                                <button type="submit">
                                    <img width="33px" src="../build/assets/broken-heart.png" alt="broken-heart">
                                </button>
                            </form>
                              
                            @endif
                            <span class="self-center" data-tooltip-target="dtooltip-bottom{{$groups->id}}" data-tooltip-placement="bottom" type="button">{{ count($groups->book->dislikes) }}</span>
                        </div>
                      </div>
                      <form class="mt-5" method="post" action="{{ route('groups.destroy' , [$groups->id]) }}">
                        @csrf
                        @method('delete')
                        <div class="flex justify-center">
                          @if($groups->user->name == Auth::user()->name)
                            <x-primary-button type="submit" >Delete this group</x-primary-button> 
                          @endif
                        </div>
                    </form>
            </div>
            </div>
          @endif
        </div>
    </div>
    </div>
</x-app-layout>