<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Etiquetas</title>

        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-200 py-10">
        <div class="max-w-lg bg-white mx-auto p-5 rounded shadow">
            @if ($errors->any())
                <ul class="list-none p-4 mb-4 bg-red-100 text-red-500">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <div class="flex justify-between">
                <a class="flex items-center mb-5 text-blue-500 font-bold" href="/">
                    <i class="fas fa-tags"></i>
                    <span class="ml-1">Administrador de Etiquetas</span>
                </a>
    
                @if(isset($tag))
                    <a class="flex items-center mb-5 text-blue-500" href="/">
                        <i class="fas fa-arrow-left"></i>
                        <span class="ml-1">Volver</span>
                    </a>
                @endif
            </div>

            <form action="tags" method="POST" class="flex mb-4">
                @csrf
                <input type="text" name="name" class="rounded-l bg-gray-200 p-4 w-full outline-none" placeholder="Nueva Etiqueta">
                <input type="submit" value="Agregar" class="px-8 rounded-r bg-blue-500 text-white outline-none">
            </form>
            <h4 class="text-lg text-center font-bold mb-6">Listado de Etiquetas</h4>
            <table>
                <thead>
                    <tr>
                        <th>Etiqueta</th>
                        <th>URL</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tags as $tag)
                    <tr>
                        <td class="border px-4 py-2">{{ $tag->name }}</td>
                        <td class="border px-4 py-2">{{ $tag->slug }}</td>
                        <td class="px-4 py-2">
                            <form action="tags/{{ $tag->id }}" method="POST">
                                @csrf 
                                @method('DELETE')
                                <div class="flex gap-1 items-center p-2 max-h-8 rounded bg-red-500 text-white">
                                    <i class="fas fa-trash"></i>
                                    <input type="submit" value="Eliminar">
                                </div>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td><p>No hay Etiquetas</p></td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </body>
</html>