@include("template.header",["title" => "login"])
    <main class="w-full flex flex-col justify-center items-center m-0">
        @if ($errors->any())
            <div class="bg-red-600 text-white p-2">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="p-2 rounded-md shadow-2xl my-2 w-4/5 lg:w-1/2">
            <form class="flex flex-col space-y-2" action="" method="POST">
                @csrf
                <input class="border-2 border-gray-500 border-solid p-1 placeholder:text-center" type="email" placeholder="email" name="email" id="">
                <input class="border-2 border-gray-500 border-solid p-1 placeholder:text-center" type="password" placeholder="password" name="password" id="">
                <input type="submit" value="Envoyer">
            </form>
        </div>
        <p>Pas de compte ? <a class="text-orange-600 underline" href="/sign">Inscrivez-vous</a></p>
    </main>
@include("template.footer")
