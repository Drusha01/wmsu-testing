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
<<<<<<< HEAD
                        <a class="nav-link active" data-bs-toggle="tab" href="#carousel-tab">Carousel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#about-us-tab">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#why-us-tab">Why Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#cta-tab">CTA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#faq-tab">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#footer-tab">Footer</a>
=======
                        <a class="nav-link  @if($active == 'Carousel') show active @endif " wire:key="Carousel" wire:click="active_page('Carousel')" data-bs-toggle="tab" href="#carousel-tab">Carousel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  @if($active == 'Services') show active @endif " wire:key="Services" wire:click="active_page('Services')" data-bs-toggle="tab" href="#services-tab">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($active == 'AboutUs') show active @endif " wire:key="AboutUs" wire:click="active_page('AboutUs')" data-bs-toggle="tab" href="#about-us-tab">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($active == 'WhyUs') show active @endif " wire:key="WhyUs" wire:click="active_page('WhyUs')" data-bs-toggle="tab" href="#why-us-tab">Why Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($active == 'CTA') show active @endif " wire:key="CTA" wire:click="active_page('CTA')" data-bs-toggle="tab" href="#cta-tab">CTA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($active == 'FAQ') show active @endif " wire:key="FAQ" wire:click="active_page('FAQ')" data-bs-toggle="tab" href="#faq-tab">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($active == 'Footer') show active @endif " wire:key="Footer" wire:click="active_page('Footer')" data-bs-toggle="tab" href="#footer-tab">Footer</a>
