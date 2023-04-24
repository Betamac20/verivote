
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
                    <div class="ml-2">
                        <a href="{{ route('admin.positions') }}" class="text-indigo-400 hover:text-gray-300">
                            {{ __("Position Dashboard ") }} 
                        </a>
                        /
                        <span class="text-amber-400">
                            {{ __("Add Position ") }} 
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-0 mt-5">
            <div class="bg-white overflow-hidden shadow-xl rounded-xl ">
                <div class="p-3 text-gray-600 font-bold flex justify-between items-center">
                    <div class="flex items-center justify-center">
                        <x-icon name="user-plus" solid class=" h-5 w-auto mr-2"/> 
                        {{ __("Add Position ") }} 
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

                <!-- content start here -->
                            <div class="flex min-h-full items-center justify-center py-4 px-4 sm:px-6 lg:px-8 bg-white">

                                <div  class="w-full max-w-lg space-y-8 p-1 ">
                                    <!-- Message section -->
                                    @if(Session::has('success'))
                                
                                    <div class="relative w-full flex items-center  overflow-hidden bg-emerald-400 py-2.5 ml-0 top-0 rounded-lg">
                                        <div class="flex flex-1 justify-between items-center mr-5">  
                                            <div class="flex flex-1 justify-center items-center mr-5">
                                                <x-icon name="chat-bubble-bottom-center-text" outline class=" h-5 w-auto mr-2"/>   
                                                <p class="text-sm leading-6 text-gray-900 ">
                                                    <strong class="font-semibold">Message</strong>
                                                    <svg viewBox="0 0 2 2" class="mx-2 inline h-0.5 w-0.5 fill-current" aria-hidden="true"><circle cx="1" cy="1" r="1" /></svg>
                                                    {{Session::get('success')}}  
                                                </p>
                                            </div>
                                            
                                            <div>
                                                <p class="text-sm leading-6 text-gray-900 ">
                                                    <a href="{{ route('admin.positions') }}" class="flex-none rounded-full bg-gray-900 py-1 px-3.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900">
                                                        View        
                                                        <span aria-hidden="true">&rarr;</span>
                                                    </a>
                                                    </p>
                                            </div>
                                        </div>
                                    </div> 
                                    @endif
                                    <!-- End Message section -->
                                </div>
                            </div>

                            <form method="POST" action="{{ route('admin.store_position') }}">
                            @csrf                   
                                     
                                <!-- department -->
                                <div class="mb-5 mx-5">
                                    <x-input-label for="department" :value="__('Select Department')" />
                                        <select id="department" name="department" autocomplete="department" required="" :value="old('department')"  class="mt-2 block w-full rounded-md border-0 bg-white py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 placeholder:text-gray-400">
                                            <option value="">Select Options</option>
                                        @forelse($departments as $department)                                        
                                            <option value="{{ $department->department_name }}">{{ $department->department_name }}</option>
                                        @empty
                                            <option value="" disabled>No available department</option>
                                        @endforelse
                                        </select>
                                </div>

                                <!-- table start -->
                                <div class="relative overflow-x-auto shadow-xl rounded-lg mx-5 mb-5">
                                    <table class="w-full text-sm text-left text-gray-600" id="table">
                                        <thead class="text-xs text-gray-700 uppercase bg-amber-400 ">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Position Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Capacity
                                                </th>
                                                <th scope="col" class="px-6 py-3 flex justify-center items-center ">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <!-- loop start here -->

                                            <tr class="bg-white border-gray-300 hover:bg-gray-200 ">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                    <x-text-input id="position_name" class="block  w-full" type="text" name="inputs[0][position_name]" :value="old('position_name')" required autofocus autocomplete="position_name" />
                                                </th>
                                                <td class="px-6 py-4 ">
                                                    <x-text-input id="capacity" class="block  w-full" type="number" name="inputs[0][capacity]" max="9" min="1" :value="1" required autofocus />
                                                </td>
                                                <td class="px-6 py-4 text-center">
                                                <x-primary-button type="button" id="add">
                                                    <x-icon name="plus-small" solid class=" h-5 w-auto"  /> 
                                                    Add More
                                                </x-primary-button>
                                                </td>
                                            </tr>

                                        
                                        <!-- loop end here -->
                                        </tbody>
                                    </table>
                                </div>
                                <!-- table end -->  
                                <button type="submit" class=" ml-5 mb-5 group relative items-center flex  justify-center rounded-md bg-emerald-600 py-2 px-3 text-sm font-semibold text-white hover:bg-emerald-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 remove-table-row">
                                    <x-icon name="plus-small" solid class=" h-5 w-auto"  /> 
                                    Add Position
                                </button>
                                
                            </form>
                <!-- content end here -->
    
               
            </div>
        </div>
    </div>

</x-admin-layout>

<script>

    var i = 0;
    $('#add').click(function(){
        ++i;
        $('#table').append(
            `
            <tr class="bg-white border-gray-300 hover:bg-gray-200 ">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    <x-text-input id="position_name" class="block  w-full" type="text" name="inputs[`+i+`][position_name]" :value="old('position_name')" required autofocus autocomplete="position_name" />
                </th>
                <td class="px-6 py-4 ">
                    <x-text-input id="capacity" class="block  w-full" type="number" name="inputs[`+i+`][capacity]" max="9" min="1" :value="1" required autofocus />
                </td>
                <td class="px-6 py-4 text-right">
                                <x-primary-button class="group relative items-center flex w-full justify-center 
                                rounded-md bg-rose-600 py-2 px-3 text-sm font-semibold text-white hover:bg-rose-400 
                                focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 remove-table-row">
                                    <x-icon name="x-circle" solid class=" h-5 w-auto mr-2"  /> 
                                    Remove
                                </x-primary-button>
                </td>
            </tr>     
            `
        );

    });
    
    $(document).on('click', '.remove-table-row', function() {

        $(this).parents('tr').remove();

    });

</script>
