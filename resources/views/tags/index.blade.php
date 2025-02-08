<x-app-layout>
    <div class="mb-4 ">
        <div class="flex items-center p-2 w-full justify-between">
            <div class="flex items-center space-x-4">
                <h1 class="text-2xl font-semibold text-gray-800">
                    Tags
                </h1>
            </div>
            <a href="{{ route('tags.create') }}" class="right-0 bg-gray-50 px-4 py-2 rounded-md text-gray-800 shadow-sm hover:bg-gray-100" type="submit">
                Create Tag
            </a>
        </div>
    </div>

    <div class="rounded-lg">
        <table class="table-auto w-full text-left rounded-2xl">
            <thead class="bg-gray-100 text-gray-700 rounded-3xl">
            <tr>
                <th class="px-4 py-2 rounded-tl-lg border-b border-gray-200">#</th>
                <th class="px-4 py-2 border-b border-gray-200">Title</th>
                <th class="px-4 py-2 border-b border-gray-200">Description</th>
                <th class="px-4 py-2 border-b border-gray-200">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($tags as $tag)
                <tr class="border-b border-gray-200">
                    <td class="text-xs px-4 py-2">{{ $tag->id }}</td>
                    <td class="text-xs px-4 py-2">{{ $tag->title }}</td>
                    <td class="text-xs px-4 py-2">{{ $tag->description ?? '-' }} </td>
                    <td class="px-4 py-2 text-center">
                        <div class="flex justify-center items-center p-2 space-x-2 text-xs ">
                            <a
                                href="{{ route('tags.show', $tag->id) }}"
                                class="hover:underline"
                            >
                                    <span class="text-sm material-symbols-outlined">
                                        visibility
                                    </span>
                            </a>
                            <a
                                href="{{ route('tags.edit', $tag->id) }}"
                                class="hover:underline"
                            >
                                    <span class="text-sm material-symbols-outlined">
                                        edit_square

                                    </span>
                            </a>
                            <form
                                action="{{ route('tags.destroy', $tag->id) }}"
                                method="POST"
                                class="inline"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="">
                                    <span class="text-sm material-symbols-outlined">
                                        delete
                                    </span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