>>>>>>> parent of 7aafce8 (Revert "Revert "Merge branch 'matt' into khay01"")
                    </li>
                </ul>

                <!-- Second-level Tab Content -->
                <div class="tab-content">
                    <!-- Carousel Tab -->
                    <div class="tab-pane fade show @if($active == 'Carousel') show active @endif " id="carousel-tab">
                        <br>
                        <div class="d-flex mt-2">
                            <div class="col-md-3 sort-container">
                                <div class="d-flex">
                                    @if(1)
                                    <button class="btn btn-secondary me-2 d-flex justify-content-between sort-btn " type="button" data-bs-toggle="modal" data-bs-target="#carousel-filter">
                                        <i class="bi bi-funnel-fill me-1"></i>
                                        <div><span class='btn-text'>Columns</span></div>
                                    </button>
                                    @endif
                                    
                                    <!-- wire:model.debounce.500ms="search" -->
                                </div>
                            </div> 
                            <div class="modal fade" id="carousel-filter" tabindex="-1" role="dialog" aria-labelledby="carousel-filterLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="carousel-filterLabel">Sort&nbsp;Columns for Carousel</h5>
                                        </div>
                                        <hr>
                                        <div class="modal-body">
                                            @foreach($carousel_filter as $item => $value)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="carousel-filter-{{$loop->iteration}}"
                                                    wire:model.defer="carousel_filter.{{$item}}">
                                                <label class="form-check-label" for="carousel-filter-{{$loop->iteration}}">
                                                    {{$item}}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                        <hr>
                                        <div class="modal-footer">
                                            <button type="button"  class="btn btn-secondary btn-block"data-bs-dismiss="modal" id='btn_close1'>Close</button>
                                            <button wire:click="carouselfilterView()" data-bs-dismiss="modal" 
                                                class="btn btn-primary">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-success   mx-1" data-bs-toggle="modal" data-bs-target="#AddCarouselModal"  >Add Carousel</button>
                            </div>
                        </div>
                        <!--  Carousel content goes here -->
                        <table class="application-table">
                            <thead>
                                <tr>
                                @foreach ($carousel_filter as $item => $value)
                                    @if($value)
                                        <th >{{$item}}</th>
                                    @endif
                                @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($carousel_data as $item => $value)
                                    <tr>
                                    @if($carousel_filter['#'])
                                        <td>{{ $loop->index+1 }}</td>
                                    @endif
                                    @if($carousel_filter['Carousel content'])
                                        <td>
                                            <div >
                                                {{$value->carousel_header_title}}
                                            </div>
                                            <br>
                                            <img src="{{asset('storage/content/carousel/'.$value->carousel_content_image)}}" alt="" style="height: 200px; ">
                                        </td>
                                    @endif
                                    @if($carousel_filter['Paragraphs'])
                                        <td class="align-middle">
                                            <p>{{$value->carousel_paragraph_paragraph}}</p>
                                        </td>
                                    @endif
                                    @if($carousel_filter['Order'])
                                        <td class="align-middle"> 
                                            <div class="btn-group-vertical btn-group-sm " role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-outline-dark" wire:click="move_up_carousel({{$value->carousel_id}})"><i class="bx bx-up-arrow-alt" style="font-size:20px; vertical-align: middle;" ></i></button>
                                                <button type="button" class="btn btn-outline-dark" wire:click="move_down_carousel({{$value->carousel_id}})"><i class="bx bx-down-arrow-alt" style="font-size:20px; vertical-align: middle;" ></i></button>
                                            </div>
                                        </td>
                                    @endif
                                    @if($carousel_filter['Action'])
                                        <td class="align-middle"> 
                                            @if($access_role['R']==0 && 0)
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ViewCarouselModal" >View</button>
                                            @endif
                                            @if($access_role['U']==1)
                                            <button class="btn btn-success" wire:click="edit_carousel({{$value->carousel_id}})" >Edit</button>
                                            @endif
                                            @if($access_role['D']==1)
                                            <button class="btn btn-danger" wire:click="delete_carousel({{$value->carousel_id}})">Delete</button>
                                            @endif
                                        </td>
                                    @endif                                        
                                    </tr>
                                @empty
                                    <td class="text-center font-weight-bold" colspan="42">
                                        NO RECORDS 
                                    </td>
                                @endforelse
                               
                            </tbody>
                        </table>    
                        <div class="modal fade" id="AddCarouselModal" tabindex="-1" role="dialog" aria-labelledby="AddCarouselModalLabel" aria-hidden="true" wire:ignore.self>
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="AddCarouselModalLabel">Add Carousel</h5>
                                    </div>
                                    <hr>
                                    <form wire:submit.prevent="add_carousel()">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="addRoomCapacity">Carousel Header:</label>
                                                <input  type="text" class="form-control" wire:model.defer="carousel_header_title" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="addRoomCapacity">Paragraph:</label>
                                                <textarea  type="text" class="form-control" wire:model.defer="carousel_paragraph_paragraph" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="addRoomCapacity">Carousel Background Image:</label><br>
                                                <input  type="file" class="form-control" wire:model.defer="carousel_content_image" accept="image/jpeg, image/jpg" required>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="modal-footer">
                                            <button type="button"  class="btn btn-secondary btn-block"data-bs-dismiss="modal" id='btn_close1'>Close</button>
                                            <button type="submit" class="btn btn-primary">
                                                Add
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal fade" id="EditCarouselModal" tabindex="-1" role="dialog" aria-labelledby="EditCarouselModalLabel" aria-hidden="true" wire:ignore.self>
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="EditCarouselModalLabel">Edit Carousel</h5>
                                    </div>
                                    <hr>
                                    @if(isset($edit_carousel_data))
                                    <form wire:submit.prevent="save_edit_carousel({{$carousel_id}})">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="addRoomCapacity">Carousel Header:</label>
                                                <input  type="text" class="form-control" wire:model.defer="carousel_header_title" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="addRoomCapacity">Paragraph:</label>
                                                <textarea  type="text" class="form-control" wire:model.defer="carousel_paragraph_paragraph" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="addRoomCapacity">Carousel Background Image:</label><br>
                                                <input  type="file" class="form-control" wire:model.defer="carousel_content_image" id=carousel-{{$carousel_image_id}} >
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="modal-footer">
                                            <button type="button"  class="btn btn-secondary btn-block"data-bs-dismiss="modal" id='btn_close1'>Close</button>
                                            <button type="submit" class="btn btn-primary">
                                                Save
                                            </button>
                                        </div>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade @if($active == 'Services') show active @endif " id="services-tab">
                        <br>
                        <div class="d-flex mt-2">
                            <div class="col-md-3 sort-container">
                                <div class="d-flex">
                                    @if(1)
                                    <button class="btn btn-secondary me-2 d-flex justify-content-between sort-btn " type="button" data-bs-toggle="modal" data-bs-target="#services-filter">
                                        <i class="bi bi-funnel-fill me-1"></i>
                                        <div><span class='btn-text'>Columns</span></div>
                                    </button>
                                    @endif
                                    
                                    <!-- wire:model.debounce.500ms="search" -->
                                </div>
                            </div> 
                            <div class="modal fade" id="services-filter" tabindex="-1" role="dialog" aria-labelledby="services-filterLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="services-filterLabel">Sort&nbsp;Columns for Services</h5>
                                        </div>
                                        <hr>
                                        <div class="modal-body">
                                            @foreach($services_filter as $item => $value)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="services-filter-{{$loop->iteration}}"
                                                    wire:model.defer="services_filter.{{$item}}">
                                                <label class="form-check-label" for="services-filter-{{$loop->iteration}}">
                                                    {{$item}}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                        <hr>
                                        <div class="modal-footer">
                                            <button type="button"  class="btn btn-secondary btn-block"data-bs-dismiss="modal" id='btn_close1'>Close</button>
                                            <button wire:click="carouselfilterView()" data-bs-dismiss="modal" 
                                                class="btn btn-primary">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-success   mx-1" data-bs-toggle="modal" data-bs-target="#adminAddModal" wire:click="openModal()" >Add Carousel</button>
                            </div>
                        </div>
                        <!--  Carousel content goes here -->
                        <table class="application-table">
                            <thead>
                                <tr>
                                @foreach ($services_filter as $item => $value)
                                    @if($value)
                                        <th >{{$item}}</th>
                                    @endif
                                @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($services_data as $item => $value)
                                    <tr>
                                    @if($services_filter['#'])
                                        <td>{{ $loop->index+1 }}</td>
                                    @endif
                                    @if($services_filter['Logo'])
                                        <td>
                                            <img src="{{asset('storage/content/services/'.$value->services_content_image)}}" alt="" style="height: 200px; ">
                                        </td>
                                    @endif
                                    @if($services_filter['Header'])
                                        <td>
                                            <div>
                                                {{$value->services_header_title}}
                                            </div>
                                        </td>
                                    @endif
                                    @if($services_filter['Content'])
                                        <td class="align-middle">
                                            <p>{{$value->services_content}}</p>
                                        </td>
                                    @endif
                                    @if($services_filter['Order'])
                                        <td class="align-middle"> 
                                            <div class="btn-group-vertical btn-group-sm " role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-outline-dark"><i class="bx bx-up-arrow-alt" style="font-size:20px; vertical-align: middle;" ></i></button>
                                                <button type="button" class="btn btn-outline-dark"><i class="bx bx-down-arrow-alt" style="font-size:20px; vertical-align: middle;" ></i></button>
                                            </div>
                                        </td>
                                    @endif
                                    @if($services_filter['Action'])
                                        <td class="align-middle"> 
                                            @if($access_role['R']==1)
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ViewRoomModal" >View</button>
                                            @endif
                                            @if($access_role['U']==1)
                                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#EditRoomModal" >Edit</button>
                                            @endif
                                            @if($access_role['D']==1)
                                            <button class="btn btn-danger">Delete</button>
                                            @endif
                                        </td>
                                    @endif 
                                    </tr>
                                @empty
                                    <td class="text-center font-weight-bold" colspan="42">
                                        NO RECORDS 
                                    </td>
                                @endforelse
                               
                            </tbody>
                        </table>               
                    </div>

                    <!-- About Us Tab -->
                    
                    <div class="tab-pane fade" id="about-us-tab">
