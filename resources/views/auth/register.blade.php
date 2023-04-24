<x-guest-layout>

<div class="flex h-full items-center justify-center py-8 px-4 mt-12 sm:px-6 lg:px-8 bg-white shadow-lg rounded-lg">
      <div  class="w-full max-w-lg space-y-8 p-1">
      
      <div>
      <div class="flex justify-center items-center">
                <x-umak-logo class="w-20 h-20 fill-current text-gray-500 " />
                &nbsp;&nbsp;&nbsp;
                <x-application-logo class="h-14 w-auto fill-current text-gray-500 " />
            </div>
         <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-800"> <span class="text-indigo-500 "> Student Registration</span></h2>
         <p class="mt-4 text-center font-medium text-gray-800 ">
                  Or register as&nbsp;
                  <a href=" {{ route('register-professor') }} " class="flex-none rounded-full bg-gray-900 py-1 px-3.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900">
                  Professor 
                  <span aria-hidden="true">&rarr;</span>
                  </a>
         </p>
       </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Student ID -->
        <div>
            <x-input-label for="id_number" :value="__('ID Number')" />
            <x-text-input id="id_number" class="block mt-1 w-full" type="text" name="id_number" :value="old('id_number')" required autofocus autocomplete="id_number" />
            <x-input-error-registration :messages="$errors->get('id_number')" class="mt-2 text-red-500" />
        </div>

        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
            <x-input-error-registration :messages="$errors->get('first_name')" class="mt-2" />
        </div>
        
        <div class="mt-4">
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
            <x-input-error-registration :messages="$errors->get('last_name')" class="mt-2" />
        </div>

                        <div class="col-span-6 mt-4 sm:col-span-6 lg:col-span-3">
                            <x-input-label for="gender" :value="__('Gender')" />
                            <select id="gender" name="gender" autocomplete="gender" required="" :value="old('gender')" class="mt-2 block w-full rounded-md border-0 bg-white py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="">Select Options</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                        </div>
        
                        <div class="col-span-6 mt-4">
                         <x-input-label for="department" :value="__('Department')" />
                          <select id="department" onchange="val()" name="department" autocomplete="department" required="" :value="old('department')"  class="mt-2 block w-full rounded-md border-0 bg-white py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 placeholder:text-gray-400">
                            <option value="">Select Options</option>
                            @foreach($departments as $department)
                            <option value="{{ $department->department_name }}">{{ $department->department_name }}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="col-span-6 mt-4 sm:col-span-6 lg:col-span-3" id="div_year_level_4">
                            <x-input-label for="year_level" :value="__('Year Level')" />
                            <select id="year_level_4" name="year_level" autocomplete="year_level" required="" :value="old('year_level')" class="w-full rounded-md border-0 bg-white py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                              <option value="">Select Options</option>
                              <option value="1st">1st - First Year</option>
                              <option value="2nd">2nd - Second Year</option>
                              <option value="3rd">3rd - Thrid Year</option>
                              <option value="4th">4th - Fourth Year</option>
                            </select>
                        </div>
                        <div class="col-span-6 mt-4 sm:col-span-6 lg:col-span-3" id="div_year_level_5">
                            <x-input-label for="year_level" :value="__('Year Level')" />
                            <select id="year_level_5" name="year_level" autocomplete="year_level" required="" :value="old('year_level')" class="w-full rounded-md border-0 bg-white py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                              <option value="">Select Options</option>
                              <option value="1st">1st - First Year</option>
                              <option value="2nd">2nd - Second Year</option>
                              <option value="3rd">3rd - Thrid Year</option>
                              <option value="4th">4th - Fourth Year</option>
                              <option value="5th">5th - Fifth Year</option>
                            </select>
                        </div>

                <div class="mt-2 mb-4" id="div_email">
                    <div class="border-t border-gray-300" > </div>
                </div>

        <!-- Email Address -->
        <div class="mt-4" >
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error-registration :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error-registration :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error-registration :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-6">
            <x-primary-button>
                {{ __('Register') }}
            </x-primary-button>
        </div>

    </form>
    </div>
</div>
<br><br><br><br><br>


</x-guest-layout>

