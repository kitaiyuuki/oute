<template>
  <div v-if="2 <= lastPage && currentPage <= lastPage" class="row my-4">
    <div class="col">
      <router-link
        v-if="!isFirstPage"
        :to="path+'page='+(currentPage - 1)"
        class="btn btn-dark btn-block rounded-0"
      >&lt;前へ</router-link>
    </div>
    <div class="col text-center align-self-center" style="font-size: 1.2rem">{{ currentPage }}</div>
    <div class="col">
      <router-link
        v-if="!isLastPage"
        :to="path+'page='+(currentPage + 1)"
        class="btn btn-dark btn-block rounded-0"
      >次へ&gt;</router-link>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    currentPage: {
      required: true,
      type: Number,
    },
    lastPage: {
      required: true,
      type: Number,
    },
    path: {
      required: true,
      type: String,
    },
  },
  computed: {
    isFirstPage() {
      return this.currentPage === 1;
    },
    isLastPage() {
      return this.currentPage === this.lastPage;
    },
  },
};
</script>