<html>
  <head>
    <meta name="description" content="Hello this is my first web page!." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
      crossorigin="anonymous"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <title>Cinefly - Watch TV Shows Online, Watch Movies Online</title>
    <link
      rel="icon"
      href="http://pngimg.com/uploads/netflix/small/netflix_PNG15.png"
    />
    <link rel="stylesheet" href="index.css" />
  </head>
  <body>
    <header>
      <nav class="navbar">
        <div class="navbar__brand">
          <img
            src="assets/cinefly.png"
            alt="logo"
            class="brand__logo"
          />
        </div>

        <div class="navbar__nav__items">
          <div class="nav__item">
          </div>

          <div class="email__form__container">
            <a href="register.php" class="primary__button ">Sign Up</a>
            <a href="login.php" class="primary__button">Log In</a>
          </div>
        </div>
      </nav>
    </header>

    <main>
      <section class="hero">
        <div class="hero__bg__image__container">

        </div>
        <div class="hero__bg__overlay"></div>

        <div class="hero__card">
          <h1 class="hero__title">
            Unlimited Movies TV,<br />
            Shows and More.
          </h1>
          <p class="hero__subtitle">Watch anywhere and cancel anytime.</p>
          <p class="hero__description">
            Ready to watch? Enter your email to create or restart your
            membership .
          </p>
          <div class="email__form__container">
            <div class="form__container">
              <input type="email" id="landingEmail" class="email__input" placeholder=" " />
              <label class="email__label">Email Address</label>
            </div>
            <button id="getStartedBtn" class="primary__button">
              Get Started <i class="fal fa-chevron-right"></i>
            </button>
          </div>
        </div>
      </section>
      <section class="features__container">
        <!-- Feature 1 -->
        <div class="feature">
          <div class="feature__details">
            <h3 class="feature__title">Enjoy on your TV.</h3>
            <h5 class="feature__sub__title">
              Watch on smart TVs, PlayStation, Xbox, Chromecast, Apple TV,
              Blu-ray players and more.
            </h5>
          </div>
          <div class="feature__image__container">
            <img
              src="https://assets.nflxext.com/ffe/siteui/acquisition/ourStory/fuji/desktop/tv.png"
              alt="Feature image"
              class="feature__image"
            />
            <div class="feature__backgroud__video__container">
              <video
                autoplay=""
                loop=""
                muted=""
                class="feature__backgroud__video"
              >
                <source
                  src="https://assets.nflxext.com/ffe/siteui/acquisition/ourStory/fuji/desktop/video-tv-in-0819.m4v"
                  type="video/mp4"
                />
              </video>
            </div>
          </div>
        </div>
        <!-- Feature 2 -->
        <div class="feature">
          <div class="feature__details">
            <h3 class="feature__title">
              Download your shows to watch offline.
            </h3>
            <h5 class="feature__sub__title">
              Save your favourites easily and always have something to watch.
            </h5>
          </div>
          <div class="feature__image__container">
            <img
              src="https://assets.nflxext.com/ffe/siteui/acquisition/ourStory/fuji/desktop/mobile-0819.jpg"
              alt="Feature image"
              class="feature__image"
            />
            <div class="feature__2__poster__container">
              <div class="poster__container">
                <img
                  src="https://assets.nflxext.com/ffe/siteui/acquisition/ourStory/fuji/desktop/boxshot.png"
                  alt="poster"
                  class="poster"
                />
              </div>
              <div class="poster__details">
                <h4>Stranger Things</h4>
                <h6>Downloading...</h6>
              </div>
              <div class="download__gif__container">
                <img
                  src="https://assets.nflxext.com/ffe/siteui/acquisition/ourStory/fuji/desktop/download-icon.gif"
                  alt="downloading gif"
                  class="gif"
                />
              </div>
            </div>
          </div>
        </div>
        <!-- Feature 3 -->
        <div class="feature">
          <div class="feature__details">
            <h3 class="feature__title">Watch everywhere.</h3>
            <h5 class="feature__sub__title">
              Stream unlimited movies and TV shows on your phone, tablet,
              laptop, and TV.
            </h5>
          </div>
          <div class="feature__image__container feature__3__image__container">
            <img
              src="https://assets.nflxext.com/ffe/siteui/acquisition/ourStory/fuji/desktop/device-pile-in.png"
              alt="Feature image"
              class="feature__image feature__3__image"
            />
            <div
              class="feature__backgroud__video__container feature__3__backgroud__video__container"
            >
              <video
                autoplay=""
                loop=""
                muted=""
                class="feature__backgroud__video feature__3__backgroud__video"
              >
                <source
                  src="https://assets.nflxext.com/ffe/siteui/acquisition/ourStory/fuji/desktop/video-devices-in.m4v"
                  type="video/mp4"
                />
              </video>
            </div>
          </div>
        </div>
        <!-- Feature 4 -->
        <div class="feature">
          <div class="feature__details">
            <h3 class="feature__title">Create profiles for children.</h3>
            <h5 class="feature__sub__title">
              Send children on adventures with their favourite characters in a
              space made just for them—free with your membership.
            </h5>
          </div>
          <div class="feature__image__container">
            <img
              src="assets/cinefly.png"
              alt="Feature image"
              class="feature__image"
            />
          </div>
        </div>
      </section>
      <section class="FAQ__list__container">
        <h1 class="FAQ__heading">Frequently Asked Questions</h1>
        <div class="FAQ__list">
          <div class="FAQ__accordian">
            <button class="FAQ__title">
              What is Cinefly?<i class="fal fa-plus"></i>
            </button>
            <div class="FAQ__visible">
              <p>
                Cinefly is a streaming service that offers a wide variety of
                award-winning TV shows, movies, anime, documentaries and more –
                on thousands of internet-connected devices.
              </p>
              <p>
                You can watch as much as you want, whenever you want, without a
                single ad – all for one low monthly price. There's always
                something new to discover, and new TV shows and movies are added
                every week!
              </p>
            </div>
          </div>
          <div class="FAQ__accordian">
            <button class="FAQ__title">
              How much does Cinefly cost?<i class="fal fa-plus"></i>
            </button>
            <div class="FAQ__visible">
              <p>
                Watch Cinefly on your smartphone, tablet, Smart TV, laptop, or
                streaming device, all for one fixed monthly fee. Plans range
                from ₹ 199 to ₹ 799 a month. No extra costs, no contracts.
              </p>
            </div>
          </div>
          <div class="FAQ__accordian">
            <button class="FAQ__title">
              Where can i watch?<i class="fal fa-plus"></i>
            </button>
            <div class="FAQ__visible">
              <p>
                Watch anywhere, anytime, on an unlimited number of devices. Sign
                in with your Cinefly account to watch instantly on the web at
                Cinefly.com from your personal computer or on any
                internet-connected device that offers the Cinefly app, including
                smart TVs, smartphones, tablets, streaming media players and
                game consoles.
              </p>
              <p>
                You can also download your favourite shows with the iOS,
                Android, or Windows 10 app. Use downloads to watch while you're
                on the go and without an internet connection. Take Cinefly with
                you anywhere.
              </p>
            </div>
          </div>
          <div class="FAQ__accordian">
            <button class="FAQ__title">
              How do I cancel?<i class="fal fa-plus"></i>
            </button>
            <div class="FAQ__visible">
              <p>
                Cinefly is flexible. There are no annoying contracts and no
                commitments. You can easily cancel your account online in two
                clicks. There are no cancellation fees – start or stop your
                account anytime.
              </p>
            </div>
          </div>
          <div class="FAQ__accordian">
            <button class="FAQ__title">
              What can I watch from Cinefly?<i class="fal fa-plus"></i>
            </button>
            <div class="FAQ__visible">
              <p>
                Cinefly has an extensive library of feature films,
                documentaries, TV shows, anime, award-winning Cinefly originals,
                and more. Watch as much as you want, anytime you want.
              </p>
            </div>
          </div>
          <div class="FAQ__accordian">
            <button class="FAQ__title">
              Is Cinefly good for kids?<i class="fal fa-plus"></i>
            </button>
            <div class="FAQ__visible">
              <p>
                The Cinefly Kids experience is included in your membership to
                give parents control while kids enjoy family-friendly TV shows
                and films in their own space.
              </p>
              <p>
                Kids profiles come with PIN-protected parental controls that let
                you restrict the maturity rating of content kids can watch and
                block specific titles you don’t want kids to see.
              </p>
            </div>
          </div>
        </div>
      </section>
    </main>

    <footer>
      <div class="footer__row__1">
        <h4>Questions? Call 000-800-040-1843</h4>
      </div>
      <div class="footer__row__2">
        <div class="column__1">
          <p>FAQ</p>
          <p>Investor Relations</p>
          <p>Privacy</p>
          <p>Speed Test</p>
        </div>
        <div class="column__2">
          <p>Help Centre</p>
          <p>Jobs</p>
          <p>Cookie Preferences</p>
          <p>Legal Notices</p>
        </div>
        <div class="column__3">
          <p>Account</p>
          <p>Ways to Watch</p>
          <p>Corporate Information</p>
          <p>Only on Cinefly</p>
        </div>
        <div class="column__4">
          <p>Media Centre</p>
          <p>Terms of Use</p>
          <p>Contact Us</p>
        </div>
      </div>
      <div class="footer__row__3">
      </div>
    </footer>

    <script src="index.js">
        document.getElementById("goToHome").addEventListener("click", function() {
          window.location.href = "index.php";
        });
    </script>
  </body>
</html>
