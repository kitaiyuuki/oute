<template>
  <div class="container">
    <h2 class="page-title">お気に入りの棋士</h2>
    <template v-if="display">
      <PlayerChart :player-list="playerList" @onFavorite="onFavorite"></PlayerChart>
      <Pagination :current-page="currentPage" :last-page="lastPage" :path="$route.path+'?'"></Pagination>
    </template>
    <template v-else>
      <Loading></Loading>
    </template>
  </div>
</template>

<script>
import Pagination from "../../components/Pagination.vue";
import PlayerChart from "../../components/player/PlayerChart.vue";
import Loading from "../../components/Loading.vue";

export default {
  components: {
    Pagination,
    Loading,
    PlayerChart,
  },
  props: {
    page: {
      required: false,
      type: Number,
      default: 1,
    },
  },
  data() {
    return {
      playerList: [],
      currentPage: 0,
      lastPage: 0,
      display: false,
    };
  },
  methods: {
    fetchPlayerList() {
      this.display = false;
      axios.get("/api/player/favorite?page=" + this.page).then((res) => {
        this.playerList = res.data.data;
        this.currentPage = res.data.current_page;
        this.lastPage = res.data.last_page;
        this.display = true;
      });
    },
    onFavorite(value) {
      this.playerList = value;
    },
  },
  watch: {
    $route: {
      handler() {
        this.fetchPlayerList();
      },
      immediate: true,
    },
  },
};
</script>