<x-admin-layout>

    <!-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> -->

    <div class="py-5 mx-5 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-0">
            <div class="bg-white overflow-hidden shadow-xl rounded-xl ">
                <div class="p-2 text-gray-600 font-bold border-4 border-transparent border-l-amber-400 flex justify-between items-center">
                    <div class="ml-2">
                        <a href="{{ route('admin.candidates') }}" class="text-indigo-400 hover:text-gray-300">
                            {{ __("Candidate Dashboard ") }} 
                        </a>
                        /
                        <a href="{{ route('admin.search_candidates') }}" class="text-indigo-400 hover:text-gray-300">
                            {{ __("Search Dashboard ") }} 
                        </a>
                        /
                        <span class="text-amber-400">
                            {{ __("Add Candidate ") }} 
                        </span>

                    </div> 
                    <a href=" {{ route('admin.search_candidates') }} " class="group flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <x-icon name="arrow-small-left" solid class=" h-5 w-auto"/> 
                        {{ ("Back") }}
                    </a>
                </div>
            </div>
        </div>

            <div class="bg-white overflow-hidden shadow-xl rounded-xl mt-5 ">
                <div class="p-3 text-gray-600 font-bold ">
                    <div class="flex items-center justify-start mt-2">
                        <x-icon name="user-plus" solid class=" h-5 w-auto mr-2"/> 
                        {{ __("Add Candidates") }} 
                    </div> 
                </div>
                <div class="mx-2 mt-2 mb-4">
                    <div class="border-t border-gray-200" />
                </div>

                
                <div class="flex min-h-full items-center justify-center py-8 px-4 sm:px-6 lg:px-8 bg-white">

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
                                            <a href="{{ route('admin.candidates') }}" class="flex-none rounded-full bg-gray-900 py-1 px-3.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900">
                                                View        
                                                <span aria-hidden="true">&rarr;</span>
                                            </a>
                                            </p>
                                    </div>
                                </div>
                            </div> 
                            @endif
                            <!-- End Message section -->

                            <form method="POST" action="{{ route('admin.store_candidate') }}">
                            @csrf

                            @if($search_candidates)
                                @foreach ($search_candidates as $search_candidate)
                        
                            <!-- ID Number -->
                            <x-input-error :messages="$errors->get('id_number')" class="mt-2 font-medium bg-red-400 rounded-lg p-2 mb-3 text-center " />
                            <div>
                                <x-input-label for="id_number" :value="__('ID Number')" />
                                <x-text-input id="id_number" class="block mt-1 w-full" type="text" value="{{ $search_candidate->id_number }}" name="id_number"  required autofocus autocomplete="id_number" disabled />
                                <x-text-input id="id_number" class="block mt-1 w-full" type="hidden" value="{{ $search_candidate->id_number }}" name="id_number"  required autofocus autocomplete="id_number" />
                                <!-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> -->
                            </div>

                            <!-- Name -->
                            <div class="mt-4">
                                <x-input-error :messages="$errors->get('name')" class="mt-2 font-medium bg-red-400 rounded-lg p-2 mb-3 text-center " />
                                <div>
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $search_candidate->name }}" required autofocus autocomplete="name" disabled />
                                    <x-text-input id="name" class="block mt-1 w-full" type="hidden" name="name" value="{{ $search_candidate->name }}" required autofocus autocomplete="name" />
                                    <!-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> -->
                                </div>
                            </div>

                            <!-- Department -->
                            <div class="mt-4">
                                <x-input-error :messages="$errors->get('department')" class="mt-2 font-medium bg-red-400 rounded-lg p-2 mb-3 text-center " />
                                <div>
                                    <x-input-label for="department" :value="__('Department')" />
                                    <x-text-input id="department" class="block mt-1 w-full" type="text" name="department" value="{{ $search_candidate->department }}" required autofocus autocomplete="name" disabled />
                                    <x-text-input id="department" class="block mt-1 w-full" type="hidden" name="department" value="{{ $search_candidate->department }}" required autofocus autocomplete="name" />
                                    <!-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> -->
                                </div>
                            </div>

                            <!-- Role -->
                            <div class="mt-4">
                                <x-input-error :messages="$errors->get('candidate_role')" class="mt-2 font-medium bg-red-400 rounded-lg p-2 mb-3 text-center " />
                                <div>
                                    <x-input-label for="candidate_role" :value="__('Role')" />
                                    <x-text-input id="candidate_role" class="block mt-1 w-full" type="text" name="candidate_role" value="{{ ucfirst($search_candidate->candidate_role) }}" required autofocus autocomplete="name" disabled />
                                    <x-text-input id="candidate_role" class="block mt-1 w-full" type="hidden" name="candidate_role" value="{{ $search_candidate->candidate_role }}" required autofocus autocomplete="name" />
                                    <!-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> -->
                                </div>
                            </div>

                            @endforeach
                            @endif

                            <!-- position -->
                            <div class="mt-4">
                                <x-input-label for="position" :value="__('Position')" />
                                    <select id="position" name="position" autocomplete="position" required="" :value="old('position')"  class="mt-2 block w-full rounded-md border-0 bg-white py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 placeholder:text-gray-400">
                                        <option value="">Select Options</option>
                                    @forelse($positions as $position)                                        
                                        <option value="{{ $position->position_name }}">{{ $position->position_name }}</option>
                                    @empty
                                        <option value="" disabled>No available position</option>
                                    @endforelse
                                    </select>
                            </div>

                            <!-- candidate_type -->
                            <div class="mt-4">
                                <x-input-label for="candidate_type" :value="__('Type')" />
                                    <select id="candidate_type" onchange="val()" name="candidate_type" autocomplete="candidate_type" required="" :value="old('candidate_type')"  class="mt-2 block w-full rounded-md border-0 bg-white py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 placeholder:text-gray-400">
                                        <option value="">Select Options</option>
                                        <option value="Independent">Independent</option>
                                        <option value="Dependent">Dependent</option>
                                    </select>
                            </div>

                            <!-- Partylist -->
                            <div class="mt-4" id="divPartylist">
                                <x-input-error :messages="$errors->get('partylist')" class="mt-2 font-medium bg-red-400 rounded-lg p-2 mb-3 text-center " />
                                <x-input-label for="partylist" :value="__('Partylist')" />
                                <x-text-input id="partylist" class="block mt-1 w-full" type="text" name="partylist" :value="old('partylist')" required autofocus autocomplete="partylist" />
                                <!-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> -->
                            </div>

                            
                            <div class="flex items-center justify-between mt-4 mb-4">


                            </div>
                                <x-primary-button>
                                    {{ __('Add Candidate') }}
                                </x-primary-button>
                            </form>

                    </div>
                </div>

            </div>

    </div>


</x-admin-layout>




<script>

function val() {
    
    c = document.getElementById("candidate_type").value;
    if (c == "Independent") {
        document.getElementById("partylist").disabled = true;
        document.getElementById('divPartylist').style.visibility = 'hidden';
    }
    else if (c == "Dependent") {
        document.getElementById("partylist").disabled = false;
        document.getElementById('divPartylist').style.visibility = 'visible';
    }
}
</script>
