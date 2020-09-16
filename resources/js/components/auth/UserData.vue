<template>
  <div class="media">
    <img :src="userimage" class="user-image mr-4" alt="ユーザー">
    <div class="media-body userdata-body">
      <div class="mb-2">
        <p class="font-weight-bold mb-0">{{ username }}</p>
      </div>
      <div class="mb-2">
        <p class="font-weight-bold mb-0">{{ email }}</p>
      </div>
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
    userimage() {
      return this.$store.getters['auth/userimage']
    }
  },
}
</script>