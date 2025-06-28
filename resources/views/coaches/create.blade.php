<x-layout heading="Add a new coach">
    <main xmlns="http://www.w3.org/1999/html">
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <form action="{{ route('coaches.store') }}" method="post">
                @csrf

                <fieldset class="form-fields">
                    <p><b>Username:</b>
                        <input type="text" name="username"
                               size="50" maxlength="80"
                               class="bg-white relative block appearance-none rounded-none rounded-b-md border border-gray-300 px-5 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                               value="{{ old('username') }}"/>
                    </p>

                    <p><b>Email Address:</b>
                        <input type="text" name="email"
                               class="bg-white relative block appearance-none rounded-none rounded-b-md border border-gray-300 px-5 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                               size="50" maxlength="80"
                               value="{{ old('email') }}"/>
                    </p>

                    <p><b>First Name:</b>
                        <input type="text" name="forename"
                               class="bg-white relative block appearance-none rounded-none rounded-b-md border border-gray-300 px-5 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                               size="50" maxlength="20"
                               value="{{ old('forename') }}"/>
                    </p>

                    <p><b>Last Name:</b>
                        <input type="text" name="surname"
                               class="bg-white relative block appearance-none rounded-none rounded-b-md border border-gray-300 px-5 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                               size="50" maxlength="40"
                               value="{{ old('surname') }}"/>
                    </p>

                    <p><b>Password:</b>
                        <input type="password" name="password"
                               class="bg-white relative block appearance-none rounded-none rounded-b-md border border-gray-300 px-5 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                               size="50" maxlength="20"
                               value="{{ old('password') }}"/>
                    </p>

                    <p><b>Confirm Password:</b>
                        <input type="password" name="password_confirmation"
                               class="bg-white relative block appearance-none rounded-none rounded-b-md border border-gray-300 px-5 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                               size="50" maxlength="20"
                               value="{{ old('password_confirmation') }}"/>
                    </p>

                    <div class="input-container">
                        <div>
                            <p><b>Date of Birth:</b>
                                <input type="date" name="dob"
                                       class="bg-white relative block appearance-none rounded-none rounded-b-md border border-gray-300 px-5 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                       value="{{ old('dob') }}"/>
                            </p>
                        </div>
                    </div>

                    <p><b>Telephone:</b>
                        <input type="text" name="phone"
                               class="bg-white relative block appearance-none rounded-none rounded-b-md border border-gray-300 px-5 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                               size="50" maxlength="40"
                               value="{{ old('phone') }}"/>
                    </p>

                    <p><b>Address:</b>
                        <input type="text" name="address"
                               class="bg-white relative block appearance-none rounded-none rounded-b-md border border-gray-300 px-5 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                               size="50" maxlength="40"
                               value="{{ old('address') }}"/>
                    </p>

                    <p><b>Postcode:</b>
                        <input type="text" name="postcode"
                               class="bg-white relative block appearance-none rounded-none rounded-b-md border border-gray-300 px-5 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                               size="50" maxlength="40"
                               value="{{ old('postcode') }}"/>
                    </p>

                    <input type="hidden" name="submitted" value="TRUE"/>
                </fieldset>

                <footer style="display: inline-block">
                    <button type="submit"
                            class="group relative flex-shrink w-22 justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Add
                    </button>
                    <a href="/" class="button"> Back</a>
                </footer>

                @php
                    $errorKeys = ['userName', 'emptyEmail', 'firstName', 'lastName', 'emptyPass1',
                        'emptyPass2', 'dob', 'type', 'postcode', 'phone', 'address', 'email', 'password1', 'password2',
                        'emailMatch', 'userNameMatch'];
                @endphp

                @foreach ($errorKeys as $errorKey)
                    @if ($errors->has($errorKey))
                        <p class="error-message">{{ $errors->first($errorKey) }}</p>
                        @break
                    @endif
                @endforeach

            </form>
        </div>
    </main>
</x-layout>
