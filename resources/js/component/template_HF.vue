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

    <router-view>

    </router-view>

    <div class="container-fluid py-3 px-5 bg-grey">
        <img src="/images/logo_fix.png" alt="">
        <div class="row">
            <div class="col-lg-3">
                <div class="contact py-3">
                    <div class="text_contact d-flex justify-content-between align-items-center">
                        <p>Email: MaduraDestination.Com</p>
                        <img src="/images/facebook-logo.png" alt="" class="d-block">
                    </div>
                    <div class="text_contact d-flex justify-content-between align-items-center">
                        <p>Phone: 0812123456789</p>
                        <img src="/images/instagram.png" alt=""  class="d-block">
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
    name: 'template_HF',
};
</script>

<style scoped>

</style>
