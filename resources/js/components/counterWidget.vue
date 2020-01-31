<template>
    <span>{{value}}</span>
</template>

<script>
export default {
    data: function () {
        return {
            value: 0,
            start: 0,
            end: this.endValue,
            duration: this.animDuration,
            minTimer: 20,
            startTime: 0,
            timer: '',
            done: false,

        }
    },
    computed: {
        range: function () {
            return this.end - this.start
        },
        endTime: function () {
            return this.startTime + this.duration
        },
        stepTime: function () {
            return Math.max(Math.abs(Math.floor(this.duration / this.range)), this.minTimer)
        },

    },
    methods: {
        animateValue () {
            if(!this.done){
                this.startTime = new Date().getTime();
                this.timer = setInterval(this.run, this.stepTime);
            }
        },
        run () {
            var now = new Date().getTime(),
                remaining = Math.max((this.endTime - now) / this.duration, 0);
                this.value = Math.round(this.end - (remaining * this.range));


                if ( this.value == this.end){
                    clearInterval(this.timer);
                }                
                
        },

    },
    props: ['endValue', 'animDuration'],
}
</script>