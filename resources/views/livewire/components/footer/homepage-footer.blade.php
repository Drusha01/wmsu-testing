<div>
        <!-- footer homepage -->

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
               
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        @if($footer_data)
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <div class="row mt-3">
                    @foreach ($footer_data  as $item => $value)
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                {{$value->footer_type_details}}
                            </h6>
                            <?php 
                            $footer_type_id =$value->footer_type_id;
                            $footers = DB::table('footer')
                                ->where('footer_type_id','=',$value->footer_type_id)
                                ->orderBy('footer_order')
                                ->get()
                                ->toArray();
                            ?>
                            @forelse ($footers as $item => $footer_value)
                                <p>
                                    <a href="{{$footer_value->footer_link}}" class="text-reset"><i class="{{$footer_value->footer_icon}}"></i>{{$footer_value->footer_content}}</a>
                                </p>
                            @empty
                            @endforelse
                            
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <!-- Section: Links  -->
        <!-- <section class="">
            <div class="container text-center text-md-start mt-5">
                <div class="row mt-3">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class=""></i>TEC
                        </h6>
                        <p>
                            Western Mindanao State University (WMSU) Testing and Evaluation Center
                        </p>
                    </div>
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
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
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
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
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3"></i> Normal Rd. Baliwasan</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            iwmsutec@wmsu.edu.ph
                        </p>
                        <p><i class="fas fa-phone me-3"></i> 02 231 2182</p>
                        <p><i class="fas fa-print me-3"></i> 63+ 9956207083 </p>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2023 Copyright:
            <a class="text-reset fw-bold" href="">WMSU TEC</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Bootstrap JS -->
</div>
