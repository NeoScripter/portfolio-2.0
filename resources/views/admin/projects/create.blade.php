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

        <x-form-field name="title_en" label="English title" />
        <x-form-field name="title_fr" label="French title" />
        <x-form-field name="title_ru" label="Russian title" />

        <x-admin.image-upload
            label="Project main image"
            input-id="image"
            input-name="image"
        />

        <x-admin.image-upload
            label="Project featured image"
            input-id="featured_image"
            input-name="featured_image"
        />

        <x-form-field name="image_alt_en" label="English featured image alt" />
        <x-form-field name="image_alt_fr" label="French featured image alt" />
        <x-form-field name="image_alt_ru" label="Russian featured image alt" />

        <x-form-field name="description_en" :isTextarea=true label="English main description" />
        <x-form-field name="description_fr" :isTextarea=true label="French main description" />
        <x-form-field name="description_ru" :isTextarea=true label="Russian main description" />

        <x-admin.checkbox name="is_featured" label="Show on the homepage" />

        <x-form-field name="priority" type="number" label="Displaying order" />

        <x-form-field name="website_link" label="Website link" />

        <x-admin.array-field
            field-name="stack"
            label="Tech stack"
            singular-label="stack"
            placeholder="for example, JavaScript..."
            :values="[]"
        />

        <x-admin.array-field
            field-name="text_content_en"
            label="Project descriptions in English"
            singular-label="English description"
            placeholder="This project represents..."
            :values="[]"
        />

        <x-admin.array-field
            field-name="text_content_fr"
            label="Project descriptions in French"
            singular-label="French description"
            placeholder="Ce projet represent..."
            :values="[]"
        />

        <x-admin.array-field
            field-name="text_content_ru"
            label="Project descriptions in Russian"
            singular-label="Russian description"
            placeholder="Этот проект представляет собой..."
            :values="[]"
        />

        <x-admin.multiple-images
            label="Project images"
            input-id="image_content"
            input-name="image_content"
            :values="[]"
        />

        <x-admin.array-field
            field-name="image_content_alt_en"
            label="Image alts in English"
            singular-label="English image alts"
            placeholder="This image is..."
            :values="[]"
        />

        <x-admin.array-field
            field-name="image_content_alt_fr"
            label="Image alts in French"
            singular-label="French image alts"
            placeholder="Cette photo a..."
            :values="[]"
        />

        <x-admin.array-field
            field-name="image_content_alt_ru"
            label="Image alts in Russian"
            singular-label="Russian image alts"
            placeholder="На этой фотографии..."
            :values="[]"
        />

        <hr>

        <div class="flex items-center gap-4 pt-2">
            <x-admin.primary-button>{{ __('Create') }}</x-admin.primary-button>
        </div>
    </form>
</section>


{{--
$table->json('image_content')->nullable();


$table->json('stack')->nullable();
$table->json('text_content_en')->nullable();
$table->json('text_content_fr')->nullable();
$table->json('text_content_ru')->nullable();
$table->json('image_content')->nullable();
$table->json('image_content_alt_en')->nullable();
$table->json('image_content_alt_fr')->nullable();
$table->json('image_content_alt_ru')->nullable();
$table->string('website_link')->nullable();
$table->boolean('is_featured')->default(true);
$table->integer('priority')->default(1);
$table->string('description_en');
$table->string('description_fr');
$table->string('description_ru');
$table->string('featured_image')->nullable();
$table->string('image_alt_en')->nullable();
$table->string('image_alt_fr')->nullable();
$table->string('image_alt_ru')->nullable();
$table->string('image')->nullable();
$table->string('title_en');
$table->string('title_fr');
$table->string('title_ru');

--}}
