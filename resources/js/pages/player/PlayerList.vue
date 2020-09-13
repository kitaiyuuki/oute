<template>
  <div class="container">
    <h2 class="page-title">棋士</h2>
    <form @submit.prevent="onSearch" class="mb-3">
      <div class="input-group">
        <input type="text" v-model="searchValue" class="form-control" placeholder="棋士を検索" />
        <div class="input-group-append">
          <button :disabled="!searchValue" class="btn btn-secondary" type="submit">検索</button>
        </div>
      </div>
    </form>
    <div v-if="search" class="text-center mb-3">「{{search}}」を検索</div>
    <template v-if="display">
      <ul class="list-group">
        <li
          v-for="(player, i) in playerList"
          :key="player.id"
          class="list-group-item rounded-0 icon-list"
        >
          <router-link
            :to="'/player/'+player.id"
            class="text-truncate favorite-list-link"
          >{{ player.name }}</router-link>
          <button
            type="button"
            @click="onFavorite(player.id, player.is_favorite, i)"
            class="list-group-icon-box favorite-button"
          >
            <span :class="{'active': player.is_favorite}" class="list-group-icon favorite-icon"></span>
          </button>
        </li>
      </ul>
      <Pagination
        :current-page="currentPage"
        :last-page="lastPage"
        :path="$route.path+'?search='+search+'&'"
      ></Pagination>
    </template>
    <template v-else>
      <Loading></Loading>
    </template>
    <Confirm v-model="isConfirm" :is-alert="true" title="お気に入り機能" content="お気に入り機能を使うにはログインしてください。"></Confirm>
  </div>
</template>

<script>
import Pagination from "../../components/Pagination.vue";
import Loading from '../../components/Loading.vue'
import Confirm from '../../components/Confirm.vue'

export default {
  components: {
    Pagination,
    Loading,
    Confirm
  },
  props: {
    page: {
      required: false,
      type: Number,
      default: 1,
    },
    search: {
      required: false,
      type: String,
      default: "",
    },
  },
  data() {
    return {
      playerList: [],
      currentPage: 0,
      lastPage: 0,
      searchValue: "",
      display: false,
      isConfirm: false
    };
  },
  methods: {
    fetchPlayerList() {
      this.display = false;
      axios
        .get("/api/player?search=" + this.search + "&page=" + this.page)
        .then((res) => {
          this.playerList = res.data.data;
          this.currentPage = res.data.current_page;
          this.lastPage = res.data.last_page;
          this.display = true;
        });
    },
    onSearch() {
      if (!this.searchValue) {
        return false;
      }
      if (this.searchValue === this.search && this.page === 1) {
        return false;
      }
      this.$router.push("/player?search=" + this.searchValue);
    },
    favorite(id, i) {
      this.playerList[i].is_favorite = true;
      this.playerList[i].favorite_count += 1;
      axios.post("/api/player/" + id + "/favorite")
    },
    notFavorite(id, i) {
      this.playerList[i].is_favorite = false;
      this.playerList[i].favorite_count -= 1;
      axios.delete("/api/player/" + id + "/favorite")
    },
    onFavorite(id, is_favorite, i) {
      if (!this.$store.getters["auth/check"]) {
        this.isConfirm = true
        return false;
      }
      if (is_favorite) {
        this.notFavorite(id, i);
      } else {
        this.favorite(id, i);
      }
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