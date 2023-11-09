<div class="container" style="margin-top: 50px;">

    <!-- About Us Section -->
    <section class="about" style="padding: 10px;">
        <div class="container">
            <div class="row justify-content-center text-center">
                @if($aboutus_data)
                    @foreach ($aboutus_data as $item => $value)
                        <div class="col-md-10">
                            <!-- Column 3 -->
                            <div class="col-md-12">
                                <div class="about-content">
                                    <span>About </span>
                                    <h2>{{$value->au_header}}</h2>
                                    <img src="{{asset('storage/content/about_us/'.$value->au_image)}}" alt="WMSU Testing Center" class="img-fluid mb-1 justify-content-center" style="max-width: 70%; height:auto;">
                                    <p>{{$value->au_content}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-10">
                        <img src="./images/about/about.jpg" class="img-fluid" alt="WMSU Testing Center">
                        <!-- Column 3 -->
                        <div class="col-md-12">
                            <div class="about-content">
                                <span>About </span>
                                <h2>WMSU Testing and Evaluation Center</h2>
                                <p>WMSU Testing and Evaluation Center is dedicated to providing exceptional testing and
                                    evaluation services to students and individuals pursuing their academic and professional
                                    aspirations. With a strong commitment to excellence and innovation, we strive to empower our
                                    community with the tools they need to succeed.</p>
                                <p>Our mission is to offer comprehensive and reliable testing solutions that help individuals
                                    showcase their knowledge and skills, enabling them to make informed decisions about their
                                    educational and career paths.</p>
                                <p>At WMSU Testing and Evaluation Center, we understand the significance of accurate assessments
                                    in shaping the future of our students. Our experienced team of professionals is dedicated to
                                    upholding the highest standards of integrity and fairness, ensuring that every test-taker's
                                    experience is equitable and meaningful.</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>




    <!-- About Us Section -->


    <!-- <div class="row">
        <div class="col-lg-4">
            <div class="single-service p-3">
                <div class="service-icon">
                    <img src="{{ asset('images/about/about.jpg') }}" width="150px" alt="wmsu logo">
                </div>
                <h3>About us of WMSU Testing and Evaluation Center</h3>
                <p class="text-justify">
                    WMSU Testing and Evaluation Center is dedicated to providing exceptional testing and evaluation services to students and individuals pursuing their academic and professional aspirations. With a strong commitment to excellence and innovation, we strive to empower our community with the tools they need to succeed.
                </p>
                <div class="buttons">
                    <a href="about.php" class="btn btn-primary">Learn More <i class="bi bi-arrow-right-circle-fill"></i></a>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="single-service p-3">
                <div class="service-icon">
                    <img src="{{ asset('images/about/dedication.png') }}" width="150px" alt="wmsu logo">
                </div>
                <h3>About mission of WMSU Testing and Evaluation Center</h3>
                <p class="text-justify">
                    Our mission is to offer comprehensive and reliable testing solutions that help individuals showcase their knowledge and skills, enabling them to make informed decisions about their educational and career paths.
                </p>
                <div class="buttons">
                    <a href="about.php" class="btn btn-primary">Learn More <i class="bi bi-arrow-right-circle-fill"></i></a>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="single-service p-3">
                <div class="service-icon">
                    <img src="{{ asset('images/about/tite.png') }}" width="150px" alt="wmsu logo">
                </div>
                <h3>About quality of WMSU Testing and Evaluation Center</h3>
                <p class="text-justify">
                    At WMSU Testing and Evaluation Center, we understand the significance of accurate assessments in shaping the future of our students. Our experienced team of professionals is dedicated to upholding the highest standards of integrity and fairness, ensuring that every test-taker's experience is equitable and meaningful.
                </p>
                <div class="buttons">
                    <a href="about.php" class="btn btn-primary">Learn More <i class="bi bi-arrow-right-circle-fill"></i></a>
                </div>
            </div>
        </div>
    </div> -->
</div>
