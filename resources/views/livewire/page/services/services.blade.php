<div>
    <!-- Services Section -->
    @if($services_data)
        <section class="services">
            <div class="container">
                <div class="row">
                    @foreach($services_data as $item => $value)
                    <div class="col-lg-4">
                        <div class="single-service">
                            <div class="service-icon">
                            <img src="{{asset('storage/content/services/'.$value->service_logo)}}" width="50px" alt="wmsu logo">
                            </div>
                            <h3>{{$value->service_header}}</h3>
                            <p>{{$value->service_content}}</p>
                        </div>
                    </div>
                    @endforeach
                
                    <!-- Add more services here if needed -->

                </div>
            </div>
        </section>
    @endif
   
    <!-- Services Section -->

</div>
