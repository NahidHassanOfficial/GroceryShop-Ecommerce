<script setup>
import { useForm } from '@inertiajs/vue3';
import Master from '../Master.vue'
defineOptions({
    layout: Master,
})

const resetForm = useForm({
    email: null,
})
const submit = () => {
    resetForm.post(route("user.resetpwd.verify"), {
        onSuccess: () => {
            sessionStorage.setItem('source', 'user.resetpwd.post');
            toast.success('OTP Verification mail sent');
        }
    });
};

</script>

<template>

    <Head>
        <title>FreshCart - Forget Password</title>
    </Head>
    <!-- navigation -->
    <div class="border-bottom shadow-sm">
        <nav class="navbar navbar-light py-2">
            <div class="container justify-content-center justify-content-lg-between">
                <Link class="navbar-brand" :href="route('index')">
                <img :src="'images/freshcart-logo.svg'" alt="" class="d-inline-block align-text-top" />
                </Link>
                <span class="navbar-text">
                    Don't have an account?
                    <Link :href="route('user.register')" class="text-primary link-success">Sign Up
                    </Link>

                </span>
            </div>
        </nav>
    </div>

    <main>
        <!-- section -->
        <section class="my-lg-14 my-8">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row justify-content-center align-items-center">
                    <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
                        <!-- img -->
                        <img :src="'images/reset-pwd-g.svg'" alt="" class="img-fluid" />
                    </div>
                    <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1 d-flex align-items-center">
                        <div>
                            <div class="mb-lg-9 mb-5">
                                <!-- heading -->
                                <h1 class="mb-2 h2 fw-bold">Forgot your password?</h1>
                                <p>Please enter the email address associated with your account and We will email you a
                                    link
                                    to reset your password.</p>
                            </div>
                            <!-- form -->
                            <form @submit.prevent="submit" class="needs-validation">
                                <!-- row -->
                                <div class="row g-3">
                                    <!-- col -->
                                    <div class="col-12">
                                        <!-- input -->
                                        <label for="formForgetEmail" class="form-label visually-hidden">Email
                                            address</label>
                                        <input v-model="resetForm.email" type="email" class="form-control"
                                            id="formForgetEmail" placeholder="Email" required />
                                        <div class="text-danger">{{ resetForm.errors.email }}</div>
                                    </div>

                                    <!-- btn -->
                                    <div class="col-12 d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">Reset Password</button>
                                        <Link :href="route('user.login')" class="btn btn-light">Back
                                        </Link>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

</template>