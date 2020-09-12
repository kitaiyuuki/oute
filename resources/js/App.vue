<template>
    <div id="wrapper">
        <Header></Header>

        <Message></Message>

        <main class="main col-lg-8">
            <router-view/>
        </main>

        <Footer></Footer>
    </div>
</template>

<script>
import Header from './components/Header.vue'
import Footer from './components/Footer.vue'
import Message from './components/Message.vue'

export default {
    components: {
        Header,
        Footer,
        Message,
    }
}
</script>