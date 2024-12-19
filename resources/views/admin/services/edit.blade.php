<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Edit service
        </h2>
    </x-slot>

    @if (isset($service))
        <section>
            <form method="POST" action="{{ route('admin.service.update', $service->id) }}" enctype="multipart/form-data"
                class="mt-4 space-y-8">
                @csrf
                @method('PUT')

                <!-- Back Link -->
                <div class="flex items-center gap-4">
                    <x-admin.link href="{{ route('admin.services.index') }}">Back</x-admin.link>
                </div>
                <hr>

                <x-form-field name="title_en" label="English title" :value="$service->title_en" />
                <x-form-field name="title_fr" label="French title" :value="$service->title_fr" />
                <x-form-field name="title_ru" label="Russian title" :value="$service->title_ru" />

                <x-admin.image-upload label="Service image" input-id="image" input-name="image" :value="$service->image ? Storage::url($service->image) : null" />

                <x-form-field name="image_alt_en" label="English featured image alt" :value="$service->image_alt_en" />
                <x-form-field name="image_alt_fr" label="French featured image alt" :value="$service->image_alt_fr" />
                <x-form-field name="image_alt_ru" label="Russian featured image alt" :value="$service->image_alt_ru" />

                <x-form-field name="deadline_en" label="Deadline in English" :value="$service->deadline_en" />
                <x-form-field name="deadline_fr" label="Deadline in French" :value="$service->deadline_fr" />
                <x-form-field name="deadline_ru" label="Deadline in Russian" :value="$service->deadline_ru" />

                <x-form-field name="description_en" :isTextarea=true label="English main description"
                    :value="$service->description_en" />
                <x-form-field name="description_fr" :isTextarea=true label="French main description"
                    :value="$service->description_fr" />
                <x-form-field name="description_ru" :isTextarea=true label="Russian main description"
                    :value="$service->description_ru" />

                <x-admin.checkbox name="is_featured" label="Show on the homepage" />

                <x-form-field name="priority" type="number" label="Displaying order" :value="$service->priority" />

                <x-form-field name="min_price" type="number" label="Mimimum price" :value="$service->min_price" />

                <hr>

                <!-- Save and Delete Buttons -->
                <div class="flex items-center gap-4">
                    <x-admin.primary-button>{{ __('Update') }}</x-admin.primary-button>

                    <x-admin.danger-button x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-service-deletion')">
                        {{ __('Delete service') }}
                    </x-admin.danger-button>
                </div>
            </form>

        </section>

        <!-- Confirmation Modal for Deletion -->
        <x-admin.modal name="confirm-service-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
            <form method="post" action="{{ route('admin.service.destroy', $service->id) }}" class="p-6">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium text-gray-900">
                    Are you sure you want to delete this service?
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

            {{-- <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const firstError = document.querySelector('.text-red-600');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        firstError.focus();
                    }
                });
            </script> --}}
        </x-admin.modal>
    @endif

</x-admin-layout>
