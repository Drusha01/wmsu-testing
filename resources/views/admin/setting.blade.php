<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin setting - WMSU TEC</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/boxicons/2.0.7/boxicons/css/boxicons.min.css" rel="stylesheet">
    <!--  Main CSS File -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <!--   js File -->
    <script src="{{ asset('js/dashboard.js') }}"></script>
</head>

<body class="admin-dashboard">

    <!-- ======= Header ======= -->
    @include('admin-components.admin-header');
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('admin-components.admin-sidebar');
    <!-- End Sidebar -->

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
        </div><!-- End Right side columns -->
        <!-- Insert Section -->
    <section class="admin-content">
        <!-- Modifying Website Buttons Section -->
        <div class="modify-section">
            <h2 class="section-heading">Modify Website</h2>
        </div>

        <!-- Carousel Content Modification - Item 1 -->
        <div class="modify-section">
            <h2 class="section-heading">Modify Carousel Item 1</h2>
            <div>
                <label for="carousel-heading-1">Carousel Heading:</label>
                <input type="text" id="carousel-heading-1" name="carousel-heading-1" placeholder="Enter new heading">
            </div>
            <div>
                <label for="carousel-text-1">Carousel Text:</label>
                <textarea id="carousel-text-1" name="carousel-text-1" rows="3">New Carousel Content</textarea>
            </div>
            <div>
                <label for="carousel-button-text-1">Button Text:</label>
                <input type="text" id="carousel-button-text-1" name="carousel-button-text-1" placeholder="Enter new text">
            </div>
            <div>
                <label for="carousel-button-link-1">Button Link:</label>
                <input type="url" id="carousel-button-link-1" name="carousel-button-link-1" placeholder="Enter new link">
            </div>
            <button id="updateCarouselItem1">Update Carousel Item 1</button>
        </div>
        <!-- Feature Info Section - Item 1 -->
        <div class="modify-section">
            <h2 class="section-heading">Modify Feature Info Item 1</h2>
            <div>
                <label for="feature-title-1">Feature Title:</label>
                <input type="text" id="feature-title-1" name="feature-title-1" placeholder="Enter new title">
            </div>

            <div>
                <label for="feature-description-1">Feature Description:</label>
                <textarea id="feature-description-1" name="feature-description-1" rows="3">New feature description</textarea>
            </div>

            <div>
                <label for="feature-link-1">Feature Link:</label>
                <input type="url" id="feature-link-1" name="feature-link-1" placeholder="Enter new link">
            </div>

            <button id="updateFeatureItem1">Update Feature Item 1</button>
        </div>

        <!-- About Us Section Modification -->
        <div class="modify-section">
            <h2 class="section-heading">Modify About Us Section</h2>

            <!-- About Us Content - Update Title -->
            <div>
                <label for="about-us-title">About Us Title:</label>
                <input type="text" id="about-us-title" name="about-us-title" placeholder="Enter new title">
            </div>

            <!-- About Us Content - Update Description -->
            <div>
                <label for="about-us-description">About Us Description:</label>
                <textarea id="about-us-description" name="about-us-description" rows="3">New About Us Description</textarea>
            </div>

            <!-- About Us Content - Update Mission Statement -->
            <div>
                <label for="about-us-mission">Mission Statement:</label>
                <textarea id="about-us-mission" name="about-us-mission" rows="3">New Mission Statement</textarea>
            </div>

            <!-- About Us Content - Update Vision Statement -->
            <div>
                <label for="about-us-vision">Vision Statement:</label>
                <textarea id="about-us-vision" name="about-us-vision" rows="3">New Vision Statement</textarea>
            </div>

            <button id="updateAboutUsSection">Update About Us Section</button>
        </div>

        <!-- Why Choose Us Section Modification -->
        <div class="modify-section">
            <h2 class="section-heading">Modify Why Choose Us Section</h2>

            <!-- Why Choose Us Content - Update Title -->
            <div>
                <label for="why-choose-title">Why Choose Us Title:</label>
                <input type="text" id="why-choose-title" name="why-choose-title" placeholder="Enter new title">
            </div>

            <!-- Why Choose Us Content - Update Item 1 -->
            <div>
                <label for="why-choose-item1">Item 1:</label>
                <textarea id="why-choose-item1" name="why-choose-item1" rows="3">New Item 1 Content</textarea>
            </div>

            <!-- Why Choose Us Content - Update Item 2 -->
            <div>
                <label for="why-choose-item2">Item 2:</label>
                <textarea id="why-choose-item2" name="why-choose-item2" rows="3">New Item 2 Content</textarea>
            </div>

            <!-- Why Choose Us Content - Update Item 3 -->
            <div>
                <label for="why-choose-item3">Item 3:</label>
                <textarea id="why-choose-item3" name="why-choose-item3" rows="3">New Item 3 Content</textarea>
            </div>

            <button id="updateWhyChooseUsSection">Update Why Choose Us Section</button>
        </div>

        <!-- Call to Action (CTA) Section Modification -->
        <div class="modify-section">
            <h2 class="section-heading">Modify Call to Action (CTA) Section</h2>

            <!-- CTA Content - Update Title -->
            <div>
                <label for="cta-title">CTA Title:</label>
                <input type="text" id="cta-title" name="cta-title" placeholder="Enter new title">
            </div>

            <!-- CTA Content - Update Description -->
            <div>
                <label for="cta-description">CTA Description:</label>
                <textarea id="cta-description" name="cta-description" rows="3">New CTA Description</textarea>
            </div>

            <!-- CTA Content - Update Button Text -->
            <div>
                <label for="cta-button-text">Button Text:</label>
                <input type="text" id="cta-button-text" name="cta-button-text" placeholder="Enter new button text">
            </div>

            <button id="updateCTASection">Update CTA Section</button>
        </div>

        <!-- Footer Section Modification -->
        <div class="modify-section">
            <h2 class="section-heading">Modify Footer Section</h2>

            <!-- Footer Content - Update Address -->
            <div>
                <label for="footer-address">Address:</label>
                <input type="text" id="footer-address" name="footer-address" placeholder="Enter new address">
            </div>

            <!-- Footer Content - Update Email -->
            <div>
                <label for="footer-email">Email:</label>
                <input type="email" id="footer-email" name="footer-email" placeholder="Enter new email">
            </div>

            <!-- Footer Content - Update Phone Number -->
            <div>
                <label for="footer-phone">Phone Number:</label>
                <input type="tel" id="footer-phone" name="footer-phone" placeholder="Enter new phone number">
            </div>

            <!-- Footer Content - Update Social Media Links -->
            <div>
                <label for="footer-facebook">Facebook:</label>
                <input type="url" id="footer-facebook" name="footer-facebook" placeholder="Enter new Facebook link">
            </div>
            <div>
                <label for="footer-twitter">Twitter:</label>
                <input type="url" id="footer-twitter" name="footer-twitter" placeholder="Enter new Twitter link">
            </div>
            <div>
                <label for="footer-linkedin">LinkedIn:</label>
                <input type="url" id="footer-linkedin" name="footer-linkedin" placeholder="Enter new LinkedIn link">
            </div>

            <button id="updateFooterSection">Update Footer Section</button>
        </div>
    </section>
    <!-- End Inserted Section -->

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</body>

</html>
