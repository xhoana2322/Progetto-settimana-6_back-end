<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Prenotazioni') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <table class="table align-middle mt-4">
                        <thead class="table-light align-middle text-center">
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">users_id</th>
                            <th scope="col">corsis_id</th>
                            <th scope="col">is_pending</th>
                            <!-- <th scope="col">Azioni</th> -->
                            </tr>
                        </thead>
                        <tbody class="table-group-divider text-center">
                            @if($prenotazioni)
                                @foreach($prenotazioni as $key => $value)
                                    <tr>
                                        <th scope="row">{{$value->id}}</th>
                                        <td  class="text-center">{{ $value->users_id }}</td>
                                        <td>{{$value->corsis_id}}</td>
                                        <td>{{ $value->isPending }}</td>
                                        
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>