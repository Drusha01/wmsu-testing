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
                                                <img src="{{ asset('images/slider/campus.jpg') }}" alt="" style="width:300px; height: 200px; ">
                                            </td>
                                            
                                                <td class="align-middle">
                                                    <p>Testing And Evaluation Center</p>
                                                    
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

                                    <tr>
                                            <td scope="row">2</td>
                                            <td>
                                                <div >
                                                Application for Cet is now open
                                                </div>
                                                <br>
                                                <img src="{{ asset('images/slider/wm.jpg') }}" alt="" style="width:300px; height: 200px; ">
                                            </td>
                                            
                                                <td class="align-middle">
                                                    <p>Register And Submit Your Application<br> By Clicking The Apply Now</p>
                                                    
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
                                    <tr>
                                    <td scope="row">3</td>
                                    <td>
                                        <div >
                                           IMPORTANT ANNOUNCEMENT
                                        </div>
                                        <br>
                                        <img src="{{ asset('images/slider/wm.jpg') }}" alt="" style="width:300px; height: 200px; ">
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
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">Edit</button>
                                                                 <!--  modal trigger -->
                                                                     <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h6 class="modal-title" id="exampleModalLongTitle">Edit About Us</h6>
                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                     </div>
                                                                                                                                <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#exampleModalCenter">Delete </button>

                                                                                    <!-- Modal -->
                                                                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                <div class="modal-content">
                                                                                                    <div class="modal-header">
                                                                                                        
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                        <span aria-hidden="true">&times;</span>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                    <div class="modal-body d-flex justify-content-center">
                                                                                                        <h5> Are you sure you want to delete?</h5>
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                        <button type="button" class="btn btn-success">Yes</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                     </div>
                                                                                    </div>
                                            </td>
                                        </tr>
                                    
                            </table>
                                        
                    </div>

                    <!-- Why Us Tab -->
                    <div class="tab-pane fade" id="why-us-tab">
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
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Why Us</h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                
                                                                                                   <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#delete">Delete </button>

                                                                                            <!-- Modal -->
                                                                                            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                            <div class="modal-content">
                                                                                                                <div class="modal-header">
                                                                                                                    
                                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                                <div class="modal-body d-flex justify-content-center">
                                                                                                                    <h5> Are you sure you want to delete?</h5>
                                                                                                                </div>
                                                                                                                <div class="modal-footer">
                                                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Why Us</h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                
                                                                                                   <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#delete">Delete </button>

                                                                                            <!-- Modal -->
                                                                                            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                            <div class="modal-content">
                                                                                                                <div class="modal-header">
                                                                                                                    
                                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                                <div class="modal-body d-flex justify-content-center">
                                                                                                                    <h5> Are you sure you want to delete?</h5>
                                                                                                                </div>
                                                                                                                <div class="modal-footer">
                                                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Why Us</h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                
                                                                                                   <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#delete">Delete </button>

                                                                                            <!-- Modal -->
                                                                                            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                            <div class="modal-content">
                                                                                                                <div class="modal-header">
                                                                                                                    
                                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                                <div class="modal-body d-flex justify-content-center">
                                                                                                                    <h5> Are you sure you want to delete?</h5>
                                                                                                                </div>
                                                                                                                <div class="modal-footer">
                                                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                                    <button type="button" class="btn btn-success">Yes</button>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                    </div>
                                                                                            </div>
                                            </td>
                                        </tr>
                        </table>
                   
                    </div>

                    <!-- CTA Tab -->
                    <div class="tab-pane fade" id="cta-tab">
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
                                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="ModalLabel">Edit CTA </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                
                                                                                                   <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#deletemodal">Delete </button>

                                                                                            <!-- Modal -->
                                                                                            <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
                                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                            <div class="modal-content">
                                                                                                                <div class="modal-header">
                                                                                                                    
                                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                                <div class="modal-body d-flex justify-content-center">
                                                                                                                    <h5> Are you sure you want to delete?</h5>
                                                                                                                </div>
                                                                                                                <div class="modal-footer">
                                                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="ModalLabel">Edit CTA </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                
                                                                                                   <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#deletemodal">Delete </button>

                                                                                            <!-- Modal -->
                                                                                            <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                            <div class="modal-content">
                                                                                                                <div class="modal-header">
                                                                                                                    
                                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                                <div class="modal-body d-flex justify-content-center">
                                                                                                                    <h5> Are you sure you want to delete?</h5>
                                                                                                                </div>
                                                                                                                <div class="modal-footer">
                                                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="ModalLabel">Edit CTA </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                
                                                                                                   <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#deletemodal">Delete </button>

                                                                                            <!-- Modal -->
                                                                                            <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                            <div class="modal-content">
                                                                                                                <div class="modal-header">
                                                                                                                    
                                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                                <div class="modal-body d-flex justify-content-center">
                                                                                                                    <h5> Are you sure you want to delete?</h5>
                                                                                                                </div>
                                                                                                                <div class="modal-footer">
                                                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                                    <button type="button" class="btn btn-success">Yes</button>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                    </div>
                                                                                            </div>
                                            </td>
                                        </tr>
                        </table>
                              
                    </div>

                    <!-- FAQ Tab -->
                    <div class="tab-pane fade" id="faq-tab">
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
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                                               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                                               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                                               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                                               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                                               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                                               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#FAQ">
                                                                   Edit
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="#FAQ" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="FAQ">Edit FAQ </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                                                      <!-- Button trigger modal -->
                                                                                    <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#faq">Delete </button>

                                                                                        <!-- Modal -->
                                                                                        <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body d-flex justify-content-center">
                                                                                                                <h5> Are you sure you want to delete?</h5>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                                <button type="button" class="btn btn-success">Yes</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                            </td>
                                                </tr>
                                </table>
                    </div>

                    <!-- Footer Tab -->
            <div class="tab-pane fade" id="footer-tab">
                   
                             <table class="application-table">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Header</th>
                                            <th scope="col">Content</th>
                                            <th scope="col">Action</th>
                                            </tr>
                                        </thead>

                                        <tr>
                                                            <td scope="row">1</td>
                                                            <td>
                                                               <p>TEC</p>
                                                            </td>
                                                            
                                                                <td class="align-middle">
                                                                    <p>Western Mindanao State University (WMSU) Testing and Evaluation Center</p>
                                                                    
                                                                </td>
                                                               
                                                                
                                                            <td class="align-middle"> 

                                                                        <div class="d-flex justify-content-between"></div>
                                                                                <!-- Button trigger modal -->
                                                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalFooter">
                                                                                        Edit
                                                                                            </button>

                                                                                            <!-- Modal -->
                                                                                            <div class="modal fade" id="ModalFooter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                                <div class="modal-dialog" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Footer</h5>
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                                <button type="button" class="btn btn-primary">Save changes</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                            </div>
                                                                                                                        <!-- Button trigger modal -->
                                                                                                        <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#Footer">Delete </button>

                                                                                                            <!-- Modal -->
                                                                                                            <div class="modal fade" id="Footer" tabindex="-1" role="dialog" aria-labelledby="Footer" aria-hidden="true">
                                                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                                            <div class="modal-content">
                                                                                                                                <div class="modal-header">
                                                                                                                                    
                                                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                                                    </button>
                                                                                                                                </div>
                                                                                                                                <div class="modal-body d-flex justify-content-center">
                                                                                                                                    <h5> Are you sure you want to delete?</h5>
                                                                                                                                </div>
                                                                                                                                <div class="modal-footer">
                                                                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                                                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalFooter">
                                                                                        Edit
                                                                                            </button>

                                                                                            <!-- Modal -->
                                                                                            <div class="modal fade" id="ModalFooter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                                <div class="modal-dialog" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Footer</h5>
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                                <button type="button" class="btn btn-primary">Save changes</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                            </div>
                                                                                                                        <!-- Button trigger modal -->
                                                                                                        <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#Footer">Delete </button>

                                                                                                            <!-- Modal -->
                                                                                                            <div class="modal fade" id="Footer" tabindex="-1" role="dialog" aria-labelledby="Footer" aria-hidden="true">
                                                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                                            <div class="modal-content">
                                                                                                                                <div class="modal-header">
                                                                                                                                    
                                                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                                                    </button>
                                                                                                                                </div>
                                                                                                                                <div class="modal-body d-flex justify-content-center">
                                                                                                                                    <h5> Are you sure you want to delete?</h5>
                                                                                                                                </div>
                                                                                                                                <div class="modal-footer">
                                                                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                                                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalFooter">
                                                                                        Edit
                                                                                            </button>

                                                                                            <!-- Modal -->
                                                                                            <div class="modal fade" id="ModalFooter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                                <div class="modal-dialog" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Footer</h5>
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                                <button type="button" class="btn btn-primary">Save changes</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                            </div>
                                                                                                                        <!-- Button trigger modal -->
                                                                                                        <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#Footer">Delete </button>

                                                                                                            <!-- Modal -->
                                                                                                            <div class="modal fade" id="Footer" tabindex="-1" role="dialog" aria-labelledby="Footer" aria-hidden="true">
                                                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                                            <div class="modal-content">
                                                                                                                                <div class="modal-header">
                                                                                                                                    
                                                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                                                    </button>
                                                                                                                                </div>
                                                                                                                                <div class="modal-body d-flex justify-content-center">
                                                                                                                                    <h5> Are you sure you want to delete?</h5>
                                                                                                                                </div>
                                                                                                                                <div class="modal-footer">
                                                                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                                                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalFooter">
                                                                                        Edit
                                                                                            </button>

                                                                                            <!-- Modal -->
                                                                                            <div class="modal fade" id="ModalFooter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                                <div class="modal-dialog" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Footer</h5>
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                                <button type="button" class="btn btn-primary">Save changes</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                            </div>
                                                                                                                        <!-- Button trigger modal -->
                                                                                                        <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#Footer">Delete </button>

                                                                                                            <!-- Modal -->
                                                                                                            <div class="modal fade" id="Footer" tabindex="-1" role="dialog" aria-labelledby="Footer" aria-hidden="true">
                                                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                                            <div class="modal-content">
                                                                                                                                <div class="modal-header">
                                                                                                                                    
                                                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                                                    </button>
                                                                                                                                </div>
                                                                                                                                <div class="modal-body d-flex justify-content-center">
                                                                                                                                    <h5> Are you sure you want to delete?</h5>
                                                                                                                                </div>
                                                                                                                                <div class="modal-footer">
                                                                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                                                    <button type="button" class="btn btn-success">Yes</button>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                    </div>
                                                                             </div>
                                                            </td>
                                                </tr>

                            </table>


            </div>
            <!-- End MODIFY CONTENT Tab -->



    
        <!-- End Inserted Section -->

    </main><!-- End #main -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</div>
