@include('template.header', ['title' => 'tableau de bord pour employer'])

<main>
    <h2>Dashboard</h2>
    <div class="flex flex-col">
        @foreach ($product as $item)
            <a href="editArticle/{{ $item['id'] }}">
                <div class="flex border-2 border-black border-solid space-x-2 items-center">
                    <div class="w-48"><img src='{{ asset('storage/' . $item['image']) }}' alt=""></div>
                    <div>{{ $item['name'] }}</div>
                    <div>{{ $item['description'] }}</div>
                    <div>{{ $item['price'] }}</div>
                    <div>{{ $item['quantité'] }}</div>
                    @if (count($item['listCategory']) > 0)
                        <div>{{ $item['listCategory'][0]->name }}</div>
                    @else
                        <p>Pas de catégorie</p>
                    @endif
                </div>
            </a>
        @endforeach
    </div>
</main>

@include('template.footer')
