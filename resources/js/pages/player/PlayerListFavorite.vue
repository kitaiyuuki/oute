<template>
  <div class="container">
    <h2 class="page-title">お気に入りの棋士</h2>
    <template v-if="display">
      <ul class="list-group">
        <li v-for="(player, i) in playerList" :key="player.id" class="list-group-item rounded-0 icon-list">
          <router-link :to="'/player/'+player.id" class=" text-truncate favorite-list-link">{{ player.name }}</router-link>
          <button type="button" @click="onFavorite(player.id, player.is_favorite, i)" class="list-group-icon-box favorite-button">
            <span :class="{'active': player.is_favorite}" class="list-group-icon favorite-icon"></span>
          </button>
        </li>
      </ul>
      <Pagination :current-page="currentPage" :last-page="lastPage" :path="$route.path+'?'"></Pagination>
    </template>
    <template v-else>
      <Loading></Loading>
    </template>
  </div>
</template>

<script>
import Pagination from '../../components/Pagination.vue'
import Loading from '../../components/Loading.vue'

export default {
    components: {
        Pagination,
        Loading,
    },
    props: {
      page: {
        required: false,
        type: Number,
        default: 1
      }
    },
    data() {
      return {
        playerList: [],
        currentPage: 0,
        lastPage: 0,
        display: false
      }
    },
    methods: {
      fetchPlayerList() {
        this.display = false
        axios.get('/api/player/favorite?page='+this.page)
          .then(res => {
            this.playerList = res.data.data
            this.currentPage = res.data.current_page
            this.lastPage = res.data.last_page
            this.display = true
        })
      },
      favorite(id, i) {
        this.playerList[i].is_favorite = true
        this.playerList[i].favorite_count += 1
        axios.post('/api/player/'+id+'/favorite')
      },
      notFavorite(id, i) {
        this.playerList[i].is_favorite = false
        this.playerList[i].favorite_count += 1
        axios.delete('/api/player/'+id+'/favorite')
      },
      onFavorite(id, is_favorite, i) {
        if (is_favorite) {
          this.notFavorite(id, i);
        } else {
          this.favorite(id, i)
        }
      }
    },
    watch: {
      $route: {
        handler() {
          this.fetchPlayerList()
        },
        immediate: true
      }
    }
}
</script>