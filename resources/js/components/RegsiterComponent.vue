<template>
    <form action="">
        <div class="flex flex-wrap">
            <div class="flex-1">
                <div class="flex flex-col px-7 mb-3 lg:pl-20 lg:px-3">
                    <h4 class="mb-2 uppercase font-bold text-lg text-grey-darkest underline"
                        style="color: orange; font-weight: 900;">Personal Data
                    </h4>
                </div>
                <div class="flex flex-col w-50 px-7 lg:pl-20 lg:px-3">
                    <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;" for="name">Name *</label>
                        <input type="text" class="border py-2 px-3 text-grey-darkest" id="name" v-model="name">
                    </div>
                    <div class="flex flex-col mb-4">
                        <label for="address" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Address</label>
                        <input type="text" class="border py-2 px-3 text-grey-darkest" name="address" id="address"
                               v-model="address">
                    </div>
                    <div class="flex flex-col mb-4">
                        <label for="dob" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Gender</label>
                        <input type="text" class="border py-2 px-3 text-grey-darkest" id="gender" v-model="gender">
                    </div>
                    <div class="flex flex-col mb-4">
                        <label for="email_address" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Email Address</label>
                        <input type="email" class="border py-2 px-3 text-grey-darkest" id="email_address"
                               v-model="email_address">
                    </div>
                    <div class="flex flex-col mb-4">
                        <label for="dob" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Date Of Birth</label>
                        <input type="text" class="border py-2 px-3 text-grey-darkest" id="dob" v-model="dob">
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
                    <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;" for="name">Step / Free Agent</label>
                        <select class="border py-2 px-3 text-grey-darkest" v-model="step_free">
                            <option value="0">Please Select</option>
                            <option value="0">Step</option>
                            <option value="0">Free Agent</option>
                        </select>
                    </div>
                    <div class="flex flex-col mb-4">
                        <label for="address" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Position</label>
                        <input type="text" class="border py-2 px-3 text-grey-darkest" name="position" id="position"
                               v-model="position">
                    </div>
                    <div class="flex flex-col mb-4">
                        <label for="email_address" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Email Address</label>
                        <input type="email" class="border py-2 px-3 text-grey-darkest" id="email_address"
                               v-model="email_address">
                    </div>
                    <div class="flex flex-col mb-4">
                        <label for="dob" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Date Of Birth</label>
                        <input type="text" class="border py-2 px-3 text-grey-darkest" id="dob" v-model="dob">
                    </div>
                    <div class="flex flex-col mb-4">
                        <label for="profile_image" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Profile Picture</label>
                        <input type="file" class="border py-2 px-3 text-grey-darkest" id="profile_image">
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>
<script>
export default {
    data() {
        return {
            name: '',
            dob: '',
            email_address: '',
            address: '',
            gender: '',
        }
    },
    methods: {},
    mounted() {

    },
    computed: {}
}
</script>
