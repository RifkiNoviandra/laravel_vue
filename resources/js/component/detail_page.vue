<template>
    <div class="container-fluid px-5 py-3">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                <li class="breadcrumb-item active" aria-current="page">Library</li>
            </ol>
        </nav>
        <div class="container-fluid d-flex flex-column justify-content-center">
            <div class="title text-center"><h2>{{data.name}}</h2></div>
            <div class="container d-flex justify-content-center">
                <img :src="`/images/${data.image}`" alt="">
            </div>
            <div class="container-fluid">
                <p>{{data.description}}</p>
            </div>
            <div class="container-fluid d-flex flex-column justify-content-center py-5 px-5">
                <p class="size">Facilities:{{data.facility}}</p>
                <p class="size">Itinerary Suggestion: -</p>
                <p class="size">Rating:{{data.rating}}</p>
            </div>
            <div class="container-fluid py-5 d-flex">
                <h2 class="me-3">Review Terbaru :</h2>
                <div class="container d-flex flex-column justify-content-between w-25 round_shape border_items" v-for="i in data.review">
                    <div class="">
                        <p>Dari: {{i.user.username}}</p>
                        <p>{{i.review}}</p>
                    </div>
                    <p class="mb-0 text-end">Rating: {{i.rating}}</p>
                </div>
            </div>
        </div>
        <div class="container-fluid d-flex justify-content-center">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Berikan Ulasan Anda
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Berikan Ulasan Anda</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form @submit.prevent>
                                <label>Review :</label>
                                <textarea name="Review" class="form-control" v-model="review"></textarea>
                                <label>Rating :</label>
                                <input type="text" name="rating" class="form-control" v-model="rating">
                            </form>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" @click="review_insert(data.id)">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'detail_page',

    data(){
        return {
            data : [],
            review : "",
            rating: "",
        }
    },

    methods : {
        async detail(){
            let path = await window.axios.get(`/api/destination/${this.$route.params.id}`);
            console.log(path);
            this.data = path.data.data
            if (this.data.review.length >= 3){
                this.data.review.length = 3
            }
        },

        async review_insert(id_user){
            let input = { id_destination:id_user , rating: this.rating , review: this.review}
            let path = await window.axios.post('/api/user/review' , input)
            console.log(id_user);
            this.detail();
            this.review = ""
            this.rating = ""
        }
    },

    mounted() {
        this.detail();
    }
};
</script>

<style scoped>
    .container-fluid .size{
        font-size: 24px;
        font-weight: bold;
    }
</style>