<<<<<<< HEAD
                            <table class="application-table">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Picture</th>
                                            <th scope="col">Header</th>
                                            <th scope="col">Paragraph</th>
                                            <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <td scope="row">1</td>
                                            <td>
                                                <img src="{{ asset('images/slider/campus.jpg') }}" alt="" style="width:300px; height: 200px; ">
                                            </td>
                                            
                                                <td class="align-middle">
                                                    <p>WMSU Testing and Evaluation Center</p>
                                                    
                                                </td>
                                                <td>
                                                    <p>WMSU Testing and Evaluation Center is dedicated to providing exceptional testing and evaluation services to students and individuals pursuing their academic and professional aspirations. With a strong commitment to excellence and innovation, we strive to empower our community with the tools they need to succeed.</p>
                                                    <p>Our mission is to offer comprehensive and reliable testing solutions that help individuals showcase their knowledge and skills, enabling them to make informed decisions about their educational and career paths.</p>
                                                    <p>At WMSU Testing and Evaluation Center, we understand the significance of accurate assessments in shaping the future of our students. Our experienced team of professionals is dedicated to upholding the highest standards of integrity and fairness, ensuring that every test-taker's experience is equitable and meaningful.</p>
                                                </td>
                                                
                                            <td class="align-middle mt-4"> 
                                                    <!-- Button modal edit -->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalLong">Edit</button>
                                                                 <!--  modal trigger -->
                                                                     <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h6 class="modal-title" id="exampleModalLongTitle">Edit About Us</h6>
                                                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <div class="col-md-15 mb-5">
                                                                                                <label for="photo" class="form-label">Change About Us Image</label>
                                                                                                    <div>
                                                                                                        <img src="{{ asset('images/slider/campus.jpg') }}" alt="" style="width:420px; height: 200px; ">
                                                                                                    </div>
                                                                                                <input type="file" class="form-control mt-2" id="photo" name="photo" accept=".pdf,.jpg,.png,.jpeg" required>
                                                                                                    <div class="mt-2">
                                                                                                         <h5>Change Paragraph</h5>
                                                                                                         <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                    </div>
                                                                                            </div>
                                                                                                    
                                                                                        </div>

                                                                                        

                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                     </div>
                                                                                                                                <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Delete </button>

                                                                                    <!-- Modal -->
                                                                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                <div class="modal-content">
                                                                                                    <div class="modal-header">
                                                                                                        
                                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                        <span aria-hidden="true">&times;</span>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                    <div class="modal-body d-flex justify-content-center">
                                                                                                        <h5> Are you sure you want to delete?</h5>
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                        <button type="button" class="btn btn-success">Yes</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                     </div>
                                                                                    </div>
                                            </td>
                                        </tr>
                                    
                            </table>
                                        
=======
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
>>>>>>> parent of 7aafce8 (Revert "Revert "Merge branch 'matt' into khay01"")
                    </div>

                    <!-- Why Us Tab -->
                    <div class="tab-pane fade" id="why-us-tab">
<<<<<<< HEAD
                        <table class="application-table">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Logo</th>
                                            <th scope="col">Header</th>
                                            <th scope="col">Paragraph</th>
                                            <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <td scope="row">1</td>
                                            <td>
                                                <img src="{{ asset('images/logo/logo.png') }}" alt="" style="width:250px; height: 200px; ">
                                            </td>
                                            
                                                <td class="align-middle">
                                                    <p>College Entrance Exam Evaluation</p>
                                                    
                                                </td>
                                                <td>
                                                    <p>We provide comprehensive evaluation services for college entrance exams to help applicants succeed in their academic journey.</p>
                                                </td>
                                                
                                            <td class="align-middle"> 
                                                <!-- Button trigger modal -->
                                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Why Us</h5>
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                            <div class="col-md-15 mb-5">
                                                                                                <label for="photo" class="form-label">Change Why Us Logo</label>
                                                                                                    <div>
                                                                                                        <img src="{{ asset('images/logo/logo.png') }}" alt="" style="width:250px; height: 200px; ">
                                                                                                    </div>
                                                                                                <input type="file" class="form-control mt-2" id="photo" name="photo" accept=".pdf,.jpg,.png,.jpeg" required>
                                                                                                    <div class="mt-2">
                                                                                                         <h5>Change Header</h5>
                                                                                                         <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <h5>Change Paragraph</h5>
                                                                                                         <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                
                                                                                                   <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#delete">Delete </button>

                                                                                            <!-- Modal -->
                                                                                            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                            <div class="modal-content">
                                                                                                                <div class="modal-header">
                                                                                                                    
                                                                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                                <div class="modal-body d-flex justify-content-center">
                                                                                                                    <h5> Are you sure you want to delete?</h5>
                                                                                                                </div>
                                                                                                                <div class="modal-footer">
                                                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                    <button type="button" class="btn btn-success">Yes</button>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                    </div>
                                                                                            </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">2</td>
                                            <td>
                                                <img src="{{ asset('images/logo/logo.png') }}" alt="" style="width:250px; height: 200px; ">
                                            </td>
                                            
                                                <td class="align-middle">
                                                    <p>Professional Certification Testing</p>
                                                    
                                                </td>
                                                <td>
                                                    <p>Our center offers a range of professional certification testing services to validate and enhance your skills in various industries.</p>
                                                </td>
                                                
                                            <td class="align-middle"> 
                                                 <!-- Button trigger modal -->
                                                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Why Us</h5>
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                            <div class="col-md-15 mb-5">
                                                                                                <label for="photo" class="form-label">Change Why Us Logo</label>
                                                                                                    <div>
                                                                                                        <img src="{{ asset('images/logo/logo.png') }}" alt="" style="width:250px; height: 200px; ">
                                                                                                    </div>
                                                                                                <input type="file" class="form-control mt-2" id="photo" name="photo" accept=".pdf,.jpg,.png,.jpeg" required>
                                                                                                    <div class="mt-2">
                                                                                                         <h5>Change Header</h5>
                                                                                                         <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <h5>Change Paragraph</h5>
                                                                                                         <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                
                                                                                                   <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#delete">Delete </button>

                                                                                            <!-- Modal -->
                                                                                            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                            <div class="modal-content">
                                                                                                                <div class="modal-header">
                                                                                                                    
                                                                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                                <div class="modal-body d-flex justify-content-center">
                                                                                                                    <h5> Are you sure you want to delete?</h5>
                                                                                                                </div>
                                                                                                                <div class="modal-footer">
                                                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                    <button type="button" class="btn btn-success">Yes</button>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                    </div>
                                                                                            </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">3</td>
                                            <td>
                                                <img src="{{ asset('images/logo/logo.png') }}" alt="" style="width:250px; height: 200px; ">
                                            </td>
                                            
                                                <td class="align-middle">
                                                    <p>Standardized Testing</p>
                                                    
                                                </td>
                                                <td>
                                                    <p>We conduct standardized testing to measure knowledge and skills objectively, providing valuable insights for educational institutions and learners.</p>
                                                </td>
                                                
                                            <td class="align-middle"> 
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Why Us</h5>
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                            <div class="col-md-15 mb-5">
                                                                                                <label for="photo" class="form-label">Change Why Us Logo</label>
                                                                                                    <div>
                                                                                                        <img src="{{ asset('images/logo/logo.png') }}" alt="" style="width:250px; height: 200px; ">
                                                                                                    </div>
                                                                                                <input type="file" class="form-control mt-2" id="photo" name="photo" accept=".pdf,.jpg,.png,.jpeg" required>
                                                                                                    <div class="mt-2">
                                                                                                         <h5>Change Header</h5>
                                                                                                         <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <h5>Change Paragraph</h5>
                                                                                                         <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                
                                                                                                   <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#delete">Delete </button>

                                                                                            <!-- Modal -->
                                                                                            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                            <div class="modal-content">
                                                                                                                <div class="modal-header">
                                                                                                                    
                                                                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                                <div class="modal-body d-flex justify-content-center">
                                                                                                                    <h5> Are you sure you want to delete?</h5>
                                                                                                                </div>
                                                                                                                <div class="modal-footer">
                                                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                    <button type="button" class="btn btn-success">Yes</button>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                    </div>
                                                                                            </div>
                                            </td>
                                        </tr>
                        </table>
                   
