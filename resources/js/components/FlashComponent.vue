<template>
    <div class="position">
        <flash-message
                transitionName="flash"
                class="flashpool"
        ></flash-message>
    </div>
</template>

<script>
    import VueFlashMessage from 'vue-flash-message';
    Vue.use(VueFlashMessage, {
        messageOptions: {
            timeout: 5000,
            important: true,
        }
    });


    export default {
        props: ['message', 'type'],

        created() {
            if(this.message != null){
                this.flashSuccess(this.message)
            }

        },

    }
</script>

<style>

    @import '../../../node_modules/vue-flash-message/dist/vue-flash-message.min.css';

    .position {
        position: fixed;
        right: 25px;
        bottom: 25px;
    }
</style>
