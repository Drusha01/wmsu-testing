<div>
    <!-- Contact section -->
    <section class="contact">
        <div class="container px-2 py-2">
            <div class="row">
                <div class="col-md-6">
                    <h2>Contact Us</h2>
                    <p>If you have any questions, inquiries, or feedback, feel free to contact us using the information
                        below.</p>
                    <ul class="list-unstyled contact-info">
                        <li><i class="bi bi-geo-alt-fill"></i> Address: WMSU Campus, Zamboanga City</li>
                        <li><i class="bi bi-envelope-fill"></i> Email: info@wmsutec.edu</li>
                        <li><i class="bi bi-phone-fill"></i> Phone: (123) 456-7890</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <!-- Contact form -->
                    <form id="contact-form" method="post" action="contact-form-handler.php">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact section -->
</div>


<div class="container border border-dark">
  <div class="row">
    <div class="col position-relative">
      <div class="d-flex justify-content-center  ">
        <img src="{{ asset('images/slider/campus.jpg') }}" alt="Logo" class="contact-img" >
        <div class="overlay-text">
        <address>
    <i class="bi bi-geo-alt"></i>  
    123 Main Street<br>
    City, State, Zip Code<br>
    Country
</address>

          <h6>Phone: +1 (123) 456-7890</h6>
          <h6>Email: info@example.com</h6>
        </div>
      </div>
    </div>
    <div class="col mt-3">
      <h6>Send Us A Message</h6>
      <form >
      <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>


