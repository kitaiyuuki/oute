<template>
  <div>
    <ul class="list-group">
      <li
        v-for="(player, i) in playerListData"
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
    <Confirm v-model="isConfirm" :is-alert="true" title="お気に入り機能" content="お気に入り機能を使うにはログインしてください。"></Confirm>
  </div>
</template>

<script>
import Confirm from "../Confirm.vue";
export default {
  components: {
    Confirm,
  },
  props: {
    playerList: {
      required: false,
      type: Array,
      default: [],
    },
  },
  data() {
    return {
      playerListData: this.playerList,
      isConfirm: false,
    };
  },
  methods: {
    favorite(id, i) {
      this.playerListData[i].is_favorite = true;
      this.playerListData[i].favorite_count += 1;
      axios.post("/api/player/" + id + "/favorite");
    },
    notFavorite(id, i) {
      this.playerListData[i].is_favorite = false;
      this.playerListData[i].favorite_count -= 1;
      axios.delete("/api/player/" + id + "/favorite");
    },
    onFavorite(id, is_favorite, i) {
      if (!this.$store.getters["auth/check"]) {
        this.isConfirm = true;
        return false;
      }
      if (is_favorite) {
        this.notFavorite(id, i);
      } else {
        this.favorite(id, i);
      }
      this.$emit("onFavorite", this.playerListData);
    },
  },
};
</script>