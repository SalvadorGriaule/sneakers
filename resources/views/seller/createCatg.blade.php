@include('template.header', ['title' => "création de catégorie"])
<main>
    <h2 class="text-center">Création d'article</h2>
    @if ($errors->any())
        <div class="bg-red-600 text-white p-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div>
        <form action="/seller/createCategory" method="post" class="flex space-x-3 mb-2">
            @csrf
            <input class="border-2 border-gray-500 border-solid p-1 placeholder:text-center w-2/3" type="text"
                name="name" placeholder="name" value="{{ old('name') }}">
            @isset($catg[0])
                <select name="category_id" id="">
                    <option value="">Aucun</option>
                    @foreach ($catg as $item)
                        <option name="category_id" value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                    @endforeach
                </select>
            @endisset
            @empty($catg[0])
                <p>Pas de categories disponibles</p>                
            @endempty
            <input class="bg-orange-500 rounded-lg text-white p-1 w-fit cursor-pointer" name="createCatg" type="submit"
                value="Créer">
        </form>
    </div>
</main>
@include('template.footer')
