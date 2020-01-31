<template>
  <div>

      <!-- swiper1 -->
      <swiper :options="swiperOptionTop" class="gallery-top" ref="swiperTop">

        <swiper-slide v-for="(item, index) in galleryImages" :key="index">
          <figure class="image is-3by4" v-if="item.orientation == 'portrait'">
            <img :src="item.image">
          </figure>
          <figure class="image is-5by3" v-else>
            <img :src="item.image">
          </figure>
        </swiper-slide>
        <div class="swiper-button-next swiper-button-white" slot="button-next"></div>
        <div class="swiper-button-prev swiper-button-white" slot="button-prev"></div>
      </swiper>
      <!-- swiper2 Thumbs -->
      <swiper :options="swiperOptionThumbs" class="gallery-thumbs" ref="swiperThumbs">
        <swiper-slide v-for="(item, index) in galleryImages" :key="index">
          <figure class="image is-5by3">
            <img :src="item.image">
          </figure>
        </swiper-slide>
      </swiper>
  </div>
</template>


<script>
  export default {
    data() {
      return {
        swiperOptionTop: {
          spaceBetween: 10,
          loop: true,
          loopedSlides: this.galleryImages.length, //looped slides should be the same
          autoHeight: true,
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
          }
        },
        swiperOptionThumbs: {
          spaceBetween: 10,
          slidesPerView: 3,
          touchRatio: 0.2,
          loop: true,
          loopedSlides: this.galleryImages.length, //looped slides should be the same
          slideToClickedSlide: true,
        },
      }
    },
    props: ['galleryImages', 'currentIndex'],
    mounted() {
      this.$nextTick(() => {
        const swiperTop = this.$refs.swiperTop.swiper
        const swiperThumbs = this.$refs.swiperThumbs.swiper
        swiperTop.controller.control = swiperThumbs
        swiperThumbs.controller.control = swiperTop
      });
    },
    computed: {
      topSwiper () {
        return this.$refs.swiperTop.swiper
      },
      thumbsSwiper () {
        return this.$refs.swiperThumbs.swiper
      }
    },
    methods: {
      refresh () {
        setTimeout(() => {
          this.$children.forEach(child => {
            child.update();
            this.topSwiper.slideTo(this.currentIndex, 100, false);
          });
        }, 1);
      },
    }
  }
</script>

<style lang="scss" scoped>
  .swiper-container {
    background-color: #000;
  }
  .swiper-slide {
    background-size: cover;
    background-position: center;
  }
  .gallery-top {
    height: 80%!important;
    width: 100%;
  }
  .gallery-thumbs {
    height: 20%!important;
    box-sizing: border-box;
    padding: 10px 0;
  }
  .gallery-thumbs .swiper-slide {
    width: 25%;
    height: 100%;
    opacity: 0.4;
  }
  .gallery-thumbs .swiper-slide-active {
    opacity: 1;
  }
</style>