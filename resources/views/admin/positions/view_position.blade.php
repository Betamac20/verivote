<x-admin-layout>

    <div class="py-5 mx-5 w-full">
    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-0">
            <div class="bg-white overflow-hidden shadow-xl rounded-xl ">
                <div class="p-3 text-gray-600 font-bold border-4 border-transparent border-l-amber-400 ">
                        <a href="{{ route('admin.positions') }}" class="text-indigo-400 hover:text-gray-300">
                            {{ __("Position Dashboard ") }} 
                        </a>
                        /
                        <span class="text-amber-400">
                            {{ __("View Position ") }} 
                        </span>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-0 mt-5">
            <div class="bg-white overflow-hidden shadow-xl rounded-xl ">
                <div class="p-3 text-gray-600 font-bold flex justify-between items-center">
                    <div class="flex items-center justify-center">
                        <x-icon name="user-plus" solid class=" h-5 w-auto mr-2"/> 
                        {{ __("Candidate Positions ") }} 
                    </div>     
                    <div class="flex">
                        <a href=" {{ route('admin.positions') }} " class="group flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            <x-icon name="arrow-small-left" solid class=" h-5 w-auto mr-1"/> 
                            {{ ("Back") }}
                        </a>
                    </div>
                </div>
                <div class="mx-2">
                    <div class="border-t border-gray-200 mb-5"></div>
                </div>

                <div class="p-2 mb-5 mt-4">
                <div class="mb-5 p-2">
                    {{ $positions->links() }}
                </div>
                <!-- table start -->
                <div class="relative overflow-x-auto shadow-xl rounded-lg mx-5 ">
                    <table class="w-full text-sm text-left text-gray-600">
                        <thead class="text-xs text-gray-700 uppercase bg-amber-400">
                            <tr>
                            <th scope="col" class="px-6 py-3">
                                    Position Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Department
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Capacity
                                </th>

                                <th scope="col" class="px-6 py-3 flex justify-center items-center border-l">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <!-- loop start here -->
                        @forelse($positions as $position)
                            <tr class="bg-white border-b  border-gray-300 hover:bg-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    {{ $position->position_name }}
                                </th>
                                <td class="px-6 py-4">
                                {{ $position->department }}
                                </td>
                                <td class="px-6 py-4">
                                {{ $position->capacity }}
                                </td>
                                <td class="px-6 py-4 flex justify-center items-center border-l">
                                    <a href="#" class="text-indigo-600 font-bold hover:text-indigo-400 mx-auto ">
                                        {{ __("Edit ") }} 
                                    </a>
                                    <a href="#" class="text-indigo-600 font-bold hover:text-indigo-400 mx-auto ">
                                        {{ __("Remove ") }} 
                                    </a>
                                </td>
                            </tr>
                        @empty
                        <tr>
                           <td scope="row" class="px-6 py-4 text-md text-gray-900 whitespace-nowrap"> No record of positions . . . </td>
                        </tr>
                        @endforelse
                        <!-- loop end here -->
                        </tbody>
                    </table>
                </div>
                <!-- table end -->  
                </div>
            </div>
        </div>
    </div>




</x-admin-layout>