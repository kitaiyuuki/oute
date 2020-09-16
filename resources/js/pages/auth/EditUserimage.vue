<template>
  <AuthCard title="画像変更">
    <UserData></UserData>
    <form @submit.prevent="edit">
      <div class="custom-file mb-2">
        <input
          @change="onFileChange"
          type="file"
          class="custom-file-input"
          id="new-userimage"
        />
        <label class="custom-file-label" for="new-userimage">新しい画像を選択</label>
        <div v-if="editErrors.image" class="text-danger">{{ editErrors.image[0] }}</div>
      </div>
      <div class="form-group">
        <label for="password">現在のパスワード</label>
        <input
          type="password"
          v-model="password"
          class="form-control"
          id="password"
          placeholder="現在のパスワード"
        />
        <div v-if="editErrors.password" class="text-danger">{{ editErrors.password[0] }}</div>
      </div>
      <output v-if="preview" class="preview-output">
        <img :src="preview" alt="" class="preview-img">
      </output>
      <button type="submit" class="btn btn-success btn-lg btn-block" :disabled="!canEdit">変更</button>
    </form>
    <template v-if="editButtonDisabled">
      <Loading></Loading>
    </template>
  </AuthCard>
</template>

<script>
import AuthCard from "../../components/auth/AuthCard.vue";
import UserData from '../../components/auth/UserData.vue'
import Loading from "../../components/LodingWide.vue";
import { OK, UNPROCESSABLE_ENTITY } from "../../util";
export default {
  components: {
    AuthCard,
    UserData,
    Loading
  },
  data() {
    return {
      editErrors: {
        image: [],
        password: [],
      },
      editButtonDisabled: false,
      preview: '',
      image: '',
      password: ''
    };
  },
  computed: {
    canEdit() {
      return (
        this.image && this.password && !this.editButtonDisabled
      );
    },
  },
  methods: {
    async edit() {
      this.editButtonDisabled = true;
      const formData = new FormData()
      formData.append('image', this.image)
      formData.append('password', this.password)
      const res = await axios.post("/api/user/edit/image", formData);
      if (res.status === OK) {
        this.$store.commit("auth/setUser", res.data);
        this.$store.commit("message/setContent", "画像を変更しました。");
        this.$router.push("/settings");
      } else if (res.status === UNPROCESSABLE_ENTITY) {
        this.editErrors = res.data.errors;
      }
      this.editButtonDisabled = false;
    },
    onFileChange(event) {
      if (event.target.files.length === 0) {
        this.reset()
        return false
      }
      if (!event.target.files[0].type.match('image.*')) {
        this.reset()
        return false
      }
      const reader = new FileReader()
      reader.onload = e => {
        this.preview = e.target.result
      }
      reader.readAsDataURL(event.target.files[0])
      this.image = event.target.files[0]
    },
    reset() {
      this.preview = ''
      this.image = ''
      this.$el.querySelector('input[type="file"]').value = null
    }
  },
};
</script>