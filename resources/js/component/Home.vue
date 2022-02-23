<template>
    <div class="navbar navbar-expand-lg  justify-content-between sticky-top bg-white navbar-light">
        <div class="navbar-brand ms-5">
            <img src="/images/logo_fix.png" alt="image" class="image_logo">
        </div>
        <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse bg-white flex-grow-0" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-lg-center">
                <li class="nav-item">
                    <router-link to="/" class="nav-link active">
                        Home
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/" class="nav-link">
                        Destination
                    </router-link>
                </li>

                <li class="nav-item">
                    <router-link to="/" class="nav-link">
                        Blog
                    </router-link>
                </li>
                <li class="nav-item">
                    <div class="dropdown nav-link">
                        <select name="bahasa" id="bahasa">
                            <option value="Indonesia">Indonesia</option>
                        </select>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="buttonGroup justify-content-center">
                        <router-link to="/" class="signup">Sign Up</router-link>
                        <router-link to="/" class="login">Login</router-link>
                    </div>
                </li>
            </ul>
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
                        <div class="d-flex"><a href="#" class="btn btn_custom ms-auto">Baca Selengkapnya</a></div>
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
            <div class="col-lg-4">
                <div class="card round_shape">
                    <div class="card-body">
                        <h5 class="card-title">Dari : Username</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <div class="d-flex">
                            <p class="card-text ms-auto">Rating: 4.5</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card round_shape">
                    <div class="card-body">
                        <h5 class="card-title">Dari : Username</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <div class="d-flex">
                            <p class="card-text ms-auto">Rating: 4.5</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card round_shape">
                    <div class="card-body">
                        <h5 class="card-title">Dari : Username</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <div class="d-flex">
                            <p class="card-text ms-auto">Rating: 4.5</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-3 px-5 bg-grey">
        <img src="/images/logo_fix.png" alt="">
        <div class="row">
            <div class="col-lg-3">
                <div class="contact py-3">
                    <div class="text_contact d-flex justify-content-between align-items-center">
                        <p>Email: MaduraDestination.Com</p>
                        <img src="images/facebook-logo.png" alt="" class="d-block">
                    </div>
                    <div class="text_contact d-flex justify-content-between align-items-center">
                        <p>Phone: 0812123456789</p>
                        <img src="images/instagram.png" alt=""  class="d-block">
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <ul class="navbar-nav flex-lg-row flex-column me-auto mb-2 mb-lg-0 align-items-center justify-content-end">
                    <li class="nav-item">
                        <router-link to="/" class="nav-link">
                            Home
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/" class="nav-link">
                            Destination
                        </router-link>
                    </li>

                    <li class="nav-item">
                        <router-link to="/" class="nav-link">
                            Blog
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown nav-link">
                            <select name="bahasa" id="bahasa">
                                <option value="Indonesia">Indonesia</option>
                            </select>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="buttonGroup ">
                            <router-link to="/" class="signup">Sign Up</router-link>
                            <router-link to="/" class="login">Login</router-link>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Home',
    data(){
        return {
            data: []
        }
    },
    methods: {
        async get(){
            let path = await window.axios.get('/api/destination')
            this.data = path.data.data
            this.data.length = 3
        }
    },
    mounted() {
        this.get();
    }

};
</script>

<style scoped>

</style>
