@props([
    'fieldName' => '',
    'label',
    'singularLabel',
    'placeholder' => '',
    'isTextarea' => false,
    'values' => [],
])

<div x-data="{
    items: {{ json_encode($values) }},
    placeholder: '{{ $placeholder }}',
    fieldName: '{{ $fieldName }}',
    addItem() {
        this.items.push('');
    },
    removeItem(index) {
        this.items.splice(index, 1);
    }
}">
    <x-admin.input-label :for="$fieldName" :value="$label" />

    <!-- Dynamic inputs -->
    <template x-for="(item, index) in items" :key="index">
        <div class="flex items-center mb-2 space-x-2">
            @if ($isTextarea)
                <textarea :name="`${fieldName}[${index}]`" x-model="items[index]"
            class="block w-full mt-1 rounded-md shadow-sm" :placeholder="placeholder" rows="8"></textarea>
            @else
                <input type="text" :name="`${fieldName}[${index}]`" x-model="items[index]"
            class="block w-full mt-1 rounded-md shadow-sm" :placeholder="placeholder" />
            @endif
            <x-admin.danger-button type="button" @click="removeItem(index)" class="py-3 mt-1">
                Delete
            </x-admin.danger-button>
        </div>
    </template>

    <!-- Add new item button -->
    <x-admin.primary-button type="button" @click="addItem" class="mt-2">
        Add {{ $singularLabel }}
    </x-admin.primary-button>

    <x-admin.input-error :messages="$errors->get($fieldName)" class="mt-2" />
</div>
