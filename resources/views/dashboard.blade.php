<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

 <div class="">
    <h1>Contacts Data </h1>
    <table class="table-auto w-full border-collapse text-white">
        <thead>
            <tr>
                <th class="px-4 py-2 border">S.N.</th>
                <th class="px-4 py-2 border">First Name</th>
                <th class="px-4 py-2 border">Last Name</th>
                <th class="px-4 py-2 border">Telegram ID</th>
                <th class="px-4 py-2 border">Reason</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 border">{{ $contact->first_name }}</td>
                    <td class="px-4 py-2 border">{{ $contact->last_name }}</td>
                    <td class="px-4 py-2 border">{{ $contact->telegram_id }}</td>
                    <td class="px-4 py-2 border">{{ $contact->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
 </div>

</x-app-layout>
