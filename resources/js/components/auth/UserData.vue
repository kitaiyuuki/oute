<template>
  <div>
    <div class="mb-2">
      <p class="lead text-truncate text-center font-weight-bold mb-0">{{ username }}</p>
    </div>
    <div class="mb-2">
      <p class="lead text-truncate text-center font-weight-bold mb-0">{{ email }}</p>
    </div>
  </div>
</template>

<script>
export default {
  computed: {
    username() {
      return this.$store.getters["auth/username"];
    },
    email() {
      return this.$store.getters["auth/email"];
    },
  },
}
</script>