<template>
    <div v-if="value" class="overlay-confirm">
        <div class="card rounded-0 confirm-dialog col-8 col-lg-6">
            <div class="card-body">
                <h5 class="card-title">{{ title }}</h5>
                <p class="card-text">{{ content }}</p>
            </div>
            <div class="card-footer bg-transparent d-flex justify-content-end px-0">
                <button v-if="!isAlert" @click="onClickCancel" type="button" class="btn btn-secondary mr-1">キャンセル</button>
                <button @click="onClickOK" type="button" class="btn btn-primary">OK</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        value: {
            required: true,
            type: Boolean
        },
        title: {
            required: true,
            type: String
        },
        content: {
            required: true,
            type: String
        },
        isAlert: {
            required: false,
            type: Boolean,
            default: false
        }
    },
    data() {
        return {
            display: true
        }
    },
    methods: {
        onClickOK() {
            this.$emit('confirm', true)
            this.$emit('input', false)

        },
        onClickCancel(){
            this.$emit('confirm', false)
            this.$emit('input', false)
        }
    },
}
</script>