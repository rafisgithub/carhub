<footer data-aos="fade-in" data-aos-duration="1200">
    <div class="container">
      <div class="custom--row">
        <!-- footer box  -->
        <div class="footer--box logo-box">
          <!-- footer logo  -->
          <a href="index.html">
            <img src=" {{ asset('frontend/assets') }}/images/logo.svg" alt="" />
          </a>
          <!-- social icons  -->
          <ul class="social--icons">
          @foreach ($data as $d)

            <li>
              <a href="{{ $d->url }}">

                <i class="{{ $d->icon }}"></i>

              </a>
            </li>
            @endforeach
          </ul>

        </div>
        <!-- footer box  -->
        <div class="footer--box">
          <h4>How It Works</h4>
          <ul>
            <li>
              <a href="#">Buying a Car</a>
            </li>
            <li>
              <a href="#">Selling a car</a>
            </li>
            <li>
              <a href="#">Finalizing the Sale</a>
            </li>
            <li>
              <a href="#">FAQs</a>
            </li>
          </ul>
        </div>
        <!-- footer box  -->
        <div class="footer--box">
          <h4>Sellers</h4>
          <ul>
            <li>
              <a href="#">Submit Your car</a>
            </li>
            <li>
              <a href="#">Photography Guide</a>
            </li>
            <li>
              <a href="#">Inspections</a>
            </li>
            <li>
              <a href="#">Concierge Sales</a>
            </li>
          </ul>
        </div>
        <!-- footer box  -->
        <div class="footer--box">
          <h4>Helpful Links</h4>
          <ul>
            <li>
              <a href="#">Community</a>
            </li>
            <li>
              <a href="#">Support</a>
            </li>
            <li>
              <a href="#">Shipping</a>
            </li>
            <li>
              <a href="#">Shop C&B Merch</a>
            </li>
            <li>
              <a href="#">Careers</a>
            </li>
          </ul>
        </div>
        <!-- footer box  -->
        <div class="footer--box">
          <h4>Subscribe to Newsletter</h4>
          <form action="#">
            <input type="email" placeholder="Enter email address" required />
            <button type="submit">Subscribe</button>
          </form>
        </div>
      </div>
    </div>
    <!-- footer bottom  -->
    <div class="footer--bottom">
      © Copyright 2024, All Rights Reserved by SCH
    </div>
  </footer>
