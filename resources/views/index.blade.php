@include('template.header',["title" => "Sneakers"])
    <!-- main -->
    <main>

        <div class="article">
            <div class="imgart"><img src="{{ asset("storage/img/sneakers1.jpg")}}" alt=""></div>
            <div class="contentart">
                <h2>SNEAKER COMPANY</h2>
                <h3>Fall Limited Edition Sneakers</h3>
                <p>These low-profile sneakers are your perfect casual wear companion. Featuring a durable rubber outer
                    sole, they’ll withstand everything the weather can offer.</p>
                <div class="price">
                    <div class="priceFirst">
                        <h2>$125.00</h2>
                        <h3>50%</h3>
                    </div>
                    <h3>$250.00</h3>
                </div>
                <div class="inpPrice">
                    <input type="button" value="-">
                    <p>0</p>
                    <input type="button" value="+">
                </div>
                <button>
                    <div><i class="fa-solid fa-cart-shopping"></i></div>Add to Cart
                </button>
            </div>
        </div>

        <div class="article">
            <div class="imgart"><img src="{{ asset("storage/img/sneakers2.jpg")}}" alt=""></div>
            <div class="contentart">
                <h2>SNEAKER COMPANY</h2>
                <h3>Fall Limited Edition Sneakers</h3>
                <p>These low-profile sneakers are your perfect casual wear companion. Featuring a durable rubber outer
                    sole, they’ll withstand everything the weather can offer.</p>
                <div class="price">
                    <div class="priceFirst">
                        <h2>$125.00</h2>
                        <h3>50%</h3>
                    </div>
                    <h3>$250.00</h3>
                </div>
                <div class="inpPrice">
                    <input type="button" value="-">
                    <p>0</p>
                    <input type="button" value="+">
                </div>
                <button>
                    <div><i class="fa-solid fa-cart-shopping"></i></div>Add to Cart
                </button>
            </div>
        </div>

        <div class="article">
            <div class="imgart"><img src="{{ asset("storage/img/sneakers3.jpg")}}" alt=""></div>
            <div class="contentart">
                <h2>SNEAKER COMPANY</h2>
                <h3>Fall Limited Edition Sneakers</h3>
                <p>These low-profile sneakers are your perfect casual wear companion. Featuring a durable rubber outer
                    sole, they’ll withstand everything the weather can offer.</p>
                <div class="price">
                    <div class="priceFirst">
                        <h2>$125.00</h2>
                        <h3>50%</h3>
                    </div>
                    <h3>$250.00</h3>
                </div>
                <div class="inpPrice">
                    <input type="button" value="-">
                    <p>0</p>
                    <input type="button" value="+">
                </div>
                <button>
                    <div><i class="fa-solid fa-cart-shopping"></i></div>Add to Cart
                </button>
            </div>
    </main>
    <!-- footer -->
@include('template.footer')
