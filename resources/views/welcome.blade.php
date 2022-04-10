<x-guest-layout>
    <div>
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

    <div class="container m-auto px-6 py-20 md:px-12 lg:px-20">
        <div class="m-auto text-center lg:w-8/12 xl:w-7/12">
            <h2 class="text-2xl text-pink-900 font-bold md:text-4xl">
                Welcome to the {{ config('app.name') }}
            </h2>
            <p>Apply for loans smartly.</p>
        </div>
    </div>
    @foreach ($loans as $loan)
        <section>
            <div class="bg-gradient-to-b from-pink-100 to-purple-200">
                <div class="container m-auto px-6 py-20 md:px-12 lg:px-20">
                    <div
                        class="mt-12 m-auto -space-y-4 items-center justify-center md:flex md:space-y-0 md:-space-x-4 xl:w-10/12">
                        <div class="relative z-10 -mx-4 group md:w-6/12 md:mx-0 lg:w-5/12">
                            <div aria-hidden="true"
                                class="absolute top-0 w-full h-full rounded-2xl bg-white shadow-xl transition duration-500 group-hover:scale-105 lg:group-hover:scale-110">
                            </div>
                            <div class="relative p-6 space-y-6 lg:p-8">
                                <h3 class="text-3xl text-gray-700 font-semibold text-center">
                                    {{ $loan->loan_type_full }}</h3>
                                <div>
                                    <div class="relative flex justify-around">
                                        <div class="flex items-end">
                                            <span
                                                class="text-8xl text-gray-800 font-bold leading-0">{{ $loan->interest_rate + 0 }}</span>
                                            <div class="pb-2">
                                                <span class="block text-2xl text-gray-700 font-bold">%</span>
                                                <span
                                                    class="block text-xl text-purple-500 font-bold">{{ $loan->duration + 0 }}
                                                    Yrs</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul role="list" class="w-max space-y-4 py-6 m-auto text-gray-600">
                                    <li class="space-x-2">
                                        <span class="text-purple-500 font-semibold">&check;</span>
                                        <span>Monthly Installment</span>
                                    </li>
                                    <li class="space-x-2">
                                        <span class="text-purple-500 font-semibold">&check;</span>
                                        <span>Maximum Loan Period</span>
                                    </li>
                                    <li class="space-x-2">
                                        <span class="text-purple-500 font-semibold">&check;</span>
                                        <span>Lowest Interest Rates</span>
                                    </li>
                                </ul>
                                <p class="flex items-center justify-center space-x-4 text-lg text-gray-600 text-center">
                                    <span>Call us at</span>
                                    <a href="tel:+24300" class="flex space-x-2 items-center text-purple-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            class="w-6" viewBox="0 0 16 16">
                                            <path
                                                d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                        </svg>
                                        <span class="font-semibold">+1 000 000</span>
                                    </a>
                                    <span>or</span>
                                </p>
                                <a title="Get Registered"
                                    href="{{ route('register', ['loan_type' => $loan->loan_type]) }}"
                                    class="flex justify-center gap-3 items-center w-full py-3 px-6 text-center rounded-xl transition bg-purple-600 hover:bg-purple-700 active:bg-purple-800 focus:bg-indigo-600">
                                    <span class="text-white font-semibold">
                                        Get Registered
                                    </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="white" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                    </svg>
                                </a>
                                <button type="button" title="Use Loan Calculator"
                                    data-rate="{{ $loan->interest_rate }}" data-term="{{ $loan->duration }}"
                                    data-amount="{{ $loan->amount }}" data-loan-type="{{ $loan->loan_type }}"
                                    class="flex useCalc justify-center gap-3 items-center w-full py-3 px-6 text-center rounded-xl transition bg-blue-600 hover:bg-blue-700 active:bg-blue-800 focus:bg-blue-600">
                                    <span class="text-white font-semibold">
                                        Use Calculator
                                    </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="white" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="relative group md:w-6/12 lg:w-7/12">
                            <div aria-hidden="true"
                                class="absolute top-0 w-full h-full rounded-2xl bg-white shadow-lg transition duration-500 group-hover:scale-105">
                            </div>
                            <div class="relative p-6 pt-16 md:p-8 md:pl-12 md:rounded-r-2xl lg:pl-20 lg:p-16">
                                {!! $loan->criteria !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach

    <template id="calculatorContentTemplate">
        <div class="mb-4 text-left">
            <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                Loan Type
            </label>
            <select name="loan_type" id="loanType"
                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                <option value="">Select Loan Type</option>
                @foreach ($loans as $lt)
                    @php
                        $code = $lt->loan_type;
                        $type = $lt->loan_type_full;
                    @endphp
                    <option value="{{ $code }}" @if (old('loan_type') == $code) selected @endif>
                        {{ $type }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4 flex flex-col md:flex-row gap-5 md:gap-10 text-left">
            <div class="w-full md:w-1/2">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                    Duration (Yrs)
                </label>
                <input type="number" name="duration" placeholder="Loan duration in years" value="{{ old('duration') }}"
                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
            </div>
            <div class="w-full md:w-1/2">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                    Interest Rate (%)
                </label>
                <input type="number" name="interest_rate" placeholder="Interest Rate (%)" value="{{ old('interest_rate') }}" disabled
                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
            </div>
        </div>
        <div class="mb-4 flex flex-col md:flex-row gap-5 md:gap-10 text-left">
            <div class="w-full md:w-1/2">
                <label class="block mb-2 text-sm font-bold text-gray-700 label-max" for="email">
                    Amount (Max)
                </label>
                <input type="text" name="amount" placeholder="Loan Amount Upto" value="{{ old('amount') }}"
                    class="w-full px-3 py-2 mb-3  text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
            </div>
            <div class="w-full md:w-1/2">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                    Installment Amount (Rs)
                </label>
                <input type="text" name="installment" placeholder="Installment Amount (Rs)" value="{{ old('installment') }}" disabled
                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
            </div>
        </div>
    </template>

    <x-slot name="scripts">
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                function calculateInstallment(amount, duration, interest_rate) {
                    let interest = (amount * interest_rate) / 100;
                    let installment = (amount + interest) / (duration * 12);
                    return installment;
                }
                function rawInstallmentCalculator() {
                    const installment = calculateInstallment(
                        Number($('[name="amount"]').val()),
                        Number($('[name="duration"]').val()),
                        Number($('[name="interest_rate"]').val())
                    );
                    $('[name="installment"]').val(installment);
                }

                $('.useCalc').on('click', function() {
                    const self = this;
                    const template = document.querySelector('#calculatorContentTemplate').content;
                    loanCalculator.open();
                    loanCalculator.setContent(template.cloneNode(true));
                    $('#calculatorContent #loanType').val($(this).attr('data-loan-type'));
                    $('#calculatorContent .label-max').html(`Amount (Max Rs. ${ Number($(this).attr('data-amount')) })`);
                    $('#calculatorContent [name="interest_rate"]').val(Number($(this).attr('data-rate')));
                    $('#calculatorContent [name="duration"]').val(Number($(this).attr('data-term')));

                    $('#calculatorContent [name="amount"]').on('input', function() {
                        const max = Number($(self).attr('data-amount'));
                        if(max && max < Number($(this).val())) {
                            this.value = max;
                            return alert('Amount should be less than Rs. ' + max);
                        }
                        rawInstallmentCalculator();
                    });
                    $('#calculatorContent [name="amount"]').on('change', function() {
                        const max = Number($(self).attr('data-amount'));
                        if(max && max < Number($(this).val())) {
                            this.value = max;
                            return alert('Amount should be less than Rs. ' + max);
                        }
                        rawInstallmentCalculator();
                    });
                    $('#calculatorContent [name="duration"]').on('change', function(e) {
                        const max = Number($(self).attr('data-term'));
                        if(max && max < Number($(this).val())) {
                            this.value = max;
                            return alert('Duration should be less than ' + max + ' Yrs');
                        }
                        if(this.value < 1) {
                            this.value = 1;
                        }
                        rawInstallmentCalculator();
                    });
                });
            });
        </script>
    </x-slot>
</x-guest-layout>
