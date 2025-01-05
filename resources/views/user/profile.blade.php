@include('template.header', ['title' => 'profile'])
<main>
    <div>
        @session('raw')
            <p>{{ $value }}</p>
        @endsession
        @if ( $info['role'] === "seller")
            <ul>
                <li><a href="seller/dashboard">Dashboard</a></li>
                <li><a href="seller/createArticle">Crée un produit</a></li>
                <li><a href="seller/createCategory">Crée une catégorie</a></li>
            </ul>
        @endif
        <fieldset class="border-2 border-solid border-black p-2 flex">
            <legend class="text-2xl">Vos informations</legend>
            <div>
                @isset($info['avatar'])
                    <div class="rounded-full overflow-hidden w-72 h-72 flex justify-center items-center bg-cover bg-center" style="background-image: url({{ asset('storage/'.$info["avatar"])}})"></div>
                @endisset
                @empty($info['avatar'])
                    <div><img src="{{ asset('storage/img/user.svg') }}" alt=""></div>
                @endempty
                <p class="text-center text-xl font-semibold">{{ $info['name'] }}</p>
            </div>
            <div class="flex flex-col justify-center ml-4 space-y-2">
                <p>email: {{ $info['email'] }}</p>
                <a href="/profile/edit">modifier votre profile</a>
            </div>
        </fieldset>
    </div>
</main>
@include('template.footer')
