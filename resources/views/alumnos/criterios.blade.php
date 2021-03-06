<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nota de cada criterio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-alumnos>
                        <table class="table-auto">
                            <thead>
                                <th class="px-6 py-2 text-gray-500">
                                    ccee
                                </th>
                                <th class="px-6 py-2 text-gray-500">
                                    nota
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($notas as $nota)
                                    <tr>
                                        <td class="px-6 py-2">{{ $nota->first()->ccee->ce}}</td>
                                        <td class="px-6 py-2">{{ $nota->max('nota') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </x-alumnos>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
