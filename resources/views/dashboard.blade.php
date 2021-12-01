<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      @if(auth()->user()->book_club_id == null)
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div>
            <h3>
              Create a Book Club
            </h3>
            <p>(Alternatively you could join an already existing book club, but you need to manually modify book_club_id in DB)</p>
            <div>
              <form method="post" action="{{url('book_clubs')}}">
                @csrf
                <div>
                  <x-label for="name" :value="__('Name')" class="mt-2" />
                  <x-input id="name" class="block mt-1" type="text" name="name" required />
                </div>
                <x-button class="mt-3">
                  {{ __('Create') }}
                </x-button>
              </form>
            </div>
          </div>
        </div>
      </div>
      @else
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <p>You are a member of a bookclub!</p>
        </div>
      </div>
      @endif
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-5">
        <div class="p-6 bg-white border-b border-gray-200">
          <div>
            <h3 class="mb-5">
              Your books
            </h3>
            <table class="divide-y divide-gray-300">
              <thead class="bg-gray-50">
                <tr>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Release Date</th>
                  <th></th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-300">
                @foreach($books as $book)
                <tr class="whitespace-nowrap">
                  <td class="px-6 py-4 text-sm text-gray-500">{{$book->title}}</td>
                  <td class="px-6 py-4 text-sm text-gray-500">{{$book->author}}</td>
                  <td class="px-6 py-4 text-sm text-gray-500">{{$book->release_date}}</td>
                  <td class="px-6 py-4 text-sm text-gray-500">
                    <form action="{{url('books', ['id' => $book->id])}}" method="post" class="float-right">
                      @method('DELETE')
                      @csrf
                      <x-button>
                        {{ __('Delete') }}
                      </x-button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>