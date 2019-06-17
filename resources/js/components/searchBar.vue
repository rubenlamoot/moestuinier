<template>
    <div>
        <form class="form-inline my-2 ml-lg-4 text-center">
            <input class="form-control mr-sm-2 w-75" v-model="search" id="search" type="text" placeholder="Zoeken" @keydown="searchProduct">
            <i class="fas fa-search"></i>
        </form>
        <div v-for="result in results">
            {{result.name}}
        </div>
    </div>

</template>

<script>
    import axios from 'axios';

    export default {
        name: "searchBar",
        props:['route'],
        data(){
            return{
                search:'',
                results: '',
                show: false,

            }
        },
        methods:{
            searchProduct: _.debounce(function () {
                if (this.search.length >= 3) {
                    axios.post(this.route, {
                        search: this.search,
                    })
                        .then(response => {
                            console.log(response.data.results);
                            this.results = response.data.results;
                            this.show = true;
                        })
                        .catch(error => {
                            console.log(error);
                        })
                }
            }, 250),
        }
    }
</script>

<style scoped>

</style>
