<template>
    <div class="hero container-fluid d-flex flex-column align-items-center">
        <div class="container-fluid w-75 text-center text-white">
            <h1>Find Your Suitable Destination</h1>
            <h2>Explore incredible things to do around Madura</h2>
            <div class="input-group mb-3 w-50 mx-auto">
                <input type="text" class="form-control round_shape-2 py-3" placeholder="Search Your Destination here..." aria-label="Recipient's username" aria-describedby="button-addon2" v-model="key">
                <router-link :to="`${$route}/search/${key}`" class="btn btn-outline-secondary btn_custom-2 pt-3" id="button-addon2">Search</router-link>
            </div>
        </div>
    </div>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/images/Karapan Sapi Madura-1.jpg" class="d-block w-100" alt="">
            </div>
            <div class="carousel-item">
                <img src="/images/Karapan Sapi Madura-2.jpg" class="d-block w-100" alt="">
            </div>
            <div class="carousel-item">
                <img src="/images/Karapan Sapi Madura-3.jpg" class="d-block w-100" alt="">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container-fluid py-5 px-5 bg-grey-light" id="trending">
        <div class="title">
            <h2>Trending Tours</h2>
        </div>
        <div class="red-line">

        </div>
        <div class="row py-3">
            <div class="col-lg-4" v-for=" i in data">
                <div class="card w-100 flex-lg-row flex-column round_shape">
                    <img :src="`/images/${i.image}`" class="card-img-top w-50 " alt="">
                    <div class="card-body w-50  d-flex flex-column justify-content-center align-items-center">
                        <h5 class="card-title">{{ i.name }}</h5>
                        <a href="#" class="btn btn_custom">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
<!--            <div class="col-lg-4">-->
<!--                <div class="card w-100 flex-lg-row flex-column round_shape">-->
<!--                    <img src="/images/Karapan Sapi Madura-2.jpg" class="card-img-top w-50 " alt="">-->
<!--                    <div class="card-body w-50 d-flex flex-column justify-content-center align-items-center">-->
<!--                        <h5 class="card-title">Card title</h5>-->
<!--                        <a href="#" class="btn btn_custom">Baca Selengkapnya</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-4">-->
<!--                <div class="card w-100 flex-lg-row flex-column round_shape">-->
<!--                    <img src="/images/Karapan Sapi Madura-3.jpg" class="card-img-top w-50 " alt="">-->
<!--                    <div class="card-body w-50  d-flex flex-column justify-content-center align-items-center">-->
<!--                        <h5 class="card-title">Card title</h5>-->
<!--                        <a href="#" class="btn btn_custom">Baca Selengkapnya</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>
    <div class="container-fluid px-5 py-3">
        <div class="title">
            <h2>Top Destination</h2>
        </div>
        <div class="red-line">

        </div>
        <div class="row py-3">
            <div class="col-lg-4" v-for=" i in data ">
                <div class="card w-100 round_shape">
                    <img :src="`/images/${i.image}`" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{i.name}}</h5>
                        <div class="d-flex"><router-link :to="`${$route.path}/detail/${i.id}`" class="btn btn_custom ms-auto">Baca Selengkapnya</router-link></div>
                    </div>
                </div>
            </div>
<!--            <div class="col-lg-4">-->
<!--                <div class="card w-100 round_shape">-->
<!--                    <img src="/images/Karapan Sapi Madura-1.jpg" class="card-img-top" alt="">-->
<!--                    <div class="card-body">-->
<!--                        <h5 class="card-title">Card title</h5>-->
<!--                        <div class="d-flex"><a href="#" class="btn btn_custom ms-auto">Baca Selengkapnya</a></div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-4">-->
<!--                <div class="card w-100 round_shape">-->
<!--                    <img src="/images/Karapan Sapi Madura-1.jpg" class="card-img-top" alt="">-->
<!--                    <div class="card-body">-->
<!--                        <h5 class="card-title">Card title</h5>-->
<!--                        <div class="d-flex"><a href="#" class="btn btn_custom ms-auto">Baca Selengkapnya</a></div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>
    <div class="container-fluid py-3 bg-grey-light">
        <div class="subs">
            <h2 class="text-center">Subscribe To MaduraDestinasi.com</h2>
        </div>
        <div class="input-group mb-3 w-50 mx-auto" id="subs">
            <input type="text" class="form-control round_shape-2 py-3" placeholder="Insert Your Email To Subscribe..." aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary btn_custom-2" type="button" id="button-addon2">Subscribe</button>
        </div>
    </div>
    <div class="container-fluid px-5 py-3">
        <div class="title">
            <h2>Review Terbaru</h2>
        </div>
        <div class="red-line">

        </div>
        <div class="row py-3">
            <div class="col-lg-4" v-for="user_review in review">
                <div class="card round_shape">
                    <div class="card-body">
                        <h5 class="card-title">Dari :{{user_review.user.username}}</h5>
                        <p class="card-text">{{user_review.review}}</p>
                        <div class="d-flex">
                            <p class="card-text ms-auto">Rating: {{user_review.rating}}</p>
                        </div>
                    </div>
                </div>
            </div>
<!--            <div class="col-lg-4">-->
<!--                <div class="card round_shape">-->
<!--                    <div class="card-body">-->
<!--                        <h5 class="card-title">Dari : Username</h5>-->
<!--                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
<!--                        <div class="d-flex">-->
<!--                            <p class="card-text ms-auto">Rating: 4.5</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-4">-->
<!--                <div class="card round_shape">-->
<!--                    <div class="card-body">-->
<!--                        <h5 class="card-title">Dari : Username</h5>-->
<!--                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
<!--                        <div class="d-flex">-->
<!--                            <p class="card-text ms-auto">Rating: 4.5</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>

</template>

<script>
export default {
    name: 'Home',
    data(){
        return {
            data: [],
            review: [],
            key: ""
        }
    },
    methods: {
        async get(){
            let path = await window.axios.get('/api/destination')
            this.data = path.data.data
            this.data.length = 3
        },

        async get_review(){
            let data = await  window.axios.get('/api/user/review/get')
            this.review = data.data.data
            console.log(this.review);

            if (this.review.length >= 3){
                this.review.length = 3
            }
        },
    },
    mounted() {
        this.get();
        this.get_review();
    }

};
</script>

<style scoped>

</style>
