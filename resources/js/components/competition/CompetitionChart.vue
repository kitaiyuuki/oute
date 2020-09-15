<template>
  <div>
    <ul class="list-group">
      <li
        v-for="(competition, i) in competitionListData"
        :key="competition.id"
        class="list-group-item rounded-0 icon-list"
      >
        <router-link
          :to="'/competition/'+competition.id"
          class="text-truncate favorite-list-link"
        >{{ competition.name }}</router-link>
        <button
          type="button"
          @click="onFavorite(competition.id, competition.is_favorite, i)"
          class="list-group-icon-box favorite-button"
        >
          <span :class="{'active': competition.is_favorite}" class="list-group-icon favorite-icon"></span>
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
    competitionList: {
      required: false,
      type: Array,
      default: [],
    },
  },
  data() {
    return {
      competitionListData: this.competitionList,
      isConfirm: false,
    };
  },
  methods: {
    favorite(id, i) {
      this.competitionListData[i].is_favorite = true;
      this.competitionListData[i].favorite_count += 1;
      axios.post("/api/competition/" + id + "/favorite");
    },
    notFavorite(id, i) {
      this.competitionListData[i].is_favorite = false;
      this.competitionListData[i].favorite_count -= 1;
      axios.delete("/api/competition/" + id + "/favorite");
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
      this.$emit("onFavorite", this.competitionListData);
    },
  },
};
</script>