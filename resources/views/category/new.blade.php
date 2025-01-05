@include('template.header', ['title' => 'nouveauté'])
<main>
    <div>
        @foreach ($new as $item)
            <div class="article">
                <div class="imgart"><img src="{{ asset('storage/'.$item["image"]) }}" alt=""></div>
                <div class="contentart">
                    <h2>SNEAKER COMPANY</h2>
                    <h3>{{ $item["name"] }}</h3>
                    <p>{{ $item["description"] }}</p>
                    <div class="price">
                        <div class="priceFirst">
                            <h2>${{ $item["price"] }}</h2>
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
        @endforeach
    </div>
</main>
@include('template.footer')
