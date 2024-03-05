@extends('layouts.guests')

@section('content')
		<!--welcome-hero start -->
		<section id="home" class="welcome-hero">
			<div class="container">
				<div class="welcome-hero-txt">
					<h2>best place to find and explore <br> that all you need </h2>
					<p>
						Find Best Place, Restaurant, Hotel, Real State and many more think in just One click 
					</p>
				</div>
				<div class="welcome-hero-serch-box">
					<div class="welcome-hero-form">
						<div class="single-welcome-hero-form">
							<h3>what?</h3>
							<form action="index.html">
								<input type="text" placeholder="Ex: palce, resturent, food, automobile" />
							</form>
							<div class="welcome-hero-form-icon">
								<i class="flaticon-list-with-dots"></i>
							</div>
						</div>
						<div class="single-welcome-hero-form">
							<h3>location</h3>
							<form action="index.html">
								<input type="text" placeholder="Ex: london, newyork, rome" />
							</form>
							<div class="welcome-hero-form-icon">
								<i class="flaticon-gps-fixed-indicator"></i>
							</div>
						</div>
					</div>
					<div class="welcome-hero-serch">
						<button class="welcome-hero-btn" onclick="window.location.href='#'">
							 search  <i data-feather="search"></i> 
						</button>
					</div>
				</div>
			</div>

		</section><!--/.welcome-hero-->
		<!--welcome-hero end -->


		<!--works start -->
		<section id="works" class="works" style="margin-top: 54px;">
			<div class="container">
				<div class="section-header">
					<h2>how it works</h2>
					<p>Learn More about how our website works</p>
				</div><!--/.section-header-->
				<div class="works-content">
					<div class="row">
						<div class="col-md-4 col-sm-6">
							<div class="single-how-works">
								<div class="single-how-works-icon">
									<i class="flaticon-lightbulb-idea"></i>
								</div>
								<h2><a href="#">choose <span> what to</span> do</a></h2>
								<p>
									Lorem ipsum dolor sit amet, consecte adipisicing elit, sed do eiusmod tempor incididunt ut laboremagna aliqua. 
								</p>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="single-how-works">
								<div class="single-how-works-icon">
									<i class="flaticon-networking"></i>
								</div>
								<h2><a href="#">find <span> what you want</span></a></h2>
								<p>
									Lorem ipsum dolor sit amet, consecte adipisicing elit, sed do eiusmod tempor incididunt ut laboremagna aliqua. 
								</p>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="single-how-works">
								<div class="single-how-works-icon">
									<i class="flaticon-location-on-road"></i>
								</div>
								<h2><a href="#">explore <span> amazing</span> place</a></h2>
								<p>
									Lorem ipsum dolor sit amet, consecte adipisicing elit, sed do eiusmod tempor incididunt ut laboremagna aliqua. 
								</p>
							</div>
						</div>
					</div>
				</div>
			</div><!--/.container-->
		
		</section><!--/.works-->
		<!--works end -->

		<!--explore start -->
		<section id="explore" class="explore">
			<div class="container">
				<div class="section-header">
					<h2>explore</h2>
					<p>Explore New place, food, culture around the world and many more</p>
				</div><!--/.section-header-->
				<div class="explore-content">
					<div class="row">
                        @forelse ($items as $item)
                            <div class=" col-md-4 col-sm-6">
                                <div class="single-explore-item">
                                    <div class="single-explore-img">
                                        <img src="assets/images/explore/e1.jpg" alt="explore image">
                                        <div class="single-explore-img-info">
                                            <button style="width: fit-content; padding: 0 4px">Founded Recently</button>
                                            <div class="single-explore-image-icon-box">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-explore-txt bg-theme-1">
                                        <h2><a href="#">{{ $item->title  }}</a></h2>
                                        <p class="explore-rating-price">
                                            <span class="explore-rating" style="padding: 0 3px; width:fit-content">{{ (new DateTime($item->when_at))->format('H:i') }}</span>
                                            <a href="#">{{ (new DateTime($item->when_at))->format('Y-m-d')  }}</a> 
                                            <span class="explore-price-box">
                                                <a href="#">{{ $item->city }}</a>
                                            </span>
                                        </p>
                                        <div class="explore-person">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="explore-person-img">
                                                        <a href="#">
                                                            <img src="assets/images/explore/person.png" alt="explore person">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-10">
                                                    <p>
                                                        {{ $item->description ?? 'No description'}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="explore-open-close-part">
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <div class="explore-open-close">
                                                        <a href="{{ route('show', $item->id) }}" class="close-btn">Open</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @empty
                        
                    @endforelse
					</div>
                    

                        <div class="col-md-12">
                            <div class="pagination
                            justify-content-center">
                                {{ $items->links() }}
                            </div>
                        </div>

				</div>
			</div><!--/.container-->

		</section><!--/.explore-->
		<!--explore end -->

		<!--reviews start -->
		<section id="reviews" class="reviews">
			<div class="section-header">
				<h2>clients reviews</h2>
				<p>What our client say about us</p>
			</div><!--/.section-header-->
			<div class="reviews-content">
				<div class="testimonial-carousel">
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="/assets/images/clients/c1.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>Tom Leakar</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="/assets/images/clients/c2.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>monirul islam</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="/assets/images/clients/c3.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>Shohrab Hossain</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="/assets/images/clients/c4.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>Tom Leakar</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="/assets/images/clients/c1.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>Tom Leakar</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="/assets/images/clients/c2.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>monirul islam</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="/assets/images/clients/c3.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>Shohrab Hossain</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				    <div class="single-testimonial-box">
						<div class="testimonial-description">
							<div class="testimonial-info">
								<div class="testimonial-img">
									<img src="/assets/images/clients/c4.png" alt="clients">
								</div><!--/.testimonial-img-->
								<div class="testimonial-person">
									<h2>Tom Leakar</h2>
									<h4>london, UK</h4>
									<div class="testimonial-person-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-info-->
							<div class="testimonial-comment">
								<p>
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->
				</div>
			</div>

		</section><!--/.reviews-->
		<!--reviews end -->











@endsection