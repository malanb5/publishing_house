<template>

    <div>

        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="/">LaraVue</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        <li v-if="!$store.state.isLoggedIn"><router-link class="nav-link" :to="{ name: 'login' }">Login</router-link></li>
                        <li v-if="!$store.state.isLoggedIn"><router-link class="nav-link" :to="{ name: 'register' }">Register</router-link></li>

                        <li class="nav-item dropdown" v-if="$store.state.isLoggedIn">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                {{ userName }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <router-link class="nav-link dropdown-item" :to="{ name: 'profile' }">My profile</router-link>
                                <router-link class="nav-link dropdown-item" :to="{ name: 'logout' }">Logout</router-link>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">

                            <router-view></router-view>

                        </div>
                    </div>
                </div>
            </div>

        </main>

    </div>

</template>

<script>
    export default {
        name: "AppComponent",
        data(){
          return {

          }
        },
        computed:{
            userName: function(){
                return this.$store.state.user
            }
        }
    }
</script>

<style scoped>

</style>

