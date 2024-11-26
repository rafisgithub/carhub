@extends('frontend.app')

@section('title', 'Profile')


@section('content')
<main>
    <!-- Profile Area :: Start  -->
    <section class="profile--area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="profile--contents--wrap" data-aos="fade-in" data-aos-duration="1500">
                        <!-- profile--contents  -->
                        <div class="profile--contents">
                            <!-- preview--img  -->
                            <form id="UploadProfileForm" action="#" data-aos="fade-up" data-aos-duration="1000" enctype="multipart/form-data">
                                <div class="preview--img">
                                    <img id="image-preview" src="{{ asset( $image?$image:'' ) }}" alt="" />
                                </div>
                                <label for="upload">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                        <path d="M15.75 16.5H2.25C1.9425 16.5 1.6875 16.245 1.6875 15.9375C1.6875 15.63 1.9425 15.375 2.25 15.375H15.75C16.0575 15.375 16.3125 15.63 16.3125 15.9375C16.3125 16.245 16.0575 16.5 15.75 16.5Z" fill="white" />
                                        <path d="M14.2649 2.61C12.8099 1.155 11.3849 1.1175 9.89243 2.61L8.98493 3.5175C8.90993 3.5925 8.87993 3.7125 8.90993 3.8175C9.47993 5.805 11.0699 7.395 13.0574 7.965C13.0874 7.9725 13.1174 7.98 13.1474 7.98C13.2299 7.98 13.3049 7.95 13.3649 7.89L14.2649 6.9825C15.0074 6.2475 15.3674 5.535 15.3674 4.815C15.3749 4.0725 15.0149 3.3525 14.2649 2.61Z" fill="white" />
                                        <path d="M11.7043 8.6476C11.4868 8.5426 11.2768 8.4376 11.0743 8.3176C10.9093 8.2201 10.7518 8.1151 10.5943 8.0026C10.4668 7.9201 10.3168 7.8001 10.1743 7.6801C10.1593 7.6726 10.1068 7.6276 10.0468 7.5676C9.79932 7.3576 9.52182 7.0876 9.27432 6.7876C9.25182 6.7726 9.21432 6.7201 9.16182 6.6526C9.08682 6.5626 8.95932 6.4126 8.84682 6.2401C8.75682 6.1276 8.65182 5.9626 8.55432 5.7976C8.43432 5.5951 8.32932 5.3926 8.22432 5.1826C8.19277 5.11499 8.16325 5.04807 8.13536 4.98202C8.0486 4.77659 7.7821 4.71731 7.62442 4.875L3.25182 9.2476C3.15432 9.3451 3.06432 9.5326 3.04182 9.6601L2.63682 12.5326C2.56182 13.0426 2.70432 13.5226 3.01932 13.8451C3.28932 14.1076 3.66432 14.2501 4.06932 14.2501C4.15932 14.2501 4.24932 14.2426 4.33932 14.2276L7.21932 13.8226C7.35432 13.8001 7.54182 13.7101 7.63182 13.6126L12 9.24437C12.1588 9.08559 12.0987 8.81377 11.8915 8.72729C11.8304 8.70182 11.7683 8.67532 11.7043 8.6476Z" fill="white" />
                                    </svg>
                                </label>
                                <input type="file" id="upload" name="image" />
                            </form>
                            <!-- profile--name  -->
                            <div class="profile--name">
                                <h1 id="UserName" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">

                                </h1>
                                <ul data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                                    <li>Contact Number : <span id="userContactNumber"></span></li>
                                    <li>Address : <span id="userAddress"></span></li>
                                </ul>
                                <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300" id="UserBioGraphy">

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Profile Area :: End  -->

    <!-- Profile History Area :: Start  -->
    <section class="profile--history--area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="history--tabs">
                        <div class="nav--wrapper">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-my-listing-tab" data-bs-toggle="pill" data-bs-target="#pills-my-listing" type="button" role="tab" aria-controls="pills-my-listing" aria-selected="true">
                                        My Listing
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-bid-history-tab" data-bs-toggle="pill" data-bs-target="#pills-bid-history" type="button" role="tab" aria-controls="pills-bid-history" aria-selected="false">
                                        Bid History
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-watchlist -tab" data-bs-toggle="pill" data-bs-target="#pills-watchlist " type="button" role="tab" aria-controls="pills-watchlist " aria-selected="false">
                                        Watch List
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-settings-tab" data-bs-toggle="pill" data-bs-target="#pills-settings" type="button" role="tab" aria-controls="pills-settings" aria-selected="false">
                                        Settings
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="pills-tabContent">
                            <!-- My Listing  -->
                            <div class="tab-pane fade show active" id="pills-my-listing" role="tabpanel" aria-labelledby="pills-my-listing-tab" tabindex="0">
                                <h3 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300" data-aos-offset="0">
                                    Listed {{ $mylistings->count() }} car, Sold 4
                                </h3>
                                <div class="row">
                                    @foreach ($mylistings as $mylisting)
                                        <div class="col-xxl-3 col-lg-4 col-md-6 mt_20" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="0">
                                            <!-- car card  -->
                                            <div class="car--card">
                                                <div class="img--area">
                                                    <img class="w-100" src="{{ asset($mylisting->thumbnail) }}" alt="" />
                                                </div>
                                                <div class="car--info">
                                                    <div class="bid--info">
                                                        <p>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
                                                                <path d="M11.7334 20.4663C6.7677 20.4663 2.74219 16.4408 2.74219 11.4751C2.74219 6.50939 6.7677 2.48389 11.7334 2.48389C16.6991 2.48389 20.7246 6.50939 20.7246 11.4751C20.7246 16.4408 16.6991 20.4663 11.7334 20.4663ZM11.7334 18.6681C15.706 18.6681 18.9264 15.4477 18.9264 11.4751C18.9264 7.50254 15.706 4.28213 11.7334 4.28213C7.76084 4.28213 4.54043 7.50254 4.54043 11.4751C4.54043 15.4477 7.76084 18.6681 11.7334 18.6681ZM12.6325 11.4751H16.229V13.2734H10.8343V6.9795H12.6325V11.4751Z" fill="#141414" />
                                                            </svg>
                                                            {{ (int) now()->diffInDays($mylisting->auctionTime->end_time, false) }} day left
                                                        </p>
                                                        <p>
                                                            <span>Bid</span>
                                                            $ {{ $mylisting->bit_price }}
                                                        </p>
                                                        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="star">
                                                            <path d="M11.245 4.174C11.4765 3.50808 11.5922 3.17513 11.7634 3.08285C11.9115 3.00298 12.0898 3.00298 12.238 3.08285C12.4091 3.17513 12.5248 3.50808 12.7563 4.174L14.2866 8.57639C14.3525 8.76592 14.3854 8.86068 14.4448 8.93125C14.4972 8.99359 14.5641 9.04218 14.6396 9.07278C14.725 9.10743 14.8253 9.10947 15.0259 9.11356L19.6857 9.20852C20.3906 9.22288 20.743 9.23007 20.8837 9.36432C21.0054 9.48051 21.0605 9.65014 21.0303 9.81569C20.9955 10.007 20.7146 10.2199 20.1528 10.6459L16.4387 13.4616C16.2788 13.5829 16.1989 13.6435 16.1501 13.7217C16.107 13.7909 16.0815 13.8695 16.0757 13.9507C16.0692 14.0427 16.0982 14.1387 16.1563 14.3308L17.506 18.7919C17.7101 19.4667 17.8122 19.8041 17.728 19.9793C17.6551 20.131 17.5108 20.2358 17.344 20.2583C17.1513 20.2842 16.862 20.0829 16.2833 19.6802L12.4576 17.0181C12.2929 16.9035 12.2106 16.8462 12.1211 16.8239C12.042 16.8043 11.9593 16.8043 11.8803 16.8239C11.7908 16.8462 11.7084 16.9035 11.5437 17.0181L7.71805 19.6802C7.13937 20.0829 6.85003 20.2842 6.65733 20.2583C6.49056 20.2358 6.34626 20.131 6.27337 19.9793C6.18915 19.8041 6.29123 19.4667 6.49538 18.7919L7.84503 14.3308C7.90313 14.1387 7.93218 14.0427 7.92564 13.9507C7.91986 13.8695 7.89432 13.7909 7.85123 13.7217C7.80246 13.6435 7.72251 13.5829 7.56262 13.4616L3.84858 10.6459C3.28678 10.2199 3.00588 10.007 2.97101 9.81569C2.94082 9.65014 2.99594 9.48051 3.11767 9.36432C3.25831 9.23007 3.61074 9.22289 4.31559 9.20852L8.9754 9.11356C9.176 9.10947 9.27631 9.10743 9.36177 9.07278C9.43726 9.04218 9.50414 8.99359 9.55657 8.93125C9.61593 8.86068 9.64887 8.76592 9.71475 8.57639L11.245 4.174Z" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </div>
                                                    <div class="car--model">
                                                        <a href="{{ route('car.details',['id' => $mylisting->id]) }}">{{ $mylisting->model }}</a>
                                                        <p>
                                                            {{ $mylisting->year }} | {{ $mylisting->mileage }} miles | {{ $mylisting->is_modified == 1 ? " Modified " : " Intake product " }}
                                                        </p>
                                                        <div class="card--footer">
                                                            <p>{{ $mylisting->carCategory->category }} | {{ $mylisting->carTransmission->transmission_type }}</p>
                                                            <a href="{{ route('car.details', ['id' => $mylisting->id]) }}" class="buttonv2 button">Place a Bid</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            {{-- mylist endining --}}

                            <!-- bid history  -->
                            <div class="tab-pane fade" id="pills-bid-history" role="tabpanel" aria-labelledby="pills-bid-history-tab" tabindex="0">
                                <h3>Bid on {{ $my_registrations->count() }} cars, 1 win</h3>
                                <div class="row">
                                 @foreach ($my_registrations as $my_registration)
                                 <div class="col-xxl-3 col-lg-4 col-md-6 mt_20" data-aos="fade-up" data-aos-duration="1000">
                                    <!-- car card  -->
                                    <div class="car--card bid">
                                        <div class="img--area">
                                            <img class="w-100" src="{{ asset( $my_registration->thumbnail) }}" alt="" />
                                        </div>
                                        <div class="car--info">
                                            <div class="bid--info">
                                                <p>3 Bids to $21,000</p>
                                                <p>
                                                    <span>Bid</span>
                                                    $ {{ $my_registration->bit_price }}
                                                </p>
                                            </div>
                                            <div class="car--model">
                                                <a href="{{ route('car.details',['id' => $my_registration->id]) }}">{{ $my_registration->model }}</a>
                                                <p>
                                                    {{ $my_registration->year }} | {{ $my_registration->mileage }} miles | {{ $my_registration->is_modified == 1 ? " Modified " : " Intake product " }}
                                                </p>
                                                <div class="card--footer">
                                                    <p>{{ $my_registration->carCategory->category }} | {{ $my_registration->carTransmission->transmission_type }}</p>
                                                    <a href="{{ route('car.details', ['id' => $my_registration->id]) }}" class="buttonv2 button">Place a Bid</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 @endforeach
{{--
                                    <div class="col-xxl-3 col-lg-4 col-md-6 mt_20" data-aos="fade-up" data-aos-duration="1000">
                                        <!-- car card  -->
                                        <div class="car--card bid winner">
                                            <div class="img--area">
                                                <img class="w-100" src="{{ asset('frontend/assets') }}/images/car12.png" alt="" />
                                            </div>
                                            <div class="car--info">
                                                <div class="bid--info">
                                                    <p>3 Bids to $21,000</p>
                                                    <p>Winner</p>
                                                </div>
                                                <div class="car--model">
                                                    <a href="car-single.html">1987 Renault Alliance GTA Convertible</a>
                                                    <p>
                                                        1 Owner, Dual-Motor AWD, Florida-Owned, Mostly
                                                        Unmodified
                                                    </p>
                                                    <div class="card--footer">
                                                        <p>Fort Lauderdale, FL 33315</p>
                                                        <p>May 4, 2024</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-watchlist" role="tabpanel" aria-labelledby="pills-watchlist-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-xxl-3 col-lg-4 col-md-6 mt_20" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                                        <!-- car card  -->
                                        <div class="car--card">
                                            <div class="img--area">
                                                <img class="w-100" src="{{ asset('frontend/assets') }}/images/car6.png" alt="" />
                                            </div>
                                            <div class="car--info">
                                                <div class="bid--info">
                                                    <p>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
                                                            <path d="M11.7334 20.4663C6.7677 20.4663 2.74219 16.4408 2.74219 11.4751C2.74219 6.50939 6.7677 2.48389 11.7334 2.48389C16.6991 2.48389 20.7246 6.50939 20.7246 11.4751C20.7246 16.4408 16.6991 20.4663 11.7334 20.4663ZM11.7334 18.6681C15.706 18.6681 18.9264 15.4477 18.9264 11.4751C18.9264 7.50254 15.706 4.28213 11.7334 4.28213C7.76084 4.28213 4.54043 7.50254 4.54043 11.4751C4.54043 15.4477 7.76084 18.6681 11.7334 18.6681ZM12.6325 11.4751H16.229V13.2734H10.8343V6.9795H12.6325V11.4751Z" fill="#141414" />
                                                        </svg>
                                                        2 day left
                                                    </p>
                                                    <p>
                                                        <span>Bid</span>
                                                        $10,000
                                                    </p>
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="star">
                                                        <path d="M11.245 4.174C11.4765 3.50808 11.5922 3.17513 11.7634 3.08285C11.9115 3.00298 12.0898 3.00298 12.238 3.08285C12.4091 3.17513 12.5248 3.50808 12.7563 4.174L14.2866 8.57639C14.3525 8.76592 14.3854 8.86068 14.4448 8.93125C14.4972 8.99359 14.5641 9.04218 14.6396 9.07278C14.725 9.10743 14.8253 9.10947 15.0259 9.11356L19.6857 9.20852C20.3906 9.22288 20.743 9.23007 20.8837 9.36432C21.0054 9.48051 21.0605 9.65014 21.0303 9.81569C20.9955 10.007 20.7146 10.2199 20.1528 10.6459L16.4387 13.4616C16.2788 13.5829 16.1989 13.6435 16.1501 13.7217C16.107 13.7909 16.0815 13.8695 16.0757 13.9507C16.0692 14.0427 16.0982 14.1387 16.1563 14.3308L17.506 18.7919C17.7101 19.4667 17.8122 19.8041 17.728 19.9793C17.6551 20.131 17.5108 20.2358 17.344 20.2583C17.1513 20.2842 16.862 20.0829 16.2833 19.6802L12.4576 17.0181C12.2929 16.9035 12.2106 16.8462 12.1211 16.8239C12.042 16.8043 11.9593 16.8043 11.8803 16.8239C11.7908 16.8462 11.7084 16.9035 11.5437 17.0181L7.71805 19.6802C7.13937 20.0829 6.85003 20.2842 6.65733 20.2583C6.49056 20.2358 6.34626 20.131 6.27337 19.9793C6.18915 19.8041 6.29123 19.4667 6.49538 18.7919L7.84503 14.3308C7.90313 14.1387 7.93218 14.0427 7.92564 13.9507C7.91986 13.8695 7.89432 13.7909 7.85123 13.7217C7.80246 13.6435 7.72251 13.5829 7.56262 13.4616L3.84858 10.6459C3.28678 10.2199 3.00588 10.007 2.97101 9.81569C2.94082 9.65014 2.99594 9.48051 3.11767 9.36432C3.25831 9.23007 3.61074 9.22289 4.31559 9.20852L8.9754 9.11356C9.176 9.10947 9.27631 9.10743 9.36177 9.07278C9.43726 9.04218 9.50414 8.99359 9.55657 8.93125C9.61593 8.86068 9.64887 8.76592 9.71475 8.57639L11.245 4.174Z" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                                <div class="car--model">
                                                    <a href="car-single.html">1987 Renault Alliance GTA Convertible</a>
                                                    <p>
                                                        1 Owner, Dual-Motor AWD, Florida-Owned, Mostly
                                                        Unmodified
                                                    </p>
                                                    <div class="card--footer">
                                                        <p>Fort Lauderdale, FL 33315</p>
                                                        <a href="car-single.html" class="buttonv2 button">Place a Bid</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-md-6 mt_20" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                                        <!-- car card  -->
                                        <div class="car--card">
                                            <div class="img--area">
                                                <img class="w-100" src="{{ asset('frontend/assets') }}/images/car10.png" alt="" />
                                            </div>
                                            <div class="car--info">
                                                <div class="bid--info">
                                                    <p>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
                                                            <path d="M11.7334 20.4663C6.7677 20.4663 2.74219 16.4408 2.74219 11.4751C2.74219 6.50939 6.7677 2.48389 11.7334 2.48389C16.6991 2.48389 20.7246 6.50939 20.7246 11.4751C20.7246 16.4408 16.6991 20.4663 11.7334 20.4663ZM11.7334 18.6681C15.706 18.6681 18.9264 15.4477 18.9264 11.4751C18.9264 7.50254 15.706 4.28213 11.7334 4.28213C7.76084 4.28213 4.54043 7.50254 4.54043 11.4751C4.54043 15.4477 7.76084 18.6681 11.7334 18.6681ZM12.6325 11.4751H16.229V13.2734H10.8343V6.9795H12.6325V11.4751Z" fill="#141414" />
                                                        </svg>
                                                        2 day left
                                                    </p>
                                                    <p>
                                                        <span>Bid</span>
                                                        $10,000
                                                    </p>
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="star">
                                                        <path d="M11.245 4.174C11.4765 3.50808 11.5922 3.17513 11.7634 3.08285C11.9115 3.00298 12.0898 3.00298 12.238 3.08285C12.4091 3.17513 12.5248 3.50808 12.7563 4.174L14.2866 8.57639C14.3525 8.76592 14.3854 8.86068 14.4448 8.93125C14.4972 8.99359 14.5641 9.04218 14.6396 9.07278C14.725 9.10743 14.8253 9.10947 15.0259 9.11356L19.6857 9.20852C20.3906 9.22288 20.743 9.23007 20.8837 9.36432C21.0054 9.48051 21.0605 9.65014 21.0303 9.81569C20.9955 10.007 20.7146 10.2199 20.1528 10.6459L16.4387 13.4616C16.2788 13.5829 16.1989 13.6435 16.1501 13.7217C16.107 13.7909 16.0815 13.8695 16.0757 13.9507C16.0692 14.0427 16.0982 14.1387 16.1563 14.3308L17.506 18.7919C17.7101 19.4667 17.8122 19.8041 17.728 19.9793C17.6551 20.131 17.5108 20.2358 17.344 20.2583C17.1513 20.2842 16.862 20.0829 16.2833 19.6802L12.4576 17.0181C12.2929 16.9035 12.2106 16.8462 12.1211 16.8239C12.042 16.8043 11.9593 16.8043 11.8803 16.8239C11.7908 16.8462 11.7084 16.9035 11.5437 17.0181L7.71805 19.6802C7.13937 20.0829 6.85003 20.2842 6.65733 20.2583C6.49056 20.2358 6.34626 20.131 6.27337 19.9793C6.18915 19.8041 6.29123 19.4667 6.49538 18.7919L7.84503 14.3308C7.90313 14.1387 7.93218 14.0427 7.92564 13.9507C7.91986 13.8695 7.89432 13.7909 7.85123 13.7217C7.80246 13.6435 7.72251 13.5829 7.56262 13.4616L3.84858 10.6459C3.28678 10.2199 3.00588 10.007 2.97101 9.81569C2.94082 9.65014 2.99594 9.48051 3.11767 9.36432C3.25831 9.23007 3.61074 9.22289 4.31559 9.20852L8.9754 9.11356C9.176 9.10947 9.27631 9.10743 9.36177 9.07278C9.43726 9.04218 9.50414 8.99359 9.55657 8.93125C9.61593 8.86068 9.64887 8.76592 9.71475 8.57639L11.245 4.174Z" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                                <div class="car--model">
                                                    <a href="car-single.html">1987 Renault Alliance GTA Convertible</a>
                                                    <p>
                                                        1 Owner, Dual-Motor AWD, Florida-Owned, Mostly
                                                        Unmodified
                                                    </p>
                                                    <div class="card--footer">
                                                        <p>Fort Lauderdale, FL 33315</p>
                                                        <a href="car-single.html" class="buttonv2 button">Place a Bid</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-md-6 mt_20" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                                        <!-- car card  -->
                                        <div class="car--card">
                                            <div class="img--area">
                                                <img class="w-100" src="{{ asset('frontend/assets') }}/images/car11.png" alt="" />
                                            </div>
                                            <div class="car--info">
                                                <div class="bid--info">
                                                    <p>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
                                                            <path d="M11.7334 20.4663C6.7677 20.4663 2.74219 16.4408 2.74219 11.4751C2.74219 6.50939 6.7677 2.48389 11.7334 2.48389C16.6991 2.48389 20.7246 6.50939 20.7246 11.4751C20.7246 16.4408 16.6991 20.4663 11.7334 20.4663ZM11.7334 18.6681C15.706 18.6681 18.9264 15.4477 18.9264 11.4751C18.9264 7.50254 15.706 4.28213 11.7334 4.28213C7.76084 4.28213 4.54043 7.50254 4.54043 11.4751C4.54043 15.4477 7.76084 18.6681 11.7334 18.6681ZM12.6325 11.4751H16.229V13.2734H10.8343V6.9795H12.6325V11.4751Z" fill="#141414" />
                                                        </svg>
                                                        2 day left
                                                    </p>
                                                    <p>
                                                        <span>Bid</span>
                                                        $10,000
                                                    </p>
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="star">
                                                        <path d="M11.245 4.174C11.4765 3.50808 11.5922 3.17513 11.7634 3.08285C11.9115 3.00298 12.0898 3.00298 12.238 3.08285C12.4091 3.17513 12.5248 3.50808 12.7563 4.174L14.2866 8.57639C14.3525 8.76592 14.3854 8.86068 14.4448 8.93125C14.4972 8.99359 14.5641 9.04218 14.6396 9.07278C14.725 9.10743 14.8253 9.10947 15.0259 9.11356L19.6857 9.20852C20.3906 9.22288 20.743 9.23007 20.8837 9.36432C21.0054 9.48051 21.0605 9.65014 21.0303 9.81569C20.9955 10.007 20.7146 10.2199 20.1528 10.6459L16.4387 13.4616C16.2788 13.5829 16.1989 13.6435 16.1501 13.7217C16.107 13.7909 16.0815 13.8695 16.0757 13.9507C16.0692 14.0427 16.0982 14.1387 16.1563 14.3308L17.506 18.7919C17.7101 19.4667 17.8122 19.8041 17.728 19.9793C17.6551 20.131 17.5108 20.2358 17.344 20.2583C17.1513 20.2842 16.862 20.0829 16.2833 19.6802L12.4576 17.0181C12.2929 16.9035 12.2106 16.8462 12.1211 16.8239C12.042 16.8043 11.9593 16.8043 11.8803 16.8239C11.7908 16.8462 11.7084 16.9035 11.5437 17.0181L7.71805 19.6802C7.13937 20.0829 6.85003 20.2842 6.65733 20.2583C6.49056 20.2358 6.34626 20.131 6.27337 19.9793C6.18915 19.8041 6.29123 19.4667 6.49538 18.7919L7.84503 14.3308C7.90313 14.1387 7.93218 14.0427 7.92564 13.9507C7.91986 13.8695 7.89432 13.7909 7.85123 13.7217C7.80246 13.6435 7.72251 13.5829 7.56262 13.4616L3.84858 10.6459C3.28678 10.2199 3.00588 10.007 2.97101 9.81569C2.94082 9.65014 2.99594 9.48051 3.11767 9.36432C3.25831 9.23007 3.61074 9.22289 4.31559 9.20852L8.9754 9.11356C9.176 9.10947 9.27631 9.10743 9.36177 9.07278C9.43726 9.04218 9.50414 8.99359 9.55657 8.93125C9.61593 8.86068 9.64887 8.76592 9.71475 8.57639L11.245 4.174Z" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                                <div class="car--model">
                                                    <a href="#">1987 Renault Alliance GTA Convertible</a>
                                                    <p>
                                                        1 Owner, Dual-Motor AWD, Florida-Owned, Mostly
                                                        Unmodified
                                                    </p>
                                                    <div class="card--footer">
                                                        <p>Fort Lauderdale, FL 33315</p>
                                                        <a href="#" class="buttonv2 button">Place a Bid</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-md-6 mt_20" data-aos="fade-up" data-aos-duration="1000">
                                        <!-- car card  -->
                                        <div class="car--card">
                                            <div class="img--area">
                                                <img class="w-100" src="{{ asset('frontend/assets') }}/images/car8.png" alt="" />
                                            </div>
                                            <div class="car--info">
                                                <div class="bid--info">
                                                    <p>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
                                                            <path d="M11.7334 20.4663C6.7677 20.4663 2.74219 16.4408 2.74219 11.4751C2.74219 6.50939 6.7677 2.48389 11.7334 2.48389C16.6991 2.48389 20.7246 6.50939 20.7246 11.4751C20.7246 16.4408 16.6991 20.4663 11.7334 20.4663ZM11.7334 18.6681C15.706 18.6681 18.9264 15.4477 18.9264 11.4751C18.9264 7.50254 15.706 4.28213 11.7334 4.28213C7.76084 4.28213 4.54043 7.50254 4.54043 11.4751C4.54043 15.4477 7.76084 18.6681 11.7334 18.6681ZM12.6325 11.4751H16.229V13.2734H10.8343V6.9795H12.6325V11.4751Z" fill="#141414" />
                                                        </svg>
                                                        2 day left
                                                    </p>
                                                    <p>
                                                        <span>Bid</span>
                                                        $10,000
                                                    </p>
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="star">
                                                        <path d="M11.245 4.174C11.4765 3.50808 11.5922 3.17513 11.7634 3.08285C11.9115 3.00298 12.0898 3.00298 12.238 3.08285C12.4091 3.17513 12.5248 3.50808 12.7563 4.174L14.2866 8.57639C14.3525 8.76592 14.3854 8.86068 14.4448 8.93125C14.4972 8.99359 14.5641 9.04218 14.6396 9.07278C14.725 9.10743 14.8253 9.10947 15.0259 9.11356L19.6857 9.20852C20.3906 9.22288 20.743 9.23007 20.8837 9.36432C21.0054 9.48051 21.0605 9.65014 21.0303 9.81569C20.9955 10.007 20.7146 10.2199 20.1528 10.6459L16.4387 13.4616C16.2788 13.5829 16.1989 13.6435 16.1501 13.7217C16.107 13.7909 16.0815 13.8695 16.0757 13.9507C16.0692 14.0427 16.0982 14.1387 16.1563 14.3308L17.506 18.7919C17.7101 19.4667 17.8122 19.8041 17.728 19.9793C17.6551 20.131 17.5108 20.2358 17.344 20.2583C17.1513 20.2842 16.862 20.0829 16.2833 19.6802L12.4576 17.0181C12.2929 16.9035 12.2106 16.8462 12.1211 16.8239C12.042 16.8043 11.9593 16.8043 11.8803 16.8239C11.7908 16.8462 11.7084 16.9035 11.5437 17.0181L7.71805 19.6802C7.13937 20.0829 6.85003 20.2842 6.65733 20.2583C6.49056 20.2358 6.34626 20.131 6.27337 19.9793C6.18915 19.8041 6.29123 19.4667 6.49538 18.7919L7.84503 14.3308C7.90313 14.1387 7.93218 14.0427 7.92564 13.9507C7.91986 13.8695 7.89432 13.7909 7.85123 13.7217C7.80246 13.6435 7.72251 13.5829 7.56262 13.4616L3.84858 10.6459C3.28678 10.2199 3.00588 10.007 2.97101 9.81569C2.94082 9.65014 2.99594 9.48051 3.11767 9.36432C3.25831 9.23007 3.61074 9.22289 4.31559 9.20852L8.9754 9.11356C9.176 9.10947 9.27631 9.10743 9.36177 9.07278C9.43726 9.04218 9.50414 8.99359 9.55657 8.93125C9.61593 8.86068 9.64887 8.76592 9.71475 8.57639L11.245 4.174Z" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                                <div class="car--model">
                                                    <a href="car-single.html">1987 Renault Alliance GTA Convertible</a>
                                                    <p>
                                                        1 Owner, Dual-Motor AWD, Florida-Owned, Mostly
                                                        Unmodified
                                                    </p>
                                                    <div class="card--footer">
                                                        <p>Fort Lauderdale, FL 33315</p>
                                                        <a href="car-single.html" class="buttonv2 button">Place a Bid</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-md-6 mt_20" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                                        <!-- car card  -->
                                        <div class="car--card">
                                            <div class="img--area">
                                                <img class="w-100" src="{{ asset('frontend/assets') }}/images/car13.png" alt="" />
                                            </div>
                                            <div class="car--info">
                                                <div class="bid--info">
                                                    <p>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
                                                            <path d="M11.7334 20.4663C6.7677 20.4663 2.74219 16.4408 2.74219 11.4751C2.74219 6.50939 6.7677 2.48389 11.7334 2.48389C16.6991 2.48389 20.7246 6.50939 20.7246 11.4751C20.7246 16.4408 16.6991 20.4663 11.7334 20.4663ZM11.7334 18.6681C15.706 18.6681 18.9264 15.4477 18.9264 11.4751C18.9264 7.50254 15.706 4.28213 11.7334 4.28213C7.76084 4.28213 4.54043 7.50254 4.54043 11.4751C4.54043 15.4477 7.76084 18.6681 11.7334 18.6681ZM12.6325 11.4751H16.229V13.2734H10.8343V6.9795H12.6325V11.4751Z" fill="#141414" />
                                                        </svg>
                                                        2 day left
                                                    </p>
                                                    <p>
                                                        <span>Bid</span>
                                                        $10,000
                                                    </p>
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="star">
                                                        <path d="M11.245 4.174C11.4765 3.50808 11.5922 3.17513 11.7634 3.08285C11.9115 3.00298 12.0898 3.00298 12.238 3.08285C12.4091 3.17513 12.5248 3.50808 12.7563 4.174L14.2866 8.57639C14.3525 8.76592 14.3854 8.86068 14.4448 8.93125C14.4972 8.99359 14.5641 9.04218 14.6396 9.07278C14.725 9.10743 14.8253 9.10947 15.0259 9.11356L19.6857 9.20852C20.3906 9.22288 20.743 9.23007 20.8837 9.36432C21.0054 9.48051 21.0605 9.65014 21.0303 9.81569C20.9955 10.007 20.7146 10.2199 20.1528 10.6459L16.4387 13.4616C16.2788 13.5829 16.1989 13.6435 16.1501 13.7217C16.107 13.7909 16.0815 13.8695 16.0757 13.9507C16.0692 14.0427 16.0982 14.1387 16.1563 14.3308L17.506 18.7919C17.7101 19.4667 17.8122 19.8041 17.728 19.9793C17.6551 20.131 17.5108 20.2358 17.344 20.2583C17.1513 20.2842 16.862 20.0829 16.2833 19.6802L12.4576 17.0181C12.2929 16.9035 12.2106 16.8462 12.1211 16.8239C12.042 16.8043 11.9593 16.8043 11.8803 16.8239C11.7908 16.8462 11.7084 16.9035 11.5437 17.0181L7.71805 19.6802C7.13937 20.0829 6.85003 20.2842 6.65733 20.2583C6.49056 20.2358 6.34626 20.131 6.27337 19.9793C6.18915 19.8041 6.29123 19.4667 6.49538 18.7919L7.84503 14.3308C7.90313 14.1387 7.93218 14.0427 7.92564 13.9507C7.91986 13.8695 7.89432 13.7909 7.85123 13.7217C7.80246 13.6435 7.72251 13.5829 7.56262 13.4616L3.84858 10.6459C3.28678 10.2199 3.00588 10.007 2.97101 9.81569C2.94082 9.65014 2.99594 9.48051 3.11767 9.36432C3.25831 9.23007 3.61074 9.22289 4.31559 9.20852L8.9754 9.11356C9.176 9.10947 9.27631 9.10743 9.36177 9.07278C9.43726 9.04218 9.50414 8.99359 9.55657 8.93125C9.61593 8.86068 9.64887 8.76592 9.71475 8.57639L11.245 4.174Z" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                                <div class="car--model">
                                                    <a href="car-single.html">1987 Renault Alliance GTA Convertible</a>
                                                    <p>
                                                        1 Owner, Dual-Motor AWD, Florida-Owned, Mostly
                                                        Unmodified
                                                    </p>
                                                    <div class="card--footer">
                                                        <p>Fort Lauderdale, FL 33315</p>
                                                        <a href="car-single.html" class="buttonv2 button">Place a Bid</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-md-6 mt_20" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                                        <!-- car card  -->
                                        <div class="car--card">
                                            <div class="img--area">
                                                <img class="w-100" src="{{ asset('frontend/assets') }}/images/car7.png" alt="" />
                                            </div>
                                            <div class="car--info">
                                                <div class="bid--info">
                                                    <p>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
                                                            <path d="M11.7334 20.4663C6.7677 20.4663 2.74219 16.4408 2.74219 11.4751C2.74219 6.50939 6.7677 2.48389 11.7334 2.48389C16.6991 2.48389 20.7246 6.50939 20.7246 11.4751C20.7246 16.4408 16.6991 20.4663 11.7334 20.4663ZM11.7334 18.6681C15.706 18.6681 18.9264 15.4477 18.9264 11.4751C18.9264 7.50254 15.706 4.28213 11.7334 4.28213C7.76084 4.28213 4.54043 7.50254 4.54043 11.4751C4.54043 15.4477 7.76084 18.6681 11.7334 18.6681ZM12.6325 11.4751H16.229V13.2734H10.8343V6.9795H12.6325V11.4751Z" fill="#141414" />
                                                        </svg>
                                                        2 day left
                                                    </p>
                                                    <p>
                                                        <span>Bid</span>
                                                        $10,000
                                                    </p>
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="star">
                                                        <path d="M11.245 4.174C11.4765 3.50808 11.5922 3.17513 11.7634 3.08285C11.9115 3.00298 12.0898 3.00298 12.238 3.08285C12.4091 3.17513 12.5248 3.50808 12.7563 4.174L14.2866 8.57639C14.3525 8.76592 14.3854 8.86068 14.4448 8.93125C14.4972 8.99359 14.5641 9.04218 14.6396 9.07278C14.725 9.10743 14.8253 9.10947 15.0259 9.11356L19.6857 9.20852C20.3906 9.22288 20.743 9.23007 20.8837 9.36432C21.0054 9.48051 21.0605 9.65014 21.0303 9.81569C20.9955 10.007 20.7146 10.2199 20.1528 10.6459L16.4387 13.4616C16.2788 13.5829 16.1989 13.6435 16.1501 13.7217C16.107 13.7909 16.0815 13.8695 16.0757 13.9507C16.0692 14.0427 16.0982 14.1387 16.1563 14.3308L17.506 18.7919C17.7101 19.4667 17.8122 19.8041 17.728 19.9793C17.6551 20.131 17.5108 20.2358 17.344 20.2583C17.1513 20.2842 16.862 20.0829 16.2833 19.6802L12.4576 17.0181C12.2929 16.9035 12.2106 16.8462 12.1211 16.8239C12.042 16.8043 11.9593 16.8043 11.8803 16.8239C11.7908 16.8462 11.7084 16.9035 11.5437 17.0181L7.71805 19.6802C7.13937 20.0829 6.85003 20.2842 6.65733 20.2583C6.49056 20.2358 6.34626 20.131 6.27337 19.9793C6.18915 19.8041 6.29123 19.4667 6.49538 18.7919L7.84503 14.3308C7.90313 14.1387 7.93218 14.0427 7.92564 13.9507C7.91986 13.8695 7.89432 13.7909 7.85123 13.7217C7.80246 13.6435 7.72251 13.5829 7.56262 13.4616L3.84858 10.6459C3.28678 10.2199 3.00588 10.007 2.97101 9.81569C2.94082 9.65014 2.99594 9.48051 3.11767 9.36432C3.25831 9.23007 3.61074 9.22289 4.31559 9.20852L8.9754 9.11356C9.176 9.10947 9.27631 9.10743 9.36177 9.07278C9.43726 9.04218 9.50414 8.99359 9.55657 8.93125C9.61593 8.86068 9.64887 8.76592 9.71475 8.57639L11.245 4.174Z" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                                <div class="car--model">
                                                    <a href="car-single.html">1987 Renault Alliance GTA Convertible</a>
                                                    <p>
                                                        1 Owner, Dual-Motor AWD, Florida-Owned, Mostly
                                                        Unmodified
                                                    </p>
                                                    <div class="card--footer">
                                                        <p>Fort Lauderdale, FL 33315</p>
                                                        <a href="car-single.html" class="buttonv2 button">Place a Bid</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-md-6 mt_20" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                                        <!-- car card  -->
                                        <div class="car--card">
                                            <div class="img--area">
                                                <img class="w-100" src="{{ asset('frontend/assets') }}/images/car14.png" alt="" />
                                            </div>
                                            <div class="car--info">
                                                <div class="bid--info">
                                                    <p>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
                                                            <path d="M11.7334 20.4663C6.7677 20.4663 2.74219 16.4408 2.74219 11.4751C2.74219 6.50939 6.7677 2.48389 11.7334 2.48389C16.6991 2.48389 20.7246 6.50939 20.7246 11.4751C20.7246 16.4408 16.6991 20.4663 11.7334 20.4663ZM11.7334 18.6681C15.706 18.6681 18.9264 15.4477 18.9264 11.4751C18.9264 7.50254 15.706 4.28213 11.7334 4.28213C7.76084 4.28213 4.54043 7.50254 4.54043 11.4751C4.54043 15.4477 7.76084 18.6681 11.7334 18.6681ZM12.6325 11.4751H16.229V13.2734H10.8343V6.9795H12.6325V11.4751Z" fill="#141414" />
                                                        </svg>
                                                        2 day left
                                                    </p>
                                                    <p>
                                                        <span>Bid</span>
                                                        $10,000
                                                    </p>
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="star">
                                                        <path d="M11.245 4.174C11.4765 3.50808 11.5922 3.17513 11.7634 3.08285C11.9115 3.00298 12.0898 3.00298 12.238 3.08285C12.4091 3.17513 12.5248 3.50808 12.7563 4.174L14.2866 8.57639C14.3525 8.76592 14.3854 8.86068 14.4448 8.93125C14.4972 8.99359 14.5641 9.04218 14.6396 9.07278C14.725 9.10743 14.8253 9.10947 15.0259 9.11356L19.6857 9.20852C20.3906 9.22288 20.743 9.23007 20.8837 9.36432C21.0054 9.48051 21.0605 9.65014 21.0303 9.81569C20.9955 10.007 20.7146 10.2199 20.1528 10.6459L16.4387 13.4616C16.2788 13.5829 16.1989 13.6435 16.1501 13.7217C16.107 13.7909 16.0815 13.8695 16.0757 13.9507C16.0692 14.0427 16.0982 14.1387 16.1563 14.3308L17.506 18.7919C17.7101 19.4667 17.8122 19.8041 17.728 19.9793C17.6551 20.131 17.5108 20.2358 17.344 20.2583C17.1513 20.2842 16.862 20.0829 16.2833 19.6802L12.4576 17.0181C12.2929 16.9035 12.2106 16.8462 12.1211 16.8239C12.042 16.8043 11.9593 16.8043 11.8803 16.8239C11.7908 16.8462 11.7084 16.9035 11.5437 17.0181L7.71805 19.6802C7.13937 20.0829 6.85003 20.2842 6.65733 20.2583C6.49056 20.2358 6.34626 20.131 6.27337 19.9793C6.18915 19.8041 6.29123 19.4667 6.49538 18.7919L7.84503 14.3308C7.90313 14.1387 7.93218 14.0427 7.92564 13.9507C7.91986 13.8695 7.89432 13.7909 7.85123 13.7217C7.80246 13.6435 7.72251 13.5829 7.56262 13.4616L3.84858 10.6459C3.28678 10.2199 3.00588 10.007 2.97101 9.81569C2.94082 9.65014 2.99594 9.48051 3.11767 9.36432C3.25831 9.23007 3.61074 9.22289 4.31559 9.20852L8.9754 9.11356C9.176 9.10947 9.27631 9.10743 9.36177 9.07278C9.43726 9.04218 9.50414 8.99359 9.55657 8.93125C9.61593 8.86068 9.64887 8.76592 9.71475 8.57639L11.245 4.174Z" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                                <div class="car--model">
                                                    <a href="car-single.html">1987 Renault Alliance GTA Convertible</a>
                                                    <p>
                                                        1 Owner, Dual-Motor AWD, Florida-Owned, Mostly
                                                        Unmodified
                                                    </p>
                                                    <div class="card--footer">
                                                        <p>Fort Lauderdale, FL 33315</p>
                                                        <a href="car-single.html" class="buttonv2 button">Place a Bid</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-settings" role="tabpanel" aria-labelledby="pills-settings-tab" tabindex="0">
                                <form id="UserPublicInformation">
                                    <!-- public info  -->
                                    <div class="public--info mt_35">
                                        <h5>Public Info</h5>
                                        <!-- box--info  -->
                                        <div class="box--info">
                                            <div class="row">
                                                <div class="col-md-4 mt_25">
                                                    <div class="input--group">
                                                        <label for="fname">Full Name</label>
                                                        <input type="text" id="fname" name="full_name" placeholder="Rafi Ahmed" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt_25">
                                                    <div class="input--group">
                                                        <label for="number">Contact Number</label>
                                                        <input type="tel" id="number" name="contact_number" placeholder="Phone No"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt_25">
                                                    <div class="input--group">
                                                        <label for="address">Address</label>
                                                        <input type="text" name="address" id="address" placeholder="Adress" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt_25">
                                                    <div class="input--group">
                                                        <label for="bio">Biography</label>
                                                        <textarea id="bio" name="biography" placeholder="Tell Something about yourself"></textarea>
                                                    </div>
                                                    <div class="buttons mt_30">
                                                        <button type="submit" class="button">Save Changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form id="UserPrivateInformation">
                                    <!-- private info  -->
                                    <div class="private--info mt_35">
                                        <h5>Private Info</h5>
                                        <!-- box--info  -->
                                        <div class="box--info">
                                            <div class="row">
                                                <div class="col-md-6 mt_25">
                                                    <div class="input--group">
                                                        <label for="email">Email Address</label>
                                                        <input type="text" id="email" placeholder="enter your email" name="email" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt_25">
                                                    <div class="input--group">
                                                        <label for="password">Password</label>
                                                        <div class="feild">
                                                            <input type="password" id="password" placeholder="Set your password" name="password" />
                                                            <svg class="eye" xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 20 18" fill="none">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.80327 12.2526C8.42774 12.6759 9.18882 12.9319 9.99868 12.9319C12.1453 12.9319 13.8919 11.1696 13.8919 9.00369C13.8919 8.18655 13.6382 7.41863 13.2186 6.78855L12.1551 7.86166C12.3307 8.1964 12.4283 8.5902 12.4283 9.00369C12.4283 10.3525 11.3354 11.4551 9.99868 11.4551C9.58887 11.4551 9.19858 11.3567 8.86683 11.1795L7.80327 12.2526ZM16.4288 3.54952C17.8436 4.84907 19.0438 6.60149 19.9415 8.70834C20.0195 8.8954 20.0195 9.11199 19.9415 9.2892C17.8534 14.1921 14.1358 17.1259 9.99868 17.1259H9.98893C8.10575 17.1259 6.30063 16.5056 4.71018 15.3735L2.81725 17.2834C2.67089 17.4311 2.4855 17.5 2.30011 17.5C2.11472 17.5 1.91957 17.4311 1.78297 17.2834C1.53903 17.0373 1.5 16.6435 1.69515 16.358L1.72442 16.3186L16.1556 1.75771C16.1751 1.73802 16.1946 1.71833 16.2044 1.69864L16.2044 1.69863C16.2239 1.67894 16.2434 1.65925 16.2532 1.63957L17.1704 0.714131C17.4631 0.428623 17.9217 0.428623 18.2046 0.714131C18.4974 0.999638 18.4974 1.4722 18.2046 1.75771L16.4288 3.54952ZM6.09836 9.00753C6.09836 9.2635 6.12764 9.51948 6.16667 9.75576L2.55643 13.3984C1.5807 12.2564 0.731804 10.8781 0.0585443 9.29304C-0.0195148 9.11583 -0.0195148 8.89924 0.0585443 8.71218C2.14662 3.80933 5.86419 0.885337 9.99156 0.885337H10.0013C11.3966 0.885337 12.7529 1.22007 14.0018 1.85015L10.7429 5.13841C10.5087 5.09903 10.255 5.0695 10.0013 5.0695C7.84494 5.0695 6.09836 6.83177 6.09836 9.00753Z" fill="#97A0AF" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 mt_25">
                                                    <div class="input--group">
                                                        <label for="city">City</label>
                                                        <input type="text" id="city" placeholder="Enter city" name="city" />
                                                    </div>
                                                </div>
                                                <div class="col-md-5 mt_25">
                                                    <div class="input--group">
                                                        <label for="state">State</label>
                                                        <select id="state" name="state">
                                                            <option value="New York" selected>New York</option>
                                                            <option value="Texas">Texas</option>
                                                            <option value="Texas">Texas</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 mt_25">
                                                    <div class="input--group">
                                                        <label for="zip">Zip Code</label>
                                                        <input type="number" id="zip" placeholder="Zip code" name="zip_code"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="buttons mt_30">
                                                        <button type="submit" class="button">Save Changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div class="delete--button">
                                    <button class="button" id="DeleteAccount"> Delete Account </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Profile History Area :: End  -->
</main>
@endsection


@push('scripts')
<script>
    $(document).ready(function() {

        $('#UploadProfileForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            // alert(formData);
            $.ajax({
                url: "{{ route('user.store.profile') }}"
                , type: 'POST'
                , data: formData
                , success: function(response) {
                    console.log(response);
                    if (response) {
                        image = response.image;

                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                }
                , cache: false
                , contentType: false
                , processData: false
            });
        });
        $('#upload').change(function() {
            $('#UploadProfileForm').submit();
        });

        $('#UserPublicInformation').submit(function(event){
            event.preventDefault();
            let formData = $(this).serialize();
            $.ajax({
                url: "{{ route('store.user.public.information') }}"
                , type: 'POST'
                , data: formData
                , success: function(response) {
                    if (response) {
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                }
            });
        });

        $.ajax({
            url: "{{ route('get.user.public.information') }}"
            , type: 'GET'
            , success: function(response) {
                console.log(response.data);
                if (response.status) {
                    $('#fname').val(response.data.full_name);
                    $('#UserName').text(response.data.full_name);
                    $('#number').val(response.data.contact_number);
                    $('#userContactNumber').text(response.data.contact_number);
                    $('#address').val(response.data.address);
                    $('#userAddress').text(response.data.address);
                    $('#bio').val(response.data.biography);
                    $('#UserBioGraphy').text(response.data.biography);
                }
            }
        });

        $('#UserPrivateInformation').submit(function(event){
            event.preventDefault();
            let formData = $(this).serialize();
            $.ajax({
                url: "{{ route('store.user.private.information') }}"
                , type: 'POST'
                , data: formData
                , success: function(response) {
                    if (response) {
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                }
            });
        });

        $.ajax({
            url: "{{ route('get.user.private.information') }}"
            , type: 'GET'
            , success: function(response) {
                console.log(response.data);
                if (response.status) {
                    $('#email').val(response.data.email);
                    $('#city').val(response.data.city);
                    $('#zip').val(response.data.zip_code);
                    $('#state').val(response.data.state).niceSelect('update');
                }
            }
        });

        $('#DeleteAccount').click(function(event){
            event.preventDefault();
            $.ajax({
                url: "{{ route('delete.user.account') }}"
                , type: 'DELETE'
                , success: function(response) {
                    if (response) {
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                }
            });
        });
    });

</script>
@endpush
