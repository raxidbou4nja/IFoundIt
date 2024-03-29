@extends('layouts.guests')

@section('content')
		<!--welcome-hero start -->
		<section id="home" class="welcome-hero">
			<div class="container">
				<div class="welcome-hero-txt">
					<h2>best place to find and explore <br> Things you Lost </h2>
					<p>
						Find items you lost and founded by someOne in someWhere
					</p>
				</div>
				<form class="welcome-hero-serch-box" action="search" method="get">
					<div class="welcome-hero-form">
						<div class="single-welcome-hero-form">
							<h3>what?</h3>
							<div action="index.html">
								<input type="text" name="what" placeholder="Ex: smartphone, keys and others" />
							</div>
							<div class="welcome-hero-form-icon">
								<i class="flaticon-list-with-dots"></i>
							</div>
						</div>
						<div class="single-welcome-hero-form">
							<h3>location</h3>
							<div>
								<input type="text" name="where" placeholder="Ex: london, newyork, rome" />
							</div>
							<div class="welcome-hero-form-icon">
								<i class="flaticon-gps-fixed-indicator"></i>
							</div>
						</div>
					</div>
					<div class="welcome-hero-serch">
						<button class="welcome-hero-btn" type="submit">
							 search  <i data-feather="search"></i> 
						</button>
					</div>
				</form>
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
								<h2><a href="#">List <span> Founded</span> item</a></h2>
								<p>
									The finder lists The founded item to list using create page
								</p>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="single-how-works">
								<div class="single-how-works-icon">
									<i class="flaticon-networking"></i>
								</div>
								<h2><a href="#">Owners <span> Make Request</span></a></h2>
								<p>
									Owner can make request to the finder of the item using contact page
								</p>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="single-how-works">
								<div class="single-how-works-icon">
									<i class="flaticon-location-on-road"></i>
								</div>
								<h2><a href="#">Chat<span> Between</span> Finder and Owner</a></h2>
								<p>
									Owner and finder can chat with each other using chat page and can meet to exchange the item
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
                                    <div class="single-explore-img" style="max-height: 200px;">
										@if (str_ends_with($item->picture, 'storage'))
											<img src="{{ $item->picture }}/pictures/placeholder.jpg" alt="explore image">
										@else
											<img src="{{ $item->picture }}" alt="explore image">
										@endif
                                        <div class="single-explore-img-info">
                                            <button style="width: fit-content; padding: 0 4px">Founded Recently</button>
                                            <div class="single-explore-image-icon-box">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-explore-txt bg-theme-1">
                                        <h2><a href="{{ route('show', $item->id) }}">{{ $item->title  }}</a></h2>
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
                                                            <img src="storage/pictures/man-placeholder.jpg" alt="explore person">
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
                        
						<div class="col-md-12 text-center">
							<div class="alert alert-warning" role="alert">
								No items found
							</div>
						</div>

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
								I Found It was a lifesaver! I lost my wallet last week, and thanks to this website, someone found it and returned it to me. Highly recommended!
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
								What a fantastic platform! I stumbled upon a lost puppy in my neighborhood and used I Found It to reunite it with its owner. Such a rewarding experience!
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
								I'm amazed by the simplicity and effectiveness of I Found It. I lost my keys at the park, and within hours, someone contacted me through the platform to return them. Thank you so much!
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
								I Found It is a game-changer for our community. It's incredible to see how people come together to help each other out. Keep up the great work!
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
								I never thought finding lost items could be this easy! I lost my phone during a hike, and thanks to I Found It, I got it back in no time. Such a relief!
								</p>
							</div><!--/.testimonial-comment-->
						</div><!--/.testimonial-description-->
					</div><!--/.single-testimonial-box-->

				</div>
			</div>

		</section><!--/.reviews-->
		<!--reviews end -->
@endsection