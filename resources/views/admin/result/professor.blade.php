<x-admin-layout>

    <!-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> -->

    <div class="py-5 mx-5 w-full">
    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-0">
            <div class="bg-white overflow-hidden shadow-xl rounded-xl ">
                <div class="p-3 text-gray-600 font-bold border-4 border-transparent border-l-amber-400 flex justify-between items-center">
                    {{ __("Result Dashboard ") }} 
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-0 mt-5">
            <div class="bg-white dark:bg-white overflow-hidden shadow-xl rounded-xl ">
                <div class="p-3 text-gray-600 font-bold flex justify-between items-center">
                    <div class="flex items-center justify-center">
                        <x-icon name="receipt-percent" solid class=" h-5 w-auto mr-2"/> 
                        {{ __("Result for Professor Elections ") }} 
                    </div>     
                    <!-- <div class="flex">
                        <a href=" # " class="group flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            <x-icon name="eye" solid mini class=" h-5 w-auto mr-1"/> 
                            {{ ("View Result") }}
                        </a>
                    </div> -->
                </div>

                <div class="mx-2">
                    <div class="border-t border-gray-200 mb-5"></div>
                </div>
                
                <div class="mt-1">
                    <div class="flex min-h-full items-center justify-center py-8 px-4 sm:px-6 lg:px-8 bg-white">
                        <div  class="w-full max-w-lg space-y-8 p-1 ">
                        <form action="">
                                
                                <!-- department -->
                                <div class="mt-4 mb-4">
                                    <x-input-label for="election_id" :value="__('Department')" />
                                    <select id="election_id"  name="election_id" autocomplete="election_id" required="" :value="old('election_id')"  class="mt-2 block w-full rounded-md border-0 bg-white py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 placeholder:text-gray-400" required>
                                            <option value="">Select Options</option>
                                        @forelse($election_department as $vote_department)
                                            <option value="{{ $vote_department->id }}">{{ $vote_department->department }}</option>
                                        @empty
                                            <option disabled class="text-red-500 font-semibold">No Election ...</option>
                                        @endforelse
                                    </select>
                                </div>

                                <x-primary-button>
                                    {{ __('Generate Result') }}
                                </x-primary-button>
                        
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>