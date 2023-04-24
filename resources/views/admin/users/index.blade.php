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
                  {{ __("User Dashboard ") }} 
                </div>
            </div>


            <div class="bg-white dark:bg-white overflow-hidden shadow-xl rounded-xl mt-5">
                <div class="p-3 font-bold text-gray-600 flex justify-between items-center">
                    <!-- <div> -->
                    <div class="flex items-center justify-center">
                        <x-icon name="user-group" solid class=" h-5 w-auto mr-2"/> 
                        {{ __("Users") }} 
                    </div>                      
                </div>
                
                <div class="mx-2">
                <div class="border-t border-gray-200" ></div>
                </div>

                
                <div class="p-2 mb-4 mt-4">
                    <div class="mb-5 p-2">
                    {{ $users->links() }}
                </div>

                        <!-- table start -->
                        <div class="relative overflow-x-auto shadow-xl rounded-lg mx-5 mb-2">
                            <table class="w-full text-sm text-left text-gray-600">
                                <thead class="text-xs text-gray-700 uppercase bg-amber-400 ">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            ID Number
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Department
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Gender
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Year Level
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Type
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
                                @if($users)
                                @forelse ($users as $candidate)
                                    <tr class="bg-white text-xs border-b  border-gray-300 hover:bg-gray-200 ">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                            {{ $candidate->id_number }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $candidate->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $candidate->department }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $candidate->gender }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $candidate->year_level }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $candidate->user_type }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ ucfirst($candidate->candidate_role) }}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="#" class="text-indigo-600 font-bold hover:text-gray-300">
                                                {{ __("Edit ") }} 
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td scope="row" class="px-6 py-4 text-md text-gray-900 whitespace-nowrap"> No record of users . . . </td>
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
    </div>


</x-admin-layout>