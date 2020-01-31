<template>
  <div>
    <swiper :options="titleOption">
      <swiper-slide v-for="slide in portraitSlides" :key="slide.index" class="m-b-30">
        <div class="columns is-centered is-vcentered is-mobile is-multiline">
            <div class="column is-5-mobile" v-for="(item, i) in slide" :key="i">
                <a class="box is-paddingless p-t-5 p-b-5 p-l-5 p-r-5" @click.prevent="openModal(e, item)">
                    <figure class="image is-4by5">
                        <img :src="item.image">
                    </figure>
                </a>
            </div>
        </div>
      </swiper-slide>
      <swiper-slide v-for="slide in landscapeSLides" :key="slide.index" class="m-b-30">
        <div class="columns is-centered is-vcentered is-mobile is-multiline">
            <div class="column is-10-mobile" v-for="(item, i) in slide" :key="i">
                <a class="box is-paddingless p-t-5 p-b-5 p-l-5 p-r-5" @click.prevent="openModal(e, item)">
                    <figure class="image is-5by3">
                        <img :src="item.image">
                    </figure>
                </a>
            </div>
        </div>
      </swiper-slide>
      <div class="swiper-pagination m-t-50" slot="pagination"></div>
    </swiper>
    <div class="modal" v-bind:class="{ 'is-active': showModal }">
        <div class="modal-background" v-on:click="closeModal"></div>
        <div class="modal-card">
            <div class="box is-paddingless">
                <figure class="image is-4by5" v-if="selectedImage.orientation == 'portrait'">
                    <img :src="selectedImage.image">
                </figure>
                <figure class="image is-5by3" v-else>
                    <img :src="selectedImage.image">
                </figure>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        titleOption: {
            pagination: {
                el: '.swiper-pagination',
                dynamicBullets: true,
                dynamicMainBullets: 3,
            }
        },
        slides: this.slideImages,
        showModal: false,
        selectedImage: ''
      }
    },
    computed: {
      totalSlides () {
        return this.slides.length;
      },
      slidesArray () {
          return _.concat(this.portraitSlides, this.landscapeSLides);
      },
      portraitSlides () {
          var portrait = _.filter(this.slides, (o) => {
              return o.orientation == 'portrait'
          });

          return _.chunk(portrait, 4);
      },
      landscapeSLides () {
          var portrait = _.filter(this.slides, (o) => {
              return o.orientation == 'landscape'
          });

          return _.chunk(portrait, 2);
      }
    },
    props: ['slide-images'],
    methods: {
        openModal (e, image) {
            this.showModal = true;
            var html = document.getElementsByTagName('html');
            html[0].classList.add('is-clipped');    
            this.selectedImage = image;
        },
        closeModal () {
            this.showModal = false;
            var html = document.getElementsByTagName('html');
            html[0].classList.remove('is-clipped'); 
        }
    }
  }
</script>