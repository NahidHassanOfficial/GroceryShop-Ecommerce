<script setup>
import { ref, computed, onMounted } from "vue";

const countdownDuration = 120; // 2 minutes
const timeLeft = ref(countdownDuration);

// Format time as minutes:seconds
const formattedTime = computed(() => {
    const minutes = Math.floor(timeLeft.value / 60);
    const seconds = timeLeft.value % 60;
    return `${minutes}:${seconds < 10 ? "0" : ""}${seconds}`;
});

// Start countdown on mount
const startTimer = () => {
    const timer = setInterval(() => {
        if (timeLeft.value > 0) timeLeft.value--;
        else clearInterval(timer);
    }, 1000);
};
onMounted(startTimer);

const isOtpComplete = computed(() => OTPForm.otp && OTPForm.otp.length === 6);

const source = sessionStorage.getItem('source');

import { useForm } from "@inertiajs/vue3";
const OTPForm = useForm({ 'otp': null });
const submitOtp = () => {
    if (isOtpComplete.value) {
        OTPForm.post(route(source), {
            onSuccess: () => {
                if (source.includes('resetpwd'))
                    toast.success('Password reseted! check your mail');
                else toast.success('Registration Successful');
            },
            onError: () => {
                toast.error(OTPForm.errors.message);
            },
        });
    }
};
</script>

<template>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4 text-center shadow w-50 py-10 px-10">
            <!-- Logo and Header -->
            <div class="mb-3">
                <img :src="'/images/freshcart-logo.svg'" alt="Your Logo" class="img-fluid mb-2">
                <p class="text-muted">Enter the OTP sent to your email</p>
            </div>

            <!-- OTP Input Form -->
            <form @submit.prevent="submitOtp">
                <div class="d-flex justify-content-center mb-3">
                    <input type="text" maxlength="6" class="form-control text-center fs-3" v-model="OTPForm.otp"
                        placeholder="# # # # # #">
                </div>
                <button type="submit" class="btn btn-primary w-100" :disabled="!isOtpComplete">
                    Verify Now
                </button>
            </form>

            <!-- Countdown Timer -->
            <div class="mt-3 bg-secondary-subtle rounded  d-flex flex-col justify-content-center align-items-center "
                style="height: 100px;">
                <p v-if="timeLeft > 0" class="text-muted">
                    Time remaining: {{ formattedTime }}
                </p>
                <p v-else>
                    Didn’t receive the code?
                    <button @click="resendOtp" class="btn btn-link text-success">Resend OTP</button>
                </p>
            </div>
        </div>
    </div>
</template>