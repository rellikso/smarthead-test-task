<div x-data="{ open: false }" class="max-w-lg mx-auto">

    <!-- Кнопка раскрытия -->
    <button @click="open = !open"
            class="widget-button w-full px-4 py-2 rounded font-semibold transition-colors">
        <span x-text="open ? 'Свернуть форму тикета' : 'Отправить тикет'"></span>
    </button>

    <!-- Форма -->
    <div x-show="open" x-transition class="widget-form mt-4 p-6">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">Отправить тикет</h2>

        @if (session()->has('success'))
            <div class="mb-4 text-green-600 font-semibold">{{ session('success') }}</div>
        @endif

        @if (session()->has('error'))
            <div class="mb-4 text-red-600 font-semibold">{{ session('error') }}</div>
        @endif

        <!-- Поля формы -->
        @foreach (['name'=>'Имя', 'email'=>'Email', 'phone'=>'Телефон (E.164)', 'subject'=>'Тема'] as $field => $label)
            <div class="mb-3">
                <label class="block text-gray-700 mb-1">{{ $label }}</label>
                <input type="{{ $field === 'email' ? 'email' : 'text' }}"
                       wire:model="{{ $field }}"
                       class="border border-gray-300 rounded px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error($field) <span class="text-red-600">{{ $message }}</span> @enderror
            </div>
        @endforeach

        <!-- Текст -->
        <div class="mb-3">
            <label class="block text-gray-700 mb-1">Текст</label>
            <textarea wire:model="text" class="border border-gray-300 rounded px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            @error('text') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Файлы -->
        <div class="mb-3">
            <label class="block text-gray-700 mb-1">Файлы</label>
            <input type="file" wire:model="files" multiple
                   class="border border-gray-300 rounded px-3 py-2 w-full">
            @error('files') <span class="text-red-600">{{ $message }}</span> @enderror
            <div wire:loading wire:target="files" class="text-gray-500 mt-1">Загрузка...</div>
        </div>

        <button wire:click="submit"
                class="w-full bg-blue-600 text-white py-2 rounded font-semibold hover:bg-blue-700 transition-colors">
            Отправить тикет
        </button>
    </div>

</div>
