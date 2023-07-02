<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Login
            </h2>
            <p class="mb-4">Login to Post and Manage Gigs</p>
        </header>

        <form method="POST" action="/users/authenticate">
            @csrf
            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="email" placeholder="johndoe@example.com" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}" />
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">
                    Password
                </label>
                <div class="relative">
                    <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" value="{{old('password')}}" />
                    <div class="absolute top-2 right-1">
                        <button type="button" class="text-gray-500 pr-2 hover:text-black focus:outline-none" id="toggle">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                </div>
                @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Login
                </button>
            </div>

            <div class="mt-8">
                <p>
                    Don't have an account?
                    <a href="/register" class="text-laravel">Register</a>
                </p>
            </div>
        </form>
    </x-card>
</x-layout>