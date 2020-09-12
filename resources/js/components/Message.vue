<template>
    <transition v-if="message" name="message">
        <div class="col-8 col-lg-6 message">
            <span>{{ message }}</span>
        </div>
    </transition>
</template>

<script>
export default {
    computed: {
        message() {
            return this.$store.state.message.content
        }
    }
}
</script>