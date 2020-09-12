<template>
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <div class="card rounded-0">
          <div class="card-header">
            <h3 class="text-center mb-0">アカウント削除</h3>
          </div>
          <div class="card-body">
            <div class="mb-2">
              <p class="lead text-truncate text-center font-weight-bold mb-0">{{ username }}</p>
            </div>
            <div class="mb-2">
              <p class="lead text-truncate text-center font-weight-bold mb-0">{{ email }}</p>
            </div>
            <button
              type="button"
              @click="confirmShow"
              class="btn btn-danger btn-lg btn-block"
              :disabled="deleteButtonDisabled"
            >アカウント削除</button>
          </div>
        </div>
      </div>
    </div>
    <Confirm v-model="isConfirm" @confirm="deleteAccount" title="アカウントの削除" content="アカウントを削除しますか？"></Confirm>
    <template v-if="deleteButtonDisabled">
      <Loading></Loading>
    </template>
  </div>
</template>

<script>
import Loading from "../../components/LodingWide.vue";
import Confirm from '../../components/Confirm.vue'
export default {
  components: {
    Loading,
    Confirm
  },
  data() {
    return {
      deleteButtonDisabled: false,
      isConfirm: false
    };
  },
  computed: {
    username() {
      return this.$store.getters["auth/username"];
    },
    email() {
      return this.$store.getters["auth/email"];
    }
  },
  methods: {
    confirmShow() {
      this.isConfirm = true
    },
    async deleteAccount(isDelete) {
      this.deleteButtonDisabled = true;
      if (isDelete) {
        const res = await axios.delete("/api/user/delete");
        if (res.status === 200) {
          this.$store.commit("auth/setUser", null);
          this.$store.commit("message/setContent", 'アカウントを削除しました。')
          this.$router.push("/settings");
        }
      }
      this.deleteButtonDisabled = false;
    },
  },
};
</script>