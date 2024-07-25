<x-layouts.main>
    <!-- Start Item Details -->
    <section class="item-details section mt-5">
        <div class="container">
            <div class="top-area">
                <div class="row ">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <div id="carouselExampleIndicators" class="carousel slide">
                                @if ($article->images->count() > 0)
                                <div class="carousel-inner">
                                    @foreach ($article->images as $key => $image)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img src="{{ $image->getUrl(300, 300) }}" class="d-block" alt="...">
                                    </div>
                                    @endforeach
                                </div>    
                                    @if ($article->images->count() > 1)
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">{{ __('ui.Precedente') }}</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">{{ __('ui.Successivo') }}</span>
                                        </button>
                                    @endif
                                    

                                    @else
                                    <img src="https://picsum.photos/300" alt="Nessuna foto inserita dall'utente">
                                    @endif
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12 descriptionCard">
                        <div class="product-info">
                            <div class="d-flex">
                                <h2 class="title me-auto">{{ $article->title }}</h2>
                                @livewire('articles.add-whishlist', ['article' => $article])
                            </div>

                            <p class="location mt-3"><i class="lni lni-map-marker"></i><a
                                    href="javascript:void(0)">{{ $article->country }}</a></p>
                            <h3 class="price">{{ $article->price }} €</h3>
                            <div class="list-info">
                                <h4>{{ __('ui.Informazioni') }}</h4>
                                <ul>
                                    <li><span>{{ __('ui.Condizione')}}</span> {{ $article->condition }}</li>
                                </ul>
                            </div>
                            <div class="list-info">
                                <div class="contact-info">
                                    <ul>
                                        <li>
                                            @auth
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn call">                           
                                                        <i class="lni lni-envelope"></i>
                                                        Contatta il venditore
                                                </button>
                                            @else
                                            <a href="{{route('login')}}">
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn call">                           
                                                    <i class="lni lni-envelope"></i>
                                                    Contatta il venditore
                                                </button>
                                            </a>
                                            @endauth
                                        </li>
                                    </ul>
                                </div>
                                {{-- <div class="social-share">
                                    <h4>{{ __('ui.Condividi su') }}</h4>
                                    <ul class="d-flex">
                                        <li><a href="javascript:void(0)" class="facebook me-2"><i
                                                    class="lni lni-facebook-filled"></i></a></li>
                                        <li><a href="javascript:void(0)" class="twitter me-2"><i
                                                    class="lni lni-twitter-original"></i></a></li>
                                        <li><a href="javascript:void(0)" class="google me-2"><i
                                                    class="lni lni-google"></i></a></li>
                                        <li><a href="javascript:void(0)" class="linkedin me-2"><i
                                                    class="lni lni-linkedin-original"></i></a></li>
                                        <li><a href="javascript:void(0)" class="pinterest"><i
                                                    class="lni lni-pinterest"></i></a></li>
                                    </ul>
                                </div> --}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="item-details-blocks">
                <div class="row">
                    <div class="col-lg-8 col-md-7 col-12">
                        <!-- Start Single Block -->
                        <div class="single-block description descriptionCard">
                            <h3>{{ __('ui.Descrizione prodotto') }}</h3>
                            <p>
                                {{ $article->body }}
                            </p>
                        </div>
                        <!-- End Single Block -->
                    </div>
                    <div class="col-lg-4 col-md-5 col-12">
                        <div class="item-details-sidebar">
                            <!-- Start Single Block -->
                            <div class="single-block author">
                                <h3>{{ __('ui.Venditore') }}</h3>
                                <div class="content">
                                    <img src="{{$article->user->avatar ? Storage::url($article->user->avatar) : asset('assets/images/placeholder/200x200.png')}}"
                                        alt="#">
                                    <h4>{{ $article->user->firstName }} {{ $article->user->lastName }}</h4>
                                    <a href="javascript:void(0)" class="see-all"></a>
                                </div>
                            </div>
                            <!-- End Single Block -->
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- End Item Details -->

      {{-- MODALE CONTATTAMI --}}
      @auth
      <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Contatta il venditore</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5">
              <form action="{{route('contactSeller',['article' => $article->title])}}" method="post">
                @csrf
                <div class="col-12">
                   <div>
                    <h5>Nome Completo</h5>
                    <p class="form-control mt-2">{{auth()->user()->firstName}} {{auth()->user()->lastName}}</p>
                   </div>
                   <div class="mt-2">
                    <h5>Email</h5>
                    <p class="form-control mt-2">{{auth()->user()->email}}</p>
                   </div>
                </div>    
            </div>
            <div class="col-12 p-5">
                <label for="message">Inserisci qui un messaggio per il venditore</label>
                <textarea name="message" required class="form-control" id="message" cols="30" rows="10"></textarea>
            </div>
            <div class="modal-footer button">
              <button type="submit" class="btn ">Invia</button>
            </div>
        </form>
          </div>
        </div>
      </div>
      @endauth
</x-layouts.main>
