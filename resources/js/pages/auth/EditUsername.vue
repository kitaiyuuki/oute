<template>
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <div class="card rounded-0">
          <div class="card-header">
            <h3 class="text-center mb-0">ユーザー名変更</h3>
          </div>
          <div class="card-body">
            <div class="mb-2">
                <p class="lead text-truncate text-center font-weight-bold mb-0">{{ username }}</p>
            </div>
            <form @submit.prevent="edit">
              <div class="form-group">
                <label for="new-username">新しいユーザー名</label>
                <input
                  type="text"
                  v-model="editForm.name"
                  class="form-control"
                  id="new-username"
                  placeholder="新しいユーザー名"
                />
                <div v-if="editErrors.name" class="text-danger">{{ editErrors.name[0] }}</div>
              </div>
              <div class="form-group">
                <label for="password">現在のパスワード</label>
                <input
                  type="password"
                  v-model="editForm.password"
                  class="form-control"
                  id="password"
                  placeholder="現在のパスワード"
                />
                <div v-if="editErrors.password" class="text-danger">{{ editErrors.password[0] }}</div>
              </div>
              <button type="submit" class="btn btn-success btn-lg btn-block" :disabled="!canEdit">変更</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <template v-if="editButtonDisabled">
      <Loading></Loading>
    </template>
  </div>
</template>

<script>
import Loading from "../../components/LodingWide.vue";
export default {
  components: {
    Loading,
  },
  data() {
    return {
      editForm: {
        name: "",
        password: "",
      },
      editErrors: {
        name: [],
        password: [],
      },
      editButtonDisabled: false,
    };
  },
  computed: {
    username() {
        return this.$store.getters['auth/username']
    },
    canEdit() {
      return (
        this.editForm.name && this.editForm.password && !this.editButtonDisabled
      );
    },
  },
  methods: {
    async edit() {
      this.editButtonDisabled = true;
      const res = await axios.put("/api/user/edit/name", this.editForm);
      if (res.status === 200) {
        this.$store.commit("auth/setUser", res.data);
        this.$store.commit('message/setContent', 'ユーザー名を変更しました。')
        this.$router.push("/settings");
      } else if (res.status === 422) {
        this.editErrors = res.data.errors;
      }
      this.editButtonDisabled = false;
    },
  },
};
</script>