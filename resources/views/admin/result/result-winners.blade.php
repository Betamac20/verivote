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
                    <div class="flex">
                        <a href="{{ route('admin.result') }} " class="group flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            <x-icon name="arrow-small-left" solid mini class=" h-5 w-auto mr-1"/> 
                            {{ ("Back") }}
                        </a>
                    </div>
                </div>
                
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-0 mt-5">
            <div class="bg-white dark:bg-white overflow-hidden shadow-xl rounded-xl ">
                <div class="p-3 text-gray-600 font-bold flex justify-between items-center">
                    <div class="flex items-center justify-center">
                        <x-icon name="receipt-percent" solid class=" h-5 w-auto mr-2"/> 
                        {{ __("List of Winners ") }} 
                    </div>     

                </div>

                <div class="mx-2">
                    <div class="border-t border-gray-200 mb-5"></div>
                </div>
                
                <div class="mt-1 p-5 ">
                <div class="p-2 mb-4 mt-2">
                        <div class="mb-5 p-2">
                            {{ $winners->links() }}
                        </div>
                                <!-- table start -->
                                    <div class="relative overflow-x-auto shadow-xl rounded-lg mx-5 mb-4">
                                        <table class="w-full text-sm text-left text-gray-600 ">
                                            <thead class="text-xs text-gray-700 uppercase bg-emerald-400 ">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                            ID Number
                                                        </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Candidate Name
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Position
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Department
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Role
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if($winners)
                                            @forelse ($winners as $result)
                                                <tr class="bg-white border-b border-gray-300 hover:bg-gray-200">
                                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                        {{ $result->candidate_id_number }}
                                                    </th>
                                                    <td class="px-6 py-4">                                                        
                                                        {{ $result->candidate_name }}
                                                    </td>
                                                    <td class="px-6 py-4">                                                        
                                                        {{ $result->position }}
                                                    </td>
                                                    <td class="px-6 py-4">                                                        
                                                        {{ $result->department }}
                                                    </td>
                                                    <td class="px-6 py-4">                                                        
                                                        {{ ucfirst($result->candidate_role) }}
                                                    </td>
                                                </tr>
                                                <input type="hidden" value="{{ $result->election_id }}" name="election_id">
                                            @empty
                                                <tr>
                                                    <td scope="row" class="px-6 py-4 text-md dark:text-gray-900 whitespace-nowrap text-white"> No record of elections . . . </td>
                                                </tr>
                                            @endforelse
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- table end -->     
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>