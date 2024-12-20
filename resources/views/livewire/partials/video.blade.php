<div x-data="{
    initVideo() {
        this.$nextTick(() => {
            if (this.$refs.video) {
                document.addEventListener('click', () => {
                    this.$refs.video.play();
                }, { once: true });
            } else {
                console.error('Video element is undefined');
            }
        });
    }
 }"
 x-init="initVideo()"
 class="absolute inset-0 w-full h-full -z-10">

 <video x-ref="video"
        id="autoVideo"
        class="object-cover object-right-top w-full h-full"
        src="{{ asset('images/home/hero_web.mp4') }}"
        autoplay muted loop playsinline disablePictureInPicture tabindex="-1">
 </video>
</div>
