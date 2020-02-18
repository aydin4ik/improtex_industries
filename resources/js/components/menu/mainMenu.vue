<template>
<nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
      <a class="navbar-item" href="/">
        <img :src="logo">
      </a>

      <a role="button" ref="burgerButton" class="navbar-burger burger" :class="mobileMenuIsOpen ? 'is-active' : false" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample" @click.prevent="toggleMobileMenu">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div class="navbar-menu">
      <div class="navbar-start">
        <div style="display: inline-flex" v-for="(item, index) in itemsArray" :key="index">
            <a class="navbar-item is-tab" v-if="! item.children.length > 0" :href="route(currentLocale + '.' + item.route)" :class="item.isActive ? 'is-active': ''" @mouseover="showOnHover(index)" @mouseleave="setBackActiveItem($event)" @click="itemClicked = true"> {{ item.title }}</a>
            <div class="navbar-item has-dropdown is-hoverable is-mega is-tab" v-else :class="item.isActive ? 'is-active': ''" @mouseover="showOnHover(index)" @mouseleave="setBackActiveItem($event)">
                <a class="navbar-link is-arrowless" :href="route(currentLocale + '.' + item.route)" @click="itemClicked = true">{{ item.title }}</a>
                <div class="navbar-dropdown">
                    <div class="container">
                        <div class="navbar-menu">
                            <div class="navbar-start">
                                <a class="navbar-item is-tab" v-for="(child, index) in item.children" :key="index" :href="route(currentLocale + '.' + child.route, child.parameters)" :class="child.isActive ? 'is-subactive': ''" @click="itemClicked = true">{{ child.title }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>

      

      <div class="navbar-end"> 
            <div class="navbar-item has-dropdown is-mega" :class="searchFieldIsOpen ? 'is-active' : false">
                <a class="navbar-item" ref="searchButton"><i class="fas fa-search fa-lg"></i></a>
                <div class="navbar-dropdown" style="padding: 14px">
                    <div class="container">
                        <form @submit.prevent="submitForm">
                            <div class="columns">
                                <div class="column is-11">
                                    <div class="field">
                                        <div class="control">
                                            <input class="input has-text-centered is-static is-capitalized has-text-weight-medium" type="text" placeholder="Type your text here" ref="inputField" v-model="query">
                                        </div>
                                    </div>
                                </div>
                                <transition name="slide-fade">
                                    <div class="column is-narrow" v-if="query.length > 0">
                                        <div class="field">
                                            <div class="control">
                                                <button type="submit" class="button is-white is-uppercase">
                                                    <span class="icon">
                                                        <i class="fas fa-search fa-lg"></i>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </transition>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <a class="navbar-item is-uppercase" :href="locale.route" v-for="(locale, index) in activeLocales" :key="index">
                {{locale.name}}
            </a>
      </div>
    </div>
      <transition name="slide-fade">                  
        <div class="navbar-menu-mobile" v-if="mobileMenuIsOpen">
            <div class="box is-radiusless is-paddingless">
                <div class="wrapper">
                    <div class="search p-t-10 p-b-10 p-l-10 p-r-10">
                        <form @submit.prevent="submitForm">
                            <input class="input is-medium" type="search" placeholder="Search" v-model="query">
                        </form>
                    </div>

                    <aside class="mobile-menu">
                        <div v-for="(item, i) in itemsArray" :key="i">
                            <div class="menu-item"  v-if="!item.children.length > 0">
                                <a :href="route(currentLocale + '.' + item.route)" class="menu-link" :class="item.isActive ? 'is-active': ''">{{ item.title }}</a>
                            </div>
                            <div class="menu-item has-dropdown" :class="item.isActive ? 'is-active': ''" v-else>
                                <header class="dropdown-header">
                                    <a class="dropdown-toggle p-r-15"  @click.prevent="toggleMobileDropdown(i)">
                                    <i class="fas fa-angle-right"></i>
                                    </a>
                                    <a  class="menu-link" :class="item.isActive ? 'is-active': ''" :href="item.url">{{ item.title }}</a>
                                </header>
                                <transition name="slide-up-fade">
                                    <ul class="dropdown" v-if="item.isActive">
                                    <li v-for="(child, i) in item.children" :key="i">
                                        <a class="is-capitalized" :class="child.isActive ? 'is-current': ''" :href="route(currentLocale + '.' + child.route, child.parameters)">{{child.title}}</a>
                                    </li>
                                    </ul>
                                </transition>
                            </div>
                        </div>

                        <div class="tabs is-fullwidth p-t-5 p-b-5 has-text-weight-bold">
                            <ul>
                                <li v-for="(locale, index) in locales" :key="index">
                                    <a class="has-text-grey-light is-uppercase" :href="locale.route">{{ locale.name }}</a>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </transition>
</nav>
</template>

<script>
    export default {
        data () {
            return {
                mobileMenuIsOpen: false,
                searchFieldIsOpen: false,
                searchFieldwasOpen: false,
                currentRoute: route().current(),
                itemsArray: [],
                initialActiveItem: '',
                query: '',
                pressedKey: false,
                itemClicked: false,
            }
        },
        methods: {
            init () {
                this.itemsArray = this.menuItems
            },
            resetActiveItems () {
                this.itemsArray.forEach(item => {
                    item.isActive = false;
                });
            },
            setActiveItem () {
                this.menuItems.forEach(item => {
                    item.children.forEach(child => {
                        if( this.currentUrl == route(this.currentLocale + '.' + child.route, child.parameters).url()){
                            child.isActive = true
                            item.isActive = true
                        }
                    });
                });
            },
            showOnHover (index) {
                if(! this.mobileMenuIsOpen){
                    this.itemsArray = this.itemsArray.map((item, i) => {
                        if( index === i ){
                            item.isActive = true
                            if( this.setBackActiveItem ){
                                this.searchFieldIsOpen = false
                            }
                        }else{
                            item.isActive = false
                        }
                        return item
                    })
                }
            },
            setBackActiveItem () {
                if (typeof(this.initialActiveItem) == "undefined" && !this.searchFieldwasOpen){
                    this.resetActiveItems();
                }else{
                    if(! this.itemClicked){
                        if(! this.mobileMenuIsOpen){
                            if(this.searchFieldwasOpen){
                                this.searchFieldIsOpen = true
                                this.$nextTick(() => this.$refs.inputField.focus())
                                this.resetActiveItems();
                            }else{
                                this.itemsArray.forEach(item => {
                                    item.isActive = false
                                    this.initialActiveItem.isActive = true
                                })
                            }
                        }
                    }
                }
            },
            findInitialActiveItem () {
                this.initialActiveItem = _.find( this.itemsArray, (item) => {
                    return item.isActive == true
                })
            },
            openSearch(e) {
                let el = this.$refs.searchButton;
                let target = e.target;

                if( (el !== target) && !el.parentElement.contains(target)){
                    this.searchFieldIsOpen = false;
                    this.searchFieldwasOpen = false;
                    this.$nextTick(() => this.$refs.inputField.blur())
                    this.setBackActiveItem();
                }else{
                    this.searchFieldIsOpen = true;
                    this.searchFieldwasOpen = true;
                    this.$nextTick(() => this.$refs.inputField.focus())

                    this.itemsArray.forEach(item => {
                        item.isActive = false;
                    })
                }
            },
            toggleMobileMenu () {
                this.mobileMenuIsOpen = !this.mobileMenuIsOpen;
                if(! this.mobileMenuIsOpen){
                    this.setBackActiveItem()
                }
            },
            toggleMobileDropdown (index) {
                this.itemsArray = this.itemsArray.map((item, i) => {
                    if( index === i ){
                        item.isActive = !item.isActive
                    }else{
                        item.isActive = false
                    }
                    return item
                })
            },
            submitForm () {
                if( this.query ){
                    window.location = `/search?q=${this.query}`;
                }
            }
        },
        computed: {
            menuItems: function () {
                this.items.forEach(item => {
                    if( item.route == null ){
                        item.route = item.url
                    }
                    if( item.children.length > 0){
                        item.children.forEach(child => {
                            if(child.route == null){
                                child.route = child.url                                
                            }
                        })
                    }
                    if( this.currentRoute == this.currentLocale + '.' + item.route){
                        item.isActive = true; 
                    }else{
                        item.isActive = false;
                    }
                });
                return this.items;
            },
            activeLocales: function () {
                var locales = this.locales; 
                _.remove(locales, (locale) => {
                    return locale['name'] == this.currentLocale;
                })
                return locales;
            }
        },
        props: {
            logo: String,
            items: Array,
            currentUrl: String,
            currentLocale: String,
            locales: Array,
        },
        created() {
            this.init()
            this.setActiveItem()
            this.findInitialActiveItem()
            document.addEventListener('click', this.openSearch);
        },
        destroyed() {
            document.removeEventListener('click', this.openSearch);
        }
        
    }
</script>

<style lang="scss" scoped>

</style>