<div class="fixed w-full isolate flex items-center gap-x-6 overflow-hidden bg-gray-50 py-2.5 px-6 sm:px-3.5 sm:before:flex-1  bottom-0">
  <svg viewBox="0 0 577 310" aria-hidden="true" class="absolute top-1/2 left-[max(-7rem,calc(50%-52rem))] -z-10 w-[36.0625rem] -translate-y-1/2 transform-gpu blur-2xl">
    <path id="1d77c128-3ec1-4660-a7f6-26c7006705ad" fill="url(#49a52b64-16c6-4eb9-931b-8e24bf34e053)" fill-opacity=".3" d="m142.787 168.697-75.331 62.132L.016 88.702l142.771 79.995 135.671-111.9c-16.495 64.083-23.088 173.257 82.496 97.291C492.935 59.13 494.936-54.366 549.339 30.385c43.523 67.8 24.892 159.548 10.136 196.946l-128.493-95.28-36.628 177.599-251.567-140.953Z" />
    <defs>
      <linearGradient id="49a52b64-16c6-4eb9-931b-8e24bf34e053" x1="614.778" x2="-42.453" y1="26.617" y2="96.115" gradientUnits="userSpaceOnUse">
        <stop stop-color="#9089FC" />
        <stop offset="1" stop-color="#FF80B5" />
      </linearGradient>
    </defs>
  </svg>
  <svg viewBox="0 0 577 310" aria-hidden="true" class="absolute top-1/2 left-[max(45rem,calc(50%+8rem))] -z-10 w-[36.0625rem] -translate-y-1/2 transform-gpu blur-2xl">
    <use href="#1d77c128-3ec1-4660-a7f6-26c7006705ad" />
  </svg>
  <div class="flex flex-wrap items-center gap-y-2 gap-x-4">
    <p class="text-sm leading-6 text-gray-900">
      <strong class="font-semibold">VeriVote 2023</strong><svg viewBox="0 0 2 2" class="mx-2 inline h-0.5 w-0.5 fill-current" aria-hidden="true"><circle cx="1" cy="1" r="1" /></svg>Already registered? Join the election now, just click the button here.
    </p>
    <a href="{{ route('login') }}" class="flex-none rounded-full bg-gray-900 py-1 px-3.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900">Log In now <span aria-hidden="true">&rarr;</span></a>
  </div>
    <div class="flex flex-1 justify-end">

    </div>
</div>

<script>

    document.getElementById("year_level_5").disabled = true;
    document.getElementById("year_level_4").disabled = true;
    document.getElementById('div_year_level_4').style.visibility = 'hidden';
    document.getElementById('div_year_level_5').style.visibility = 'hidden';
    document.getElementById("div_email").style.marginTop = "-120px";
    document.getElementById('div_email').style.position = 'relative';
    
function val() {
    
    c = document.getElementById("department").value;    

    if (c === ""){
        
        document.getElementById("year_level_5").disabled = true;
        document.getElementById("year_level_4").disabled = true;
        document.getElementById('div_year_level_4').style.visibility = 'hidden';
        document.getElementById('div_year_level_5').style.visibility = 'hidden';
        // document.getElementById("div_email").style.marginTop = "-120px";

    }
    else if (c === "College of Construction Sciences and Engineering") {
        document.getElementById("year_level_5").disabled = false;
        document.getElementById("year_level_4").disabled = true;
        document.getElementById('div_year_level_4').style.visibility = 'hidden';
        document.getElementById('div_year_level_5').style.visibility = 'visible';
        document.getElementById('div_year_level_5').style.position = 'relative';
        document.getElementById("div_year_level_5").style.marginTop = "-55px";
        document.getElementById("div_email").style.marginTop = "50px";
    }
    else {
      
      document.getElementById("year_level_5").disabled = true;
        document.getElementById("year_level_4").disabled = false;
        document.getElementById('div_year_level_5').style.visibility = 'hidden';
        document.getElementById('div_year_level_4').style.visibility = 'visible';
        document.getElementById('div_year_level_4').style.position = 'relative';
        // document.getElementById("div_year_level_5").style.marginBottom = "-25px";
        document.getElementById("div_email").style.marginTop = "50px";
        
    }

}


</script>