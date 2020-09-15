<template>
  <AuthCard title="アカウント削除">
    <UserData></UserData>
    <button
      type="button"
      @click="confirmShow"
      class="btn btn-danger btn-lg btn-block"
      :disabled="deleteButtonDisabled"
    >アカウント削除</button>
    <Confirm v-model="isConfirm" @confirm="deleteAccount" title="アカウントの削除" content="アカウントを削除しますか？"></Confirm>
    <template v-if="deleteButtonDisabled">
      <Loading></Loading>
    </template>
  </AuthCard>
</template>

<script>
import AuthCard from "../../components/auth/AuthCard.vue";
import UserData from '../../components/auth/UserData.vue'
import Loading from "../../components/LodingWide.vue";
import Confirm from "../../components/Confirm.vue";
import { OK } from "../../util";
export default {
  components: {
    AuthCard,
    UserData,
    Loading,
    Confirm
  },
  data() {
    return {
      deleteButtonDisabled: false,
      isConfirm: false,
    };
  },
  methods: {
    confirmShow() {
      this.isConfirm = true;
    },
    async deleteAccount(isDelete) {
      this.deleteButtonDisabled = true;
      if (isDelete) {
        const res = await axios.delete("/api/user/delete");
        if (res.status === OK) {
          this.$store.commit("auth/setUser", null);
          this.$store.commit(
            "message/setContent",
            "アカウントを削除しました。"
          );
          this.$router.push("/settings");
        }
      }
      this.deleteButtonDisabled = false;
    },
  },
};
</script>