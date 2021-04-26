<template>
    <div>
        <div class="flex px-7 mb-3 lg:pl-20 lg:px-3">
            <span class="text-orange font-bold">All fields marked with * are mandatory</span>
        </div>
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
                               style="color: orange; font-weight: 900;" for="name">Are you a *</label>
                        <select name="profile_type" id="" class="border py-2 px-3 text-grey-darkest" v-model="profile_type" v-bind:key="profile_type">
                            <option value="0">Please Select</option>
                            <option value="1">Player</option>
                            <option value="2">Staff</option>
                        </select>
                    </div>
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
                               style="color: orange; font-weight: 900;">Gender *</label>
                        <select name="gender" class="border py-2 px-3 text-grey-darkest" v-model="gender">
                            <option value="0" selected disabled>Please Select</option>
                            <option value="MALE">MALE</option>
                            <option value="FEMALE">FEMALE</option>
                        </select>
                    </div>
                    <div class="flex flex-col mb-2">
                        <label for="email_address" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Email Address *</label>
                        <input type="email" class="border py-2 px-3 text-grey-darkest" id="email_address"
                               v-model="email_address">
                    </div>
                    <div class="flex flex-col mb-2">
                        <label for="dob" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Date Of Birth</label>
                        <date-picker name="dob" :input-class="'border py-2 px-3 text-grey-darkest w-full'" v-model="dob" format="yyyy-MM-dd"></date-picker>
                    </div>
                    <div class="flex flex-col mb-2">
                        <label for="profile_image" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Profile Picture</label>
                        <input type="file" id="file" ref="file" class="text-orange font-bold"
                               v-on:change="previewFiles()" multiple>
                    </div>

                </div>
            </div>

            <div class="flex-1" v-show="profile_type == 1">
                <div class="flex flex-col px-7 mb-3 lg:pl-20 lg:px-3">
                    <h4 class="mb-2 uppercase font-bold text-lg text-grey-darkest underline"
                        style="color: orange; font-weight: 900;">Player Data
                    </h4>
                </div>
                <div class="flex flex-col w-50 px-7 lg:pl-20 lg:px-3">
                    <div class="flex flex-col mb-2">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;" for="name">County *</label>
                        <select name="county" class="border py-2 px-3 text-grey-darkest" v-model="region">
                            <option value="0" selected disabled>Please Select</option>
                            <option v-for="region in regions" v-model="region.id">{{ region.county }}</option>
                        </select>
                    </div>
                    <div class="flex flex-col mb-2">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;" for="name">Step / Free Agent *</label>
                        <select name="" class="border py-2 px-3 text-grey-darkest" v-model="step_free">
                            <option value="0" selected disabled>Please Select</option>
                            <option value="professional">Professional</option>
                            <option value="semi-professional">Semi Professional</option>
                            <option value="non-contract">Non Contract</option>
                            <option value="amateur-contract">Amateur Contract</option>
                        </select>
                    </div>
                    <div class="flex flex-col mb-2">
                        <label for="address" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Position *</label>
                        <select name="" class="border py-2 px-3 text-grey-darkest" v-model="preferred_position">
                            <option value="0" selected disabled>Please Select</option>
                            <option v-for="position in positions" v-model="position.name">{{ position.name }}</option>
                        </select>
                    </div>
                    <div class="flex flex-col mb-2">
                        <label for="preferred_foot" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Preferred Foot *</label>
                        <select name="" id="preferred_foot" class="border py-2 px-3 text-grey-darkest" v-model="preferred_foot">
                            <option value="0" selected disabled>Please Select</option>
                            <option value="left">Left</option>
                            <option value="right">Right</option>
                            <option value="both">Both</option>
                        </select>
                    </div>
                    <div class="flex flex-col mb-2">
                        <label for="height" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Height</label>
                        <input type="text" class="border py-2 px-3 text-grey-darkest" id="height"
                               v-model="height">
                    </div>
                    <div class="flex flex-col mb-2">
                        <label for="looking_for_a_club" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Looking For A Club</label>
                        <select name="looking_for_a_club" class="border py-2 px-3 text-grey-darkest" v-model="looking_for_a_club">
                            <option value="0" selected disabled>Please Select</option>
                            <option value="1">YES</option>
                            <option value="0">NO</option>
                        </select>
                    </div>

                </div>
            </div>
            <div class="flex-1" v-show="profile_type == 2">
                <div class="flex flex-col px-7 mb-3 lg:pl-20 lg:px-3">
                    <h4 class="mb-2 uppercase font-bold text-lg text-grey-darkest underline"
                        style="color: orange; font-weight: 900;">Staff Data
                    </h4>
                </div>
                <div class="flex flex-col w-50 px-7 lg:pl-20 lg:px-3">
                    <div class="flex flex-col mb-2">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;" for="name">County *</label>
                        <select name="county" class="border py-2 px-3 text-grey-darkest" v-model="region">
                            <option value="0" selected disabled>Please Select</option>
                            <option v-for="region in regions" v-model="region.id">{{ region.county }}</option>
                        </select>
                    </div>
                    <div class="flex flex-col mb-2">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;" for="name">Step / Free Agent *</label>
                        <select name="" class="border py-2 px-3 text-grey-darkest" v-model="step_free">
                            <option value="0" selected disabled>Please Select</option>
                            <option value="professional">Professional</option>
                            <option value="semi-professional">Semi Professional</option>
                            <option value="non-contract">Non Contract</option>
                            <option value="amateur-contract">Amateur Contract</option>
                        </select>
                    </div>
                    <div class="flex flex-col mb-2">
                        <label for="address" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Role *</label>
                        <input type="text" class="border py-2 px-3 text-grey-darkest" id="role"
                               v-model="role">
                    </div>
                    <div class="flex flex-col mb-2">
                        <label for="preferred_foot" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Qualifications *</label>
                        <input type="text" class="border py-2 px-3 text-grey-darkest" id="qualifications"
                               v-model="qualifications">
                    </div>
                    <div class="flex flex-col mb-2">
                        <label for="looking_for_a_club" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Looking For A Club</label>
                        <select name="looking_for_a_club" class="border py-2 px-3 text-grey-darkest" v-model="looking_for_a_club">
                            <option value="0" selected disabled>Please Select</option>
                            <option value="1">YES</option>
                            <option value="0">NO</option>
                        </select>
                    </div>

                </div>

            </div>
        </div>
        <div class="flex flex-wrap">
            <div class="flex-1">
                <div class="flex flex-col px-7 mb-3 lg:pl-20 lg:px-3">
                    <div class="flex flex-col mb-2 mt-2">
                        <label for="bio" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Bio</label>
                        <textarea name="bio" class="border py-2 px-3 text-grey-darkest" cols="30" rows="10" v-model="bio"></textarea>
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
                    <div class="flex justify-center items-center bg-orange font-medium rounded">
                            <button v-bind:class="{ 'opacity-25' : isDisabled === true}" class="inline-flex items-center px-3 py-2 font-medium rounded px-4 py-2 leading-5 bg-green-500 text-primary-100 text-white hover:text-white hover:bg-green-700" @click="register()"
                                    style="background-color: orange; font-weight: 900; border-color: orange" :disabled='isDisabled'>
                                <svg v-bind:class="{ 'invisible' : formGo !== true}" class=" animate-spin h-5 w-5 mr-3 ..." viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Register
                            </button>
                    </div>

                </div>

            </div>

        </div>
    </div>

