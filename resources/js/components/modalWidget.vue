<template>
    <div class="modal" :class="{'is-active' : isOpen}">
        <div class="modal-background" @click="closeModal"></div>
        <div class="modal-content">
            <slot></slot>
        </div>
        <button class="modal-close is-large" aria-label="close" @click="closeModal"></button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                isOpen: false,
            }
        },
        methods: {
            openModal() {
                this.isOpen = true;
                _.head(document.getElementsByTagName('html')).classList.add('is-clipped');
            },
            closeModal() {
                this.isOpen = false
                _.head(document.getElementsByTagName('html')).classList.remove('is-clipped');
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>