<section>
    <div>
        <h2 class="text-lg font-medium text-gray-900">
            Create a new service
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Enter data to create a new service
        </p>
    </div>

    <form method="POST" action="{{ route('admin.service.store') }}" enctype="multipart/form-data" class="mt-4 space-y-8">
        @csrf

        <x-form-field name="title_en" label="English title" :value="old('title_en')" />
        <x-form-field name="title_fr" label="French title" :value="old('title_fr')" />
        <x-form-field name="title_ru" label="Russian title" :value="old('title_ru')" />

        <x-admin.image-upload
            label="Service image"
            input-id="image"
            input-name="image"
        />

        <x-form-field name="image_alt_en" label="English featured image alt" :value="old('image_alt_en')" />
        <x-form-field name="image_alt_fr" label="French featured image alt" :value="old('image_alt_fr')" />
        <x-form-field name="image_alt_ru" label="Russian featured image alt" :value="old('image_alt_ru')" />

        <x-form-field name="deadline_en" label="Deadline in English" :value="old('deadline_en')" />
        <x-form-field name="deadline_fr" label="Deadline in French" :value="old('deadline_fr')" />
        <x-form-field name="deadline_ru" label="Deadline in Russian" :value="old('deadline_ru')" />

        <x-form-field name="description_en" :isTextarea=true label="English main description" :value="old('description_en')" />
        <x-form-field name="description_fr" :isTextarea=true label="French main description" :value="old('description_fr')" />
        <x-form-field name="description_ru" :isTextarea=true label="Russian main description" :value="old('description_ru')" />

        <x-admin.checkbox name="is_featured" label="Show on the homepage" />

        <x-form-field name="priority" type="number" label="Displaying order" />

        <x-form-field name="min_price" type="number" label="Mimimum price" />

        <hr>

        <div class="flex items-center gap-4 pt-2">
            <x-admin.primary-button>{{ __('Create') }}</x-admin.primary-button>
        </div>
    </form>

  {{--   <script>
        document.addEventListener('DOMContentLoaded', function () {
            const firstError = document.querySelector('.text-red-600');
            if (firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                firstError.focus();
            }
        });
    </script> --}}
</section>

