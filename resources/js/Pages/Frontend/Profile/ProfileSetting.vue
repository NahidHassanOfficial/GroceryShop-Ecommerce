<script setup>
import { reactive } from 'vue';
import MasterProfile from './Layout/MasterProfile.vue';
defineOptions({
    layout: MasterProfile,
})
const props = defineProps({
    user: Object,
})

const userCopy = reactive({ ...props.user });

import { useForm } from '@inertiajs/vue3';

const infoForm = useForm({
    firstName: userCopy.firstName,
    lastName: userCopy.lastName,
    email: userCopy.email,
    phone: userCopy.phone,
});

import { toast } from 'vue3-toastify';

function updateInfo() {
    infoForm.post(route('profile.info.update'), {
        onSuccess: () => {
            toast.success("Information Updated");
        },
        onError: () => {
            if (infoForm.errors.message)
                toast.error(infoForm.errors.message);
        },
    })
}

const passwordForm = useForm({
    newPass: '',
    currentPass: '',
});

function updatePassword() {
    passwordForm.post(route('profile.passwd.update'), {
        onSuccess: () => {
            toast.success("Password updated!");
        },
        onError: () => {
            toast.error(passwordForm.errors.message);
        },
    })
}


</script>
<template>
    <div class="col-lg-9 col-md-8 col-12">
        <div class="py-6 p-md-6 p-lg-10">
            <div class="mb-6">
                <!-- heading -->
                <h2 class="mb-0">Account Setting</h2>
            </div>
            <div>
                <!-- heading -->
                <h5 class="mb-4">Account details</h5>
                <div class="row">
                    <div class="col-lg-5">
                        <!-- form -->
                        <form @submit.prevent="updateInfo">
                            <!-- input -->
                            <div class="mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" placeholder="" id="fname"
                                    v-model="infoForm.firstName" />
                                <small class=" text-danger ">{{ infoForm.errors.firstName }}</small>

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" placeholder="" id="lname"
                                    v-model="infoForm.lastName" />
                                <small class=" text-danger ">{{ infoForm.errors.lastName }}</small>

                            </div>
                            <!-- input -->
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" placeholder="" id="emailx"
                                    v-model="infoForm.email" />
                                <small class=" text-danger ">{{ infoForm.errors.email }}</small>

                            </div>
                            <!-- input -->
                            <div class="mb-5">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control" placeholder="Phone number" id="phone"
                                    v-model="infoForm.phone" />
                                <small class=" text-danger ">{{ infoForm.errors.phone }}</small>

                            </div>
                            <!-- button -->
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">Update Details</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <hr class="my-10" />
            <div class="pe-lg-14">
                <!-- heading -->
                <h5 class="mb-4">Password</h5>
                <form class="row row-cols-1 row-cols-lg-2" @submit.prevent="updatePassword">
                    <!-- input -->
                    <div class=" mb-3 col">
                        <label class="form-label">New Password</label>
                        <input v-model="passwordForm.newPass" type="password" class="form-control" placeholder=""
                            required />
                        <small class=" text-danger ">{{ passwordForm.errors.newPass }}</small>
                    </div>
                    <!-- input -->
                    <div class="mb-3 col">
                        <label class="form-label">Current Password</label>
                        <input v-model="passwordForm.currentPass" type="password" class="form-control" placeholder=""
                            id="password" required />
                        <small class=" text-danger ">{{ passwordForm.errors.currentPass }}</small>
                    </div>
                    <!-- input -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Save Password</button>
                        <p class="mb-4">
                            Can’t remember your current password?
                            <a :href="route('user.resetpwd')">Reset your password.</a>
                        </p>
                    </div>
                </form>
            </div>
            <hr class="my-10" />
            <div>
                <!-- heading -->
                <h5 class="mb-4">Delete Account</h5>
                <p class="mb-2">Would you like to delete your account?</p>
                <p class="mb-5">This account contain 12 orders, Deleting your account will remove all the order
                    details
                    associated with it.</p>
                <!-- btn -->
                <a href="#" class="btn btn-outline-danger">I want to delete my account</a>
            </div>
        </div>
    </div>

</template>
