@include('template.header', ['title' => 'profile'])
<main class="flex justify-center">
    <div class="p-2 rounded-md shadow-2xl my-2 w-full">
        <fieldset class="border-2 border-solid border-black p-2 flex justify-center">
            <legend class="text-2xl">Email</legend>
            <form action="/profile/edit" method="POST" class="flex flex-col items-center space-y-2 mb-2">
                @csrf
                <div class="flex items-center">
                    <label for="email" class="mr-2">email:</label>
                    <input type="text" name="email" class="border-2 border-gray-500 border-solid p-1 placeholder:text-center" value="{{ $info["email"] }}">
                </div>
                <input type="submit" name="emailChange" class="bg-orange-500 rounded-lg text-white p-1 w-fit cursor-pointer">
            </form>
        </fieldset>
        <fieldset class="border-2 border-solid border-black p-2 flex justify-center items-center flex-col">
            <legend class="text-2xl">Avatar</legend>
            <div class="w-1/2"><img class="w-fit" src="{{asset('storage/img/user.svg')}}" alt=""></div>
            <form action="/profile/edit" method="POST" enctype="multipart/form-data" class="flex flex-col space-y-2 justify-center items-center">
                @csrf
                <input name="avatarFile" type="file" accept="image/*">
                <input class="bg-orange-500 rounded-lg text-white p-1 w-fit cursor-pointer" name="changeAvatar" type="submit">
            </form>
        </fieldset>
    </div>
</main>
@include('template.footer')