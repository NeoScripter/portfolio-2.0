<div x-data="imageUploader({{ json_encode($value ?? null) }})">
    <p class="block mb-1 text-sm font-medium text-gray-700">{{ $label }}</p>

   {{--  @isset($value)
        <div>
            <figure class="relative max-w-sm mb-1">
                <img class="rounded-lg" src="{{ Storage::url($value) }}" alt="{{ $altText ?? 'Image' }}">
            </figure>
        </div>
    @endisset --}}

    <div class="flex items-center justify-start w-full">
        <label for="{{ $inputId }}"
            class="flex flex-col items-center justify-center w-full max-w-md border-2 border-gray-300 border-dashed rounded-lg cursor-pointer h-44 bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                </svg>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                        upload</span> or drag and drop</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
            </div>
            <input id="{{ $inputId }}" name="{{ $inputName }}" type="file" class="hidden" @change="updatePreview" />
        </label>
    </div>

    <div class="max-w-md mt-4" x-show="uploadedImage !== null">
        <img  :src="uploadedImage" alt="">
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('imageUploader', (initialValue = null) => ({
                uploadedImage: initialValue,

            updatePreview(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.uploadedImage = e.target.result;
                    };
                    reader.readAsDataURL(file);
                } else {
                    this.uploadedImage = null;
                }
            }
        }));
    });
    </script>
</div>
