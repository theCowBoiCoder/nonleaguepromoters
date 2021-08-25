<template>
    <div>
        <div class="flex flex-col px-7 mb-3 lg:pl-20 lg:px-3">
            <h5 class="mb-2 uppercase font-bold text-lg text-grey-darkest" style="color: orange">
                {{ success }}</h5>
            <div class="flex flex-col mb-2 mt-2">
                <label for="from_user" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                       style="color: orange; font-weight: 900;">From</label>
                <input type="text" class="border py-2 px-3 text-grey-darkest" id="from_user" v-model="from_user">
            </div>
            <div class="flex flex-col mb-2 mt-2">
                <label for="subject" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                       style="color: orange; font-weight: 900;">Subject</label>
                <input type="text" class="border py-2 px-3 text-grey-darkest" id="subject" v-model="subject">
            </div>
            <div class="flex flex-col mb-2 mt-2">
                <label for="message" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                       style="color: orange; font-weight: 900;">Message</label>
                <textarea name="message" id="message" v-model="message"
                          class="border py-2 px-3 text-grey-darkest"></textarea>
            </div>
            <div class="flex justify-center items-center bg-orange font-medium rounded">
                <button v-bind:class="{ 'opacity-25' : isDisabled === true}"
                        class="inline-flex items-center px-3 py-2 font-medium rounded px-4 py-2 leading-5 bg-green-500 text-primary-100 text-white hover:text-white hover:bg-green-700"
                        @click="sendMessage(player)"
                        style="background-color: orange; font-weight: 900; border-color: orange" :disabled='isDisabled'>
                    <svg v-bind:class="{ 'invisible' : formGo !== true}" class=" animate-spin h-5 w-5 mr-3 ..."
                         viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Send Message
                </button>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";

export default {

    props: ['player'],
    data() {
        return {
            subject: '',
            message: '',
            from_user: '',
            btnDisable: true,
            formGo: false,
            success: '',
        }
    },
    methods: {
        sendMessage(player) {
            this.formGo = true;
            let formData = new FormData();
            formData.append('from_name', this.from_user);
            formData.append('subject', this.subject);
            formData.append('message', this.message);
            formData.append('player_id', player.id);
            this.success = '';
            axios.defaults.headers.common = {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': window.csrf_token,
                'Content-Type': 'multipart/form-data'

            };

            axios.post('/player/' + player.id + '/message/send', formData).then(response => {
                if (response.status === 200) {
                    this.success = response.data.success;
                    this.formGo = false;
                }
            });
        }
    },
    computed: {
        isDisabled: function () {
            if (this.subject === '' || this.message === '' || this.from_user === '') {
                return true;
            }
        }
    }
}
</script>
