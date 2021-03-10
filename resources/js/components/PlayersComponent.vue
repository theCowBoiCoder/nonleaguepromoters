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
                               class="border-2 border-gray-600 rounded h-9 pl-2 w-full">
                    </div>
                    <div class="m-2 p-2">
                        <p class="mb-2 uppercase text-center text-orange">Search By County</p>
                        <input v-model="county" type="text" placeholder="Search Name Contains"
                               class="border-2 border-gray-600 rounded h-9 pl-2 w-full">
                    </div>

                    <div class="m-2 p-2">
                        <p class="mb-2 uppercase text-center text-orange">Search By Country</p>
                        <input v-model="country" type="text" placeholder="Search Name Contains"
                               class="border-2 border-gray-600 rounded h-9 pl-2 w-full">
                    </div>

                    <div class="m-2 p-2">
                        <p class="mb-2 uppercase text-center text-orange">Contract Status</p>
                        <select v-model="contact_status" class="border-2 border-gray-600 rounded h-9 pl-2 w-full"
                                v-on:change="changeContract">
                            <option value="0" selected>Please Select</option>
                            <option value="free-agent">Free Agent</option>
                            <option value="professional">Professional</option>
                            <option value="semi-professional">Semi Professional</option>
                            <option value="non-contract">Non-Contract</option>
                            <option value="amateur-contract">Amateur Contract</option>
                        </select>
                    </div>
                </div>
                <div class="flex-initial lg:flex-grow">
                    <!--                    <div v-if="laravelData.data.length >=1">-->
                    <table class="table-auto border-collapse border-2 border-orange bg-white bg-opacity-95">
                        <thead>
                        <tr>
                            <th class="pl-2 border-orange border-2 text-left text-gray-800 uppercase p-2 text-orange">
                                Name
                            </th>
                            <th class="border-orange border-2 uppercase p-2 text-orange">Club</th>
                            <th class="border-orange border-2 uppercase p-2 text-orange">Contract Finish Date</th>
                            <th class="border-orange border-2 uppercase p-2 text-orange">Looking To Move</th>
                            <th class="border-orange border-2 w-32 uppercase  text-orange"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="player in laravelData.data">
                            <td class="border-orange border-2 uppercase pl-2 font-light p-2">{{ player.name }}</td>
                            <td class="border-orange border-2 uppercase pl-2 font-light p-2"
                                v-if="player.contracts != null">{{ player.contracts.contracted_club }}
                            </td>
                            <td class="border-orange border-2 uppercase pl-2 font-light p-2" v-else>No Club</td>
                            <td class="border-orange border-2 uppercase pl-2 font-light p-2"
                                v-if="player.contracts != null">{{ player.contracts.contact_expiry_date }}
                            </td>
                            <td class="border-orange border-2 uppercase pl-2 font-light p-2" v-else>No Contract</td>
                            <td class="border-orange border-2 uppercase pl-2 font-light p-2">NO</td>
                            <td class="border-orange border-2 p-2 text-center">
                                <a href="/player/search/"
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
    data() {
        return {
            name: '',
            country: '',
            county: '',
            contact_status: 0,
            laravelData: {},
        }
    },
    methods: {
        getPlayers(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }
            axios.get('/player/players?page=' + page)
                .then(response => {
                    console.log(response.data);
                    return response.data;
                }).then(data => {
                this.laravelData = data;
            })
        },
        changeContract: function () {
            console.log(this.contact_status);
        },
        filterPlayersByName: function () {
            return this.laravelData.data.filter(player => {
                player.name.toLowerCase().includes(this.name.toLowerCase());
            });
        }
    },
    mounted() {

    },
    created() {
        this.getPlayers();
    },
    computed: {

        filteredList() {
            const {name, county, country} = this;
            return this.players
                .filter(player => player.name.toLowerCase().includes(name.toLowerCase()))
                .filter(player => player.county.toLowerCase().includes(county.toLowerCase()))
                .filter(player => player.country.toLowerCase().includes(country.toLowerCase()))
        }
    }
}
</script>
