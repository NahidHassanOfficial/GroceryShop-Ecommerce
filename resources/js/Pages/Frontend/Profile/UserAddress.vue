<script setup>
import MasterProfile from './Layout/MasterProfile.vue';
defineOptions({
    layout: MasterProfile,
})

const props = defineProps({
    homeAddress: Object,
    officeAddress: Object,
})

import { useForm } from '@inertiajs/vue3';
let addressUpdate = useForm({});
function updateDefault() {
    addressUpdate.get(route('addressDefault.update'), {
        onSuccess: () => {
            toast.success("Default address updated");
        },
        onError: () => {
            toast.error(form.errors.message);
        },
    });
}

import AddressModal from '../Components/AddressModal.vue';
import { ref } from 'vue';
const showModal = ref(false);
const newProps = ref('');
const openModal = (types) => {
    if (types == 'new') newProps.value = {};
    else if (types == 'editHome') newProps.value = props.homeAddress;
    else newProps.value = props.officeAddress;

    showModal.value = true;
};

function deleteAddress(id) {
    useForm({}).get(route('address.delete', id))
}
</script>
<template>
    <div class="col-lg-9 col-md-8 col-12">
        <div class="py-6 p-md-6 p-lg-10">
            <div class="d-flex justify-content-between mb-6">
                <!-- heading -->
                <h2 class="mb-0">Address</h2>
                <!-- button -->
                <a @click="openModal('new')" class="btn btn-outline-primary btn-sm">Add a new
                    address</a>
            </div>
            <div class="row">
                <!-- col -->
                <div v-if="homeAddress" class="col-xl-5 col-lg-6 col-xxl-4 col-12 mb-4">
                    <!-- form -->
                    <div class="card card-body p-6">
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="homeRadio"
                                :checked="homeAddress.is_default" />
                            <label class="form-check-label text-dark" for="homeRadio">Home
                            </label>
                        </div>
                        <!-- address -->
                        <address>
                            <br />
                            {{ homeAddress.address }},
                            <br />
                            {{ homeAddress.district }}, {{ homeAddress.city }}, {{
                                homeAddress.country }},
                            <br />

                        </address>

                        <button @click="updateDefault" v-if="!homeAddress.is_default"
                            class="btn btn-outline-danger btn-sm col-6">Make Default
                            address </button>
                        <div class="mt-4">
                            <a @click="openModal('editHome')" class="text-inherit">Edit</a>
                            <a @click="deleteAddress(homeAddress.id)" class="text-danger ms-3">Delete</a>
                            <!-- data-bs-toggle="modal" data-bs-target="#deleteModal" -->
                        </div>
                    </div>
                </div>
                <div v-if="officeAddress" class="col-xk-5 col-lg-6 col-xxl-4 col-12 mb-4">
                    <!-- input -->
                    <div class="card card-body p-6">
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="officeRadio"
                                :checked="officeAddress.is_default" />
                            <label class="form-check-label text-dark" for="officeRadio">Office </label>

                        </div>
                        <address>
                            <br />
                            {{ officeAddress.address }},
                            <br />
                            {{ officeAddress.district }}, {{ officeAddress.city }}, {{
                                officeAddress.country }},
                            <br />

                        </address>
                        <button @click="updateDefault" v-if="!officeAddress.is_default"
                            class="btn btn-outline-danger btn-sm col-6">Make Default
                            address</button>
                        <div class="mt-4">
                            <a @click="openModal('editOffice')" class="text-inherit">Edit</a>
                            <a @click="deleteAddress(officeAddress.id)" class="text-danger ms-3">Delete</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <!-- modal content -->
            <div class="modal-content">
                <!-- modal header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- modal body -->
                <div class="modal-body">
                    <h6>Are you sure you want to delete this address?</h6>
                    <p class="mb-6">

                    </p>
                </div>
                <!-- modal footer -->
                <div class="modal-footer">
                    <!-- btn -->
                    <button type="button" class="btn btn-outline-gray-400" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <AddressModal :address="newProps" v-if="showModal" @close="showModal = false" />

</template>