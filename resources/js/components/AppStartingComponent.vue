<template>

    <div class="bg-rose-800 w-full min-h-screen flex justify-center items-center" :class="mclass">
        <div CLASS=" text-4xl text-white  flex flex-col">
            <div>
                <p v-for="message in messages" class="mb-2 block">{{message}}</p>
            </div>

            <form class="flex" @submit.prevent="submitMessage">
                <input type="text" class=" text-rose-600 border border-gray-500 p-4 w-full" v-model="submit_message">
                <input type="submit"  value="Submit" class="bg-green-500 p-4 border cursor-pointer">
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                messages: [],
                mclass :'',
                submit_message: ''
            }
        },
        methods: {
            submitMessage(){
                axios.post('http://192.168.1.105:8586/api/event/message', {
                    message: this.submit_message
                })
                    .then( () => this.submit_message = '');
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created() {
            Echo.channel('notification')
                .listen('MessageNotification', (e ,r) => {
                    console.log( 'MESSAGE: ',e ,r);
                    this.messages.push(e.message);
                    this.mclass = ' bg-red-600'
                });
        }
    }
</script>
