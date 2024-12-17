<section>
    <div>
        <h2 class="text-lg font-medium text-gray-900">
            Create a new project
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Enter data to create a new project
        </p>
    </div>

    <form method="POST" action="{{ route('admin.project.store') }}" enctype="multipart/form-data" class="mt-4 space-y-4">
        @csrf

        <!-- Manager Name -->
        <x-form-field name="title" label="Имя менеджера" />

        <!-- Image Upload -->
        <x-admin.image-upload
            label="Фото менеджера"
            alt-text="Фото менеджера"
            new-label="Новое фото"
            input-id="image"
            input-name="image"
        />

        <!-- Submit Button -->
        <div class="flex items-center gap-4">
            <x-admin.primary-button>{{ __('Create') }}</x-admin.primary-button>
        </div>
    </form>
</section>
