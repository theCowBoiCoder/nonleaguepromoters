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
                    <h4 class="mb-2 uppercase font-bold text-2xl text-grey-darkest text-white">Personal Data</h4>
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
                               v-model="email_address" readonly disabled>
                    </div>
                    <div class="flex flex-col mb-2">
                        <label for="dob" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Date Of Birth</label>
                        <date-picker name="dob" :input-class="'border py-2 px-3 text-grey-darkest w-full'" v-model="dob"
                                     format="yyyy-MM-dd"></date-picker>
                    </div>
                    <div class="flex flex-col mb-2">
                        <label for="looking_for_a_club" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Looking For A Club</label>
                        <select name="looking_for_a_club" class="border py-2 px-3 text-grey-darkest"
                                v-model="looking_for_a_club">
                            <option selected disabled>Please Select</option>
                            <option value="1">YES</option>
                            <option value="0">NO</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="flex-1">
                <div class="flex flex-col px-7 mb-3 lg:pl-20 lg:px-3">
                    <h4 class="mb-2 uppercase font-bold text-2xl text-grey-darkest text-white">Player Data</h4>
                </div>
                <div class="flex flex-col w-50 px-7 lg:pl-20 lg:px-3">
                    <div class="flex flex-col mb-2">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;" for="name">County *</label>
                        <select name="county" class="border py-2 px-3 text-grey-darkest" v-model="county">
                            <option value="0" disabled>Please Select</option>
                            <option v-for="region in regions" v-model="region.id"
                                    :selected="my_profile.player.county === region.county">{{ region.county }}
                            </option>
                        </select>
                    </div>
                    <div class="flex flex-col mb-2">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;" for="name">Step / Free Agent</label>
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
                               style="color: orange; font-weight: 900;">Position</label>
                        <select name="" class="border py-2 px-3 text-grey-darkest" v-model="preferred_position">
                            <option value="0">Please Select</option>
                            <option v-for="position in positions" v-model="position.name">{{ position.name }}</option>
                        </select>
                    </div>
                    <div class="flex flex-col mb-2">
                        <label for="preferred_foot" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Preferred Foot</label>
                        <select name="" id="preferred_foot" class="border py-2 px-3 text-grey-darkest"
                                v-model="preferred_foot">
                            <option value="0" selected disabled>Please Select</option>
                            <option value="left">Left</option>
                            <option value="right">Right</option>
                            <option value="both">Both</option>
                        </select>
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
                    <label for="bio" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                           style="color: orange; font-weight: 900;">My Bio</label>
                    <textarea id="bio" v-model="bio" class="p-2"></textarea>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap">
            <div class="flex-1">

                <div class="flex flex-col px-7 mb-3 lg:pl-20 lg:px-3 mt-3 ">
                    <h3 class="mb-2 uppercase font-bold text-2xl text-grey-darkest text-white"
                        style="font-weight: 900;">Social Media
                    </h3>
                    <label for="facebook_url" class="mb-2 uppercase font-bold text-lg text-grey-darkest text-orange">Facebook</label>
                    <input type="text" class="border py-2 px-3 text-grey-darkest mb-3" id="facebook_url"
                           v-model="facebook_url">
                    <label for="twitter_url" class="mb-2 uppercase font-bold text-lg text-grey-darkest text-orange">Twitter</label>
                    <input type="text" class="border py-2 px-3 text-grey-darkest mb-3" id="twitter_url"
                           v-model="twitter_url">
                    <label for="instagram_url" class="mb-2 uppercase font-bold text-lg text-grey-darkest text-orange">Instagram</label>
                    <input type="text" class="border py-2 px-3 text-grey-darkest mb-3" id="instagram_url"
                           v-model="instagram_url">
                    <label for="youtube_url" class="mb-2 uppercase font-bold text-lg text-grey-darkest text-orange">YouTube</label>
                    <input type="text" class="border py-2 px-3 text-grey-darkest mb-3" id="youtube_url"
                           v-model="youtube_url">
                </div>
            </div>
        </div>
        <div class="flex flex-wrap">
            <div class="flex-1">
                <div class="flex flex-col px-7 mb-3 lg:pl-20 lg:px-3">
                    <h3 class="mb-2 uppercase font-bold text-2xl text-grey-darkest text-white"
                        style="font-weight: 900;">Club Information
                    </h3>
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
                                     format="yyyy-MM-dd"
                                     v-model="contract_end_date"></date-picker>
                    </div>
                    <button class="btn btn-danger border text-white p-3 uppercase mb-3" @click="update()"
                            style="background-color: orange; font-weight: 900; border-color: orange">Update My Profile
                    </button>
                    <button class="btn btn-danger border text-white p-3 uppercase bg-red-400" @click="deleteAccount()"
                            style="font-weight: 900; border-color: orange">Delete My Profile
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
    props: ['positions', 'my_profile', 'regions'],
    data() {
        return {
            id: this.my_profile.id,
            name: this.my_profile.name,
            dob: (this.my_profile.player !== null) ? this.my_profile.player.dob : null,
            email_address: this.my_profile.email,
            address: (this.my_profile.player) ? this.my_profile.player.address : null,
            bio: (this.my_profile.player) ? this.my_profile.player.bio : null,
            height: (this.my_profile.player) ? this.my_profile.player.height : null,
            gender: (this.my_profile.player) ? this.my_profile.player.gender : null,
            looking_for_a_club: (this.my_profile.player) ? this.my_profile.player.looking_for_a_club : 0,
            preferred_foot: (this.my_profile.player) ? this.my_profile.player.preferred_foot : null,
            preferred_position: (this.my_profile.player) ? this.my_profile.player.preferred_position : null,
            step_free: (this.my_profile.player) ? this.my_profile.player.step_level : null,
            club: (this.my_profile.player.contracts) ? this.my_profile.player.contracts.contracted_club : null,
            contract_end_date: (this.my_profile.player.contracts) ? this.my_profile.player.contracts.contact_expiry_date : null,
            county: (this.my_profile.player) ? this.my_profile.player.county : null,
            facebook_url: (this.my_profile.player) ? this.my_profile.player.facebook_url : null,
            twitter_url: (this.my_profile.player) ? this.my_profile.player.twitter_url : null,
            youtube_url: (this.my_profile.player) ? this.my_profile.player.youtube_url : null,
            instagram_url: (this.my_profile.player) ? this.my_profile.player.instagram_url : null,
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
        scrollToTop() {
            window.scrollTo(0,0);
        },
        previewFiles(event) {
            this.file = this.$refs.file.files[0];
            //console.log(this.file);
        },
        deleteAccount() {
            if (confirm('Are you sure you want to delete your account?')) {
                let formData = new FormData();
                formData.append('id', this.my_profile.id);
                axios.post('/delete', formData).then(response => {
                    console.log(response);
                });
            }
        },
        update() {
            let formData = new FormData();
            formData.append('id', this.my_profile.id);
            formData.append('name', this.name);
            formData.append('bio', this.bio);
            if (this.dob !== '') {
                formData.append('dob', this.dob);
            }
            formData.append('email_address', this.email_address);
            formData.append('address', this.address);
            formData.append('height', this.height);
            formData.append('gender', this.gender);
            formData.append('preferred_foot', this.preferred_foot);
            formData.append('preferred_position', this.preferred_position);
            formData.append('club', this.club);
            formData.append('step_free', this.step_free);
            formData.append('county', this.county);
            formData.append('twitter_url', this.twitter_url);
            formData.append('facebook_url', this.facebook_url);
            formData.append('youtube_url', this.youtube_url);
            formData.append('instagram_url', this.instagram_url);
            if (this.contract_end_date !== '') {
                formData.append('contract_end_date', this.contract_end_date);
            }

            formData.append('file', this.file);
            this.success = '';
            axios.defaults.headers.common = {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': window.csrf_token,
                'Content-Type': 'multipart/form-data'

            };
            axios.post('/profile', formData).then(response => {
                if (response.status === 200) {
                    if (response.data.message) {
                        this.success = response.data.message;
                    }
                    this.scrollToTop();
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
