<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Messages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("") }}
                    
                    <div class="max-w-md mx-auto">
                    <form action="{{ route('messages.store') }}" method="POST">
                        @csrf
                        <label for="message" class="block">Message</label>
                        <textarea id="message" name="message" class="w-full border rounded-md px-3 py-2" rows="5" placeholder="Enter your message here"></textarea>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Add Message
                        </button>
                    </form>
                </div>

                </div>
            
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Messages</h2>
                        @if(isset($datos))
                            @if($datos->count() > 0)
                                @foreach ($datos as $dato)
                                    <div class="border border-gray-300 dark:border-gray-700 rounded-md p-4 mb-4">
                                        <p id="message_{{ $dato->id }}">{{ $dato->message }}</p>
                                        <div class="mt-2 flex justify-end">
                                        <button onclick="editMessage('{{ $dato->id }}')" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 mr-2 rounded">
                                                Edit
                                        </button>
                                            <form action="{{ route('messages.destroy', $dato->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>No messages available</p>
                            @endif
                        @else
                            <p>Error loading messages</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Agregar el script JavaScript aquí -->
    <script>
        function editMessage(id) {
            let messageElement = document.getElementById('message_' + id);
            let messageText = messageElement.textContent;
            let textarea = document.createElement('textarea');
            textarea.className = 'w-full border rounded-md px-3 py-2';
            textarea.value = messageText;
            let saveButton = document.createElement('button');
            saveButton.innerHTML = 'Save';
            saveButton.className = 'bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded';
            saveButton.onclick = function() {
                let newMessage = textarea.value;
                messageElement.textContent = newMessage;
                // Aquí puedes agregar la lógica para guardar el mensaje actualizado en el servidor
            };
            messageElement.innerHTML = '';
            messageElement.appendChild(textarea);
            messageElement.appendChild(saveButton);
        }
    </script>
</x-app-layout>