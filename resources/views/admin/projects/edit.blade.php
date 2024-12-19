<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Редактировать менеджера
        </h2>
    </x-slot>

    @if (isset($project))
        <section>
            <form method="POST" action="{{ route('admin.project.update', $project->id) }}" enctype="multipart/form-data"
                class="mt-4 space-y-4">
                @csrf
                @method('PUT')

                <!-- Back Link -->
                <div class="flex items-center gap-4">
                    <x-admin.link href="{{ route('admin.projects.index') }}">Back</x-admin.link>
                </div>
                <hr>

                <x-form-field name="title_en" label="English title" :value="$project->title_en" />
                <x-form-field name="title_fr" label="French title" :value="$project->title_fr" />
                <x-form-field name="title_ru" label="Russian title" :value="$project->title_ru" />

                <x-admin.image-upload
                    label="Project main image"
                    input-id="image"
                    input-name="image"
                    :value="$project->image ? Storage::url($project->image) : null"
                />

                <x-admin.image-upload
                    label="Project featured image"
                    input-id="featured_image"
                    input-name="featured_image"
                    :value="$project->image ? Storage::url($project->featured_image) : null"
                />

                <x-form-field name="image_alt_en" label="English featured image alt" :value="$project->image_alt_en" />
                <x-form-field name="image_alt_fr" label="French featured image alt" :value="$project->image_alt_fr" />
                <x-form-field name="image_alt_ru" label="Russian featured image alt" :value="$project->image_alt_ru" />

                <x-form-field name="description_en" :isTextarea=true label="English main description" :value="$project->description_en" />
                <x-form-field name="description_fr" :isTextarea=true label="French main description" :value="$project->description_fr" />
                <x-form-field name="description_ru" :isTextarea=true label="Russian main description" :value="$project->description_ru" />

                <x-admin.checkbox name="is_featured" label="Show on the homepage" :value="$project->is_featured ?? false" />

                <x-form-field name="priority" type="number" label="Displaying order" :value="$project->priority" />

                <x-form-field name="website_link" label="Website link" :value="$project->website_link" />

                <x-admin.array-field
                    field-name="stack"
                    label="Tech stack"
                    singular-label="stack"
                    placeholder="for example, JavaScript..."
                    :values="$project->stack"
                />

                <x-admin.array-field
                    field-name="text_content_en"
                    label="Project descriptions in English"
                    singular-label="English description"
                    placeholder="This project represents..."
                    :values="$project->text_content_en"
                />

                <x-admin.array-field
                    field-name="text_content_fr"
                    label="Project descriptions in French"
                    singular-label="French description"
                    placeholder="Ce projet represent..."
                    :values="$project->text_content_fr"
                />

                <x-admin.array-field
                    field-name="text_content_ru"
                    label="Project descriptions in Russian"
                    singular-label="Russian description"
                    placeholder="Этот проект представляет собой..."
                    :values="$project->text_content_ru"
                />

                <x-admin.multiple-images
                    label="Project images"
                    input-id="image_content"
                    input-name="image_content"
                    :values="$project->image_content"
                />

                <x-admin.array-field
                    field-name="image_content_alt_en"
                    label="Image alts in English"
                    singular-label="English image alts"
                    placeholder="This image is..."
                    :values="$project->image_content_alt_en"
                />

                <x-admin.array-field
                    field-name="image_content_alt_fr"
                    label="Image alts in French"
                    singular-label="French image alts"
                    placeholder="Cette photo a..."
                    :values="$project->image_content_alt_fr"
                />

                <x-admin.array-field
                    field-name="image_content_alt_ru"
                    label="Image alts in Russian"
                    singular-label="Russian image alts"
                    placeholder="На этой фотографии..."
                    :values="$project->image_content_alt_ru"
                />

                <hr>

                <!-- Save and Delete Buttons -->
                <div class="flex items-center gap-4">
                    <x-admin.primary-button>{{ __('Update') }}</x-admin.primary-button>

                    <x-admin.danger-button x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-project-deletion')">
                        {{ __('Delete project') }}
                    </x-admin.danger-button>
                </div>
            </form>

        </section>

        <!-- Confirmation Modal for Deletion -->
        <x-admin.modal name="confirm-project-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
            <form method="post" action="{{ route('admin.project.destroy', $project->id) }}" class="p-6">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium text-gray-900">
                    Are you sure you want to delete this project?
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    There will be no way to restore it after deletion.
                </p>

                <div class="flex justify-end mt-6">
                    <x-admin.secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-admin.secondary-button>

                    <x-admin.danger-button class="ms-3">
                        {{ __('Delete') }}
                    </x-admin.danger-button>
                </div>
            </form>
        </x-admin.modal>
    @endif

</x-admin-layout>
