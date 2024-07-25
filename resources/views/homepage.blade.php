<x-layouts.main>
    @if (session()->has('success', 'errorMessage'))
        <div class="alert alert-warning">
            {{ session('success') }}
        </div>
    @endif


    <!-- Start Hero Area -->
    <section class="hero-area position-relative">
        <ul class="background">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="container">
            <div class="row">

                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 ">
                    <div class="hero-text text-center">
                        <!-- Start Hero Text -->
                        <div class="section-heading">
                            <h2 class="wow fadeInUp" data-wow-delay=".3s">
                                {{ __('ui.Amore a prima vista, acquisto a seconda!') }}
                            </h2>

                            <p class="wow fadeInUp" data-wow-delay=".5s">
                                {{ __('ui.Compra e Vendi da macchine usate a telefoni e computer,') }} <br>
                                {{ __('ui.oppure cerca proprietà, lavori e altro.') }}</p>
                        </div>
                        <!-- End Search Form -->
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            @livewire('global-search')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Area -->


    @guest
        <!-- Start How Works Area -->
        <section class="items-grid section custom-padding how-works section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title" id="how-it-work">
                            <h2 class="wow fadeInUp" data-wow-delay=".4s">{{ __('ui.Come funziona') }}</h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure recusandae, natus odit
                                asperiores, nihil quibusdam laudantium aliquid fuga provident unde quidem consequatur
                                consequuntur. Ullam, voluptatem tenetur cum repudiandae totam ratione?</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12">
                        <!-- Start Single Work -->
                        <div class="single-work wow fadeInUp" data-wow-delay=".2s">
                            <span class="serial">01</span>
                            <h3>{{ __('ui.Come funziona') }}</h3>
                            <p>Lorem ipsum dolor sit amet constur adipisicing sed do eiusmod tempor incididunt labore.</p>
                        </div>
                        <!-- End Single Work -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <!-- Start Single Work -->
                        <div class="single-work wow fadeInUp" data-wow-delay=".4s">
                            <span class="serial">02</span>
                            <h3>{{ __('ui.Posta il tuo annuncio!') }}</h3>
                            <p>Lorem ipsum dolor sit amet constur adipisicing sed do eiusmod tempor incididunt labore.</p>
                        </div>
                        <!-- End Single Work -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <!-- Start Single Work -->
                        <div class="single-work wow fadeInUp" data-wow-delay=".6s">
                            <span class="serial">03</span>
                            <h3>{{ __('ui.Vendi i tuoi oggetti') }}</h3>
                            <p>Lorem ipsum dolor sit amet constur adipisicing sed do eiusmod tempor incididunt labore.</p>
                        </div>
                        <!-- End Single Work -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End How Works Area -->
    @endguest
    <!-- Start Items Grid Area -->
    <section class="items-grid section items-products">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">{{ __('ui.Ultimi prodotti') }}</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Necessitatibus nam laborum amet impedit quod ducimus fugiat esse ullam
                            eaque adipisci, voluptate ratione enim repellendus facere dolore aut ipsa. Nisi, iste.</p>
                    </div>
                </div>
            </div>
            <div class="single-head">
                <div class="row">


                    @foreach ($articles as $article)
                        <x-card :article=$article />
                    @endforeach



                </div>
            </div>
        </div>
    </section>
    <!-- /End Items Grid Area -->


    <!-- Start Testimonials Area -->
    <section class="testimonials section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title align-center gray-bg">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">{{ __('ui.Il Nostro Team!') }}</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">
                            {{ __('ui.Scopri di più sul Team che ha realizzato TheLovendo.') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row testimonial-slider">
                <div class="col-lg-4 col-md-6 col-12 ">
                    <!-- Start Single Testimonial -->
                    <div class="single-testimonial">
                        <div class="quote-icon">
                            <i class="lni lni-quotation"></i>
                        </div>
                        <div class="author">
                            <img src="{{ asset('assets/images/placeholder/lucrezia.png') }}" alt="#">
                            <h4 class="name">
                                Lucrezia Romana Caricchia
                                <span class="deg">Frontend Developer</span>
                            </h4>
                        </div>
                    </div>
                    <!-- End Single Testimonial -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Testimonial -->
                    <div class="single-testimonial">
                        <div class="quote-icon">
                            <i class="lni lni-quotation"></i>
                        </div>
                        <div class="author">
                            <img src="{{ asset('assets/images/placeholder/Pasquale.jpeg') }}" alt="#">
                            <h4 class="name">
                                Pasquale Abate
                                <span class="deg">Backend Developer</span>
                            </h4>
                        </div>

                    </div>
                    <!-- End Single Testimonial -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Testimonial -->
                    <div class="single-testimonial">
                        <div class="quote-icon">
                            <i class="lni lni-quotation"></i>
                        </div>
                        <div class="author">
                            <img src="{{ asset('assets/images/placeholder/Nicola2.png') }}" alt="#">
                            <h4 class="name">
                                Nicola Alò
                                <span class="deg">Frontend Developer</span>
                            </h4>
                        </div>

                    </div>
                    <!-- End Single Testimonial -->
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Testimonial -->
                        <div class="single-testimonial">
                            <div class="quote-icon">
                                <i class="lni lni-quotation"></i>
                            </div>
                            <div class="author">
                                <img src="{{ asset('assets/images/placeholder/Giammarco.png') }}" alt="#">
                                <h4 class="name">
                                    Giammarco Talò
                                    <span class="deg">Fullstack Developer</span>
                                </h4>
                            </div>

                        </div>
                        <!-- End Single Testimonial -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Testimonial -->
                        <div class="single-testimonial">
                            <div class="quote-icon">
                                <i class="lni lni-quotation"></i>
                            </div>
                            <div class="author">
                                <img src="{{ asset('assets/images/placeholder/Gabriele.jpeg') }}" alt="#">
                                <h4 class="name">
                                    Gabriele Zucchi
                                    <span class="deg">Fullstack Developer</span>
                                </h4>
                            </div>
                        </div>
                        <!-- End Single Testimonial -->
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- End Testimonial Area -->

</x-layouts.main>
