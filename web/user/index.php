<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home | SmartPost Postal Management System</title>
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700;800&family=Roboto:wght@400;500;600&display=swap"
    rel="stylesheet">
</head>
<body id="top">
  <header class="header">
    <div class="header-top">
      <div class="container">
        <ul class="social-list">
          <li class="social-link">
            <a href="#" class="contact-link">Admin Login</a>
          </li>
          <li class="contact-item">
            <a href="#" class="contact-link">Terms & Conditions</a>
          </li>
          <li class="contact-item">
            <a href="#" class="contact-link">Privacy Policy</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="header-bottom" data-header>
      <div class="container">
        <a href="#" class="logo"><img src="assets/images/logo.png" height="60px" width="120px"/></a>
        <nav class="navbar container" data-navbar>
          <ul class="navbar-list">
            <li>
              <a href="#home" class="navbar-link" data-nav-link>Home</a>
            </li>
            <li>
              <a href="#service" class="navbar-link" data-nav-link>Services</a>
            </li>
            <li>
              <a href="#" class="navbar-link" data-nav-link>Send</a>
            </li>
            <li>
              <a href="#" class="navbar-link" data-nav-link>Receive</a>
            </li>
            <li>
              <a href="#" class="navbar-link" data-nav-link>Business</a>
            </li>
            <li>
              <a href="#" class="navbar-link" data-nav-link>Help</a>
            </li>
          </ul>
        </nav>
        <a href="#" class="btn">Stamp Store</a>
        <button class="nav-toggle-btn" aria-label="Toggle menu" data-nav-toggler>
          <ion-icon name="menu-sharp" aria-hidden="true" class="menu-icon"></ion-icon>
          <ion-icon name="close-sharp" aria-hidden="true" class="close-icon"></ion-icon>
        </button>
      </div>
    </div>
  </header>
  <main>
    <article>
      <section class="section hero" id="home" style="background-image: url('./assets/images/hero-bg.png')"
        aria-label="hero">
        <div class="container">
          <div class="hero-content">
            <p class="section-subtitle">SmartPost Postal Management System</p>
            <h2 class="h2 hero-title">Department of Posts Sri Lanka</h2>
            <p class="hero-text">
              The Department of Posts, functioning under the Brand name Sri Lanka Post,<br> is a Government operated Postal System in Sri Lanka.
            </p>
            <form id="form1" action="track.php" method="get" class="hero-form">
              <input type="text" name="tracking_number" aria-label="email" placeholder="Tracking Number" required
                class="email-field" id="input1">
              <button type="submit" class="btn">Track Package</button>
            </form>
          </div>
          <figure class="hero-banner">
            <img src="./assets/images/hero-banner.png" width="587" height="839" alt="hero banner" class="w-100">
          </figure>
        </div>
      </section>






      
      <section class="section service" id="service" aria-label="service">
        <div class="container">
          <p class="section-subtitle text-center">Our Services</p>
          <h2 class="h2 section-title text-center">What We Provide</h2>
          <ul class="service-list">
            <li>
              <div class="service-card">
                <div>
                  <h3 class="h3 card-title">Package Tracking</h3>
                  <p class="card-text">
                    Track your Packages with your Unique Tracking ID
                  </p>
                </div>
              </div>
            </li>
            <li>
              <div class="service-card">               
                <div>
                  <h3 class="h3 card-title">Exam Fee Payment</h3>
                  <p class="card-text">
                    Pay Your Exam Fee online with just few clicks
                  </p>
                </div>
              </div>
            </li>
            <li>
              <div class="service-card">                
                <div>
                  <h3 class="h3 card-title">Stamp Store</h3>
                  <p class="card-text">
                    Order your Favourite Stamps for the Vintage Collection
                  </p>
                </div>
              </div>
            </li>
            <li class="service-banner">
              <figure>
                <img src="./assets/images/service-banner.png" width="409" height="467" loading="lazy"
                  alt="service banner" class="w-100">
              </figure>
            </li>
            <li>
              <div class="service-card">
                <div>
                  <h3 class="h3 card-title">Vehicle Fine Payment</h3>
                  <p class="card-text">
                    Pay your Vehicle Fine Payment from wherever you are
                  </p>
                </div>
              </div>
            </li>
            <li>
              <div class="service-card">
                <div>
                  <h3 class="h3 card-title">Utility Bill Payment</h3>
                  <p class="card-text">
                    Pay all your Utility bills from here
                  </p>
                </div>
              </div>
            </li>
            <li>
              <div class="service-card">
                <div>
                  <h3 class="h3 card-title">Cick-2-Post</h3>
                  <p class="card-text">
                    Why visit a Post Office when you have SmartPost in hand
                  </p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </section>
      <section class="section cta" aria-label="cta">
        <div class="container">
          <figure class="cta-banner">
            <img src="./assets/images/cta-banner.png" width="1056" height="1076" loading="lazy" alt="cta banner"
              class="w-100">
          </figure>
          <div class="cta-content">
            <p class="section-subtitle">Now on PlayStore</p>
            <h2 class="h2 section-title">SmartPost Postal App</h2>
            <a href="#" class="btn">Download Android Application</a>
          </div>
        </div>
      </section>
    </article>
  </main>
  <footer class="footer">
    <div class="footer-bottom">
      <div class="container">
        <p class="copyright">
          &copy; 2023 All Rights Reserved by SmartPost Postal Management System.
        </p>
      </div>
    </div>
  </footer>

  <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
    <ion-icon name="caret-up" aria-hidden="true"></ion-icon>
  </a>

  <script src="./assets/js/script.js" defer></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>