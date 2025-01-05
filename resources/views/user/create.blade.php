@include('template.header', ['title' => 'Signin'])
<main class="w-full flex justify-center items-center m-0">
    @if ($errors->any())
        <div class="bg-red-600 text-white">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="p-2 rounded-md shadow-2xl my-2 w-4/5 lg:w-1/2">
        <form class="flex flex-col space-y-2" action="/sign" method="POST">
            @csrf
            <input class="border-2 border-gray-500 border-solid p-1 placeholder:text-center" type="text"
                value="{{ old('pseudo') }}" placeholder="pseudo" name="pseudo">
            <input class="border-2 border-gray-500 border-solid p-1 placeholder:text-center" type="email"
                value="{{ old('email') }}" placeholder="email" name="email" id="">
            <input class="border-2 border-gray-500 border-solid p-1 placeholder:text-center" type="password"
                placeholder="password" name="password" id="">
            <input class="bg-orange-500 rounded-lg text-white p-1 w-fit cursor-pointer" type="submit" value="Envoyer">
        </form>
    </div>
</main>
@include('template.footer')
