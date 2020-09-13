<template>
  <div v-if="display" class="comment">
    <div class="comment-header">
      <small class="comment-username text-truncate text-muted">{{ item.author.name }}</small>
      <small class="comment-date text-muted">{{ item.date }}</small>
    </div>
    <pre class="comment-content">{{ item.content }}</pre>
    <div class="d-flex px-3 py-2">
      <span @click="onFavorite" :class="{'active': item.is_favorite}" class="cursor good-icon mr-1"></span>
      <span class="align-self-center comment-footer-item mr-2">{{ item.favorite_count }}</span>
      <span v-if="item.is_mine" @click="confirmShow" class="cursor comment-footer-item align-self-center text-danger">削除</span>
    </div>
    <Confirm v-model="isConfirm" @confirm="deleteComment" title="コメントの削除" content="コメントを削除しますか？"></Confirm>
    <Confirm v-model="isAlert" :is-alert="true" title="いいね機能" content="いいね機能を使うにはログインしてください。"></Confirm>
  </div>
</template>

<script>
import Confirm from '../Confirm.vue'
export default {
  components: {
    Confirm
  },
  props: {
    item: {
      required: true,
      type: Object,
    },
  },
  data() {
    return {
      display: true,
      isConfirm: false,
      isAlert: false,
    }
  },
  methods: {
    confirmShow() {
      this.isConfirm = true
    },
    deleteComment(isDelete) {
      if (isDelete) {
        setTimeout(() => (this.display = false), 400)
        axios.delete('/api/news/comment/'+this.item.id)
      }
    },
    favorite() {
      this.item.is_favorite = true;
      this.item.favorite_count += 1;
      axios.post("/api/news/comment/" + this.item.id + "/favorite")
    },
    notFavorite() {
      this.item.is_favorite = false;
      this.item.favorite_count -= 1;
      axios.delete("/api/news/comment/" + this.item.id + "/favorite")
    },
    onFavorite() {
      if (!this.$store.getters["auth/check"]) {
        this.isAlert = true
        return false;
      }
      if (this.item.is_favorite) {
        this.notFavorite();
      } else {
        this.favorite();
      }
    },
  }
};
</script>