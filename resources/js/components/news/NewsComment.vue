<template>
  <div>
    <div class="mb-3" v-if="$store.getters['auth/check']">
      <div v-if="commentErrors.comment" class="text-danger">{{ commentErrors.comment[0] }}</div>
      <textarea
        v-model="inputContent"
        @keydown="adjustTextareaHeight"
        id="comment-textarea"
        rows="1"
        wrap="hard"
        placeholder="公開コメントを入力"
        class="form-control comment-textarea"
      ></textarea>
      <div class="text-right">
        <button @click="onCancel" :disabled="!inputContent" class="btn btn-light btn-sm mr-1">キャンセル</button>
        <button @click="onComment" :disabled="!canComment" class="btn btn-dark btn-sm comment-button">
          <span v-if="!commentDisabled">コメント</span>
          <div v-else class="comment-loading">
            <vue-loading type="spin" color="#fff" :size="{width: '16px', height: '16px'}"></vue-loading>
          </div>
        </button>
      </div>
    </div>
    <div v-else class="row mb-3">
      <div class="col-md-6">
        <router-link class="btn btn-secondary btn-block rounded-0 mb-2" to="/register">新規登録</router-link>
      </div>
      <div class="col-md-6">
        <router-link class="btn btn-info btn-block text-white rounded-0 mb-2" to="/login">ログイン</router-link>
      </div>
    </div>
    <div v-if="commentList">
      <Comment v-for="comment in commentList" :item="comment" :key="comment.id"></Comment>
    </div>
  </div>
</template>

<script>
import Comment from './Comment.vue'
import { CREATED, UNPROCESSABLE_ENTITY } from '../../util'
import {VueLoading} from 'vue-loading-template'

export default {
  components: {
    Comment,
    VueLoading
  },
  props: {
    id: {
      type: Number,
      required: true
    },
    commentList: {
      type: Array,
      required: false,
      default: function() {
        return []
      }
    },
    value: {
      type: String,
      required: false,
      default: ''
    }
  },
  data() {
    return {
      inputContent: '',
      textareaHeight: '35px',
      commentErrors: {
        comment: []
      },
      commentDisabled: false
    };
  },
  computed: {
    canComment() {
      return this.inputContent && !this.commentDisabled
    },
    styles() {
      return {
        'height': this.height
      }
    }
  },
  methods: {
    onCancel() {
      this.inputContent = ''
    },
    async onComment() {
      this.commentDisabled = true
      const res = await axios.post('/api/news/comment/'+this.id, {
        comment: this.inputContent
      })
      if (res.status === CREATED) {
        this.$emit('addcomment', res.data)
        this.commentErrors = { comment: []}
        this.onCancel()
      } else if (res.status === UNPROCESSABLE_ENTITY) {
        this.commentErrors = res.data.errors
      }
      this.commentDisabled = false
    },
    adjustTextareaHeight() {
      const textarea = document.getElementById('comment-textarea')
      const resetHeight = new Promise(function(resolve) {
        resolve(textarea.style.height = 'auto')
      })
      resetHeight.then(function() {
        textarea.style.height = textarea.scrollHeight + 'px'
      })
    }
  },
  watch: {
    inputContent() {
      this.adjustTextareaHeight()
    }
  }
};
</script>