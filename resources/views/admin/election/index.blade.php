<x-admin-layout>

    <!-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> -->

    <div class="py-5 mx-5 w-full">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-0">
                    <div class="bg-white dark:bg-white overflow-hidden shadow-xl rounded-xl ">
                        <div class="p-4 text-gray-600 font-bold border-4 border-transparent border-l-amber-400 flex justify-between items-center">
                        {{ __("Election Dashboard ") }} 


                        </div>
                    </div>
                </div>

                

            <!-- start of election section -->
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-0 mt-5">
                    <div class="bg-white dark:bg-white overflow-hidden shadow-xl rounded-xl ">
                        <div class="p-3 text-gray-600 font-bold flex justify-between items-center">
                            <div class="flex items-center justify-center">
                                <x-icon name="calendar-days" solid class=" h-5 w-auto mr-2"/> 
                                {{ __("Election ") }} 
                            </div>     
                            <div class="flex">
                            <a href=" {{ route('admin.set_election') }} " class="group flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                <x-icon name="plus-small" solid class=" h-5 w-auto mr-1"/> 
                                {{ ("Set Date") }}
                            </a>
                            </div>
                        </div>
                        <div class="mx-2">
                            <div class="border-t border-gray-200 mb-5"></div>
                        </div>

                        <div class="p-2 mb-4 mt-2">
                            <div class="mb-5 p-2">
                            {{ $elections->links() }}
                        </div>

                        <!-- table start -->
                        <div class="relative overflow-x-auto shadow-xl rounded-lg mx-5 mb-4">
                            <table class="w-full text-sm text-left text-gray-600 ">
                                <thead class="text-xs text-gray-700 uppercase bg-amber-400 ">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Election Title
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Department
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Start Date
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            End Date
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Role
                                        </th>
                                        <th scope="col" class="px-6 py-3 ">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($elections)
                                @forelse ($elections as $election)
                                    <tr class="bg-white border-b border-gray-300 hover:bg-gray-200">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                            {{ $election->election_title }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $election->department }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $election->election_start_date }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $election->election_end_date }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ ucfirst($election->candidate_role) }}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="#" class="text-indigo-600 font-bold hover:text-gray-300">
                                                {{ __("Edit ") }} 
                                            </a>
                                        </td>
                                    </tr>
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
            <!-- end of election section -->
    </div>



</x-admin-layout>