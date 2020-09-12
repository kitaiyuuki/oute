<template>
    <div class="overlay">
        <vue-loading type="spin" color="#333" :size="{width: '50px', height: '50px'}" class="loading"></vue-loading>
    </div>
</template>

<script>
import {VueLoading} from 'vue-loading-template'
export default {
    components: {
        VueLoading
    }
}
</script>