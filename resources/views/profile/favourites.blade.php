<x-app-layout>
  <div class="py-5 flex justify-center flex-wrap">
    <div class="pt-5 w-full flex justify-center">
        <p class="max-w-2xl mb-6 font-bold text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Your favourite Books</p>
    </div>
    @if($books->count())
        <?php $pass2 = -1; ?>
        @foreach($books as $key => $book)
        <?php $pass1 = -1; ?>
        @if (isset($book->favourites))
          @foreach($book->favourites as $key => $user)
          <?php
              if($user->id == Auth::user()->id){
                $pass = 1;
                $pass2 = 0;
              }
          ?>
          @endforeach
            @if ($pass == 1)
    <div
    class="mx-3 my-2 flex flex-col rounded-lg bg-white shadow-lg dark:bg-neutral-700 md:max-w-xl md:flex-row transform transition duration-500 hover:scale-105 hover:shadow-2xl">
      <img
        class="h-96 w-full rounded-t-lg object-cover md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
        src="{{ $book->book_cover }}"
        alt="" />
      <div class="flex flex-col justify-start p-6">
        <div style="width: auto;" class="w-20 flex flex-col items-baseline">
          <div>
            <form method="post" action="{{ route('favourites.destroy' , [$book->id]) }}">
                @csrf
                @method('delete')
                    <button type="submit">
                        <abbr title="click to remove from favourites"><img width="33px" src="<?=env('APP_RES')?>img/heartRed.png" alt="heart"></abbr>
                    </button>
                </form>
          </div>
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
        @if (isset($book->rating))
        <?php $pass1 = -1; $rat=0; $val = 0?>
          @for ($i=0 ; $i < count($book->rating) ; $i++)
          <?php $rat += $book->rating[$i]->star_rating ?>
            @if ($book->rating[$i]->user_id == Auth::user()->id)
              <?php $pass1 = $i; ?>
            @endif
            <?php $val = $i ?>
          @endfor
        @endif

                   @if($pass1 != -1)
                                <div class="container">
                                    <div class="row">
                                       <div class="col mt-4">
                                             <p class="font-weight-bold ">Review</p>
                                             <div class="form-group row">
                                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                                <div class="col">
                                                   <div class="rated">
                                                    @if ($rat==1)
                                                      <?php $rat=2; $val++ ?>
                                                    @endif
                                                    <?php $val++;?>
                                                    @for($i=1; $i<=floor($rat/($val)); $i++)
                                                      <input type="radio" id="star{{$i}}" class="rate" name="rating" value="5"/>
                                                      <label class="star-rating-complete" title="text">{{$i}} stars</label>
                                                    @endfor
                                                    </div>
                                                </div>
                                              </div>
                                       </div>
                                    </div>
                                 </div>
                      @elseif (!empty($book->rating[0]))
                          <div class="container">
                            <div class="row">
                               <div class="col mt-4">
                                     <p class="font-weight-bold ">Review</p>
                                     <div class="form-group row">
                                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                                        <div class="col">
                                           <div class="rated">
                                            @for($i=1; $i<=floor($rat/($val+1)); $i++)
                                              <input type="radio" id="star{{$i}}" class="rate" name="rating" value="5"/>
                                              <label class="star-rating-complete" title="text">{{$i}} stars</label>
                                            @endfor
                                            </div>
                                        </div>
                                      </div>
                               </div>
                            </div>
                         </div>
                                <div class="container">
                                    <div class="row">
                                       <div class="col mt-4">
                                          <form method="POST" id="{{ $book->id }}" class="py-2 px-4" action="{{route('rating.store')}}" style="box-shadow: 0 0 10px 0 #ddd;" autocomplete="off">
                                             @csrf
                                             @method('post')
                                             <p class="font-weight-bold ">Review</p>
                                             <div class="form-group row w-52">
                                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                                <div class="col">
                                                   <div class="rate">
                                                      <input type="radio" id="star{{ $book->id }}5" class="rate" name="rating" value="5"/>
                                                      <label for="star{{ $book->id }}5" title="text">5 stars</label>
                                                      <input type="radio" checked id="star{{ $book->id }}4" class="rate" name="rating" value="4"/>
                                                      <label for="star{{ $book->id }}4" title="text">4 stars</label>
                                                      <input type="radio" id="star{{ $book->id }}3" class="rate" name="rating" value="3"/>
                                                      <label for="star{{ $book->id }}3" title="text">3 stars</label>
                                                      <input type="radio" id="star{{ $book->id }}2" class="rate" name="rating" value="2">
                                                      <label for="star{{ $book->id }}2" title="text">2 stars</label>
                                                      <input type="radio" id="star{{ $book->id }}1" class="rate" name="rating" value="1"/>
                                                      <label for="star{{ $book->id }}1" title="text">1 star</label>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="mt-3 text-right">
                                                <button class="btn btn-sm py-2 px-3 btn-info">Submit
                                                </button>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                 </div>
                                 @else
                                 <div class="container">
                                  <div class="row">
                                     <div class="col mt-4">
                                        <form method="POST" id="{{ $book->id }}" class="py-2 px-4" action="{{route('rating.store')}}" style="box-shadow: 0 0 10px 0 #ddd;" autocomplete="off">
                                           @csrf
                                           @method('post')
                                           <p class="font-weight-bold ">Review</p>
                                           <div class="form-group row w-52">
                                              <input type="hidden" name="book_id" value="{{ $book->id }}">
                                              <div class="col">
                                                 <div class="rate">
                                                    <input type="radio" id="star{{ $book->id }}5" class="rate" name="rating" value="5"/>
                                                    <label for="star{{ $book->id }}5" title="text">5 stars</label>
                                                    <input type="radio" checked id="star{{ $book->id }}4" class="rate" name="rating" value="4"/>
                                                    <label for="star{{ $book->id }}4" title="text">4 stars</label>
                                                    <input type="radio" id="star{{ $book->id }}3" class="rate" name="rating" value="3"/>
                                                    <label for="star{{ $book->id }}3" title="text">3 stars</label>
                                                    <input type="radio" id="star{{ $book->id }}2" class="rate" name="rating" value="2">
                                                    <label for="star{{ $book->id }}2" title="text">2 stars</label>
                                                    <input type="radio" id="star{{ $book->id }}1" class="rate" name="rating" value="1"/>
                                                    <label for="star{{ $book->id }}1" title="text">1 star</label>
                                                 </div>
                                              </div>
                                           </div>
                                           <div class="mt-3 text-right">
                                              <button class="btn btn-sm py-2 px-3 btn-info">Submit
                                              </button>
                                           </div>
                                        </form>
                                     </div>
                                  </div>
                               </div>
                          @endif
      </div>
    </div>
    @else
    @if ($pass2 == -1)
      <div class="flex justify-center items-center pt-20  mb-5">
         <h1 class="text-lg text-gray-600">You don't have any Favourite Books</h1>
      </div>
      <?php $pass2 = 0;?>
    @endif
    @endif

    @endif
    <?php
      $pass = 0;
    ?>

    @endforeach
    @endif
  </div>
</x-app-layout>
