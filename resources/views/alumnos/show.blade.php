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
                    $notafinal += $nota->max('nota');
                    $contador++;
                @endphp
            @endforeach
            <tr>
                <td class="px-6 py-2">{{$notafinal / $contador}}</td>
            </tr>
        </tbody>
    </table>
</x-alumnos>
