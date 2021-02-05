<template>
    <div class="container m-auto">
        <div class="flex lg:flex-row sm:flex-col md:flex-col xs:flex-col mb-9">
            <div class="mt-6 flex-none w-75 mr-20">
                <h3 class="m-2 p-2 uppercase text-2xl mb-5 font-bold font-light font-Montserrat">Search Filters</h3>
                <div class="m-2 p-2">
                    <p class="mb-2 uppercase text-center">Search By Name</p>
                    <input v-model="name" type="text" placeholder="Search Name Contains"
                           class="border-2 border-gray-600 rounded h-9 pl-2 w-full">
                </div>
                <div class="m-2 p-2">
                    <p class="mb-2 uppercase text-center">Search By County</p>
                    <input v-model="county" type="text" placeholder="Search Name Contains"
                           class="border-2 border-gray-600 rounded h-9 pl-2 w-full">
                </div>

                <div class="m-2 p-2">
                    <p class="mb-2 uppercase text-center">Search By Country</p>
                    <input v-model="country" type="text" placeholder="Search Name Contains"
                           class="border-2 border-gray-600 rounded h-9 pl-2 w-full">
                </div>

                <div class="m-2 p-2">
                    <p class="mb-2 uppercase text-center">Contract Status</p>
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
            <div class="mt-6 flex-grow">
                <table class="table-auto border-collapse border-2 border-blue-600 w-full">
                    <thead>
                    <tr>
                        <th class="pl-2 border-gray-400 border-2 text-left text-gray-800 uppercase">Name</th>
                        <th class="border-gray-400 border-2 uppercase">Preferred Postion</th>
                        <th class="border-gray-400 border-2 uppercase">Age</th>
                        <th class="border-gray-400 border-2 uppercase">Contract Status</th>
                        <th class="border-gray-400 border-2 uppercase">County</th>
                        <th class="border-gray-400 border-2 uppercase">Country</th>
                        <th class="border-gray-400 border-2 w-32 uppercase"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="player in filteredList">
                        <td class="border-gray-400 border-2 uppercase pl-2 font-light">{{ player.name }}</td>
                        <td class="border-gray-400 border-2 uppercase pl-2 font-light">{{ player.preferred_position }}</td>
                        <td class="border-gray-400 border-2 uppercase pl-2 font-light">{{ player.age }}</td>
                        <td class="border-gray-400 border-2 uppercase pl-2 font-light" v-if="player.contract">{{ player.contract.contract_type}}</td>
                        <td class="border-gray-400 border-2 uppercase pl-2 font-light" v-if="!player.contract">
                            Free Agent
                        </td>
                        <td class="border-gray-400 border-2 uppercase pl-2 font-light">{{ player.county }}</td>
                        <td class="border-gray-400 border-2 uppercase pl-2 font-light">{{ player.country }}</td>
                        <td class="border-gray-400 border-2 p-2 text-center">
                            <a href="/player/search/" class="text-sm border-1 bg-blue-400 p-1 rounded text-white uppercase font-light">
                                View Details
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['players'],
    data() {
        return {
            name: '',
            country: '',
            county: '',
            contact_status: 0
        }
    },
    methods: {
        changeContract: function () {
            console.log(this.contact_status);
        },
        filterPlayersByName: function (players) {
            return players.filter(player => {
                player.name.toLowerCase().includes(this.name.toLowerCase());
            });
        }
    },
    mounted() {

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
