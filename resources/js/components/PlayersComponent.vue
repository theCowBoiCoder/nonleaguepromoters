<template>
    <div>
        <div class="container m-auto">
            <div class="flex flex-col md:flex-row">
                <div class="flex-initial m-5">
                    <!-- Won't grow, but will shrink if needed -->
                    <h3 class="m-2 p-2 uppercase text-2xl mb-5 font-bold font-light font-Montserrat text-orange">Search
                        Filters</h3>
                    <div class="m-2 p-2">
                        <p class="mb-2 uppercase text-center text-orange">Search By Name</p>
                        <input v-model="name" type="text" placeholder="Search Name Contains"
                               class="border-2 border-gray-600 rounded h-9 pl-2 w-full"
                               v-on:keyup="getPlayers(null,name,region,county,gender)">
                    </div>
                    <div class="m-2 p-2">
                        <p class="mb-2 uppercase text-center text-orange">Search By Position</p>
                        <select name="" id="position" v-model="position" type="text"
                                class="border-2 border-gray-600 rounded h-9 pl-2 w-full"
                                @change="getPlayers(null,name,region,county,gender,position)">
                            <option value="selected">Please Select</option>

                            <option v-for="pos of positions" v-model="pos.id">{{ pos.name }}</option>
                            <option value="selected">ALL</option>
                        </select>
                    </div>
                    <div class="m-2 p-2">
                        <p class="mb-2 uppercase text-center text-orange">Search By Gender</p>
                        <select name="" id="gender" v-model="gender" type="text"
                                class="border-2 border-gray-600 rounded h-9 pl-2 w-full"
                                @change="getPlayers(null,name,region,county,gender,position)">
                            <option value="selected">Please Select</option>
                            <option value="MALE">MALE</option>
                            <option value="FEMALE">FEMALE</option>
                            <option value="selected">BOTH</option>
                        </select>
                    </div>
                    <div class="m-2 p-2">
                        <p class="mb-2 uppercase text-center text-orange">Search By County</p>
                        <select name="" id="county" v-model="county" type="text"
                                class="border-2 border-gray-600 rounded h-9 pl-2 w-full"
                                @change="getPlayers(null,name,region,county,gender,position)">
                            <option value="selected">Please Select</option>
                            <option v-for="county of counties" v-model="county.id">{{ county.county }}</option>
                        </select>
                    </div>

                    <div class="m-2 p-2">
                        <p class="mb-2 uppercase text-center text-orange">Search By Region</p>
                        <select name="" id="" v-model="region" type="text"
                                class="border-2 border-gray-600 rounded h-9 pl-2 w-full"
                                @change="getPlayers(null,name,region,county,gender,position)">
                            <option value="selected">Please Select</option>
                            <option v-for="region of regions" v-model="region.id">{{ region.region }}</option>
                        </select>
                    </div>
                    <div class="m-2 p-2 text-center">
                        <a class=" uppercase text-md mb-5 font-bold font-light font-Montserrat text-sm border-1 bg-orange p-1 rounded text-white uppercase font-light"
                           v-on:click="resetFilter">Reset Filter</a>
                    </div>


                    <!--                    <div class="m-2 p-2">-->
                    <!--                        <p class="mb-2 uppercase text-center text-orange">Contract Status</p>-->
                    <!--                        <select v-model="contact_status" class="border-2 border-gray-600 rounded h-9 pl-2 w-full">-->
                    <!--                            <option value="0" selected>Please Select</option>-->
                    <!--                            <option value="free-agent">Free Agent</option>-->
                    <!--                            <option value="professional">Professional</option>-->
                    <!--                            <option value="semi-professional">Semi Professional</option>-->
                    <!--                            <option value="non-contract">Non-Contract</option>-->
                    <!--                            <option value="amateur-contract">Amateur Contract</option>-->
                    <!--                        </select>-->
                    <!--                    </div>-->
                </div>
                <div class="flex-initial lg:flex-grow">
                    <!--                    <div v-if="laravelData.data.length >=1">-->
                    <table class="table-auto border-collapse border-2 border-orange bg-white bg-opacity-95">
                        <thead>
                        <tr>
                            <th class="pl-2 border-orange border-2 text-left text-gray-800 uppercase p-2 text-orange">
                                Name
                            </th>
                            <th class="border-orange border-2 uppercase p-2 text-orange">Position</th>
                            <th class="border-orange border-2 uppercase p-2 text-orange">Club</th>
                            <th class="border-orange border-2 uppercase p-2 text-orange">Contract Finish Date</th>
                            <th class="border-orange border-2 uppercase p-2 text-orange">Looking To Move</th>
                            <th class="border-orange border-2 w-32 uppercase  text-orange"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="player in laravelData.data">
                            <td class="border-orange border-2 uppercase pl-2 font-light p-2">{{ player.name }}</td>
                            <td class="border-orange border-2 uppercase pl-2 font-light p-2">
                                {{ player.preferred_position }}
                            </td>
                            <td class="border-orange border-2 uppercase pl-2 font-light p-2"
                                v-if="player.contracts != null">{{ player.contracts.contracted_club }}
                            </td>
                            <td class="border-orange border-2 uppercase pl-2 font-light p-2" v-else>No Club</td>
                            <td class="border-orange border-2 uppercase pl-2 font-light p-2"
                                v-if="player.contracts != null">{{ player.contracts.contact_expiry_date }}
                            </td>
                            <td class="border-orange border-2 uppercase pl-2 font-light p-2" v-else>No Contract</td>
                            <td class="border-orange border-2 uppercase pl-2 font-light p-2">
                                {{ (player.looking_for_a_club === 1) ? 'YES' : 'NO' }}
                            </td>
                            <td class="border-orange border-2 p-2 text-center">
                                <a v-bind:href="'/player/'+player.id"
                                   class="text-sm border-1 bg-orange p-1 rounded text-white uppercase font-light">
                                    View Details
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <pagination :data="laravelData" @pagination-change-page="getPlayers" :prev-text="'Prev'"
                                :next-text="'Next'" :container-class="'pagination'"
                                :page-class="'page-item'"></pagination>
                    <!--                    </div>-->
                    <!--                    <div v-if="laravelData.data.length === 0">-->
                    <!--                        <h2>NO PLAYERS YET BE THE FIRST</h2>-->
                    <!--                    </div>-->

                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    props: ['regions', 'counties', 'positions'],
    data() {
        return {
            name: null,
            region: 'selected',
            county: 'selected',
            gender: 'selected',
            position: 'selected',
            contact_status: 0,
            laravelData: {},
        }
    },
    methods: {
        getPlayers(page, name, region, county, gender, position) {
            if (typeof page === 'undefined') {
                page = 1;
            }
            axios.get('/player/players?term=' + name + '&gender=' + gender + '&region=' + region + '&county=' + county + '&position=' + position + '&page=' + page)
                .then(response => {
                    return response.data;
                }).then(data => {
                this.laravelData = data;
            })
        },
        resetFilter() {
            this.name = null;
            this.region = 'selected';
            this.county = 'selected';
            this.position = 'selected';
            this.gender = 'selected';

            this.getPlayers(null, this.name, this.region, this.county)
        }
    },
    mounted() {

    },
    created() {
        this.getPlayers();
    },
    computed: {}
}
</script>
