<x-layout>
    <a href="/" class="inline-block sticky top-10 text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <form action="/">
        <div class="relative border-2 border-gray-100 m-4 rounded-lg">
            <div class="absolute top-4 left-3">
                <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
            </div>
            <input type="text" name="search" class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none" placeholder="Search Laravel Gigs..." />
            <div class="absolute top-2 right-2">
                <button type="submit" class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600">
                    Search
                </button>
            </div>
        </div>
    </form>
    <div class="mx-4">
        <x-card class="p-10">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6" src="{{$listing->logo? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}" alt="{{$listing->company}} Logo" />

                <h3 class="text-2xl mb-2">{{$listing->title}}</h3>
                <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
                <x-listing-tags :tagsCsv="$listing->tags" />
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
                    <br>
                    <i class="fa-solid fa-calendar-days"></i> Created {{$listing->created_at->diffForHumans()}}
                    <i class="fa-solid fa-clock"></i> Last updated {{$listing->updated_at->diffForHumans()}}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Job Description
                    </h3>
                    <div class="text-lg space-y-6">
                        <p>
                            {{$listing->description}}
                        </p>

                        <a href="mailto:{{$listing->email}}" class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"><i class="fa-solid fa-envelope"></i>
                            Contact Employer</a>

                        <a href="{{$listing->website}}" target="_blank" class="block bg-black text-white py-2 rounded-xl hover:opacity-80"><i class="fa-solid fa-globe"></i> Visit
                            Website</a>
                    </div>
                </div>
            </div>
        </x-card>
        <x-card class="mt-4 p-2 flex justify-around space-x-6">
            <div class="flex items-center space-x-2">
                <a href="/listings/{{$listing->id}}/edit" class="text-blue-500">
                    <i class="fa-solid fa-pencil"></i>Edit
                </a>
            </div>
            <div class="flex items-center space-x-2">
                <form method="POST" action="/listings/{{$listing->id}}">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500">
                        <i class="fa-solid fa-trash"></i>
                        Delete
                    </button>
                </form>
            </div>
        </x-card>
    </div>
</x-layout>