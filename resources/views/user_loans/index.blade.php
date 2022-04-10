<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Loan Requests
        </h2>
    </x-slot>

    <x-slot name="styles">
        <style>
            svg.rotate90 {
                transform-box: fill-box;
                transform-origin: center;
                transform: rotate(90deg);
            }
        </style>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @can('view-pending-requests')
                <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                    <div class="p-3">
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full">
                                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                    <tr>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Loan ID</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Name</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Email</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Loan Type</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-right">Loan Amount (Rs)</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-center">Interest Rate (%)</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-center">Loan Terms (Yrs)</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-right">Installment (Rs)</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm divide-y divide-gray-100">
                                    @forelse($loans as $loan)
                                        <tr>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left">L-{{ str_pad($loan->id, 7, 0, STR_PAD_LEFT) }}</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3">
                                                        <img
                                                            class="rounded-full"
                                                            src="{{ asset("images/icons/" . ($loan->sex == 'male' ? 'matthew.png' : 'stevie.jpg')) }}" width="40"
                                                            height="40"></div>
                                                    <div class="font-medium text-gray-800">{{ $loan->name }}</div>
                                                </div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left">{{ $loan->email }}</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left">{{ $loan->loan_type_full }} ({{ $loan->loan_type }})</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-right">Rs. {{ $loan->amount + 0 }}</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-center">{{ $loan->interest_rate + 0 }} %</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-center">{{ $loan->loan_terms + 0 }} Yrs</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-right">Rs. {{ $loan->installment + 0 }}</div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-3">No data</td>
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
