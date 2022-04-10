<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/" class="text-5xl font-bold">
                {{ config('app.name') }}
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus />
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-label for="address" :value="__('Address')" />
                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required
                     />
            </div>

            <!-- contact No. -->
            <div class="mt-4">
                <x-label for="contact_no" :value="__('Contact No.')" />
                <x-input id="contact_no" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required
                     />
            </div>

            <div class="flex flex-col md:flex-row gap-3 md:gap-5 mt-4">
                <div class="w-full md:w1/2">
                    <!-- Sex -->
                    <div>
                        <x-label for="sex" :value="__('Sex')" />
                        <select required id="sex" class="block mt-1 w-full" type="text" name="sex">
                            <option value="">Choose</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="w-full md:w1/2">
                    <!-- Dob -->
                    <div>
                        <x-label for="dob" :value="__('Date of birth')" />
                        <x-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')"
                            required  />
                    </div>
                </div>
            </div>

            
            <div class="flex flex-col md:flex-row gap-3 md:gap-5 mt-4">
                <div class="w-full md:w1/2">
                    <!-- Sex -->
                    <div>
                        <x-label for="loan_type" :value="__('Loan Type')" />
                        <select id="loan_type" class="block mt-1 w-full" type="text" name="loan_type" :value="old('loan_type')">
                            <option value="">Choose</option>
                            @foreach($loanTypes as $lt)
                                @php 
                                $code = $lt->loan_type;
                                $type = $lt->loan_type_full;
                                @endphp
                                <option data-rate="{{ $lt->interest_rate }}" data-duration="{{ $lt->duration }}" value="{{ $code }}" 
                                    @if(old('loan_type') == $code) selected @elseif(request('loan_type') == $code) selected @endif>
                                    {{ $type }} {{ $lt->interest_rate + 0 }}%
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="w-full md:w1/2">
                    <!-- Dob -->
                    <div>
                        <x-label for="loan_terms" :value="__('Loan Terms (Yrs)')" />
                        <x-input id="loan_terms" class="block mt-1 w-full" type="number" name="loan_terms" 
                        :value="old('loan_terms', ($loanTypes->where('loan_type', request('loan_type'))->first()->duration ?? 0) + 0)" required  />
                    </div>
                </div>
            </div>
            
            <div class="flex flex-col md:flex-row gap-3 md:gap-5 mt-4">
                <div class="w-full md:w1/2">
                    <div class="mt-4">
                        <x-label for="loan_amount" :value="__('Loan Amount (Rs)')" />
                        <x-input id="loan_amount" class="block mt-1 w-full" type="number"
                            name="amount" required />
                    </div>
                </div>
                <div class="w-full md:w1/2">
                    <div class="mt-4">
                        <x-label for="installment" :value="__('Installment Amount (Rs)')" />
                        <x-input id="installment" class="block mt-1 w-full" type="number" readonly
                            name="installment" required />
                    </div>
                </div>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="flex flex-col md:flex-row gap-3 md:gap-5 mt-4">
                <div class="w-full md:w1/2">
                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" />
                    </div>
                </div>
                <div class="w-full md:w1/2">
                    <div class="mt-4">
                        <x-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required />
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>

    <x-slot name="scripts">
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                function calculateInstallment(amount, duration, interest_rate) {
                    console.log(amount, duration, interest_rate);
                    let interest = (amount * interest_rate) / 100;
                    let installment = (amount + interest) / (duration * 12);
                    return installment;
                }
                function rawInstallmentCalculator() {
                    const installment = calculateInstallment(
                        Number($('[name="amount"]').val()),
                        Number($('[name="loan_terms"]').val()),
                        Number($('[name="loan_type"] option').selected().attr('data-rate'))
                    );
                    $('[name="installment"]').val(installment);
                }
                $('[name="loan_terms"]').on('keyup', function(e) {
                    const max = $('[name="loan_type"] option').selected().attr('data-duration');
                    if(max && Number(max) < Number(this.value)) {
                        alert('Loan terms cannot be greater than ' + (Number(max)) + ' years');
                        return;
                    }
                    rawInstallmentCalculator();
                });
                $('[name="loan_type"]').on('change', function(e) {
                    rawInstallmentCalculator();
                });
                $('[name="amount"]').on('keyup', function(e) {
                    rawInstallmentCalculator();
                });
            });
        </script>
    </x-slot>
</x-guest-layout>