</template>
<script>
import DatePicker from 'vuejs-datepicker';
import axios from 'axios';

export default {
    props: ['positions','regions'],
    data() {
        return {
            name: '',
            dob: '',
            email_address: '',
            address: '',
            height: '',
            gender: 0,
            looking_for_a_club: 0,
            preferred_foot: 0,
            preferred_position: 0,
            region: 0,
            staff_region: 0,
            step_free: 0,
            club: '',
            contract_end_date: '',
            file: '',
            role: '',
            qualifications: '',
            bio: '',
            got_club: false,
            errors: [],
            success: '',
            btnDisable: true,
            formGo : false,
            profile_type: 0
        }
    },


    components: {
        DatePicker
    },
    methods: {
        previewFiles(event) {
            this.file = this.$refs.file.files[0];
        },
        register() {
            this.formGo = true;
            let formData = new FormData();
            formData.append('name', this.name);
            if (this.dob !== '') {
                formData.append('dob', this.dob.toDateString());
            }
            formData.append('email_address', this.email_address);
            formData.append('address', this.address);
            formData.append('height', this.height);
            formData.append('gender', this.gender);
            formData.append('bio', this.bio);
            formData.append('looking_for_a_club', this.looking_for_a_club);
            formData.append('preferred_foot', this.preferred_foot);
            formData.append('preferred_position', this.preferred_position);
            formData.append('club', this.club);
            formData.append('county', this.region);
            formData.append('step_free', this.step_free);
            formData.append('role',this.role);
            formData.append('qualification',this.qualifications);
            formData.append('profile_type',this.profile_type);
            if (this.contract_end_date !== '') {
                formData.append('contract_end_date', this.contract_end_date.toDateString());
            }

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
                        this.formGo = false;
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
    computed: {
        isDisabled: function(){
            if(this.profile_type === 1 && (this.name === '' || this.email_address === ''
                || this.gender === 0 || this.dob === '' || this.region === 0 || this.preferred_foot === 0 || this.preferred_position === 0)){
                return true;
            }

            if(this.profile_type === 2 && (this.name === '' || this.email_address === ''
                || this.gender === 0 || this.dob === '' || this.region === 0 || this.role === '' || this.qualifications === '')){
                return true;
            }
        }
    }
}
</script>
