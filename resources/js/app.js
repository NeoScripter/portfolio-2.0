import './bootstrap';

function imageLoading() {
    document.querySelectorAll('.image-loading').forEach(function(imageWrapper) {
        const image = imageWrapper.querySelector('img');

        function loaded() {
            imageWrapper.classList.add('image-loaded');
        }

        if (image.complete) {
            loaded();
        } else {
            image.addEventListener('load', loaded);
        }
    });


}


/* document.addEventListener('load-images', () => {
    imageLoading();
});
 */
/*
document.addEventListener('livewire:load', () => {
    Livewire.hook('message.processed', () => {
        Alpine.initTree(document.body); // Reinitializes Alpine on the updated DOM.
    });
}); */