=======
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
>>>>>>> parent of 7aafce8 (Revert "Revert "Merge branch 'matt' into khay01"")
                    </div>

                    <!-- CTA Tab -->
                    <div class="tab-pane fade" id="cta-tab">
<<<<<<< HEAD
                                   <!--  CTA content goes here -->
                                   <table class="application-table">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Logo</th>
                                            <th scope="col">Header</th>
                                            <th scope="col">Paragraph</th>
                                            <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <td scope="row">1</td>
                                            <td>
                                                <img src="{{ asset('images/logo/logo.png') }}" alt="" style="width:250px; height: 200px; ">
                                            </td>
                                            
                                                <td class="align-middle">
                                                    <p>Expert Instructors</p>
                                                    
                                                </td>
                                                <td>
                                                    <p>Our team of highly qualified instructors brings years of experience and expertise to guide you through your learning journey.</p>
                                                </td>
                                                
                                            <td class="align-middle"> 
                                                 <!-- Button trigger modal -->
                                                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="ModalLabel">Edit CTA </h5>
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                            <div class="col-md-15 mb-5">
                                                                                                <label for="photo" class="form-label">Change Why Us Logo</label>
                                                                                                    <div>
                                                                                                        <img src="{{ asset('images/logo/logo.png') }}" alt="" style="width:250px; height: 200px; ">
                                                                                                    </div>
                                                                                                <input type="file" class="form-control mt-2" id="photo" name="photo" accept=".pdf,.jpg,.png,.jpeg" required>
                                                                                                    <div class="mt-2">
                                                                                                         <h5>Change Header</h5>
                                                                                                         <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <h5>Change Paragraph</h5>
                                                                                                         <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                
                                                                                                   <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#deletemodal">Delete </button>

                                                                                            <!-- Modal -->
                                                                                            <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
                                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                            <div class="modal-content">
                                                                                                                <div class="modal-header">
                                                                                                                    
                                                                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                                <div class="modal-body d-flex justify-content-center">
                                                                                                                    <h5> Are you sure you want to delete?</h5>
                                                                                                                </div>
                                                                                                                <div class="modal-footer">
                                                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                    <button type="button" class="btn btn-success">Yes</button>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                    </div>
                                                                                            </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">2</td>
                                            <td>
                                                <img src="{{ asset('images/logo/logo.png') }}" alt="" style="width:250px; height: 200px; ">
                                            </td>
                                            
                                                <td class="align-middle">
                                                    <p>Project-Based Learning</p>
                                                    
                                                </td>
                                                <td>
                                                    <p>Engage in hands-on, project-based learning that allows you to apply theoretical knowledge to real-world scenarios.</p>
                                                </td>
                                                
                                            <td class="align-middle"> 
                                                 <!-- Button trigger modal -->
                                                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="ModalLabel">Edit CTA </h5>
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                            <div class="col-md-15 mb-5">
                                                                                                <label for="photo" class="form-label">Change Why Us Logo</label>
                                                                                                    <div>
                                                                                                        <img src="{{ asset('images/logo/logo.png') }}" alt="" style="width:250px; height: 200px; ">
                                                                                                    </div>
                                                                                                <input type="file" class="form-control mt-2" id="photo" name="photo" accept=".pdf,.jpg,.png,.jpeg" required>
                                                                                                    <div class="mt-2">
                                                                                                         <h5>Change Header</h5>
                                                                                                         <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <h5>Change Paragraph</h5>
                                                                                                         <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                
                                                                                                   <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#deletemodal">Delete </button>

                                                                                            <!-- Modal -->
                                                                                            <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                            <div class="modal-content">
                                                                                                                <div class="modal-header">
                                                                                                                    
                                                                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                                <div class="modal-body d-flex justify-content-center">
                                                                                                                    <h5> Are you sure you want to delete?</h5>
                                                                                                                </div>
                                                                                                                <div class="modal-footer">
                                                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                    <button type="button" class="btn btn-success">Yes</button>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                    </div>
                                                                                            </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">3</td>
                                            <td>
                                                <img src="{{ asset('images/logo/logo.png') }}" alt="" style="width:250px; height: 200px; ">
                                            </td>
                                            
                                                <td class="align-middle">
                                                    <p>Real-World Development</p>
                                                    
                                                </td>
                                                <td>
                                                    <p>Gain practical skills and experience in a dynamic learning environment that prepares you for success in your chosen field.</p>
                                                </td>
                                                
                                            <td class="align-middle"> 
                                                 <!-- Button trigger modal -->
                                                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="ModalLabel">Edit CTA </h5>
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                            <div class="col-md-15 mb-5">
                                                                                                <label for="photo" class="form-label">Change Why Us Logo</label>
                                                                                                    <div>
                                                                                                        <img src="{{ asset('images/logo/logo.png') }}" alt="" style="width:250px; height: 200px; ">
                                                                                                    </div>
                                                                                                <input type="file" class="form-control mt-2" id="photo" name="photo" accept=".pdf,.jpg,.png,.jpeg" required>
                                                                                                    <div class="mt-2">
                                                                                                         <h5>Change Header</h5>
                                                                                                         <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <h5>Change Paragraph</h5>
                                                                                                         <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                
                                                                                                   <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#deletemodal">Delete </button>

                                                                                            <!-- Modal -->
                                                                                            <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                            <div class="modal-content">
                                                                                                                <div class="modal-header">
                                                                                                                    
                                                                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                                <div class="modal-body d-flex justify-content-center">
                                                                                                                    <h5> Are you sure you want to delete?</h5>
                                                                                                                </div>
                                                                                                                <div class="modal-footer">
                                                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                    <button type="button" class="btn btn-success">Yes</button>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                    </div>
                                                                                            </div>
                                            </td>
                                        </tr>
                        </table>
                              
