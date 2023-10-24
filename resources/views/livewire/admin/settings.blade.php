<div>
    <x-loading-indicator/>
    <!-- ======= Main Content ======= -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Setting</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Setting</li>
                </ol>
            </nav>
            <!-- First-level Tabs -->
       

        <!-- Second-level Tabs -->
        <div class="tab-content">
            <!-- MODIFY CONTENT Tab -->
            <div class="tab-pane fade show active" id="modify-content-tab">
                <!-- Second-level Tabs -->
                <ul class="nav nav-tabs" id="secondLevelTabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#carousel-tab">Carousel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#about-us-tab">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#why-us-tab">Why Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#cta-tab">CTA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#faq-tab">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#footer-tab">Footer</a>
                    </li>
                </ul>

                <!-- Second-level Tab Content -->
                <div class="tab-content">
                    <!-- Carousel Tab -->
                    <div class="tab-pane fade show active" id="carousel-tab">
                        <!--  Carousel content goes here -->
                        <table class="application-table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Carousel Content</th>
                                <th scope="col">Paragraphs</th>
                                <th scope="col">Order</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                <td scope="row">1</td>
                                <td>
                                    <div >
                                        Welcome to Western Mindanao State University
                                    </div>
                                    <br>
                                    <img src="{{ asset('images/about/about.jpg') }}" alt="" style="width:300px; height: 200px; ">
                                </td>
                                
                                    <td class="align-middle">
                                        <p>CET Application is Now Open</p>
                                        <p>December 23, 2023 to January 07, 2023</p>
                                    </td>
                                    <td class="align-middle"> 
                                    <div class="btn-group-vertical btn-group-sm " role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-outline-dark"><i class="bx bx-up-arrow-alt" style="font-size:20px; vertical-align: middle;" ></i></button>
                                        <button type="button" class="btn btn-outline-dark"><i class="bx bx-down-arrow-alt" style="font-size:20px; vertical-align: middle;" ></i></button>
                                    </div>
                                </td>
                                <td class="align-middle"> 
                                    <button class="button btn btn-primary" > View </button>
                                    <button class="button btn btn-success" > Edit </button>
                                    <button class="button btn btn-danger" > Delete </button>
                                </td>
                                </tr>
                            </tbody>
                        </table>               
                    </div>

                    <!-- About Us Tab -->
                    
                    <div class="tab-pane fade" id="about-us-tab">
                    <div class="mb-4 mt-3">
                                        <button type="button" class="btn btn-primary">Edit About Us</button>
                                       
                                    </div>      
                    <section class="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-none d-lg-flex">
                <img src="{{ asset('images/about/about.jpg') }}" alt="" class="w-75">
                </div>
                <div class="col-md-6">
                    <div class="about-content">
                        <span>About Us</span>
                        <h2>Welcome to WMSU Testing and Evaluation Center</h2>
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
                        <div class="buttons">
                            <a href="about.php" class="button3">Learn More <i
                                    class="bi bi-arrow-right-circle-fill"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
                    </div>

                    <!-- Why Us Tab -->
                    <div class="tab-pane fade" id="why-us-tab">
                        
                    <section class="why-choose-us mt-5 mb-5">
                    <div class="mb-4 mt-3">
                                        <button type="button" class="btn btn-primary">Edit carousel</button>
                                       
                                    </div>      
        <div class="container">
            <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="mb-4">Why Choose Us</h2>
            </div>
                <div class="col-md-4">
                    <div class="choose-item border">
                    <img src="{{ asset('images/logo/logo.png') }}" width="60px" alt="#">
                        <div class="choose-content">
                            <h3>Expert Instructors</h3>
                            <p>Our team of highly qualified instructors brings years of experience and expertise to
                                guide you through your learning journey.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="choose-item border">
                    <img src="{{ asset('images/logo/logo.png') }}" width="60px" alt="#">
                        <div class="choose-content">
                            <h3>Project-Based Learning</h3>
                            <p>Engage in hands-on, project-based learning that allows you to apply theoretical knowledge
                                to real-world scenarios.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="choose-item border">
                        <img src="{{ asset('images/logo/logo.png') }}" width="60px" alt="#">
                        <div class="choose-content">
                            <h3>Real-World Development</h3>
                            <p>Gain practical skills and experience in a dynamic learning environment that prepares you
                                for success in your chosen field.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
                    </div>

                    <!-- CTA Tab -->
                    <div class="tab-pane fade" id="cta-tab">
                        <!--  CTA content goes here -->
                    </div>

                    <!-- FAQ Tab -->
                    <div class="tab-pane fade" id="faq-tab">
                    <div class="mb-4 mt-3">
                                        <button type="button" class="btn btn-primary">Edit FAQ</button>
                                       
                                    </div>      
                    <section class="faq">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>Frequently Asked Questions</h2>
                    <div class="accordion" id="faqAccordion">
                        <!-- Question 1 -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="q1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#a1" aria-expanded="true" aria-controls="a1">
                                    What are the services offered by WMSU Testing and Evaluation Center?
                                </button>
                            </h3>
                            <div id="a1" class="accordion-collapse collapse show" aria-labelledby="q1"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    The WMSU Testing and Evaluation Center offers various services including college
                                    entrance exam evaluation, professional development assessments, and research study
                                    evaluations.
                                </div>
                            </div>
                        </div>
                        <!-- Question 2 -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="q2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#a2" aria-expanded="false" aria-controls="a2">
                                    How can I schedule an appointment to visit the center?
                                </button>
                            </h3>
                            <div id="a2" class="accordion-collapse collapse" aria-labelledby="q2"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    You can schedule an appointment by visiting our <a href="appointment.php">Appointment
                                        page</a> and filling out the appointment form with your details and preferred
                                    date.
                                </div>
                            </div>
                        </div>
                        <!-- Add more questions and answers here -->
                        <!-- ... -->
                    </div>
                </div>
            </div>
        </div>
    </section>
                    </div>

                    <!-- Footer Tab -->
                    <div class="tab-pane fade" id="footer-tab">
                    <div class="mb-4 mt-3">
                                        <button type="button" class="btn btn-primary">Edit Footer</button>
                                       
                                    </div>      
                    <footer class="text-center text-lg-start bg-light text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class=""></i>TEC
                        </h6>
                        <p>
                            Western Mindanao State University (WMSU) Testing and Evaluation Center
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Services
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Examinations</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Professional</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Standardized Testing</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            FAQ
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">About Us</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Settings</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Help</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3"></i> Normal Rd. Baliwasan</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            iwmsutec@wmsu.edu.ph
                        </p>
                        <p><i class="fas fa-phone me-3"></i> 02 231 2182</p>
                        <p><i class="fas fa-print me-3"></i> 63+ 9956207083 </p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2023 Copyright:
            <a class="text-reset fw-bold" href="">WMSU TEC</a>
        </div>
        <!-- Copyright -->
    </footer>
                    </div>
                </div>
                <!-- End Second-level Tab Content -->
            </div>
            <!-- End MODIFY CONTENT Tab -->



    
        <!-- End Inserted Section -->

    </main><!-- End #main -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</div>
