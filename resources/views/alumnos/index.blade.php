<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
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
                                    Nombre
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($alumnos as $alumno)
                                    <tr>
                                        <td class="px-6 py-2">{{ $alumno->nombre }}</td>
                                        <td class="px-6 py-4">
                                           <a href="{{ route('alumnos.edit', $alumno) }}" class="mt-4 text-blue-900 hover:underline">Editar</a>
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('alumnos.criterios', $alumno) }}" class="mt-4 text-blue-900 hover:underline">Criterios</a>
                                         </td>
                                        <td>
                                            <div class="text-sm text-gray-900 ">
                                                <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="px-4 py-1 text-sm text-white bg-red-400 rounded">Borrar</button>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('alumnos.show', $alumno) }}" class="mt-4 text-blue-900 hover:underline">Nota final</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="/alumnos/create" class="mt-4 text-blue-900 hover:underline">Insertar un nuevo alumno</a>
                    </x-alumnos>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
