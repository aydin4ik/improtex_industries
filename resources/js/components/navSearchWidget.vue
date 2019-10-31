<style scoped>
    .field{
        padding: 1rem 2.5rem;
    }

</style>

<template>
    <div class="navbar-item has-dropdown is-mega" :class="showInput ? 'is-active' : false">
        <a class="navbar-item" ref="searchButton"><i class="fas fa-search fa-lg"></i></a>
        <div class="navbar-dropdown">
            <div class="container">
                <div class="field">
                    <div class="control">
                        <input class="input has-text-centered is-static is-uppercase has-text-weight-medium" type="text" placeholder="Type your text here" autofocus>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            showInput: false,
        }
    },
    methods: {
        documentClick(e) {
            let el = this.$refs.searchButton;
            let target = e.target;

            if( (el !== target) && !el.parentElement.contains(target)){
                this.showInput = false;
            }else{
                this.showInput = true;
            }
        }
    },
    created() {
        document.addEventListener('click', this.documentClick);
    },
    destroyed() {
        document.removeEventListener('click', this.documentClick);
    }
}
</script>