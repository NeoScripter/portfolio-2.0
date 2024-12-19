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

        <x-form-field name="title_en" label="English title" />
        <x-form-field name="title_fr" label="French title" />
        <x-form-field name="title_ru" label="Russian title" />

        <x-admin.image-upload
            label="Service image"
            input-id="image"
            input-name="image"
        />

        <x-form-field name="image_alt_en" label="English featured image alt" />
        <x-form-field name="image_alt_fr" label="French featured image alt" />
        <x-form-field name="image_alt_ru" label="Russian featured image alt" />

        <x-form-field name="deadline_en" label="Deadline in English" />
        <x-form-field name="deadline_fr" label="Deadline in French" />
        <x-form-field name="deadline_ru" label="Deadline in Russian" />

        <x-form-field name="description_en" :isTextarea=true label="English main description" />
        <x-form-field name="description_fr" :isTextarea=true label="French main description" />
        <x-form-field name="description_ru" :isTextarea=true label="Russian main description" />

        <x-admin.checkbox name="is_featured" label="Show on the homepage" />

        <x-form-field name="priority" type="number" label="Displaying order" />

        <x-form-field name="min_price" type="number" label="Mimimum price" />

        <hr>

        <div class="flex items-center gap-4 pt-2">
            <x-admin.primary-button>{{ __('Create') }}</x-admin.primary-button>
        </div>
    </form>
</section>


{{--
$table->json('image_content')->nullable();


            $table->string('image')->nullable();
            $table->string('image_alt_en')->nullable();
            $table->string('image_alt_fr')->nullable();
            $table->string('image_alt_ru')->nullable();
            $table->string('title_en');
            $table->string('title_fr');
            $table->string('title_ru');
            $table->string('deadline_en');
            $table->string('deadline_fr');
            $table->string('deadline_ru');
            $table->string('description_en');
            $table->string('description_fr');
            $table->string('description_ru');
            $table->boolean('is_featured')->default(true);
            $table->integer('priority')->default(1);
            $table->integer('min_price')->default(100);
--}}