=======
                        <!--  CTA content goes here -->
>>>>>>> parent of 7aafce8 (Revert "Revert "Merge branch 'matt' into khay01"")
                    </div>

                    <!-- FAQ Tab -->
                    <div class="tab-pane fade" id="faq-tab">
<<<<<<< HEAD
                                 <table class="application-table">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Questions</th>
                                                    <th scope="col">Answer</th>
                                                    <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tr>
                                                            <td scope="row">1</td>
                                                            <td>
                                                               <p>What are the services offered by WMSU Testing and Evaluation Center?</p>
                                                            </td>
                                                            
                                                                <td class="align-middle">
                                                                    <p>The WMSU Testing and Evaluation Center offers various services including college entrance exam evaluation, professional development assessments, and research study evaluations.</p>
                                                                    
                                                                </td>
                                                               
                                                                
                                                            <td class="align-middle"> 
                                                                <!-- Button trigger modal -->
                                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                            <div class="col-md-15 mb-5">

                                                                                                    <div class="mt-2">
                                                                                                         <h5>Edit Question</h5>
                                                                                                         <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <h5>Edit Answer</h5>
                                                                                                         <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                <button type="button" class="btn btn-success">Yes</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>

                                                            </td>
                                                </tr>
                                                <tr>
                                                            <td scope="row">2</td>
                                                            <td>
                                                               <p>How can I schedule an appointment to visit the center?</p>
                                                            </td>
                                                            
                                                                <td class="align-middle">
                                                                    <p>You can schedule an appointment by visiting our Appointment page and filling out the appointment form with your details and preferred date.</p>
                                                                    
                                                                </td>
                                                               
                                                                
                                                            <td class="align-middle"> 
                                                                 <!-- Button trigger modal -->
                                                                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                            <div class="col-md-15 mb-5">

                                                                                                    <div class="mt-2">
                                                                                                         <h5>Edit Question</h5>
                                                                                                         <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <h5>Edit Answer</h5>
                                                                                                         <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                <button type="button" class="btn btn-success">Yes</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                            </td>
                                                </tr>
                                                <tr>
                                                            <td scope="row">3</td>
                                                            <td>
                                                               <p>Do I need to make an appointment for all services provided by the Testing and Evaluation Center?</p>
                                                            </td>
                                                            
                                                                <td class="align-middle">
                                                                    <p>Appointments are typically required for most services. However, for certain walk-in services or events, appointments may not be necessary. We recommend checking the specific service details or contacting us for more information.</p>
                                                                    
                                                                </td>
                                                               
                                                                
                                                            <td class="align-middle"> 
                                                                <!-- Button trigger modal -->
                                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                            <div class="col-md-15 mb-5">

                                                                                                    <div class="mt-2">
                                                                                                         <h5>Edit Question</h5>
                                                                                                         <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <h5>Edit Answer</h5>
                                                                                                         <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                <button type="button" class="btn btn-success">Yes</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                            </td>
                                                </tr>
                                                <tr>
                                                            <td scope="row">4</td>
                                                            <td>
                                                               <p>How long does it take to receive the results of an evaluation or assessment?</p>
                                                            </td>
                                                            
                                                                <td class="align-middle">
                                                                    <p>The time it takes to receive evaluation or assessment results may vary depending on the type of service. Typically, we strive to provide results within a reasonable time frame. Specific details on result delivery can be found on the respective service pages or by contacting our center directly.</p>
                                                                    
                                                                </td>
                                                               
                                                                
                                                            <td class="align-middle"> 
 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                            <div class="col-md-15 mb-5">

                                                                                                    <div class="mt-2">
                                                                                                         <h5>Edit Question</h5>
                                                                                                         <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <h5>Edit Answer</h5>
                                                                                                         <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                <button type="button" class="btn btn-success">Yes</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                            </td>
                                                </tr>
                                                <tr>
                                                            <td scope="row">5</td>
                                                            <td>
                                                               <p>Are there any fees associated with the services offered by the Testing and Evaluation Center?</p>
                                                            </td>
                                                            
                                                                <td class="align-middle">
                                                                    <p>Some of our services may have associated fees, while others are provided free of charge. We encourage you to review the pricing details on our website or contact us to inquire about the specific service fees and any applicable waivers.</p>
                                                                    
                                                                </td>
                                                               
                                                                
                                                            <td class="align-middle"> 
                                                                 <!-- Button trigger modal -->
                                                                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                            <div class="col-md-15 mb-5">

                                                                                                    <div class="mt-2">
                                                                                                         <h5>Edit Question</h5>
                                                                                                         <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <h5>Edit Answer</h5>
                                                                                                         <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                <button type="button" class="btn btn-success">Yes</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                            </td>
                                                </tr>
                                                <tr>
                                                            <td scope="row">6</td>
                                                            <td>
                                                               <p>How can I request a copy of my evaluation or assessment report?</p>
                                                            </td>
                                                            
                                                                <td class="align-middle">
                                                                    <p>You can request a copy of your evaluation or assessment report by contacting our center directly. We will provide guidance on the process and any associated fees, if applicable, for obtaining a copy of your report.</p>
                                                                    
                                                                </td>
                                                               
                                                                
                                                            <td class="align-middle"> 
                                                                <!-- Button trigger modal -->
                                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                            <div class="col-md-15 mb-5">

                                                                                                    <div class="mt-2">
                                                                                                         <h5>Edit Question</h5>
                                                                                                         <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <h5>Edit Answer</h5>
                                                                                                         <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                <button type="button" class="btn btn-success">Yes</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                            </td>
                                                </tr>
                                                <tr>
                                                            <td scope="row">7</td>
                                                            <td>
                                                               <p>Can I reschedule or cancel my appointment with the Testing and Evaluation Center?</p>
                                                            </td>
                                                            
                                                                <td class="align-middle">
                                                                    <p>Yes, you can reschedule or cancel your appointment with advance notice. Please visit our Appointment page for instructions on how to reschedule or cancel your appointment.</p>
                                                                    
                                                                </td>
                                                               
                                                                
                                                            <td class="align-middle"> 
                                                                 <!-- Button trigger modal -->
                                                                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                            <div class="col-md-15 mb-5">

                                                                                                    <div class="mt-2">
                                                                                                         <h5>Edit Question</h5>
                                                                                                         <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <h5>Edit Answer</h5>
                                                                                                         <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                <button type="button" class="btn btn-success">Yes</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                            </td>
                                                </tr>
                                                <tr>
                                                            <td scope="row">8</td>
                                                            <td>
                                                               <p>What is the typical duration of a college entrance exam evaluation?</p>
                                                            </td>
                                                            
                                                                <td class="align-middle">
                                                                    <p>The duration of a college entrance exam evaluation may vary depending on the specific test and the number of sections. Typically, it takes a few hours, but exact timing will be provided when you schedule your appointment.</p>
                                                                    
                                                                </td>
                                                               
                                                                
                                                            <td class="align-middle"> 
                                                                 <!-- Button trigger modal -->
                                                                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                            <div class="col-md-15 mb-5">

                                                                                                    <div class="mt-2">
                                                                                                         <h5>Edit Question</h5>
                                                                                                         <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <h5>Edit Answer</h5>
                                                                                                         <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                <button type="button" class="btn btn-success">Yes</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                            </td>
                                                </tr>
                                                <tr>
                                                            <td scope="row">9</td>
                                                            <td>
                                                               <p>Are there any preparation materials available for the entrance exams?</p>
                                                            </td>
                                                            
                                                                <td class="align-middle">
                                                                    <p>Yes, we provide preparation materials and study guides for our entrance exams. You can find these resources on our website or request them when you schedule your exam.</p>
                                                                    
                                                                </td>
                                                               
                                                                
                                                            <td class="align-middle"> 
                                                                 <!-- Button trigger modal -->
                                                                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                            <div class="col-md-15 mb-5">

                                                                                                    <div class="mt-2">
                                                                                                         <h5>Edit Question</h5>
                                                                                                         <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <h5>Edit Answer</h5>
                                                                                                         <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                <button type="button" class="btn btn-success">Yes</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                            </td>
                                                </tr>
                                                <tr>
                                                            <td scope="row">10</td>
                                                            <td>
                                                               <p>What types of payment methods are accepted for service fees?</p>
                                                            </td>
                                                            
                                                                <td class="align-middle">
                                                                    <p>We accept various payment methods, including credit cards, debit cards, and cash. Specific payment options and details will be provided when you book your service.</p>
                                                                    
                                                                </td>
                                                               
                                                                
                                                            <td class="align-middle"> 
                                                                <!-- Button trigger modal -->
                                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                            <div class="col-md-15 mb-5">

                                                                                                    <div class="mt-2">
                                                                                                         <h5>Edit Question</h5>
                                                                                                         <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <h5>Edit Answer</h5>
                                                                                                         <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                <button type="button" class="btn btn-success">Yes</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                            </td>
                                                </tr>
                                                <tr>
                                                            <td scope="row">11</td>
                                                            <td>
                                                               <p>How can I check the availability of assessment dates and times?</p>
                                                            </td>
                                                            
                                                                <td class="align-middle">
                                                                    <p>You can check the availability of assessment dates and times by visiting our website or contacting our center directly. We provide information on upcoming assessment schedules.</p>
                                                                    
                                                                </td>
                                                               
                                                                
                                                            <td class="align-middle"> 
                                                                 <!-- Button trigger modal -->
                                                                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                            <div class="col-md-15 mb-5">

                                                                                                    <div class="mt-2">
                                                                                                         <h5>Edit Question</h5>
                                                                                                         <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <h5>Edit Answer</h5>
                                                                                                         <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                <button type="button" class="btn btn-success">Yes</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                            </td>
                                                </tr>
                                                <tr>
                                                            <td scope="row">12</td>
                                                            <td>
                                                               <p>What do I need to bring with me when I come for an assessment?</p>
                                                            </td>
                                                            
                                                                <td class="align-middle">
                                                                    <p>The requirements for each assessment may vary. You will receive specific instructions when you schedule your assessment. Generally, you may need to bring identification, proof of payment, and any required materials, such as pencils or calculators.</p>
                                                                    
                                                                </td>
                                                               
                                                                
                                                            <td class="align-middle"> 
                                                                <!-- Button trigger modal -->
                                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                            <div class="col-md-15 mb-5">

                                                                                                    <div class="mt-2">
                                                                                                         <h5>Edit Question</h5>
                                                                                                         <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <h5>Edit Answer</h5>
                                                                                                         <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                <button type="button" class="btn btn-success">Yes</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                            </td>
                                                </tr>
                                                <tr>
                                                            <td scope="row">13</td>
                                                            <td>
                                                               <p>How do I access my assessment results online?</p>
                                                            </td>
                                                            
                                                                <td class="align-middle">
                                                                    <p>We provide online access to assessment results through our secure portal. You will receive login information and instructions on how to access your results after completing your assessment.</p>
                                                                    
                                                                </td>
                                                               
                                                                
                                                            <td class="align-middle"> 
                                                               <!-- Button trigger modal -->
                                                               <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                            <div class="col-md-15 mb-5">

                                                                                                    <div class="mt-2">
                                                                                                         <h5>Edit Question</h5>
                                                                                                         <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <h5>Edit Answer</h5>
                                                                                                         <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                <button type="button" class="btn btn-success">Yes</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                            </td>
                                                </tr>
                                                <tr>
                                                            <td scope="row">14</td>
                                                            <td>
                                                               <p>What should I do if I encounter technical issues during an online assessment?</p>
                                                            </td>
                                                            
                                                                <td class="align-middle">
                                                                    <p>If you experience technical difficulties during an online assessment, please contact our technical support team immediately. We will assist you in resolving the issues to ensure a smooth assessment process.</p>
                                                                    
                                                                </td>
                                                               
                                                                
                                                            <td class="align-middle"> 
                                                               <!-- Button trigger modal -->
                                                               <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                            <div class="col-md-15 mb-5">

                                                                                                    <div class="mt-2">
                                                                                                         <h5>Edit Question</h5>
                                                                                                         <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <h5>Edit Answer</h5>
                                                                                                         <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                <button type="button" class="btn btn-success">Yes</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                            </td>
                                                </tr>
                                                <tr>
                                                            <td scope="row">15</td>
                                                            <td>
                                                               <p>How can I provide feedback or suggestions about your services?</p>
                                                            </td>
                                                            
                                                                <td class="align-middle">
                                                                    <p>We welcome your feedback and suggestions. You can provide feedback by contacting our customer service team, or by using the feedback forms available on our website. Your input helps us improve our services.</p>
                                                                    
                                                                </td>
                                                               
                                                                
                                                            <td class="align-middle"> 
                                                               <!-- Button trigger modal -->
                                                               <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                            <div class="col-md-15 mb-5">

                                                                                                    <div class="mt-2">
                                                                                                         <h5>Edit Question</h5>
                                                                                                         <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <h5>Edit Answer</h5>
                                                                                                         <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                <button type="button" class="btn btn-success">Yes</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                            </td>
                                                </tr>
                                                <tr>
                                                            <td scope="row">16</td>
                                                            <td>
                                                               <p>Can I request a refund if I need to cancel my assessment appointment?</p>
                                                            </td>
                                                            
                                                                <td class="align-middle">
                                                                    <p>Our refund policy may vary depending on the type of assessment and the timing of your cancellation. Please review our refund policy on our website or contact us for detailed information regarding refunds.</p>
                                                                    
                                                                </td>
                                                               
                                                                
                                                            <td class="align-middle"> 
                                                               <!-- Button trigger modal -->
                                                               <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                            <div class="col-md-15 mb-5">

                                                                                                    <div class="mt-2">
                                                                                                         <h5>Edit Question</h5>
                                                                                                         <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <h5>Edit Answer</h5>
                                                                                                         <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                <button type="button" class="btn btn-success">Yes</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                            </td>
                                                </tr>
                                                <tr>
                                                            <td scope="row">17</td>
                                                            <td>
                                                               <p>What security measures are in place to protect my personal information during assessments?</p>
                                                            </td>
                                                            
                                                                <td class="align-middle">
                                                                    <p>We take data security seriously and have robust measures in place to protect your personal information during assessments. These measures may include encryption, secure servers, and privacy policies to safeguard your data. Specific details can be found on our website.</p>
                                                                    
                                                                </td>
                                                               
                                                                
                                                            <td class="align-middle"> 
                                                               <!-- Button trigger modal -->
                                                               <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                            <div class="col-md-15 mb-5">

                                                                                                    <div class="mt-2">
                                                                                                         <h5>Edit Question</h5>
                                                                                                         <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <h5>Edit Answer</h5>
                                                                                                         <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                <button type="button" class="btn btn-success">Yes</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                            </td>
                                                </tr>
                                                <tr>
                                                            <td scope="row">18</td>
                                                            <td>
                                                               <p>Do you offer practice assessments or study materials for preparation?</p>
                                                            </td>
                                                            
                                                                <td class="align-middle">
                                                                    <p>Yes, we may offer practice assessments and study materials to help you prepare for your evaluation. You can find information on available resources on our website or by contacting us.</p>
                                                                    
                                                                </td>
                                                               
                                                                
                                                            <td class="align-middle"> 
                                                                <!-- Button trigger modal -->
                                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                            <div class="col-md-15 mb-5">

                                                                                                    <div class="mt-2">
                                                                                                         <h5>Edit Question</h5>
                                                                                                         <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <h5>Edit Answer</h5>
                                                                                                         <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                <button type="button" class="btn btn-success">Yes</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                            </td>
                                                </tr>
                                                <tr>
                                                            <td scope="row">19</td>
                                                            <td>
                                                               <p>Can I request a copy of my assessment or evaluation for my records?</p>
                                                            </td>
                                                            
                                                                <td class="align-middle">
                                                                    <p>You can request a copy of your assessment or evaluation for your records. Please contact our center to initiate the request, and we will provide information on the process and any associated fees.</p>
                                                                    
                                                                </td>
                                                               
                                                                
                                                            <td class="align-middle"> 
                                                                 <!-- Button trigger modal -->
                                                                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                            <div class="col-md-15 mb-5">

                                                                                                    <div class="mt-2">
                                                                                                         <h5>Edit Question</h5>
                                                                                                         <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <h5>Edit Answer</h5>
                                                                                                         <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                <button type="button" class="btn btn-success">Yes</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                            </td>
                                                </tr>
                                                <tr>
                                                            <td scope="row">20</td>
                                                            <td>
                                                               <p>Are there any age restrictions for taking assessments at the Testing and Evaluation Center?</p>
                                                            </td>
                                                            
                                                                <td class="align-middle">
                                                                    <p>We may have specific age requirements for certain assessments. These requirements can vary by assessment type. Please review the assessment details on our website or contact us for age-related information.</p>
                                                                    
                                                                </td>
                                                               
                                                                
                                                            <td class="align-middle"> 
                                                               <!-- Button trigger modal -->
                                                               <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                            <div class="col-md-15 mb-5">

                                                                                                    <div class="mt-2">
                                                                                                         <h5>Edit Question</h5>
                                                                                                         <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <h5>Edit Answer</h5>
                                                                                                         <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                <button type="button" class="btn btn-success">Yes</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                            </td>
                                                </tr>
                                </table>
                    </div>
