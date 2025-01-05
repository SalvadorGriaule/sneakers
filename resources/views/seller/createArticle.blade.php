@include('template.header', ['title' => "création d'article"])
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
        <form action="/seller/createArticle" method="post" enctype="multipart/form-data" class="flex space-x-3 mb-2">
            @csrf
            <fieldset
                class="border-2 border-solid border-black p-2 flex justify-center items-center space-y-2 flex-col w-2/3">
                <legend class="text-2xl">Image</legend>
                <div id="app"></div>
                @vite('resources/js/Componants/Svelte/imageUploader/imageUploader/imageUploader.js')
            </fieldset>
            <fieldset
                class="border-2 border-solid border-black p-2 flex justify-center items-center space-y-2 flex-col w-2/3">
                <legend class="text-2xl">Information relative au produit</legend>
                <input class="border-2 border-gray-500 border-solid p-1 placeholder:text-center w-2/3" type="text"
                    name="name" placeholder="name" value="{{ old('name') }}">
                <input class="border-2 border-gray-500 border-solid p-1 placeholder:text-center w-2/3" type="textarea"
                    name="description" placeholder="description" value="{{ old('description') }}">
                <input class="border-2 border-gray-500 border-solid p-1 placeholder:text-center w-2/3" type="number"
                    name="price" placeholder="prix" value="{{ old('price') }}">
                <input class="border-2 border-gray-500 border-solid p-1 placeholder:text-center w-2/3" type="number"
                    name="quantité" placeholder="quantité" value="{{ old('quantité') }}">
                <label for="category">Choisir une categorie ou plus</label>
                @isset($catg[0])
                    <div id="app2" class="w-2/3"></div>
                    @vite('resources/js/Componants/Svelte/multiSelect/multiSelect/multiSelect.js')
                @endisset
                @empty($catg[0])
                    <p>Pas de catégories disponible</p>
                @endempty
                <input class="bg-orange-500 rounded-lg text-white p-1 w-fit cursor-pointer" name="createArticle"
                    type="submit" value="Créer">
            </fieldset>
        </form>
    </div>
    {{-- <div>
        <h3>Zone de test</h3>

    </div> --}}
</main>
@include('template.footer')
