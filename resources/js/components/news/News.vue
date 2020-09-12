<template>
  <article class="card rounded-0 mb-2">
    <router-link :to="'/news/'+item.id" class="d-flex">
      <div class="news-img-box">
        <img class="w-100" :src="item.url" alt="記事" />
      </div>
      <div class="news-title-box">
        <h4 class="news-title">{{ item.title }}</h4>
      </div>
    </router-link>
    <div class="card-footer bg-transparent text-muted py-1">{{ item.date }}</div>
  </article>
</template>

<script>
export default {
  props: {
    item: {
      type: Object,
      required: true,
    },
  },
};
</script>