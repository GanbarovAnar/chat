<template>
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <textarea name="" id="" cols="30" rows="10" class="form-control" readonly>{{messages.join('\n')}}</textarea>
                <hr>
                <input type="text" class="form-control" v-model="textMessage" @keyup.enter="sendMessage">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                messages: [],
                textMessage: ''
            }
        },
        mounted() {
            //MessageEvent
            window.Echo.channel('chat').listen('Message', (e) => {
                console.log(e);
                this.messages.push(e);
            });
            window.Echo.channel('chat').listen('Message', ({message}) => {
                console.log(message);
                this.messages.push(message);
            });
            window.Echo.channel('chat').listen('.Message', ({message}) => {
                console.log(message);
                this.messages.push(message);
            });

            window.Echo.channel('chat').listen(`Message`, ({message}) => {
                console.log("hello");
                this.messages.push(message);
            });

            window.Echo.channel('chat').listen('MessageEvent', ({message}) => {
                console.log("hello");
                this.messages.push(message);
            });

            window.Echo.channel('chat').listen(`MessageEvent`, ({message}) => {
                console.log("hello");
                this.messages.push(message);
            });

        },
        methods: {
            sendMessage() {
                axios.post('/messages', { body: this.textMessage });
                this.messages.push(this.textMessage);
                this.textMessage = '';
            }
        }
    }
</script>
