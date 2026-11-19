<?php
$success = "";
$error = "";
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["volunteer_submit"])) {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    $city = trim($_POST["city"] ?? "");
    $interest = trim($_POST["interest"] ?? "");
    $message = trim($_POST["message"] ?? "");
    if ($name && filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/^[0-9+\-\s]{7,20}$/', $phone)) {
        $file = __DIR__ . "/registrations.csv";
        $fp = fopen($file, "a");
        if ($fp) {
            if (filesize($file) === 0) fputcsv($fp, ["Date","Name","Email","Phone","City","Interest","Message"]);
            fputcsv($fp, [date("c"), $name, $email, $phone, $city, $interest, $message]);
            fclose($fp);
            $success = "Thank you! Your volunteer registration has been received.";
        } else { $error = "Unable to save registration. Please try again later."; }
    } else { $error = "Please enter a valid name, email and phone number."; }
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sriram Foundation | Service, Compassion, Hope</title>
<meta name="description" content="Sriram Foundation - community service, education, healthcare, environmental care and support for people in need.">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#home"><span class="brand-mark"><i class="fa-solid fa-hands-holding-heart"></i></span> Sriram Foundation</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto align-items-lg-center">
        <li class="nav-item"><a class="nav-link" href="#home">Home</a></li><li class="nav-item"><a class="nav-link" href="#about">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li><li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
        <li class="nav-item"><a class="nav-link" href="#volunteer">Volunteer</a></li><li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        <li class="nav-item ms-lg-2"><a class="btn btn-light btn-sm rounded-pill px-3" href="#donate">Support Us</a></li>
      </ul>
    </div>
  </div>
</nav>

<header class="hero" id="home">
  <div class="container hero-content reveal">
    <span class="eyebrow">Together we can make a difference</span>
    <h1>Kindness in Action.<br><span>Hope for Everyone.</span></h1>
    <p class="lead">Working towards a compassionate, healthy, educated and sustainable community.</p>
    <a class="btn btn-primary btn-lg rounded-pill me-2" href="#volunteer">Become a Volunteer</a>
    <a class="btn btn-outline-light btn-lg rounded-pill" href="#about">Discover Our Mission</a>
  </div>
</header>

<section class="section" id="about">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-6 reveal"><img class="about-image" src="https://images.unsplash.com/photo-1531208436127-bd5b4b8b3b5b?auto=format&fit=crop&w=1200&q=80" alt="Community volunteers working together"></div>
      <div class="col-lg-6 reveal">
        <span class="eyebrow text-primary">About our foundation</span><h2>Small acts. <span class="text-primary">Big change.</span></h2>
        <p>Sriram Foundation is presented as a community-focused initiative dedicated to uplifting people and promoting social responsibility. Our website highlights ways people can support education, health, community wellbeing and environmental protection.</p>
        <div class="mission-list"><p><i class="fa-solid fa-circle-check"></i> Compassion and community care</p><p><i class="fa-solid fa-circle-check"></i> Equal opportunities and education</p><p><i class="fa-solid fa-circle-check"></i> Healthy, sustainable communities</p></div>
        <a href="#services" class="btn btn-primary rounded-pill">Explore Our Work</a>
      </div>
    </div>
  </div>
</section>

<section class="section section-soft" id="services">
  <div class="container"><div class="text-center mb-5 reveal"><span class="eyebrow">What we care about</span><h2>Our Focus Areas</h2><p class="section-intro">Meaningful initiatives that can create positive change in communities.</p></div>
    <div class="row g-4">
      <div class="col-md-6 col-lg-3 reveal"><div class="service-card"><div class="icon-circle"><i class="fa-solid fa-book-open"></i></div><h4>Education</h4><p>Encourage learning, literacy, learning resources and opportunities for students.</p></div></div>
      <div class="col-md-6 col-lg-3 reveal"><div class="service-card"><div class="icon-circle"><i class="fa-solid fa-heart-pulse"></i></div><h4>Health & Wellness</h4><p>Promote health awareness, wellbeing and community support initiatives.</p></div></div>
      <div class="col-md-6 col-lg-3 reveal"><div class="service-card"><div class="icon-circle"><i class="fa-solid fa-seedling"></i></div><h4>Environment</h4><p>Support planting, cleanliness, conservation and sustainable habits.</p></div></div>
      <div class="col-md-6 col-lg-3 reveal"><div class="service-card"><div class="icon-circle"><i class="fa-solid fa-handshake-angle"></i></div><h4>Community Support</h4><p>Build a culture of service, inclusion, kindness and helping one another.</p></div></div>
    </div>
  </div>
</section>

<section class="section" id="impact">
  <div class="container"><div class="impact-banner reveal"><div><span class="eyebrow">Be part of the movement</span><h2>Every helping hand matters.</h2><p>Join us in building stronger, kinder communities.</p></div><a href="#volunteer" class="btn btn-light btn-lg rounded-pill">Join the Mission</a></div></div>
</section>

<section class="section section-soft" id="gallery">
  <div class="container"><div class="text-center mb-5 reveal"><span class="eyebrow">Moments of service</span><h2>Community Gallery</h2></div>
    <div id="galleryCarousel" class="carousel slide carousel-fade reveal" data-bs-ride="carousel" data-bs-interval="3500">
      <div class="carousel-indicators"><button type="button" data-bs-target="#galleryCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button><button type="button" data-bs-target="#galleryCarousel" data-bs-slide-to="1"></button><button type="button" data-bs-target="#galleryCarousel" data-bs-slide-to="2"></button></div>
      <div class="carousel-inner rounded-4 overflow-hidden">
        <div class="carousel-item active"><img src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?auto=format&fit=crop&w=1600&q=80" alt="Volunteers helping community"><div class="carousel-caption"><h3>Community Togetherness</h3></div></div>
        <div class="carousel-item"><img src="https://images.unsplash.com/photo-1469571486292-0ba58a3f5c1b?auto=format&fit=crop&w=1600&q=80" alt="People volunteering"><div class="carousel-caption"><h3>Volunteering with Purpose</h3></div></div>
        <div class="carousel-item"><img src="https://images.unsplash.com/photo-1509099836639-18ba1795216d?auto=format&fit=crop&w=1600&q=80" alt="Children learning"><div class="carousel-caption"><h3>Learning and Opportunity</h3></div></div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></button>
      <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></button>
    </div>
    <div class="row g-3 mt-3 gallery-grid">
      <div class="col-sm-6 col-lg-4"><img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?auto=format&fit=crop&w=900&q=80" alt="Community gathering"></div>
      <div class="col-sm-6 col-lg-4"><img src="https://images.unsplash.com/photo-1497486751825-1233686d5d80?auto=format&fit=crop&w=900&q=80" alt="Volunteers planting"></div>
      <div class="col-sm-6 col-lg-4"><img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?auto=format&fit=crop&w=900&q=80" alt="People supporting each other"></div>
    </div>
  </div>
</section>

<section class="section" id="donate">
  <div class="container"><div class="donate-card text-center reveal"><span class="eyebrow">Support our efforts</span><h2>Give a little. Make a difference.</h2><p>Support community initiatives through volunteering, sharing resources or making a contribution.</p><a href="#contact" class="btn btn-primary btn-lg rounded-pill">Contact to Support</a><small class="d-block mt-3 text-muted">Donation/payment processing is not configured on this demo site.</small></div></div>
</section>

<section class="section section-soft" id="volunteer">
  <div class="container"><div class="text-center mb-4"><span class="eyebrow">Join our community</span><h2>Volunteer Registration</h2><p>Fill in the form to express your interest.</p></div>
    <div class="row justify-content-center"><div class="col-lg-8"><div class="form-card">
      <?php if ($success): ?><div class="alert alert-success"><?= htmlspecialchars($success) ?></div><?php endif; ?>
      <?php if ($error): ?><div class="alert alert-danger"><?= htmlspecialchars($error) ?></div><?php endif; ?>
      <form method="post" action="#volunteer" id="volunteerForm">
        <div class="row g-3">
          <div class="col-md-6"><label class="form-label" for="name">Full name</label><input class="form-control" id="name" name="name" required maxlength="100"></div>
          <div class="col-md-6"><label class="form-label" for="email">Email</label><input class="form-control" id="email" name="email" type="email" required maxlength="150"></div>
          <div class="col-md-6"><label class="form-label" for="phone">Phone</label><input class="form-control" id="phone" name="phone" type="tel" required pattern="[0-9+\-\s]{7,20}"></div>
          <div class="col-md-6"><label class="form-label" for="city">City</label><input class="form-control" id="city" name="city" maxlength="100"></div>
          <div class="col-12"><label class="form-label" for="interest">Area of interest</label><select class="form-select" id="interest" name="interest"><option value="">Select an area</option><option>Education</option><option>Health & Wellness</option><option>Environment</option><option>Community Support</option><option>Events & Outreach</option><option>Other</option></select></div>
          <div class="col-12"><label class="form-label" for="message">Message (optional)</label><textarea class="form-control" id="message" name="message" rows="4" maxlength="1000"></textarea></div>
          <div class="col-12"><div class="form-check"><input class="form-check-input" type="checkbox" id="consent" required><label class="form-check-label" for="consent">I consent to being contacted about volunteering.</label></div></div>
          <div class="col-12 text-center"><button class="btn btn-primary btn-lg rounded-pill px-5" name="volunteer_submit" value="1" type="submit">Submit Registration <i class="fa-solid fa-arrow-right ms-2"></i></button></div>
        </div>
      </form>
    </div></div></div>
  </div>
</section>

<section class="section" id="contact">
  <div class="container"><div class="row g-4 align-items-center"><div class="col-lg-6"><span class="eyebrow">Reach out</span><h2>Contact Sriram Foundation</h2><p>For volunteering, partnerships or general enquiries, use the contact details configured by the foundation.</p><div class="contact-item"><i class="fa-solid fa-envelope"></i><span>your-email@example.com</span></div><div class="contact-item"><i class="fa-solid fa-phone"></i><span>+91 XXXXX XXXXX</span></div><div class="contact-item"><i class="fa-solid fa-location-dot"></i><span>Your address / city, India</span></div></div><div class="col-lg-6"><div class="contact-photo"></div></div></div></div>
</section>

<footer class="footer">
  <div class="container"><div class="row gy-4"><div class="col-lg-5"><h4><i class="fa-solid fa-hands-holding-heart"></i> Sriram Foundation</h4><p>Serving with compassion. Building a better tomorrow.</p></div><div class="col-lg-4"><h5>Quick Links</h5><div class="footer-links"><a href="#about">About</a><a href="#services">Services</a><a href="#gallery">Gallery</a><a href="#volunteer">Volunteer</a></div></div><div class="col-lg-3"><h5>Follow</h5><div class="socials"><a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a><a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a><a href="#" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a></div></div></div><hr><p class="mb-0 text-center small">&copy; <span id="year"></span> Sriram Foundation. Website template.</p></div>
</footer>
<button id="backTop" class="back-top" aria-label="Back to top"><i class="fa-solid fa-arrow-up"></i></button>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
</body>
</html>
