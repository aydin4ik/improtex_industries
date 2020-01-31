<style lang="scss" scoped>
  .swiper-pagination{
    span{
      display: none;
    }
}
</style>

<template>
  <swiper :options="swiperOption">
    <swiper-slide v-for="(slide, index) in slides" :key="index">
      <div class="columns is-vcentered">
        <div class="column is-narrow">
          <p class="text-rotated-90 has-text-primary has-text-weight-bold">improtex industries / <span class="has-text-black">{{ slide.title }}</span></p>
        </div>
        <div class="column">
          <figure class="image is-3by1 m-b-50">
            <img :src="slide.image">
          </figure>
        </div>
        <div class="column is-narrow has-text-centered has-text-weight-bold">
          <p class="has-text-primary" v-if="index > 10">{{ index + 1 }}</p>
          <p class="has-text-primary" v-else>0{{ index + 1 }}</p>
          <p class="has-text-primary has-text-weight-bold">
            <span style="height: 2px; width: 20px;" class="is-block has-background-primary"></span>
          </p>
          <p class="has-text-black" v-if="totalSlides > 10"> {{ totalSlides }}</p>
          <p class="has-text-black" v-else>0{{ totalSlides }}</p>
        </div>
      </div>
    </swiper-slide>
    <div class="swiper-pagination" slot="pagination"></div>
  </swiper>
</template>

<script>
  export default {
    data() {
      return {
        swiperOption: {
          pagination: {
            el: '.swiper-pagination',
          }
        },
        slides: this.slideImages,
      }
    },
    computed: {
      totalSlides () {
        return this.slides.length;
      }
    },
    props: ['slide-images']
  }
</script>

