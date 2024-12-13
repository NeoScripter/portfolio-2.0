<div x-data="{ initVideo() { document.addEventListener('click', () => this.$refs.video.play()) } }"
     x-init="initVideo()"
     class="absolute inset-0 w-full h-full -z-10">

  <video x-ref="video"
         id="autoVideo"
         class="object-cover object-right-top w-full h-full"
         src="{{ asset('images/home/video_bg.mp4') }}"
         autoplay muted loop playsinline>
  </video>

</div>
