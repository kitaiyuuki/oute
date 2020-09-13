<template>
  <div class="container">
    <template v-if="display === 2">
      <h2 class="page-title">{{ player.name }}</h2>
      <div class="icon-list mb-3">
        <span class="favorite-count">{{ player.favorite_count }}</span>
        <button type="button" @click="onFavorite" class="list-group-icon-box favorite-button">
          <span :class="{'active': player.is_favorite}" class="list-group-icon favorite-icon"></span>
        </button>
      </div>
      <div class="btn-group w-100 mb-3">
        <button type="button" class="btn btn-outline-dark rounded-0 active">ニュース</button>
        <button type="button" class="btn btn-outline-dark rounded-0">対局日程</button>
      </div>
      <div v-if="newsList">
        <div class="row">
          <div v-for="news in newsList" :key="news.id" class="col-md-6">
            <News :item="news"></News>
          </div>
        </div>
      </div>
      <Pagination :current-page="currentPage" :last-page="lastPage" :path="$route.path+'?'"></Pagination>
    </template>
    <template v-else>
      <Loading></Loading>
    </template>
    <Confirm v-model="isConfirm" :is-alert="true" title="お気に入り機能" content="お気に入り機能を使うにはログインしてください。"></Confirm>
  </div>
</template>

<script>
import News from "../../components/news/News.vue";
import Pagination from "../../components/Pagination.vue";
import Loading from '../../components/Loading.vue'
import Confirm from "../../components/Confirm.vue"

export default {
  components: {
    News,
    Pagination,
    Loading,
    Confirm,
  },
  props: {
    id: {
      required: true,
      type: Number,
    },
    page: {
      required: false,
      type: Number,
      default: 1
    }
  },
  data() {
    return {
      player: {},
      newsList: [],
      currentPage: 0,
      lastPage: 0,
      display: 0,
      isConfirm: false
    };
  },
  methods: {
    fetchNewsList() {
      this.display = 0
      axios.get("/api/player/" + this.id).then((res) => {
        this.player = res.data;
        this.display++
      });
      axios.get("/api/news/player/" + this.id + "?page=" + this.page).then((res) => {
        this.newsList = res.data.data;
        this.currentPage = res.data.current_page;
        this.lastPage = res.data.last_page;
        this.display++
      });
    },
    favorite() {
      this.player.is_favorite = true;
      this.player.favorite_count += 1;
      axios.post("/api/player/" + this.id + "/favorite")
    },
    notFavorite() {
      this.player.is_favorite = false;
      this.player.favorite_count -= 1;
      axios.delete("/api/player/" + this.id + "/favorite")
    },
    onFavorite() {
      if (!this.$store.getters["auth/check"]) {
        this.isConfirm = true
        return false;
      }
      if (this.player.is_favorite) {
        this.notFavorite();
      } else {
        this.favorite();
      }
    },
  },
  watch: {
    $route: {
      handler() {
        this.fetchNewsList();
      },
      immediate: true,
    },
  },
};
</script>