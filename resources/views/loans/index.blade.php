<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Loans
            </h2>
            <div>
                @can('add-loans')
                    <a href="{{ route('loans.add') }}"
                        class="flex items-center rounded-lg bg-indigo-500 px-4 py-2 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        <span class="font-medium subpixel-antialiased">Add Loan</span>
                    </a>
                @endcan
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @can('view-loans')
                <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                    <div class="p-3">
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full">
                                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                    <tr>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Loan Type</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Duration (Yrs)</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-center">Interest Rate (%)</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-right">Amount Upto (Rs)</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-right">Installment (Rs)</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm divide-y divide-gray-100">
                                    @forelse($list as $loan)
                                        <tr>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left">{{ $loan->loan_type_full }} ({{ $loan->loan_type }})</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left">{{ $loan->duration + 0 }} Yrs</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-center font-medium ">{{ $loan->interest_rate + 0 }} %</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-right font-medium text-green-500">Rs. {{ $loan->amount + 0 }}</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-right">Rs. {{ $loan->installment + 0}}</div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-3">No data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    </div>
</x-app-layout>
