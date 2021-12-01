<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Add a book') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div>
            <h3>
              Add a book
            </h3>
            <div>
              <form method="post" action="{{url('books')}}">
                @csrf
                <div>
                  <x-label for="title" :value="__('Title')" class="mt-2" />
                  <x-input id="title" class="block mt-1" type="text" name="title" required />
                </div>
                <div>
                  <x-label for="author" :value="__('Author')" class="mt-2" />
                  <x-input id="author" class="block mt-1" type="text" name="author" required />
                </div>
                <div>
                  <x-label for="release_date" :value="__('Release Date')" class="mt-2" />
                  <x-input id="release_date" class="block mt-1" type="date" name="release_date" required />
                </div>
                <x-button class="mt-3">
                  {{ __('Add') }}
                </x-button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>