<x-layouts.main>
    <section class="dashboard section mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <x-user.sidebar />
                </div>
                <div class="col-lg-8 revisor-container">
                    <div class="row h-100">
                        <div class="col-12">
                            @if (session()->has('message'))
                                <div class="custom-alert d-flex justify-content-between align-items-center">
                                    <p>{{ session('message') }}</p>
                                    <form action="{{ route('rollback') }}" method="post" class="mt-2 button">
                                        @csrf
                                        s
                                        @method('PATCH')
                                        <button class="btn btn-danger-custom"
                                            type="submit">{{ __('ui.Annulla ultima modifica') }}</button>
                                    </form>
                                </div>
                            @endif
                            @if (session()->has('rollback'))
                                <div class="custom-alert">
                                    <p>{{ session('rollback') }}</p>
                                </div>
                            @endif

                        </div>


                        @if ($article_to_check)
                            <div class="row">
                                <div class="my-5 ps-4">
                                    <div
                                        class="article-image {{ $article_to_check->images->count() == 0 ? '  d-flex align-items-center justify-content-center' : '' }} ">
                                        <div id="carouselExampleIndicators" class="carousel slide">
                                            <div class="carousel-inner ">
                                                @if ($article_to_check->images->count())
                                                    @foreach ($article_to_check->images as $key => $image)
                                                        <div class="carousel-item  {{ $key == 0 ? 'active' : '' }}">
                                                            <div class="col-12 d-lg-flex p-5">
                                                                <div class="col-lg-6 col-12">
                                                                    <img src="{{ $image->getUrl(300, 300) }}"
                                                                        class="d-block w-100" alt="...">
                                                                </div>
                                                                <div class="col-lg-6 col-12">
                                                                    <div>
                                                                        <div class="text-end pe-1">
                                                                            <h5>{{ __('ui.Valutazioni') }}</h5>
                                                                            <div
                                                                                class="row justify-content-center mt-2">
                                                                                <div class="col-2">
                                                                                    <div
                                                                                        class="text-center mx-auto {{ $image->adult ?? '' }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-10">
                                                                                    {{ __('ui.Contenuto per adulti') }}
                                                                                </div>
                                                                            </div>
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-2">
                                                                                    <div
                                                                                        class="text-center mx-auto {{ $image->violence ?? '' }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-10">
                                                                                    {{ __('ui.Violenza') }}</div>
                                                                            </div>
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-2">
                                                                                    <div
                                                                                        class="text-center mx-auto {{ $image->spoof ?? '' }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-10">
                                                                                    {{ __('ui.Contraffazione') }}
                                                                                </div>
                                                                            </div>
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-2">
                                                                                    <div
                                                                                        class="text-center mx-auto {{ $image->racy ?? '' }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-10">
                                                                                    {{ __('ui.Razzismo') }}</div>
                                                                            </div>
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-2">
                                                                                    <div
                                                                                        class="text-center mx-auto {{ $image->medical ?? '' }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-10">
                                                                                    {{ __('ui.Contenuti sensibili') }}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div
                                                                        class="row gap-2 d-flex justify-content-center">
                                                                        @if ($image->labels)
                                                                            @foreach ($image->labels as $label)
                                                                                <p class="col-5 tags d-flex shadow-sm">
                                                                                    #{{ $label }}</p>
                                                                            @endforeach
                                                                        @else
                                                                            <p>No labels</p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <p class="h-100">
                                                        {{ __('ui.Nessuna immagine caricata dall\'utente') }}</p>
                                                @endif
                                            </div>
                                            @if ($article_to_check->images->count() > 1)
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mb-5 d-flex justify-content-center">
                                <div class="article-details .descriptionCard">
                                    <h3>{{ $article_to_check->title }}</h3>
                                    <p>{{ $article_to_check->body }}</p>
                                    <p>{{ __('ui.Prezzo:') }} {{ $article_to_check->price }}€</p>
                                    <p class="author">{{ __('ui.Venditore:') }} {{ $article_to_check->user->firstName }}
                                        {{ $article_to_check->user->lastName }}</p>
                                </div>
                                <div class="article-actions d-flex flex-column justify-content-center ms-2">
                                    <form action="{{ route('accept', ['article' => $article_to_check]) }}"
                                        method="post" class="button mb-4">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn me-3" type="submit">
                                            <span>{{ __('ui.ACCETTA') }}</span>
                                        </button>
                                    </form>
                                    <form action="{{ route('reject', ['article' => $article_to_check]) }}"
                                        method="post" class="button mb-2">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-danger-custom" type="submit">
                                            <span>{{ __('ui.RIFIUTA') }}</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                    </div>
                @else
                    <div class="col">
                        <div class="no-article">
                            <h3>{{ __('ui.Nessun articolo da revisionare') }}</h3>
                            <div class="button">
                                <a href="{{ route('homepage') }}" class="btn">
                                    {{ __('ui.Torna alla homepage') }}</a>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>

            </div>
        </div>
        </div>

    </section>

</x-layouts.main>
