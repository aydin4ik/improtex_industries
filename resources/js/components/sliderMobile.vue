<!-- You can custom the "mySwiper" name used to find the swiper instance in current component -->
<template>
  <div>
    <swiper ref="swiperImage">
      <swiper-slide v-for="(slide, index) in slides" :key="index">
            <figure class="image is-square">
              <img :src="slide.imageMobile">
            </figure>
      </swiper-slide>
      
    </swiper>
    <swiper :options="titleOption" ref="swiperTitle">
      <swiper-slide v-for="(slide, index) in slides" :key="index" class="m-b-30">
        <div class="notification is-primary is-radiusless is-marginless is-capitalized has-text-weight-bold p-t-10 p-b-10 p-l-10 p-r-10 is-size-7">
          <span>
            improtex industries
          </span>
          <span class="is-pulled-right">
            <i class="fas fa-images"></i>
          </span>
        </div>
        <div class="notification is-grey is-radiusless is-capitalized p-t-10 p-b-10 p-l-10 is-size-7">
          <p class="has-text-weight-bold">
            {{ slide.title }}
          </p>
          <p class="has-text-weight-light">
              {{ slide.description }}
          </p>
        </div>
        

      </swiper-slide>
      <div class="swiper-pagination" slot="pagination"></div>
    </swiper>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        titleOption: {
          effect: 'fade',
          pagination: {
            el: '.swiper-pagination',
            dynamicBullets: true,
            dynamicMainBullets: 3,
          }
        },
        slides: this.slideImages,
      }
    },
    mounted() {
      this.$nextTick(() => {
        const swiperImage = this.$refs.swiperImage.swiper
        const swiperTitle = this.$refs.swiperTitle.swiper
        swiperImage.controller.control = swiperTitle
        swiperTitle.controller.control = swiperImage
      });
    },
    computed: {
      totalSlides () {
        return this.slides.length;
      }
    },
    props: ['slide-images']
  }
</script>