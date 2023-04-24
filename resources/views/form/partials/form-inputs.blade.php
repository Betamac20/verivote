<section>
 

    <form action="{{ route('store_form') }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        <input type="hidden" name="candidate_role" value="{{ Auth::user()->candidate_role }}">
        <div class="mt-4">
            <x-input-error :messages="$errors->get('id_photo')" class="mt-2 font-medium bg-red-400 rounded-lg p-2 mb-3 text-center " />
            <div>
                <x-input-label for="id_photo" :value="__('ID 2X2 Picture')" />
                <input id="id_photo" class="block mt-1 w-full border rounded-lg bg-white text-gray-900" type="file" name="id_photo" required autofocus autocomplete="id_photo" />
                <!-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> -->
            </div>
        </div>

        <div class="mt-4">
        <x-input-label for="position" :value="__('Position Applying')" />
            <select id="position" name="position" autocomplete="position" required=""  class="mt-2 block w-full rounded-md border-0 bg-white py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 placeholder:text-gray-400">
                <option value="">Select Options</option>                     
                <option value="President">President</option>
                <option value="Vice President">Vice President</option>
                <option value="Secretary">Secretary</option>
                <option value="Treasurer">Treasurer</option>
                <option value="Auditor">Auditor</option>
                <option value="Public Relation Officer">Public Relation Officer</option>
                <option value="2nd Year Representative">2nd Year Representative</option>
                <option value="3rd Year Representative">3rd Year Representative</option>
                <option value="4th Year Representative">4th Year Representative</option>
            </select>
        </div>

        <!-- Name -->
        <div class="mt-4">
            <x-input-error :messages="$errors->get('id_number')" class="mt-2 font-medium bg-red-400 rounded-lg p-2 mb-3 text-center " />
            <div>
                <x-input-label for="id_number" :value="__('ID Number')" />
                <x-text-input id="id_number" class="block mt-1 w-full" type="text" name="id_number" value="{{ Auth::user()->id_number }}" required autofocus autocomplete="id_number" disabled />
                <x-text-input id="id_number" class="block mt-1 w-full" type="hidden" name="id_number" value="{{ Auth::user()->id_number }}" required autofocus autocomplete="id_number" />
                <!-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> -->
            </div>
        </div>

        <!-- Name -->
        <div class="mt-4">
            <x-input-error :messages="$errors->get('name')" class="mt-2 font-medium bg-red-400 rounded-lg p-2 mb-3 text-center " />
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ Auth::user()->name }}" required autofocus autocomplete="name" disabled />
                <x-text-input id="name" class="block mt-1 w-full" type="hidden" name="name" value="{{ Auth::user()->name }}" required autofocus autocomplete="name" />
                <!-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> -->
            </div>
        </div>

        <!-- birthday -->
        <div class="mt-4">
            <div>
            <x-input-error :messages="$errors->get('birthday')" class="mt-2 font-medium bg-red-400 rounded-lg p-2 mb-3 text-center " />
                <x-input-label for="birthday" :value="__('Birthday')" />
                <x-text-input id="birthday" class="block mt-1 w-full" type="date" name="birthday"  required autofocus autocomplete="birthday" />
                <!-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> -->
            </div>
        </div>

        <!-- place of birth -->
        <div class="mt-4">
            <x-input-error :messages="$errors->get('placeofBirth')" class="mt-2 font-medium bg-red-400 rounded-lg p-2 mb-3 text-center " />
            <div>
                <x-input-label for="placeofBirth" :value="__('Place of Birth')" />
                <x-text-input id="placeofBirth" class="block mt-1 w-full" type="text" name="placeofBirth"  required autofocus autocomplete="placeofBirth" />
                <!-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> -->
            </div>
        </div>

        <!-- gender, year level, and section -->
        <div class="mt-4 flex justify-between items-center">

            <div class="mr-2">
                <x-input-label for="gender" :value="__('Gender')" />
                <x-text-input id="gender" class="block mt-1 w-full" type="text" name="gender" value="{{ Auth::user()->gender }}" required autofocus autocomplete="gender" disabled />
                <x-text-input id="gender" class="block mt-1 w-full" type="hidden" name="gender" value="{{ Auth::user()->gender }}" required autofocus autocomplete="gender" />
                <!-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> -->
            </div>
            
            <div class="mx-2">
                <x-input-label for="year_level" :value="__('Year Level')" />
                <x-text-input id="year_level" class="block mt-1 w-full" type="text" name="year_level" value="{{ Auth::user()->year_level }}" required autofocus autocomplete="year_level" disabled />
                <x-text-input id="year_level" class="block mt-1 w-full" type="hidden" name="year_level" value="{{ Auth::user()->year_level }}" required autofocus autocomplete="year_level" />
                <!-- <x-input-error :messages="$errors->get('year_level')" class="mt-2" /> -->
            </div>

            <div class="ml-2">
                <x-input-label for="section" :value="__('Section')" />
                <x-text-input id="section" class="block mt-1 w-full" type="text" name="section" required autofocus autocomplete="section" />
                <!-- <x-input-error :messages="$errors->get('section')" class="mt-2" /> -->
            </div>
        </div>

        <!-- department -->
        <div class="mt-4">
            <x-input-error :messages="$errors->get('department')" class="mt-2 font-medium bg-red-400 rounded-lg p-2 mb-3 text-center " />
            <div>
                <x-input-label for="department" :value="__('Department')" />
                <x-text-input id="department" class="block mt-1 w-full" type="text" name="department" value="{{ Auth::user()->department }}" required autofocus autocomplete="department" disabled />
                <x-text-input id="department" class="block mt-1 w-full" type="hidden" name="department" value="{{ Auth::user()->department }}" required autofocus autocomplete="department" />
                <!-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> -->
            </div>
        </div>
        
        <!-- email -->
        <div class="mt-4">
            <x-input-error :messages="$errors->get('email')" class="mt-2 font-medium bg-red-400 rounded-lg p-2 mb-3 text-center " />
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" value="{{ Auth::user()->email }}" required autofocus autocomplete="email" disabled />
                <x-text-input id="email" class="block mt-1 w-full" type="hidden" name="email" value="{{ Auth::user()->email }}" required autofocus autocomplete="email" />
                <!-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> -->
            </div>
        </div>

        <!-- grade -->
        <div class="mt-4">
            <x-input-error :messages="$errors->get('last_grade')" class="mt-2 font-medium bg-red-400 rounded-lg p-2 mb-3 text-center " />
            <div>
                <x-input-label for="last_grade" :value="__('Last Semester GWA')" />
                <x-text-input id="last_grade" class="block mt-1 w-full" type="text" name="last_grade" required autofocus autocomplete="last_grade" />
                <!-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> -->
            </div>
        </div>
        <br>
        <div class="mt-4">
            {{ __('Essay Question') }} <br>
            <x-input-label for="essay_question" :value="__('Why do you want to join this organization? (less than 200 words)')" />
            <textarea id="essay_question" name="essay_question" rows="8" class="block p-2.5 w-full mt-1 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" required></textarea>
        </div>

        <!-- 1st sem -->
        <br>
        <div class="mt-4">
        {{ __('Attachments (pdf or docx)') }} <br>
            <x-input-error :messages="$errors->get('first_semester_grade')" class="mt-2 font-medium bg-red-400 rounded-lg p-2 mb-3 text-center " />
            <div>
                <x-input-label for="first_semester_grade" :value="__('First Semester Grade')" />
                <input id="first_semester_grade" class="block mt-1 w-full border rounded-lg bg-white text-gray-900" type="file" name="first_semester_grade" required autofocus autocomplete="first_semester_grade" />
                <!-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> -->
            </div>
        </div>

        <!-- 2nd sem -->
        <div class="mt-4">
            <x-input-error :messages="$errors->get('second_semester_grade')" class="mt-2 font-medium bg-red-400 rounded-lg p-2 mb-3 text-center " />
            <div>
                <x-input-label for="second_semester_grade" :value="__('Second Semester Grade')" />
                <input id="second_semester_grade" class="block mt-1 w-full border rounded-lg bg-white text-gray-900" type="file" name="second_semester_grade" required autofocus autocomplete="second_semester_grade" />
                <!-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> -->
            </div>
        </div>
        <br>
        <!-- 2nd sem -->
        <div class="mt-4 dark:text-white text-gray-800 text-justify">
        <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600" name="remember" required>
            <span class="ml-2 block text-sm ">{{ __('I Agree') }}</span>
        </label>
        <br>
        <p class="indent-8">
            I certify that the above information Is true and accurate to the best of my knowledge, and that I have not willfully falsified any information on this form. I further understand that the above information will be verified with the ComSoc Officers and that I will be ineligible to seek or hold an elected position if I fail to meet the stated eligibility requirements for that position.
        </p>
        <p class="indent-8">
        By clicking the agree checkbox button, I agree to abide by all election rules and regulations and to treat all students and administrators involved in the elections process with respect. I agree to abide by the rules and regulations prior to the election period. I am also aware that I must attend the interview in order to remain a recognized candidate.
        </p>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Submit') }}</x-primary-button>
        </div>
    </form>

</section>
