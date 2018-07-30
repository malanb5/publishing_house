<template>

    <div class="login-component">

        <div class="card-header">Login</div>

        <div class="card-body">
            <form @submit.prevent="submitLogin">

                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="" required autofocus v-model="email">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required v-model="password">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>

                        <a class="btn btn-link" href="">
                            Forgot Your Password?
                        </a>
                    </div>
                </div>
            </form>
        </div>

    </div>

</template>

<script>
    import store from '../../store/store'
    export default {
        name: "LoginComponent",
        data() {
            return {
                email: '',
                password: '',
                loginError: false,
            }
        },
        methods: {
            submitLogin() {

                console.log('submitLogin');

                this.loginError = false;
                axios.post('/api/auth/login', {
                    email: this.email,
                    password: this.password
                }).then(response => {
                    // login user, store the token and redirect to dashboard
                    localStorage.setItem('token', response.data.access_token);
                    localStorage.setItem('user', response.data.user.name);

                    store.commit('loginUser');
                    this.$router.push({ name: 'home' });
                }).catch(error => {
                    this.loginError = true;
                });
            }
        }
    }
</script>

<style scoped>

</style>