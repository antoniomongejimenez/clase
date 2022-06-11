<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nota final') }}
        </h2>
    </x-slot>
<x-alumnos>
    <table class="table-auto">
        <thead>
            <th class="px-6 py-2 text-gray-500">
                Nota final
            </th>
        </thead>
        <tbody>
            @foreach ($notas as $nota)
                @php
                    $coleccionnotafinal = $coleccionnotafinal->concat([$nota->max('nota')]);
                @endphp
            @endforeach
            <tr>
                <td class="px-6 py-2">{{$coleccionnotafinal->avg()}}</td>
            </tr>
        </tbody>
    </table>
</x-alumnos>
</x-app-layout>