=======
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
>>>>>>> parent of 7aafce8 (Revert "Revert "Merge branch 'matt' into khay01"")

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

<<<<<<< HEAD
                                                                        <div class="d-flex justify-content-between"></div>
                                                                                <!-- Button trigger modal -->
                                                                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalFooter">
                                                                                        Edit
                                                                                            </button>

                                                                                            <!-- Modal -->
                                                                                            <div class="modal fade" id="ModalFooter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                                <div class="modal-dialog" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Footer</h5>
                                                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body">
                                                                                                                    <div class="col-md-15 mb-5">

                                                                                                                                <div class="mt-2">
                                                                                                                                    <h5>Edit Header</h5>
                                                                                                                                    <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                                                </div>
                                                                                                                                <div>
                                                                                                                                    <h5>Edit Contents</h5>
                                                                                                                                    <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                                                </div>
                                                                                                                    </div>
                                                                                                                
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                <button type="button" class="btn btn-primary">Save changes</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                            </div>
                                                                                                                        <!-- Button trigger modal -->
                                                                                                        <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#Footer">Delete </button>

                                                                                                            <!-- Modal -->
                                                                                                            <div class="modal fade" id="Footer" tabindex="-1" role="dialog" aria-labelledby="Footer" aria-hidden="true">
                                                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                                            <div class="modal-content">
                                                                                                                                <div class="modal-header">
                                                                                                                                    
                                                                                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                                                    </button>
                                                                                                                                </div>
                                                                                                                                <div class="modal-body d-flex justify-content-center">
                                                                                                                                    <h5> Are you sure you want to delete?</h5>
                                                                                                                                </div>
                                                                                                                                <div class="modal-footer">
                                                                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                                    <button type="button" class="btn btn-success">Yes</button>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                    </div>
                                                                             </div>

                                                            </td>
                                                </tr>
                                                <tr>
                                                            <td scope="row">2</td>
                                                            <td>
                                                               <p>Services</p>
                                                            </td>
                                                            
                                                                <td class="align-middle">
                                                                    <p>Examinations</p>
                                                                    <p>Professional</p>
                                                                    <p>Standardized Testing</p>
                                                                    
                                                                </td>
                                                               
                                                                
                                                            <td class="align-middle"> 
                                                                     <!-- Button trigger modal -->
                                                                     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalFooter">
                                                                                        Edit
                                                                                            </button>

                                                                                            <!-- Modal -->
                                                                                            <div class="modal fade" id="ModalFooter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                                <div class="modal-dialog" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Footer</h5>
                                                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body">
                                                                                                                    <div class="col-md-15 mb-5">

                                                                                                                                <div class="mt-2">
                                                                                                                                    <h5>Edit Header</h5>
                                                                                                                                    <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                                                </div>
                                                                                                                                <div>
                                                                                                                                    <h5>Edit Contents</h5>
                                                                                                                                    <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                                                </div>
                                                                                                                    </div>
                                                                                                                
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                <button type="button" class="btn btn-primary">Save changes</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                            </div>
                                                                                                                        <!-- Button trigger modal -->
                                                                                                        <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#Footer">Delete </button>

                                                                                                            <!-- Modal -->
                                                                                                            <div class="modal fade" id="Footer" tabindex="-1" role="dialog" aria-labelledby="Footer" aria-hidden="true">
                                                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                                            <div class="modal-content">
                                                                                                                                <div class="modal-header">
                                                                                                                                    
                                                                                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                                                    </button>
                                                                                                                                </div>
                                                                                                                                <div class="modal-body d-flex justify-content-center">
                                                                                                                                    <h5> Are you sure you want to delete?</h5>
                                                                                                                                </div>
                                                                                                                                <div class="modal-footer">
                                                                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                                    <button type="button" class="btn btn-success">Yes</button>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                    </div>
                                                                             </div>
                                                            </td>
                                                </tr>
                                                <tr>
                                                            <td scope="row">3</td>
                                                            <td>
                                                               <p>FAQ</p>
                                                            </td>
                                                            
                                                                <td class="align-middle">
                                                                    <p>About Us</p>
                                                                    <p>Settings</p>
                                                                    <p>Help</p>
                                                                    
                                                                </td>
                                                               
                                                                
                                                            <td class="align-middle"> 
                                                                     <!-- Button trigger modal -->
                                                                     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalFooter">
                                                                                        Edit
                                                                                            </button>

                                                                                            <!-- Modal -->
                                                                                            <div class="modal fade" id="ModalFooter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                                <div class="modal-dialog" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Footer</h5>
                                                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body">
                                                                                                                    <div class="col-md-15 mb-5">

                                                                                                                                <div class="mt-2">
                                                                                                                                    <h5>Edit Header</h5>
                                                                                                                                    <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                                                </div>
                                                                                                                                <div>
                                                                                                                                    <h5>Edit Contents</h5>
                                                                                                                                    <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                                                </div>
                                                                                                                    </div>
                                                                                                                
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                <button type="button" class="btn btn-primary">Save changes</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                            </div>
                                                                                                                        <!-- Button trigger modal -->
                                                                                                        <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#Footer">Delete </button>

                                                                                                            <!-- Modal -->
                                                                                                            <div class="modal fade" id="Footer" tabindex="-1" role="dialog" aria-labelledby="Footer" aria-hidden="true">
                                                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                                            <div class="modal-content">
                                                                                                                                <div class="modal-header">
                                                                                                                                    
                                                                                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                                                    </button>
                                                                                                                                </div>
                                                                                                                                <div class="modal-body d-flex justify-content-center">
                                                                                                                                    <h5> Are you sure you want to delete?</h5>
                                                                                                                                </div>
                                                                                                                                <div class="modal-footer">
                                                                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                                    <button type="button" class="btn btn-success">Yes</button>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                    </div>
                                                                             </div>
                                                            </td>
                                                </tr>
                                                <tr>
                                                            <td scope="row">4</td>
                                                            <td>
                                                               <p>Address</p>
                                                            </td>
                                                            
                                                                <td class="align-middle">
                                                                    <p> Normal Rd. Baliwasan</p>
                                                                    <p>iwmsutec@wmsu.edu.ph</p>
                                                                    <p> 02 231 2182</p>
                                                                    <p> 63+ 9956207083</p>
                                                                    
                                                                </td>
                                                               
                                                                
                                                            <td class="align-middle"> 
                                                                     <!-- Button trigger modal -->
                                                                     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalFooter">
                                                                                        Edit
                                                                                            </button>

                                                                                            <!-- Modal -->
                                                                                            <div class="modal fade" id="ModalFooter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                                <div class="modal-dialog" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Footer</h5>
                                                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body">
                                                                                                                    <div class="col-md-15 mb-5">

                                                                                                                                <div class="mt-2">
                                                                                                                                    <h5>Edit Header</h5>
                                                                                                                                    <input type="text" class="form-control" id="validationCustom05" placeholder="Header" required>
                                                                                                                                </div>
                                                                                                                                <div>
                                                                                                                                    <h5>Edit Contents</h5>
                                                                                                                                    <textarea class="form-control" id="message" name="message" rows="10" required="" style="height: 80px;"></textarea>
                                                                                                                                </div>
                                                                                                                    </div>
                                                                                                                
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                <button type="button" class="btn btn-primary">Save changes</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                            </div>
                                                                                                                        <!-- Button trigger modal -->
                                                                                                        <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#Footer">Delete </button>

                                                                                                            <!-- Modal -->
                                                                                                            <div class="modal fade" id="Footer" tabindex="-1" role="dialog" aria-labelledby="Footer" aria-hidden="true">
                                                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                                            <div class="modal-content">
                                                                                                                                <div class="modal-header">
                                                                                                                                    
                                                                                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                                                    </button>
                                                                                                                                </div>
                                                                                                                                <div class="modal-body d-flex justify-content-center">
                                                                                                                                    <h5> Are you sure you want to delete?</h5>
                                                                                                                                </div>
                                                                                                                                <div class="modal-footer">
                                                                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                                    <button type="button" class="btn btn-success">Yes</button>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                    </div>
                                                                             </div>
                                                            </td>
                                                </tr>

                            </table>
=======
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
>>>>>>> parent of 7aafce8 (Revert "Revert "Merge branch 'matt' into khay01"")

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
