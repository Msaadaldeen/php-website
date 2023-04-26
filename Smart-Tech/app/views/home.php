<header class="masthead text-white ">
    <div class="overlay"></div>
    <div class="container slider-top-text">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3 class="my-heading">WELCOME TO Smart<span class="text-info">Tech</span></h3>
                <p class="myp-slider text-center">Where everything about Technology is there</p>
                <p class="myp text-center">SHARE YOUR EXPERINCES   |   CONNECT WITH OTHERS   </p>
                <?php if (!$user->isLoggedin()) : ?>
                    <a class="btn btn-info btn-join" href="/register">JOIN THE COMMUNITY</a>
                <?php else : ?>
                    <a class="btn btn-info btn-join" href="/dashboard">Dashboard</a>
                <?php endif; ?>


            </div>
            <div class="col-md-12 text-center mt-5">
                <div class="scroll-down">
                    <a class="btn btn-default btn-scroll floating-arrow" href="#gobottom" id="bottom"><i class="fa fa-angle-down"></i></a>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="testimonials" id="gobottom">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3 wow bounceInUp">
                <div class="big-img">
                    <img src="https://picsum.photos/id/8/940/1040" class="img-fluid">
                </div>
            </div>
            <div class="col-md-8">
                <div class="inner-section wow fadeInUp">
                    <h3 class=" font-weight-bold">The Newest <span class="text-info">Technologies</span></h3>
                    <br>
                    <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets.</p>

                    <div class="linear-grid">
                        <div class="row">
                            <div class="col-sm-6 col-md-3 mb-2 wow bounceInUp">
                                <img src="https://picsum.photos/id/4/350/250" class="img-thumbnail">
                            </div>
                            <div class=" col-sm-6 col-md-3 mb-2 wow bounceInUp">
                                <img src="https://picsum.photos/id/5/350/250" class="img-thumbnail">
                            </div>
                            <div class="col-sm-6 col-md-3 mb-2 wow bounceInUp">
                                <img src="https://picsum.photos/id/6/350/250" class="img-thumbnail">
                            </div>
                            <div class="col-sm-6 col-md-3 mb-2 wow bounceInUp">
                                <img src="https://picsum.photos/id/7/350/250" class="img-thumbnail">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="testimonials bg-transprent" id="articles">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto wow fadeInUp">
                <h3 class="text-center font-weight-bold">Smart<span class="text-info">Tech</span> Feartured Articles</h3>
                <p class=" text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-4 mt-4 wow bounceInUp">
                <div class="card">
                    <img class="card-img-top h-262" src="https://picsum.photos/id/1/940/1040">
                    <div class="card-block p-2">

                        <h4 class="card-title">Lorem Ipsum Dolor Site Amet</h4>

                        <div class="card-text">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                        </div>
                    </div>
                    <div class="card-footer">

                        <a href="#" class="pull-right">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 mt-4 wow bounceInUp">
                <div class="card">
                    <img class="card-img-top h-262" src="https://picsum.photos/id/2/940/1040">
                    <div class="card-block p-2">

                        <h4 class="card-title">Lorem Ipsum Dolor Site Amet</h4>

                        <div class="card-text">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                        </div>
                    </div>
                    <div class="card-footer">

                        <a href="#" class="pull-right">Read More</a>

                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-4 mt-4 wow bounceInUp">
                <div class="card">
                    <img class="card-img-top h-262" src="https://picsum.photos/id/3/940/1040">
                    <div class="card-block p-2">

                        <h4 class="card-title ">Lorem Ipsum Dolor Site Amet</h4>

                        <div class="card-text ">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                        </div>
                    </div>
                    <div class="card-footer">

                        <a href="#" class="pull-right">Read More</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container mb-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="main-heading text-center font-weight-bold">PRICING TABLE</div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="price-box">
                <div class="">
                    <div class="price-label basic">Free</div>
                    <div class="price">free</div>
                    <div class="price-info">No credit card required</div>
                </div>
                <div class="info">
                    <ul>
                        <li><i class="fa fa-check"></i> Lorem ipsum dolor</li>
                        <li><i class="fa fa-check"></i> Lorem ipsum dolor</li>
                        <li><i class="fa fa-times"></i> Lorem ipsum dolor</li>
                        <li><i class="fa fa-times"></i> Lorem ipsum dolor</li>
                    </ul>
                    <a href="#" class="plan-btn">Join free Plan</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="price-box">
                <div class="">
                    <div class="price-label value">Basic</div>
                    <div class="price">$ 5.99</div>
                    <div class="price-info">Per Month</div>
                </div>
                <div class="info">
                    <ul>
                        <li><i class="fa fa-check"></i> Lorem ipsum dolor</li>
                        <li><i class="fa fa-check"></i> Lorem ipsum dolor</li>
                        <li><i class="fa fa-check"></i> Lorem ipsum dolor</li>
                        <li><i class="fa fa-times"></i> Lorem ipsum dolor</li>
                    </ul>
                    <a href="#" class="plan-btn">Join Basic Plan</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="price-box">
                <div class="">
                    <div class="price-label premium">Business Plan</div>
                    <div class="price">$ 11.99</div>
                    <div class="price-info">Per Month</div>
                </div>
                <div class="info">
                    <ul>
                        <li><i class="fa fa-check"></i> Lorem ipsum dolor</li>
                        <li><i class="fa fa-check"></i> Lorem ipsum dolor</li>
                        <li><i class="fa fa-check"></i> Lorem ipsum dolor</li>
                        <li><i class="fa fa-check"></i> Lorem ipsum dolor</li>
                    </ul>
                    <a href="#" class="plan-btn">Join Business Plan</a>
                </div>
            </div>
        </div>
    </div>
</section>