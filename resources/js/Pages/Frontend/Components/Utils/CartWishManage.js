import { toast } from "vue3-toastify";
import { useForm } from "@inertiajs/vue3";
const wishForm = useForm({
    product_id: "",
});

export function addToWishList(product_id) {
    wishForm.product_id = product_id;
    wishForm.post(route("add.wish-list"), {
        preserveScroll: true,
        onSuccess: () => {
            toast.success("Wish list updated");
        },
        onError: () => {
            toast.error(wishForm.errors.message);
        },
    });
}

import { ref, watch } from "vue";
export const cartList = ref(
    localStorage.getItem("cartList")
        ? JSON.parse(localStorage.getItem("cartList"))
        : []
);
watch(
    cartList,
    (newCartList) => {
        localStorage.setItem("cartList", JSON.stringify(newCartList));
    },
    { deep: true }
);

export function addToCart(product, quantity = 1) {
    const item = {
        id: product.id,
        name: product.name,
        image: JSON.parse(product.image)[0],
        price: product.sale_price,
        quantity,
    };
    //check if cartlist have item with the same product.id then just increse the quantity
    const index = cartList.value.findIndex((item) => item.id === product.id);
    if (index != -1) cartList.value[index].quantity++;
    else cartList.value.unshift(item);
    toast.success("Added to cart");
}

export function removeCartItem(product_id) {
    cartList.value = cartList.value.filter((item) => item.id !== product_id);
}
