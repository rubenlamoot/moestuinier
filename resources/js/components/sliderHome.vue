<template>
    <div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="homepic d-block w-100 img-fluid" src="" alt="">
                <div class="myCaption d-none d-md-block">
                    <div class="captionText">
                        <h2 class="text-center txtMaand"></h2>
                        <p class="text-center m-0 tekstMaand"></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="homepic d-block w-100 img-fluid" src="" alt="">
                <div class="myCaption d-none d-md-block">
                    <div class="captionText">
                        <h2 class="text-center txtMaand"></h2>
                        <p class="text-center m-0 tekstMaand"></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="mijncarousel d-none d-md-block" href="#carouselHome" role="button" data-slide="prev">
            <span class="fas fa-chevron-circle-left fa-3x text-white" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="mijncarousel d-none d-md-block" href="#carouselHome" role="button" data-slide="next">
            <span class="fas fa-chevron-circle-right fa-3x text-white" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "sliderHome",
        props:['route'],
        data(){
            return{
                months:[],
            }
        },
        created(){
            this.getMonths()
        },
        methods:{
            getMonths(){
                axios.get(this.route)
                    .then(response => {
                        console.log(response.data.results);
                    })
                    .catch(error => {
                        console.log(error);
                    })
            },
        },
    }
</script>

<style scoped>

</style>
