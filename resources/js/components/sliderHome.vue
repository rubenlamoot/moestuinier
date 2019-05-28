<template>
    <div>
        <div id="carouselHome" class="carousel slide" data-ride="carousel" data-interval="false">
            <div v-if="loaded" class="carousel-inner">
                <div class="carousel-item active">
                    <img class="homepic d-block w-100 img-fluid" v-bind:src="'images/home/' + months[currentMonth].month_pic" alt="">

                    <div class="myCaption d-none d-md-block">
                        <div class="captionText">
                            <h2 class="text-center txtMaand">{{months[currentMonth].month}}</h2>
                            <p class="text-center m-0 tekstMaand">{{months[currentMonth].month_text}}</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="homepic d-block w-100 img-fluid" v-bind:src="'images/home/' + months[currentMonth].month_pic" alt="">
                    <div class="myCaption d-none d-md-block">
                        <div class="captionText">
                            <h2 class="text-center txtMaand">{{months[currentMonth].month}}</h2>
                            <p class="text-center m-0 tekstMaand">{{months[currentMonth].month_text}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <a @click="previousSlide" class="mijncarousel d-none d-md-block" href="#carouselHome" role="button" data-slide="prev">
                <span class="fas fa-chevron-circle-left fa-3x text-white" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a @click="nextSlide" class="mijncarousel d-none d-md-block" href="#carouselHome" role="button" data-slide="next">
                <span class="fas fa-chevron-circle-right fa-3x text-white" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div v-if="loaded" class="mobile_slider d-md-none bg-light">
            <div class="d-flex">
                <a @click="previousSlide" class="mijncarousel flex-fill text-right" href="#carouselHome" role="button" data-slide="prev">
                    <span class="fas fa-chevron-circle-left fa-3x text-secondary" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <h2 class="text-center flex-fill txtMaand">{{months[currentMonth].month}}</h2>
                <a @click="nextSlide" class="mijncarousel flex-fill" href="#carouselHome" role="button" data-slide="next">
                    <span class="fas fa-chevron-circle-right fa-3x text-secondary" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <p class="text-center my-2 tekstMaand">{{months[currentMonth].month_text}}</p>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "sliderHome",
        props:['route'],
        data(){
            return{
                months: [],
                d: new Date(),
                currentMonth: 0,
                loaded: false,
            }
        },
        created(){
            this.currentMonth = this.d.getMonth();
            this.getMonths();
        },
        methods:{
            getMonths(){
                axios.get(this.route)
                    .then(response => {
                        console.log(response.data.results);
                        for (let i in response.data.results){
                            this.months.push(response.data.results[i]);
                        }
                        this.loaded = true;
                    })
                    .catch(error => {
                        console.log(error);
                    })
            },
            nextSlide(){
                if(this.currentMonth === 11){
                    this.currentMonth = 0
                }else{
                    this.currentMonth += 1
                }
            },
            previousSlide(){
                if(this.currentMonth === 0){
                    this.currentMonth = 11
                }else{
                    this.currentMonth -= 1
                }

            },
        },
    }
</script>

