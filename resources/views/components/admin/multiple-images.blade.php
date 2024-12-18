<div x-data="multiImageUploader">
    <!-- Label -->
    <p class="block mb-1 text-sm font-medium text-gray-700">{{ $label }}</p>

    <!-- File Input -->
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
            <input id="{{ $inputId }}" name="{{ $inputName }}" type="file" class="hidden" multiple @change="updatePreviews">
        </label>
    </div>

    <!-- Preview Images -->
    <div class="grid grid-cols-2 gap-4 mt-4" x-show="uploadedImages.length > 0">
        <template x-for="(image, index) in uploadedImages" :key="index">
            <div class="relative">
                <img :src="image" alt="Uploaded Image" class="w-full h-auto border border-gray-300 rounded-lg">
                <button @click="removeImage(index)" type="button"
                    class="absolute p-1 text-white bg-red-600 rounded-full top-2 right-2 hover:bg-red-700">
                    &times;
                </button>
            </div>
        </template>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('multiImageUploader', () => ({
            uploadedImages: [],

            updatePreviews(event) {
                const files = Array.from(event.target.files);

                files.forEach(file => {
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();

                        reader.onload = (e) => {
                            this.uploadedImages.push(e.target.result); // Add the image URL to the array
                        };

                        reader.readAsDataURL(file); // Read the file as Data URL
                    }
                });
            },

            removeImage(index) {
                this.uploadedImages.splice(index, 1); // Remove the image from the array
            }
        }));
    });
</script>
