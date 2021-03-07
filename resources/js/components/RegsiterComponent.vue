<template>
    <div>
        <div class="flex flex-wrap">
            <div class="flex-1">
                <div class="flex flex-col px-7 mb-3 lg:pl-20 lg:px-3">
                    <ul v-if="errors && errors.length">
                        <li v-for="error of errors">
                            {{ error.message }}
                        </li>
                    </ul>

                    <h4 class="mb-2 uppercase font-bold text-lg text-grey-darkest underline"
                        style="color: orange; font-weight: 900;">Personal Data
                    </h4>

                    <h5 class="mb-2 uppercase font-bold text-lg text-grey-darkest" style="color: orange">
                        {{ success }}</h5>
                </div>
                <div class="flex flex-col w-50 px-5 lg:pl-20 lg:px-3">
                    <div class="flex flex-col mb-2">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;" for="name">Name *</label>
                        <input type="text" class="border py-2 px-3 text-grey-darkest" id="name" v-model="name">
                    </div>
                    <div class="flex flex-col mb-2">
                        <label for="address" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Address</label>
                        <input type="text" class="border py-2 px-3 text-grey-darkest" name="address" id="address"
                               v-model="address">
                    </div>
                    <div class="flex flex-col mb-2">
                        <label for="dob" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Gender</label>
                        <select name="gender" class="border py-2 px-3 text-grey-darkest" v-model="gender">
                            <option value="0" selected disabled>Please Select</option>
                            <option value="MALE">MALE</option>
                            <option value="FEMALE">FEMALE</option>
                        </select>
                    </div>
                    <div class="flex flex-col mb-2">
                        <label for="email_address" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Email Address</label>
                        <input type="email" class="border py-2 px-3 text-grey-darkest" id="email_address"
                               v-model="email_address">
                    </div>
                    <div class="flex flex-col mb-2">
                        <label for="dob" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Date Of Birth</label>
                        <date-picker name="dob" :input-class="'border py-2 px-3 text-grey-darkest w-full'" v-model="dob" format="yyyy-MM-dd"></date-picker>
                    </div>
                </div>
            </div>
            <div class="flex-1">
                <div class="flex flex-col px-7 mb-3 lg:pl-20 lg:px-3">
                    <h4 class="mb-2 uppercase font-bold text-lg text-grey-darkest underline"
                        style="color: orange; font-weight: 900;">Player Data
                    </h4>
                </div>
                <div class="flex flex-col w-50 px-7 lg:pl-20 lg:px-3">
                    <div class="flex flex-col mb-2">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;" for="name">Step / Free Agent</label>
                        <select class="border py-2 px-3 text-grey-darkest" v-model="step_free">
                            <option value="0">Please Select</option>
                            <option value="step">Step</option>
                            <option value="free_agent">Free Agent</option>
                        </select>
                    </div>
                    <div class="flex flex-col mb-2">
                        <label for="address" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Position</label>
                        <select name="" class="border py-2 px-3 text-grey-darkest" v-model="preferred_position">
                            <option value="0">Please Select</option>
                            <option v-for="position in positions" v-model="position.name">{{ position.name }}</option>
                        </select>
                    </div>
                    <div class="flex flex-col mb-2">
                        <label for="preferred_foot" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Preferred Foot</label>
                        <input type="text" class="border py-2 px-3 text-grey-darkest" id="preferred_foot"
                               v-model="preferred_foot">
                    </div>
                    <div class="flex flex-col mb-2">
                        <label for="height" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Height</label>
                        <input type="text" class="border py-2 px-3 text-grey-darkest" id="height" v-model="height">
                    </div>
                    <div class="flex flex-col mb-2">
                        <label for="profile_image" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Profile Picture</label>
                        <input type="file" id="file" ref="file"
                               v-on:change="previewFiles()" multiple>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap">
            <div class="flex-1">
                <div class="flex flex-col px-7 mb-3 lg:pl-20 lg:px-3">
                    <div class="flex flex-col mb-2 mt-2">
                        <label for="height" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Club Name</label>
                        <input type="text" class="border py-2 px-3 text-grey-darkest" id="club" v-model="club">
                    </div>
                    <div class="flex flex-col mb-2">
                        <label for="height" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Contract End Date</label>
                        <date-picker name="contract_end_date"
                                     :input-class="'border py-2 px-3 text-grey-darkest w-full'"
                                     v-model="contract_end_date"></date-picker>
                    </div>
                    <button class="btn btn-danger border text-white p-3 uppercase" @click="register()"
                            style="background-color: orange; font-weight: 900; border-color: orange">Register
                    </button>
                </div>

            </div>

        </div>
    </div>

</template>
<script>
import DatePicker from 'vuejs-datepicker';
import axios from 'axios';

export default {
    props: ['positions'],
    data() {
        return {
            name: '',
            dob: '',
            email_address: '',
            address: '',
            height: '',
            gender: '',
            preferred_foot: '',
            preferred_position: '',
            step_free: '',
            club: '',
            contract_end_date: '',
            file: '',
            got_club: false,
            errors: [],
            success: '',
        }
    },


    components: {
        DatePicker
    },
    methods: {
        previewFiles(event) {
            this.file = this.$refs.file.files[0];
            //console.log(this.file);
        },
        register() {
            let formData = new FormData();
            formData.append('name', this.name);
            formData.append('dob', this.dob.toDateString());
            formData.append('email_address', this.email_address);
            formData.append('address', this.address);
            formData.append('height', this.height);
            formData.append('gender', this.gender);
            formData.append('preferred_foot', this.preferred_foot);
            formData.append('preferred_position', this.preferred_position);
            formData.append('club', this.club);
            formData.append('step_free', this.step_free);
            formData.append('contract_end_date', this.contract_end_date.toDateString());
            formData.append('file', this.file);
            this.success = '';
            axios.defaults.headers.common = {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': window.csrf_token,
                'Content-Type': 'multipart/form-data'

            };
            axios.post('/register',formData).then(response => {
                if (response.status === 200) {
                    if (response.data.error) {
                        this.success = response.data.error;
                    }else{
                        window.location.href='/';

                    }

                }

            })
                .catch(e => {
                    this.errors.push(e)
                });
        }
    },
    mounted() {

    },
    computed: {}
}
</script>
