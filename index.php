<?php include 'includes/navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Tourist Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
       body{
                font-family: "Parkinsans", sans-serif;
   
        }
        

        .hero-section {
            background-image: url('https://via.placeholder.com/1500x800'); /* Replace with a suitable background image */
            background-size: cover;
            background-position: center;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        .hero-text {
            text-align: center;
            font-size: 2.5rem;
        }

        .cta-btn {
            background-color: #28a745; /* Green color */
            color: white;
            padding: 10px 30px;
            border: none;
            font-size: 1.2rem;
            border-radius: 5px;
            text-decoration: none;
        }

        .cta-btn:hover {
            background-color: #218838;
        }

        .feature-box {
            background-color: #e9f9f0; /* Light green */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 30px;
            transition: transform 0.3s ease;
        }

        .feature-box:hover {
            transform: translateY(-10px);
        }

        .feature-box i {
            font-size: 3rem;
            color: #28a745;
        }

        .feature-box h4 {
            margin-top: 15px;
        }

        .card-deck .card {
            border: 1px solid #28a745;
            transition: transform 0.3s ease;
        }

        .card-deck .card:hover {
            transform: scale(1.05);
        }

        .footer {
            background-color: #28a745;
            color: white;
            padding: 20px;
            text-align: center;
        }

        /* Testimonial Section */
        .testimonial-item {
            border-left: 5px solid #28a745;
            padding-left: 20px;
            margin-bottom: 30px;
        }

        .testimonial-item p {
            font-style: italic;
        }

        /* Contact Us Section */
        .contact-section {
            background-color: #f8f9fa;
            padding: 50px 0;
        }

        .contact-section .contact-form input,
        .contact-section .contact-form textarea {
            margin-bottom: 20px;
        }

        .faq-item {
            background-color: #f9f9f9;
            margin-bottom: 20px;
            border-radius: 5px;
            padding: 15px;
        }

        .faq-item h5 {
            cursor: pointer;
            color: #28a745;
        }

        .faq-item p {
            display: none;
            color: #555;
        }
        .s1 {
        height: 500px; /* Set carousel height */
    }

    .s1 img {
        height: 100%; /* Make the images fit the carousel height */
        width: 100%; /* Ensure full-width coverage */
        object-fit: cover; /* Maintain aspect ratio and crop if needed */
    }
        /* Animations for smoother transitions */
        .animated-fade-in {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        .testimonial-carousel .carousel-item {
            transition: transform 1s ease-in-out;
        }

        .accordion-button {
            background-color: #28a745;
            color: white;
            border: none;
        }

        .accordion-button:not(.collapsed) {
            background-color: #218838;
        }
    </style>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Parkinsans:wght@300..800&display=swap" rel="stylesheet">
</head>
<body>



<!-- Carousel -->
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner s1" style="height: 500px;">
        <div class="carousel-item active">
            <img src="./images/t1.jpg" class="d-block w-100" alt="Destination 1">
            <div class="carousel-caption d-none d-md-block">
                <h5>Beautiful Destinations</h5>
                <p>Discover the world's most beautiful travel destinations with us!</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="./images/nico-smit-uT3K66fLWK8-unsplash.jpg" class="d-block w-100" alt="Destination 2">
            <div class="carousel-caption d-none d-md-block">
                <h5>Adventure Awaits</h5>
                <p>Embark on an adventure of a lifetime.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="./images/sudhanshu-yadav-ADUi7T5FdX8-unsplash.jpg" class="d-block w-100" alt="Destination 3">
            <div class="carousel-caption d-none d-md-block">
                <h5>Exclusive Offers</h5>
                <p>Take advantage of our exclusive offers on packages.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<!-- Feature Section -->
<section class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="feature-box text-center animated-fade-in">
                <i class="bi bi-geo-alt"></i>
                <h4>Explore Destinations</h4>
                <p>Browse through a wide selection of travel destinations.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box text-center animated-fade-in">
                <i class="bi bi-calendar-event"></i>
                <h4>Book Your Package</h4>
                <p>Choose from various tour packages for your next adventure.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box text-center animated-fade-in">
                <i class="bi bi-credit-card"></i>
                <h4>Secure Payments</h4>
                <p>Easy and secure online payment options available.</p>
            </div>
        </div>
    </div>
</section>

<!-- Customer Testimonials Carousel -->
<section class="container mt-5">
    <h2 class="text-center mb-4">What Our Customers Say</h2>
    <div id="testimonialCarousel" class="carousel slide testimonial-carousel" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="card text-center">
                    <div class="card-body">
                        <p class="card-text">"This service made my trip so much easier. I was able to book everything online with ease. Highly recommend!"</p>
                        <h5 class="card-title">John Doe</h5>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card text-center">
                    <div class="card-body">
                        <p class="card-text">"Amazing packages! I had the time of my life. The booking process was smooth, and the customer support was excellent."</p>
                        <h5 class="card-title">Jane Smith</h5>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card text-center">
                    <div class="card-body">
                        <p class="card-text">"The best travel experience! Affordable and reliable. I'm booking again next year!"</p>
                        <h5 class="card-title">Mark Lee</h5>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>



<!-- Contact Us Section -->
<section class="contact-section">
    <div class="container">
        <h2 class="text-center mb-4">Get in Touch</h2>
        <div class="row">
            <div class="col-md-6">
                <h4>Contact Information</h4>
                <p>For inquiries, you can reach us via email or phone.</p>
                <ul>
                    <li>Email: support@tourism.com</li>
                    <li>Phone: +123 456 7890</li>
                </ul>
            </div>
            <div class="col-md-6">
                <h4>Send Us a Message</h4>
                <form class="contact-form">
                    <input type="text" class="form-control" placeholder="Your Name" required>
                    <input type="email" class="form-control" placeholder="Your Email" required>
                    <textarea class="form-control" placeholder="Your Message" rows="5" required></textarea>
                    <button type="submit" class="btn btn-success mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section with Accordion -->
<section class="container mt-5">
    <h2 class="text-center mb-4">Frequently Asked Questions</h2>
    <div class="accordion" id="faqAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    What is the booking process?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    To book a package, simply choose your desired destination and package, fill out the details, and complete the payment online.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    How can I cancel my booking?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    You can cancel your booking by contacting our support team at least 48 hours before the scheduled start date.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Do you offer group discounts?
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Yes, we offer group discounts for bookings of 10 or more people. Please contact our sales team for more information.
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
